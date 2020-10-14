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
// | DateTime：2020-10-14 11:23:57
// +----------------------------------------------------------------------

use think\facade\Config;
use think\facade\Event;

return function () {
   print_r("插件A启动<br>");
	// 设置插件
	Config::set(['a' => [
        'name' => '线下自提点模块',
        'type' => 'marketing',
        'url' => 'plugin.orz-maps.admin.set.lists',// url 可以填写http 也可以直接写路由
        'url_params' => '',//如果是url填写的是路由则启用参数否则不启用
        'permit' => 1,//如果不设置则不会做权限检测
        'menu' => 1,//如果不设置则不显示菜单，子菜单也将不显示
        'icon' => 'fa-calendar',//菜单图标
        'list_icon' => 'orz-maps',
        'parents' => [],
        'top_show' => 0,
        'left_first_show' => 0,
        'left_second_show' => 1
        ]], 'plugins_menu');

	// 监听事件
	Event::subscribe(AcShop\plugin\a\listener\index::class);
	

};
