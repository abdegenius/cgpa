<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function courses() {
        $user = Auth::user();
        if($user->type == "user"){
            $courses = Course::where(['department_id' => $user->department_id, 'level' => $user->level])->orderBy('id', 'desc')->get();
            return view('courses', ['courses' => $courses]);
        }
        return redirect()->back();
    }
    public function add_course($id){
        $course_reg = new CourseReg();
        $course_reg->user_id = Auth::id();
        $course_reg->course_id = $id;
        $course_reg->save();
        return redirect()->back()->withSuccess("Course added");
    }
    public function drop_course($id){
        $course_reg = CourseReg::where('course_id', $id)->first();
        $course_reg->delete();
        return redirect()->back()->withSuccess("Course dropped");
    }
}
