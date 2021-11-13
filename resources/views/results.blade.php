@extends('layouts.app')
@section('content')
    <div class="h-18 bg-black text-white p-4 w-screen mb-5">
        <h4 class="font-black">CGPA</h4>
    </div>

    <div class="block md:flex justify-start items-start mx-4 md:mx-16">
        <div class="w-12/12 md:w-3/12 bg-white shadow-xl p-6 my-4">
            <ul>
                <li class="mb-2 p-4 hover:text-white hover:text-xl hover:bg-black">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-th"></i> &nbsp; Dashboard</a>
                </li>
                <li class="mb-2 p-4 hover:text-white hover:text-xl hover:bg-black">
                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i> &nbsp; Profile</a>
                </li>
                <li class="mb-2 p-4 text-white bg-black">
                    <a href="{{ route('results') }}"><i class="fa fa-check-circle"></i> &nbsp; Results</a>
                </li>
                @if(Auth::user()->type == 'user')
                <li class="mb-2 p-4 hover:text-white hover:text-xl hover:bg-black">
                    <a href="{{ route('courses') }}"><i class="fa fa-list"></i> &nbsp; Courses</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="w-12/12 md:w-9/12 bg-transparent my-4">
            <div class="md:mx-4 bg-white shadow-xl p-4">
                <h3 class="font-bold text-2xl text-gray-600">
                    Results
                </h3>
                <hr>
                <br>


                @if(Auth::user()->type == 'user')
                    @if($isComplete == 'yes')
                    <?php
                    $total_point = 0;
                    $credit_unit = 0;
                    foreach($results as $result){
                        if($result->grade == 'A'){
                            $total_point += 4 * $result->course->unit;
                        }
                        if($result->grade == 'B' || $result->grade == 'BC'){
                            $total_point += 3 * $result->course->unit;
                        }
                        if($result->grade == 'C' || $result->grade == 'CD'){
                            $total_point += 2 * $result->course->unit;
                        }
                        if($result->grade == 'D'){
                            $total_point += 1 * $result->course->unit;
                        }
                        if($result->grade == 'E'){
                            $total_point += 0.5 * $result->course->unit;
                        }
                        if($result->grade == 'F'){
                            $total_point += 0 * $result->course->unit;
                        }
                        $credit_unit += $result->course->unit;
                    }
                    $cgpa = round($total_point/$credit_unit,2);
                    function gradeClass($value){
                        if($value >= 3.50 && $value <= 4){
                            return 'Distinction';
                        }
                        if($value >= 3 && $value < 3.50){
                            return 'Upper Credit';
                        }
                        if($value >= 2.50 && $value < 3){
                            return 'Lower Credit';
                        }
                        if($value >= 2 && $value < 2.5){
                            return 'Pass';
                        }
                        if($value >= 0 && $value < 2){
                            return 'Fail';
                        }
                    }
                    ?>
                        <div class="rounded-xl shadow-inner border-4 border-gray-200 bg-gray-600 p-8 text-center mb-4">
                            <span class="block mb-4">
                                <i class="fa fa-eye fa-3x text-white"></i>
                            </span>
                            <span class="block mb-4 text-2xl text-white font-bold">
                                2020/2021 session / 1st Semester Result..
                            </span>
                            <div class="text-black rounded-md p-4 m-2 bg-gray-50">
                                Hello {{ Auth::user()->fullname }}! You made <b>{{ gradeClass($cgpa) }}</b> with a CGPA of <b>{{ $cgpa }}</b>
                                below is a summary of your scores on taken courses.
                            </div>
                        </div>
                        <ul class="">
                            <li class="flex justify-between items-center font-bold">
                                <div>
                                    Course Title(CU)
                                </div>
                                <div class="w-16">Grade</div>
                            </li>
                            <li><hr><br></li>
                            @if(!$results->isEmpty())
                            @foreach($results as $data)
                            <li class="flex justify-between items-center">
                                <div>
                                    {{$data->course->title}}({{$data->course->unit}})
                                </div>
                                <div class="w-16">{{$data->grade}}</div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    @endif
                @else
                <ul class="">
                    <li class="flex justify-between items-center font-bold">
                        <div>
                            Student
                        </div>
                        <div class="w-16">...</div>
                    </li>
                    <li><hr><br></li>


                    @if(!$users->isEmpty())
                        @foreach($users as $data)
                            <li class="flex justify-between items-center mb-2">
                                <div>
                                    {{ $data->fullname }}
                                </div>
                                <div class="w-32">
                                    <a href="{{ route('upload.result', $data->id) }}" class="bg-black p-2 rounded-full text-white"><b>Upload Result</b></a>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                @endif
            </div>
        </div>
    </div>
@endsection