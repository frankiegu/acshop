<?php
// +----------------------------------------------------------------------
// | AcShop (全名 Acgice商城)
// +----------------------------------------------------------------------
// | 团队官网: https://oauth.acgice.com
// +----------------------------------------------------------------------
// | 联系我们: https://oauth.acgice.com/sdk/contact.html
// +----------------------------------------------------------------------
// | gitee开源项目：https://gitee.com/orzice/ac-shop
// +----------------------------------------------------------------------
// | Author：Orzice(小涛)  https://gitee.com/orzice
// +----------------------------------------------------------------------
// | DateTime：2020-10-13 18:46:00
// +----------------------------------------------------------------------
namespace app\api\controller;

use app\BaseController;
use app\common\controller\ApiController;
use think\facade\Config;


class Index extends ApiController
{
    
    public function index()
     {
    //     //$s = new \AcShop\plugin\a\src\index\index();
    //     $root = root_path();
    //     $arr = array();
    //     $dir = $root.'plugin/';

    //     //遍历目录下面的所有文件和目录，2019年2月15日
    //     $str = opendir($dir);//指定获取此目录下的文件及文件夹列表
    //     while( ($filename = readdir($str)) !== false ) 
    //     {
    //         if($filename != "." && $filename != "..")
    //         {
    //             //判断是否是文件，文件放在文件列表数组中，子文件夹放在子文件夹列表数组中
    //             if (is_file($filename)){
    //                 $file_array[]=$filename;
    //             }else{
    //                 $dir_array[]=$filename;
    //             }
    //         }
    //     }
    //     closedir($str);
    //     //以数组形式打印文件夹目录下面的所有文件列表
    //     //print_r($file_array);
    //     //以数组形式打印文件夹目录下面的所有子文件夹列表
    //     print_r($dir_array);
    //     for ($i=0; $i < count($dir_array); $i++) { 
    //         # 判断文件是否存在 存在则开始注入依赖
    //         $file = $dir.$dir_array[$i]."\bootstrap.php";
    //         if (is_file($file)){
    //            $hook = include  $file;
    //            $hook();
    //         }
    //     }
        // 获取配置
    print_r(Config::get('plugins_menu'));

        return "-结束";
    }


}