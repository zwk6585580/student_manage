@extends('basic')
@section('title','student management')
@section('content')
    <div style="margin-top: 20px;display: inline-block;position: relative">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输姓名" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">选择框</label>
                <div class="layui-input-block">
                    <select name="city" lay-verify="required">
                        <option value=""></option>
                        <option value="0">一年级</option>
                        <option value="1">二年级</option>
                        <option value="2">三年级</option>
                        <option value="3">四年级</option>
                        <option value="4">五年级</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">单选框</label>
                <div class="layui-input-block">
                    <input type="radio" name="sex" value="男" title="男">
                    <input type="radio" name="sex" value="女" title="女" checked>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">查询</button>
                </div>
            </div>
        </form>
    </div>

<div style="position: absolute;left: 400px;top: 10px">
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="150">
            <col width="150">
            <col width="200">
        </colgroup>
        <thead>
        <tr>
            <th>ID</th>
            <th>班级</th>
            <th>姓名</th>
            <th>性别</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($students as $student)
            <td>{{$student->id}}</td>
            <td>{{$student->grade->grade . $student->classes->class}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->sex}}</td>
            <td>
                <a href="">
                    <i class="layui-icon layui-icon-set" style=" color: #1E9FFF;"></i>
                </a>
                <a href="">
                    <i class="layui-icon layui-icon-delete" style=" color: #FF5722;"></i>
                </a>

            </td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>


    @endsection()
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>
