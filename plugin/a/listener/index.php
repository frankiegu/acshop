<?php
// +----------------------------------------------------------------------
// | AcShop (Acgice商城)
// +----------------------------------------------------------------------
// | 团队官网: https://oauth.acgice.com
// +----------------------------------------------------------------------
// | 联系我们: https://oauth.acgice.com/sdk/contact.html
// +----------------------------------------------------------------------
// | gitee开源项目：https://gitee.com/orzice/ac-shop
// +----------------------------------------------------------------------
// | Author：Orzice(小涛)  https://gitee.com/orzice
// +----------------------------------------------------------------------
// | DateTime：2020-10-14 11:23:44
// +----------------------------------------------------------------------
namespace AcShop\plugin\a\listener;


use think\Event;
/**
* 
*/
class Index 
{
	public function subscribe(Event $event){
		//$event->listen('UserLogin', [$this,'onUserLogin']);
                $event->listen('UserLogin', [$this,'onUserLogin']);
                print_r("事件监听注册<br>");
             
        // $event->listen(\app\api\controller\index::class, function ($event) {
        //     //订单model
        //     print_r($event);
        //     exit;
        //     // $model = $event->getOrderModel();
        //     // $this->handle($model);
        // });
        }
        public function onUserLogin($user)
        {
            // UserLogin事件响应处理
            print_r("插件A 响应<br>");
        }

}