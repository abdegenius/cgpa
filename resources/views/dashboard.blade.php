@extends('layouts.app')
@section('content')
    <div class="h-18 bg-black text-white p-4 w-screen mb-5">
        <h4 class="font-black">CGPA</h4>
    </div>

    <div class="block md:flex justify-start items-start mx-4 md:mx-16">
        <div class="w-12/12 md:w-3/12 bg-white shadow-xl p-6 my-4">
            <ul>
                <li class="mb-2 p-4 text-white bg-black">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-th"></i> &nbsp; Dashboard</a>
                </li>
                <li class="mb-2 p-4 hover:text-white hover:text-xl hover:bg-black">
                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i> &nbsp; Profile</a>
                </li>
                <li class="mb-2 p-4 hover:text-white hover:text-xl hover:bg-black">
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
                @if($user->type == "user")
                <div class="bg-yellow-200 border-2 border-yellow-800 p-4 rounded-md mb-4">
                    Welcome to the school result portal, 2020/2021 session first semester result is now out!
                </div>
                @else
                <div class="bg-green-200 border-2 border-green-800 p-4 rounded-md mb-4">
                    Welcome to the staff result portal, manage 2020/2021 session first semester result
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection