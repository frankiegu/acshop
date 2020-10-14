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
// | Author：Orzice(小涛)  https://gitee.com/orzice
// +----------------------------------------------------------------------
// | DateTime：2020-10-14 17:03:59
// +----------------------------------------------------------------------
namespace AcShop\plugin\a\admin\index;


use app\common\controller\AdminController;
use app\common\Plugins;


class Index extends AdminController
{
	
	public function index()
	{
        print_r("=============<br>");
        print_r("[管理员界面]插件列表<br>");
        print_r("=============<br>");
        print_r(Plugins::GetPluginList());
		return 111;
	}


}