<?php

// +----------------------------------------------------------------------
// | EasyAdmin
// +----------------------------------------------------------------------
// | PHP交流群: 763822524
// +----------------------------------------------------------------------
// | 开源协议  https://mit-license.org 
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zhongshaofa/EasyAdmin
// +----------------------------------------------------------------------

namespace app\admin\controller\goods;


use think\App;
use think\facade\Config;
use app\common\model\Dispatch as Dispatchs;
use app\common\model\DispatchData;
use app\common\controller\AdminController;

use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;

/**
 * Class Dispatch
 * @package app\admin\controller\goods
 * @ControllerAnnotation(title="配送管理")
 */
class Dispatch extends AdminController
{

    use \app\admin\traits\Curd;

    protected $sort = [
        'id'   => 'desc',
    ];

    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->model = new Dispatchs();
    }

    /**
     * @NodeAnotation(title="列表")
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            if (input('selectFields')) {
                return $this->selectList();
            }
            list($page, $limit, $where) = $this->buildTableParames();
            $count = $this->model
                ->where($where)
                ->count();
            $list = $this->model
                ->where($where)
                ->page($page, $limit)
                ->order($this->sort)
                ->select();
            $data = [
                'code'  => 0,
                'msg'   => '',
                'count' => $count,
                'data'  => $list,
            ];
            return json($data);
        }
        return $this->fetch();
    }

    /**
     * @NodeAnotation(title="配送逻辑")
     */
    public function data($id=0)
    {
        if($id==0){
            $this->error('缺少参数');
        }

        $row = $this->model->find($id);
        if(!$row){$this->error('数据不存在');}

        $this->model = new DispatchData();
        $data = $this->model->where('did',$id)->find();

        if ($this->request->isAjax()) {
            if (input('selectFields')) {
                return $this->selectList();
            }
            list($page, $limit, $where) = $this->buildTableParames();
            $where["did"] = $id;

            $count = $this->model
                ->where($where)
                ->count();
            $list = $this->model
                ->where($where)
                ->page($page, $limit)
                ->order($this->sort)
                ->select();
            $data = [
                'code'  => 0,
                'msg'   => '',
                'count' => $count,
                'data'  => $list,
            ];
            return json($data);
        }
        $this->assign('data', $data);
        $this->assign('row', $row);
        return $this->fetch();
    }
    /**
     * @NodeAnotation(title="添加配送逻辑")
     */
    public function dataadd($id=0)
    {
        if($id==0){
            $this->error('缺少参数');
        }
        $row = $this->model->find($id);
        if(!$row){$this->error('数据不存在');}

        if ($this->request->isAjax()) {
            $this->model = new DispatchData();
            $post = $this->request->post();
            $rule = [
                'display_order|优先权' => 'require|number|between:0,1000',
                'state|类型' => 'require|number|in:0,1',

                'province|省地区' => 'require|chs|length:0,20',
                'province_id|省地区' => 'require|number',
                'city|市地区' => 'chs|length:0,20',
                'city_id|市地区' => 'number',
                'area|县区地区' => 'chs|length:0,20',
                'area_id|县区地区' => 'number',
                'street|街道地区' => 'chs|length:0,20',
                'street_id|街道地区' => 'number',

                'first_piece|首件(个/斤)' => 'require|number',
                'first_piece_price|运费(元)' => 'require|float',
                'another_piece|续件(个/斤)' => 'require|number',
                'another_piece_price|续费(元)' => 'require|float',
            ];
            $this->validate($post, $rule);
            $post['did'] = $id;

            // 放飞自我的字符串拼接读取 一举三得
            $lx = array('province','city','area','street');
            $sql = array();
            $sql_txt = '';

            for ($i=0; $i < count($lx); $i++) { 
                if(isset($post[$lx[$i]]) && $post[$lx[$i]] !== ''){
                    $sql[] = array(
                    'id' => $post[$lx[$i].'_id'],
                    'name' => $post[$lx[$i]],
                    'lv' => $i,
                    );
                    $sql_txt .= $post[$lx[$i]];
                }
            }
            if($post['province'] == '全国'){
                $sw = $this->model->where('did',$id)->where('areas_txt','全国')->find();
                if($sw){$this->error('全国 的配送逻辑只能设置一个！不能重复添加！');}

                $sql = array();
                $sql[] = array(
                    'id' => 0,
                    'name' => '全国',
                    'lv' => 0,
                    );
                $sql_txt = '全国';
            }

            $post['areas'] = json_encode($sql);
            $post['areas_txt'] = $sql_txt;
            if($post['areas'] == ''){
                $this->error('保存失败,地区为空！');
            }
            $sw = $this->model->where('did',$id)->where('areas_txt',$sql_txt)->find();
            if($sw){$this->error($sql_txt.' 的配送逻辑只能设置一个！不能重复添加！');}
            // print_r($post);
            // exit;
            try {
                $save = $this->model->save($post);
            } catch (\Exception $e) {
                $this->error('保存失败:'.$e->getMessage());
            }
            $save ? $this->success('保存成功') : $this->error('保存失败');
        }
        $this->assign('row', $row);
        return $this->fetch();
    }
}
