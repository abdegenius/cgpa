<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}"/>
</head>
<body class="bg-gray-200 w-screen min-h-screen p-8">
    <div class="mx-auto w-10/12 md:w-1/3 bg-white shadow-xl p-12 mt-24">
        <h3 class="mb-4 font-semibold text-gray-600 text-2xl">LOGIN NOW</h3>
        @include("errors.all")
        <form method="POST" action="{{ route('auth.login') }}" class="mb-4">
            @csrf
            <div class="mb-4 w-12/12">
                <input type="text" class="border-2 border-gray-800 bg-gray-100 p-4 text-gray-900 font-bold outline-none w-full" name="email" placeholder="Email Address"/>
            </div>
            <div class="mb-4 w-12/12">
                <input type="password" class="border-2 border-gray-800 bg-gray-100 p-4 text-gray-900 font-bold outline-none w-full" name="password" placeholder="Password"/>
            </div>
            <div class="mb-4 mt-4 w-12/12">
                <input type="submit" class="border-2 border-gray-800 bg-gray-900 p-4 text-white font-bold outline-none w-full" name="submit" value="Log In"/>
            </div>
        </form>
    </div>
</body>
</html>