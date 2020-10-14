<?php

//namespace app\event;

use think\facade\Config;
use think\facade\Event;
/**
 * 你可以在这个闭包的参数列表中使用类型提示
 * Laravel 会自动从容器中解析出对应的依赖并自动注入
 * 使用依赖注入之前你首先需要了解 Laravel 的服务容器机制
 *
 * 在这个闭包里你可以做任何准备工作，所有的代码都会在请求被处理之前执行
 * 包括不限于动态修改 config、修改 option、监听事件、绑定对象至服务容器等
 *
 * @see  https://laravel-china.org/docs/5.1/container
 */

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
