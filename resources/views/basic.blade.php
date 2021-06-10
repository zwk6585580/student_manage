<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{URL::asset('layui/css/layui.css')}}">
    <title>@yield('title')</title>
</head>
<body class="antialiased">
<script src="{{URL::asset('layui/layui.js')}}"></script>
<script src="{{URL::asset('layui/jQuery.js')}}"></script>
<script src="{{URL::asset('layui/common.js')}}"></script>
<div>
    <ul class="layui-nav" lay-filter="">
        <li class="layui-nav-item"><a href="">班级管理</a></li>
        <li class="layui-nav-item layui-this"><a href="">学生管理</a></li>
    </ul>
</div>

<div class="layui-fluid">
    @yield('content')
</div>

</body>
</html>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>
