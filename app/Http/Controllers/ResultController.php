<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseReg;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function grade($score){
        switch($score){
            case $score >= 70:
                return "A";
            break;
            case $score >= 60 && $score < 70:
                return "B";
            break;
            case $score >= 50 && $score < 60:
                return "BC";
            break;
            case $score >= 40 && $score < 50:
                return "C";
            break;
            case $score >= 30 && $score < 40:
                return "CD";
            break;git commit -m "first commit"
            git branch -M main
            git remote add origin https://github.com/abdegenius/cgpa.git
            git push -u origin main
            case $score >= 20 && $score < 30:
                return "D";
            break;
            case $score >= 10 && $score < 20:
                return "E";
            break;
            case $score >= 0 && $score < 10:
                return "F";
            break;
            default:
                return "F";
            break;
        }
    }
    public function results() {
        $user = Auth::user();
        if($user->type == "admin"){
            $users = User::where('type', 'user')->orderBy('id', 'desc')->get();
            return view('results', ['users' => $users]);
        }
        else{
            $resultCount = Result::where('user_id', $user->id)->count();
            $courseCount = CourseReg::where('user_id', $user->id)->count();
            $isComplete = $resultCount == $courseCount ? "yes" : "no";
            $results = Result::where('user_id', $user->id)->get();
            return view('results', ['results' => $results, 'isComplete' => $isComplete]);
        }
    }
    public function upload_result($id) {
        $course_regs = CourseReg::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('upload-result', ['id' => $id, 'course_regs' => $course_regs]);
    }
    public function post_upload_result(Request $request) {
        foreach($request->course_id as $key => $data){
            $isExist = Result::where(['user_id' => $request->user_id, 'course_id' => $data])->count();
            $result = '';
            if($isExist > 0){
                $result = Result::where(['user_id' => $request->user_id, 'course_id' => $data])->first();
            }
            else{
                $result = new Result();
            }
            $result->course_id = $data;
            $result->user_id = $request->user_id;
            $result->grade = $this->grade($request->score[$key]);
            $result->score = $request->score[$key];
            $result->save();
        }
        return redirect()->back()->withSuccess("Result uploaded");
    }
}
