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
// | DateTime：2020-10-19 14:56:05
// +----------------------------------------------------------------------

namespace app\admin\controller\plugin;

use app\common\controller\AdminController;
use app\common\Plugins;

use app\admin\service\TriggerService;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * @ControllerAnnotation(title="插件系统管理")
 * Class Node
 * @package app\admin\controller\plugin
 */

class Index extends AdminController
{
    /**
     * @NodeAnotation(title="我的插件")
     */
    public function index()
     {
       
        //获取插件配置
        $PluginOn = Plugins::GetPluginList(1);
        $PluginOff = Plugins::GetPluginList(0);
        $Install = Plugins::GetInstallPlugin();
        //print_r($Install);
        //exit;
        $this->assign('PluginOn', $PluginOn);
        $this->assign('PluginOff', $PluginOff);
        $this->assign('Install', $Install);

        return $this->fetch();
    }
}