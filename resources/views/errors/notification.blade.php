@if(Session::has('error'))
    <div class="bg-red-200 p-2">
        <span class="font-bold text-center text-red-600">{{Session::get('error')}}</span>
    </div>
@elseif(Session::has('success'))
    <div class="bg-green-200 p-2">
        <span class="font-bold text-center text-green-600">{{Session::get('success')}}</span>
    </div>
@elseif(Session::has('info'))
    <div class="bg-blue-200 p-2">
        <span class="font-bold text-center text-blue-600">{{Session::get('info')}}</span>
    </div>
@elseif(Session::has('warning'))
    <div class="bg-purple-200 p-2">
        <span class="font-bold text-center text-purple-600">{{Session::get('warning')}}</span>
    </div>
@endif