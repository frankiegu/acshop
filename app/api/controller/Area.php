<?php
// +----------------------------------------------------------------------
// | AcShop (Acgice商城)
// +----------------------------------------------------------------------
// | 团队官网: https://oauth.acgice.com
// +----------------------------------------------------------------------
// | 联系我们: https://oauth.acgice.com/sdk/contact.html
// +----------------------------------------------------------------------
// | gitee开源项目：https://gitee.com/orzice/acshop
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/orzice/acshop
// +----------------------------------------------------------------------
// | Author：Orzice(小涛)  https://gitee.com/orzice
// +----------------------------------------------------------------------
// | DateTime：2020-10-19 14:56:58
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\BaseController;
use app\common\controller\ApiController;
use think\facade\Config;
use think\facade\Event;
use app\common\model\Area as Areas;

class Area extends ApiController
{
    
    public function index()
    {
        $post = $this->request->get();
        $rule = [
            'pid|pid'      => 'require|number',
            'deep|deep'       => 'require|number',
        ];
        $validate = $this->validate($post, $rule);
        //验证失败
        if($validate !== true){
           return api_return(0,$validate);
        }
        $data = Areas::where('pid',$post['pid'])->where('deep',$post['deep'])->select();
        if (count($data) == 0) {
           return api_return(0,'没有数据');
        }
        $data = $data->toArray();
        return api_return(1,'查询成功',$data);
    }


}