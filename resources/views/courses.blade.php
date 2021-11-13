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
                <li class="mb-2 p-4 hover:text-white hover:text-xl hover:bg-black">
                    <a href="{{ route('results') }}"><i class="fa fa-check-circle"></i> &nbsp; Results</a>
                </li>
                @if(Auth::user()->type == 'user')
                <li class="mb-2 p-4 text-white bg-black">
                    <a href="{{ route('courses') }}"><i class="fa fa-list"></i> &nbsp; Courses</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="w-12/12 md:w-9/12 bg-transparent my-4">
            <div class="md:mx-4 bg-white shadow-xl p-4">
                <h3 class="font-bold text-2xl text-gray-600">
                    Courses
                </h3>
                <hr>
                <ul class="">
                    <li class="flex justify-between items-center font-bold">
                        <div>
                            Course Title(CU)
                        </div>
                        <div class="w-16">...</div>
                    </li>
                    <li><hr><br></li>
                    @include('errors.all')
                    <?php
                        if(!$courses->isEmpty()){
                            foreach($courses as $data){
                                $course_reg_count = \App\Models\CourseReg::where(['course_id' => $data->id, 'user_id' => Auth::id()])->count();
                    ?>
                    <li class="flex justify-between items-center mb-4">
                        <div>
                            {{$data->title}}({{ $data->unit }})
                        </div>
                        <div class="w-16">
                            @if($course_reg_count == 0)
                            <a href="{{ route('add.course', $data->id) }}" style="color:green;"><b>Add</b></a>
                            @else
                            <a href="{{ route('drop.course', $data->id) }}" style="color:red;"><b>Drop</b></a>
                            @endif
                        </div>
                    </li>
                    <?php } 
                    }
                    ?>
                </ul>


            </div>
        </div>
    </div>
@endsection