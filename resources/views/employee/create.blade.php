<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body style="background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size:cover;">

<div class="pt-32 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Create Employee
        </h1>
    </div>
<div>

        <div class="flex justify-center pt-3">
            <form action="/employee" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <label for="full_name" class="text-lg">Full Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="full_name"
                    placeholder="Full Name">

                    <label for="email" class="text-lg">Email</label>
                    <input type="email"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="email"
                    placeholder="Email">

                    <label for="password" class="text-lg"r">Password</label>
                    <input type="password"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="password"
                    placeholder="Password">

                    <label for="employee_pic"" class="text-lg">Employee Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="employee_pic">

                    <button type="submit" class="bg-gray-800 text-white block p-2 mt-5 w-full font-bold">
                        Submit Account
                    </button>
                </div>
            </form>
        </div>
        @if ($errors->any())
        <div class="text-center pt-3">
            @foreach ($errors->all() as $error)
                <li class="list-none text-red-500 text-xl">
                    {{ $error }}
                </li>
            @endforeach
        </div>
        @endif
    </body>
</html>