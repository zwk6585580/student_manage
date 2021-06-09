<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $class = $request->input('class', '');
        $sex = $request->input('sex', '');
        $student = Student::query();
        if ($name) {
            $student->where('name', $name);
        }
        if ($class) {
            $student->where('class', $name);
        }
        if ($sex) {
            $student->where('sex', $sex);
        }
        $data =  $student->paginate();

        return view('student',['students'=>$data]);
    }

    public function add()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
