@if ($errors->any())
<div class="my-4 p-2">
<div class="bg-red-200 p-2">
    @foreach ($errors->all() as $error)
        <li class="font-bold text-center text-red-600">{{$error}}</li>
    @endforeach
</div>
</div>
@endif


