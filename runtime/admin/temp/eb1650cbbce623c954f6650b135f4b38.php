<?php /*a:2:{s:62:"H:\phpStudy\wplus\AcShop\app\admin\view\system\node\index.html";i:1603014296;s:59:"H:\phpStudy\wplus\AcShop\app\admin\view\layout\default.html";i:1603014763;}*/ ?>
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
            IS_SUPER_ADMIN: "1",
            VERSION: "<?php echo htmlentities($version); ?>",
        };
    </script>

    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="/static/css/public.css?v=<?php echo htmlentities($version); ?>" media="all">

    <link rel="stylesheet" href="/static/lib/layui-v2.5.6/css/layui.css?v=<?php echo htmlentities($version); ?>" media="all">
    <link rel="stylesheet" href="/static/css/layuimini.css?v=<?php echo htmlentities($version); ?>" media="all">
    <link rel="stylesheet" href="/static/css/themes/default.css?v=<?php echo htmlentities($version); ?>" media="all">
    <link rel="stylesheet" href="/static/lib/font-awesome-4.7.0/css/font-awesome.min.css?v=<?php echo htmlentities($version); ?>" media="all">

    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style id="layuimini-bg-color">

    </style>

    <script src="/static/lib/layui-v2.5.6/layui.all.js?v=<?php echo htmlentities($version); ?>" charset="utf-8"></script>
    <script src="/static/lib/require-2.3.6/require.js?v=<?php echo htmlentities($version); ?>" charset="utf-8"></script>
    <script src="/static/lib/config.js?v=<?php echo htmlentities($version); ?>" charset="utf-8"></script>

</head>

<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <table id="currentTable" class="layui-table layui-hide"
               data-auth-refresh="<?php echo auth('system.node/refreshNode'); ?>"
               data-auth-clear="<?php echo auth('system.node/clearNode'); ?>"
               lay-filter="currentTable">
        </table>
    </div>
</div>
<script type="text/javascript">

require(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'system.node/index',
        add_url: 'system.node/add',
        edit_url: 'system.node/edit',
        delete_url: 'system.node/delete',
        modify_url: 'system.node/modify',
    };

    ea.table.render({
        init: init,
        search: false,
        page: false,
        toolbar: ['refresh',
            [{
                text: '更新节点',
                title: '确定更新新节点？',
                url: 'system.node/refreshNode?force=0',
                method: 'request',
                auth: 'refresh',
                class: 'layui-btn layui-btn-success layui-btn-sm',
                icon: 'fa fa-hourglass',
                extend: 'data-table="' + init.table_render_id + '"',
            }, {
                text: '强制更新节点',
                title: '该操作会覆盖已存在的节点信息。<br>确定强制更新节点？',
                url: 'system.node/refreshNode?force=1',
                method: 'request',
                auth: 'refresh',
                class: 'layui-btn layui-btn-sm layui-btn-normal',
                icon: 'fa fa-hourglass',
                extend: 'data-table="' + init.table_render_id + '"',
            }, {

                text: '清除失效节点',
                title: '确定清除失效节点？',
                url: 'system.node/clearNode',
                method: 'request',
                auth: 'clear',
                class: 'layui-btn layui-btn-sm layui-btn-danger',
                icon: 'fa fa-trash-o',
                extend: 'data-table="' + init.table_render_id + '"',
            }
            ]],
        cols: [[
            {field: 'node', minWidth: 200, align: 'left', title: '系统节点'},
            {field: 'title', minWidth: 80, title: '节点名称 <i class="table-edit-tips color-red">*</i>', edit: 'text'},
            {field: 'update_time', minWidth: 80, title: '更新时间', search: 'range'},
            {field: 'is_auth', title: '节点控制', width: 85, search: 'select', selectList: {0: '禁用', 1: '启用'}, templet: ea.table.switch},
        ]],
    });

    ea.listen();
        
});
</script>
</body>
</html>