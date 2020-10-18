<?php /*a:2:{s:62:"H:\phpStudy\wplus\AcShop\app\admin\view\system\menu\index.html";i:1596969003;s:59:"H:\phpStudy\wplus\AcShop\app\admin\view\layout\default.html";i:1603014551;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuimini-iframe版 v2 - 基于Layui的后台管理系统前端模板</title>
    <meta name="keywords" content="layuimini,layui,layui模板,layui后台,后台模板,admin,admin模板,layui mini">
    <meta name="description" content="layuimini基于layui的轻量级前端后台管理框架，最简洁、易用的后台框架模板，面向所有层次的前后端程序,只需提供一个接口就直接初始化整个框架，无需复杂操作。">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <script>
        window.CONFIG = {
            ADMIN: "admin",
            CONTROLLER_JS_PATH: "admin/js/index.js",
            ACTION: "index",
            AUTOLOAD_JS: "1",
            IS_SUPER_ADMIN: "1",
            VERSION: "1.0.0.1",
        };
    </script>

    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="/static/css/public.css?v=<?php echo config_plus("acshop.version"); ?>" media="all">
    
    <link rel="stylesheet" href="/static/lib/layui-v2.5.6/css/layui.css?v=<?php echo config_plus("acshop.version"); ?>" media="all">
    <link rel="stylesheet" href="/static/css/layuimini.css?v=<?php echo config_plus("acshop.version"); ?>" media="all">
    <link rel="stylesheet" href="/static/css/themes/default.css?v=<?php echo config_plus("acshop.version"); ?>" media="all">
    <link rel="stylesheet" href="/static/lib/font-awesome-4.7.0/css/font-awesome.min.css?v=<?php echo config_plus("acshop.version"); ?>" media="all">

    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style id="layuimini-bg-color">

    </style>

    <script src="/static/lib/layui-v2.5.6/layui.all.js" charset="utf-8"></script>
    <script src="/static/lib/require-2.3.6/require.js" charset="utf-8"></script>
    <script src="/static/lib/config.js?v=2.0.0" charset="utf-8"></script>

</head>

<body>
<link rel="stylesheet" href="/static/plugs/lay-module/treetable-lay/treetable.css?v=<?php echo time(); ?>" media="all">
<style>
    .layui-btn:not(.layui-btn-lg ):not(.layui-btn-sm):not(.layui-btn-xs) {
        height: 34px;
        line-height: 34px;
        padding: 0 8px;
    }
</style>
<div class="layuimini-container">
    <div class="layuimini-main">
        <table id="currentTable" class="layui-table layui-hide"
               data-auth-add="<?php echo auth('system.menu/add'); ?>"
               data-auth-edit="<?php echo auth('system.menu/edit'); ?>"
               data-auth-delete="<?php echo auth('system.menu/delete'); ?>"
               lay-filter="currentTable">
        </table>
    </div>
</div>
<script type="text/html" id="toolbar">
    <button class="layui-btn layui-btn-sm layuimini-btn-primary" data-treetable-refresh><i class="fa fa-refresh"></i> </button>
    <button class="layui-btn layui-btn-normal layui-btn-sm <?php if(!auth('system.menu/add')): ?>layui-hide<?php endif; ?>" data-open="system.menu/add" data-title="添加" data-full="true"><i class="fa fa-plus"></i> 添加</button>
    <button class="layui-btn layui-btn-sm layui-btn-danger <?php if(!auth('system.menu/del')): ?>layui-hide<?php endif; ?>" data-url="system.menu/del" data-treetable-delete="currentTableRenderId"><i class="fa fa-trash-o"></i> 删除</button>
</script>

</body>
</html>