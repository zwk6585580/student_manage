<?php

namespace App\Http\Controllers;


use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * 学生列表
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $class = $request->input('class', '');
        $sex = $request->input('sex', '');
        $student = Student::query()->where('status', 1);
        if ($name) {
            $student->where('name', 'like', "%" . $name . "%");
        }
        if ($class) {
            $student->where('class', $name);
        }
        if ($sex) {
            $student->where('sex', $sex);
        }
        $data = $student->paginate();
        $classes = Classes::query()->get();
        return view('student', ['students' => $data, 'classes' => $classes]);
    }

    /**
     * 添加页面
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add(Request $request)
    {
        $id = $request->input('id', '');
        $student = [];
        if ($id) {
            $student = Student::query()->find($id);
        }
        $classes = Classes::query()->get();

        return view('add', ['student' => $student, 'classes' => $classes]);
    }

    /**
     * 编辑
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $param = $request->input();
        try {
            if (isset($param['id'])) {
                $update = [
                    'id' => $param['id'],
                    'name' => $param['name'],
                    'class_id' => $param['class_id'],
                    'sex' => $param['sex'],
                ];
                Student::where('id',$param['id'])->update($update);
            } else {
                $student = new Student();
                $student->name = $param['name'] ?? '';
                $student->sex = $param['sex'] ?? '';
                $student->class_id = $param['class_id'] ?? '';
                $student->save();
            }

        } catch (\Exception $exception) {
            return response()->json(['code' => 400, 'msg' => $exception->getMessage()]);
        }
        return response()->json(['code' => 200, 'msg' => 'success']);
    }

    /**
     * 删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $id = $request->get('id');

        try {
            Student::query()->where('id', $id)->update(['status' => 0]);
        } catch (\Exception $exception) {
            return response()->json(['code' => 400, 'msg' => $exception->getMessage()]);
        }
        return response()->json(['code' => 200, 'msg' => 'success']);

    }
}
