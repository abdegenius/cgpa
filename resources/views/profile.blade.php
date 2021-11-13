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
                <li class="mb-2 p-4 text-white bg-black">
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
            <div class="flex justify-center items-center mx-auto text-center">
                <div class="w-full md:w-1/2 bg-white shadow-xl p-4 mx-auto">
                    <div class="bg-black w-32 h-32 rounded-full border-4 border-gray-500 mx-auto  flex justify-center items-center">
                        <div><i class="fa fa-user fa-3x text-white"></i></div>
                    </div>
                    <h2 class="text-gray-600 font-bold my-4">{{ $user->fullname }}</h2>
                    <ul>

                @if(Auth::user()->type == 'user')
                        <li my-2 class="flex justify-start items-center">
                            <div class="mr-4 border-r-2 border-gray-400">
                                <i class="fa fa-key pr-4"></i>
                            </div>
                            <div class="text-gray-600 ml-2">
                            {{ $user->matric_no }}
                            </div>
                        </li>
                @endif
                        <li my-2 class="flex justify-start items-center">
                            <div class="mr-4 border-r-2 border-gray-400">
                                <i class="fa fa-envelope pr-4"></i>
                            </div>
                            <div class="text-gray-600 ml-2">
                            {{ $user->email }}
                            </div>
                        </li>
                        <li my-2 class="flex justify-start items-center">
                            <div class="mr-4 border-r-2 border-gray-400">
                                <i class="fa fa-phone pr-4"></i>
                            </div>
                            <div class="text-gray-600 ml-2">
                                {{ $user->phone }}
                            </div>
                        </li>

                        @if(Auth::user()->type == 'user')
                        <li my-2 class="flex justify-start items-center">
                            <div class="mr-4 border-r-2 border-gray-400">
                                <i class="fa fa-building pr-4"></i>
                            </div>
                            <div class="text-gray-600 ml-2">
                                {{ \App\Models\Department::where('id', $user->department_id)->value('name') }}
                            </div>
                        </li>

                        <li my-2 class="flex justify-start items-center">
                            <div class="mr-4 border-r-2 border-gray-400">
                                <i class="fa fa-flag pr-4"></i>
                            </div>
                            <div class="text-gray-600 ml-2">
                                {{ $user->level }} Level
                            </div>
                        </li>
                        @endif
                    </ul>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection