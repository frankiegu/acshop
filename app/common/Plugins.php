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
// | DateTime：2020-10-19 14:57:41
// +----------------------------------------------------------------------

namespace app\common;

use think\facade\Config;
use think\facade\Route;
use app\common\model\PluginsData;

class Plugins 
{
    /**
     * 初始化方法 【新】使用数据库操作注入
     */
    static public function init()
    {
        //==================================
        //      获取已开启的插件并注入
        //==================================
        $root = root_path();
        $dir = $root.'plugin/';

        $plugins = PluginsData::where("state",1)->select();

        for ($i=0; $i < count($plugins); $i++) { 
            $file = $dir.$plugins[$i]["dir"]."/package.php";
            if (is_file($file)){
               $hook = include $file;
               $hook();
            }
        }
    }
    /**
     * 获取已安装的插件列表信息
     */
    static public function GetPluginList($state = "")
    {
        $plugins = PluginsData::order('state','DESC');
        if ($state !== "") {
            $plugins = $plugins->where("state",$state);
        }
        $plugins = $plugins->select();
    	return $plugins;
    }
    /**
     * 获取未安装的插件信息 安装后 package.json包 更名
     */
    static public function GetInstallPlugin()
    {
        $root = root_path();
        $install = array();
        $dir = $root.'plugin/';
        $str = opendir($dir);
        while( ($filename = readdir($str)) !== false ){
            if($filename != "." && $filename != ".."){
                if (!is_file($filename)){
                    $dir_array[]=$filename;
                }
            }
        }
        closedir($str);
        for ($i=0; $i < count($dir_array); $i++) { 
            $file = $dir.$dir_array[$i]."/package.json";
            if (is_file($file)){
                $handle = fopen($file, 'r');
                if ($handle) {
                    $buffer = fread($handle, filesize($file));
                    fclose($handle);
                    $json = json_decode($buffer,true);
                    if ($json) {
                        $install[] = $json;
                    }
                }
            }
        }
        return $install;
    }

}