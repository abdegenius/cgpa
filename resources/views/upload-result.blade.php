@extends('layouts.app')
@section('content')
    <div class="h-18 bg-black text-white p-4 w-screen mb-5">
        <a href="{{ route('results') }}"><h4 class="font-black"><i class="fa fa-arrow-left"></i> Back</h4></a>
    </div>

    <div class="mx-auto w-10/12 md:w-1/3 bg-white shadow-xl p-12 mt-24">
        <h3 class="mb-4 font-semibold text-gray-600 text-2xl">UPLOAD RESULT</h3>
        @include('errors.all')
        <form method="POST" action="{{ route('upload_result') }}" class="mb-4">
            @csrf
            <input type="hidden" name="user_id" value="{{ $id }}"/>
            @if(!$course_regs->isEmpty())
                @foreach($course_regs as $course_reg)
                <?php
                    $score = \App\Models\Result::where(['course_id' => $course_reg->course_id, 'user_id' => $id])->value('score')
                ?>
                    <div class="mb-4 w-12/12 flex justify-start items-center gap-4">
                        <input type="hidden" name="course_id[]" value="{{ $course_reg->course_id }}"/>
                        <div class="mr-1 w-full">
                            <input type="text" class="border-2 border-gray-800 bg-gray-100 p-4 text-gray-900 font-bold outline-none w-full" value="{{ $course_reg->course->title }}" readonly/>
                        </div>
                        <div class="ml-1 w-32">
                            <input type="text" value="{{ $score ? $score : 0 }}" class="border-2 border-gray-800 bg-gray-100 p-4 text-gray-900 font-bold outline-none w-full" name="score[]" placeholder="Score" min="0" max="100">
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="mb-4 mt-4 w-12/12">
                <input type="submit" class="border-2 border-gray-800 bg-gray-900 p-4 text-white font-bold outline-none w-full" name="submit" value="Save"/>
            </div>
        </form>
    </div>
@endsection