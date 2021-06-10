@extends('basic')
@section('title','student management')
@section('content')
    <div style="margin-top: 20px;display: inline-block;position: relative">

        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="name" value="" placeholder="请输姓名" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">选择框</label>
                <div class="layui-input-block">
                    <select name="class">
                        <option value=""></option>
                    @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->class}}</option>
                        @endforeach
                    </select>
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


    <a href="{{url('student/add')}}"><button type="button" class="layui-btn"> 新增学生</button></a>
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="150">
            <col width="100">
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
        @foreach($students as $student)
            <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->classes->class}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->sex}}</td>
            <td>
                <a class="layui-btn layui-btn-xs  " data-ptype="2"
                   lay-event="edit" data-id="{{$student->id}}" href="{{url('student/add?id=').$student->id}}">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-danger data-count-delete delete" data-ptype="1"
                   lay-event="delete" data-id="{{$student->id}}">删除</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection()
<script src="{{URL::asset('layui/layui.js')}}"></script>
<script src="layui/jQuery.js"></script>
<script src="layui/common.js"></script>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
        $('.delete').on('click', function () {
            let id = $(this).attr('data-id');
            layObj.box(`是否删除当前学生`, () => {
                let   url = "{{url('student/delete')}}?id="+id;
                layObj.get(url,  (res) =>{
                    if(res.code === 200) {
                        window.location.reload();
                    } else {
                        layer.msg("删除失败");
                    }
                })

            })
        })


    });
</script>
