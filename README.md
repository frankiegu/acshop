# AcShop（AcgIce商城）

AcShop（全名 Acgice商城）基于TP6框架 的一套 开源的微信社交电商分销系统。

原有公司项目运营2年，遇到了无数的难题和痛点，此项目专为解决目前公司项目的痛点进行重新开发！并新加了很多特性！

项目于2020-10-13日立项，预计登录平台为：H5 + APP + 小程序（微信 QQ 百度 等..）【开发中】

[![AcShop](https://img.shields.io/badge/license-AGPL--3.0-blue)](https://oauth.acgice.com)
[![AcShop](https://img.shields.io/badge/AcShop-开发中-brightgreen)](https://oauth.acgice.com)
[![star](https://gitee.com/orzice/acshop/badge/star.svg?theme=dark)](https://gitee.com/orzice/acshop/stargazers)
[![fork](https://gitee.com/orzice/acshop/badge/fork.svg?theme=dark)](https://gitee.com/orzice/acshop/members)

Gitee : https://gitee.com/orzice/acshop

Github : https://github.com/orzice/acgice

## [通知] 因项目繁忙，无空余时间，暂且搁置，12月1日 继续开发



## [进度]

- [x] 管理后台
  - [x] 后台管理系统
    - [x] Auth授权
    - [x] 管理员注册/删除/封禁
    - [x] 菜单管理/节点管理
    - [x] 网站配置
    - [x] 文件上传
  - [x] 插件系统
    - [x] 插件安装/卸载/删除
    - [x] 插件独立管理后台
    - [x] 插件HOOK监听
    - [ ] 插件市场
    - [ ] 插件在线升级和安装
  - [x] 计划任务
  - [x] 任务队列
  - [x] 会员管理
    - [x] 后台添加/删除/封禁会员
    - [x] 重置密码
    - [x] 修改推荐人
    - [x] 插件嵌入页面
  - [x] 商品管理
    - [x] 商品管理
      - [x] 商品添加/删除/修改
      - [x] 商品属性
      - [x] 插件嵌入页面
    - [x] 配送管理
      - [x] 添加/删除/是否开启配送
      - [x] 配送逻辑
        - [x] 省 市 县区 街道 四级配送
        - [x] 黑名单和白名单
        - [x] 可以控制街道级的配送金额

  - [ ] 订单管理
    - [ ] 订单列表
      - [ ] 操作订单 已支付/确认发货/已收货
    - [ ] 批量发货
      - [ ] 表格快捷批量发货
    - [ ] 用户退款
  - [ ] 财务管理
    - [ ] 余额设置
    - [ ] 提现设置
    - [ ] 用户提现记录
    - [ ] 线下收款记录
    - [ ] 充值余额
    - [ ] 充值记录
    - [ ] 余额明细
    - [ ] 收入明细
    - [ ] 提现统计

  - [ ] 支付管理

    - [ ] 微信支付
      - [ ] 微信支付资源列表
      - [ ] 微信授权登录设置
      - [ ] 微信支付设置
    - [ ] 支付宝支付
      - [ ] 支付宝支付资源
      - [ ] 支付宝支付设置
    - [ ] 线下付款
      - [ ] 线下收款渠道资源

    - [ ] 外接API收款
      - [ ] api外置充值接口



## [运行环境要求]

> 后端技术栈：PHP7.2 + Redis + Mysql + Nginx 
>
> 前端技术栈： Vue.js + uni-app

后台管理页部分代码参考 easyadmin



> 预计 1.0.0 Bate 版本于 2020-12-15 日 发布。
>
> 立项于 2020-10-13日，预计工期 2个月。
>
> 开源！开源！开源！开源！



### [队列]

```
php think queue:work --sleep=3 --tries=3
```

### [计划任务]

```
php think cron
```





## [企划]（挖坑）

- 云端附件支持（本地，阿里云，七牛云.....）

- 更简易的计划任务系统。

- 更高效的队列系统。

- 核心代码只做核心功能，以便以二次开发。

- 更强大的插件功能 （核心代码只做核心功能！其他就交给插件来做！）

- 可支持打包 为 APP！

- 可支持打包 为 小程序（微信，QQ，头条，抖音，百度）！

- 部分代码使用Go语言重写（高并发以及中间件，后期才会做）

- 齐全的支付模块！微信支付，支付宝支付，（H5支付，APP支付，微信内支付，扫码支付）

- 多种支付方式！且可以随意切换！

- 精确到街道的发货逻辑！

  

## [特性]

### 代码只做核心功能！



### 插件高扩展性，拥有更强的能力！



### 多个微信支付通道随意切换！



### 多个微信一键登录 随意切换！



### 精确到街道的发货逻辑！