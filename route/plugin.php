<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

// Route::get('think', function () {
//     return 'hello,ThinkPHP6!';
// });

//Route::get('hello/:name', 'index/hello');

//Route::rule('plugin','app\api\controller\Index@index

// 绑定到类
/**
 * plugin.a-index-index-index
 */
Route::rule('plugin.<p1>-<p2>-<p3>-<p4>','AcShop\plugin\<p1>\src\<p2>\<p3>@<p4>');

// Route::rule('plugin.<p1>-<p2>-<p3>-<p4>', function ($p1,$p2,$p3,$p4) {
// 	print_r($p1);
// 	print_r($p2);
// 	print_r($p3);
// 	print_r($p4);
// });

// plugin.orz-s1hop.api.Shop.banner
// Route::rule('plugin.<action>', function ($action) {
// 	//print_r($action);
// 	$url = explode(".",$action);
// 	//$code = "AcShop\plugin\\".$url[0]."\\src\\".$url[1]."\\".$url[2]."::".$url[3];
// 	$code = "AcShop\plugin\\".$url[0]."\\src\\".$url[1]."\\".$url[2];
	
// 	eval('$con = new '.$code.";");
// 	print_r($con);
// 	//print_r (explode(".",$action));
// 	//return "AcShop\plugin\\".$url[0]."\\src\\".$url[1]."\\".$url[2]."@".$url[3];
// });
//  plugin/a.index.index.index