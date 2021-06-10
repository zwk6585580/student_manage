@extends('basic')
@section('title','student management')
@section('content')

    <div style="margin-top: 20px;display: inline-block;position: relative">
        <form class="layui-form" action="">
            <input type="hidden" name="id" value="{{isset($student['id']) && $student['id']? $student['id']:''}}">
            {{csrf_field()}}
            <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="name" required value="{{isset($student['name']) ?? ''}}"
                           lay-verify="required" placeholder="姓名" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">班级</label>
                <div class="layui-input-block">
                    <select name="class_id" lay-verify="required">
                        <option value=""></option>
                        @foreach($classes as $class)
                            <option
                                value="{{$class->id}}" {{isset($student->classes->id) && $student->classes->id == $class->id ? 'selected':''}}>{{$class->class}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">单选框</label>
                <div class="layui-input-block">
                    <input type="radio" name="sex" value="男"
                           title="男" {{isset($student['sex']) && $student['sex'] == '男' ? 'checked':''}}>
                    <input type="radio" name="sex" value="女"
                           title="女" {{isset($student['sex']) && $student['sex'] == '女' ? 'checked':''}}>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>

    </div>

    <script>
        //Demo
        layui.use('form', function () {
            var form = layui.form;

            //监听提交
            form.on('submit(formDemo)', function (data) {
                data = data.field;
                $.ajax({
                    type: "POST",
                    data: data,
                    url: '{{url('student/edit')}}',
                    success(res) {
                        // todo
                        if (res.code === 200) {
                            layer.msg("success", function () {
                                window.location = "{{url('student/index')}}";
                            });
                        } else {
                            layer.msg(res.message);
                            return false;
                        }
                    },
                })
                return false;
            });
        });
    </script>
@endsection()
