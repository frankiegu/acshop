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
// | DateTime：2020-10-19 14:58:09
// +----------------------------------------------------------------------
// 应用公共文件

use app\common\service\AuthService;
use think\facade\Cache;
use think\facade\Config;


if (!function_exists('Sessions')) {
    /**
     * 获取Session配置信息  可以随意修改Session名
     * @param $group
     * @param null $name
     * @return array|mixed
     */
    function Sessions($name = null,$data = null)
    {
        $src = config_plus("acshop.SessionName");
        if($name){
            $src = $src .".".$name;
        }

        if($data){
            return session($src,$data);
        }else{
            return session($src);
        }
    }
}

if (!function_exists('sysconfig')) {

    /**
     * 获取系统配置信息
     * @param $group
     * @param null $name
     * @return array|mixed
     */
    function sysconfig($group, $name = null)
    {
        $where = ['group' => $group];
        $value = empty($name) ? Cache::get("sysconfig_{$group}") : Cache::get("sysconfig_{$group}_{$name}");
        if (empty($value)) {
            if (!empty($name)) {
                $where['name'] = $name;
                $value = \app\admin\model\SystemConfig::where($where)->value('value');
                Cache::tag('sysconfig')->set("sysconfig_{$group}_{$name}", $value, 3600);
            } else {
                $value = \app\admin\model\SystemConfig::where($where)->column('value', 'name');
                Cache::tag('sysconfig')->set("sysconfig_{$group}", $value, 3600);
            }
        }
        return $value;
    }
}
if (!function_exists('http_query')) {
function http_query($url, $post = null)
   {
        // 初始化一个cURL会话
        $ch = curl_init($url);
        if (isset($post)) {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        //忽略证书
        if (substr($url, 0, 5) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $curl_result = curl_exec($ch);
        if ($curl_result) {
            $data = $curl_result;
        } else {
            $data = curl_error($ch);
        }
        curl_close($ch);    #关闭cURL会话
        return $data;
    }
 }
 
if (!function_exists('__url')) {

    /**
     * 构建URL地址
     * @param string $url
     * @param array $vars
     * @param bool $suffix
     * @param bool $domain
     * @return string
     */
    function __url(string $url = '', array $vars = [], $suffix = true, $domain = false)
    {
        return url($url, $vars, $suffix, $domain)->build();
    }
}

if (!function_exists('password')) {

    /**
     * 密码加密算法
     * @param $value 需要加密的值
     * @param $type  加密类型，默认为md5 （md5, hash）
     * @return mixed
     */
    function password($value)
    {
        $value = sha1('ac_') . md5($value) . md5(config_plus("acshop.pwSDK")) . sha1($value);
        return sha1($value);
    }

}

if (!function_exists('config_plus')) {

    /**
     * 获取系统配置文件信息
     * @param $group
     * @param null $name
     * @return array|mixed
     */
    function config_plus($name)
    {
        return Config::get($name);
    }
}

if (!function_exists('auth')) {

    /**
     * auth权限验证
     * @param $node
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    function auth($node = null)
    {
        $authService = new AuthService(Sessions('id'));
        $check = $authService->checkNode($node);
        return $check;
    }

}