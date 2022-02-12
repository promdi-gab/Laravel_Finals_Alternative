@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Update Employee
        </h1>
    </div>
<div>
        <div class="flex justify-center pt-4">
            <form action="/employee/{{ $employees->employee_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="block">
                    <label for="full_name" class="text-lg">Full Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="full_name"
                    value="{{ $employees->full_name }}">

                    <label for="email" class="text-lg">Email</label>
                    <input type="email"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="email"
                    value="{{ $employees->email }}">

                    <label for="password" class="text-lg">Password</label>
                    <input type="password"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="password">

                    <label for="employee_pic"" class="text-lg">Employee Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="employee_pic">
                    <img src="{{ asset('uploads/images4/'.$employees->employee_pic)}}" alt="I am A Pic" width="100" height="100" class="ml-24 pb-2">

                    <button type="submit" class="bg-gray-800 text-white block shadow-5xl p-2 w-full font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>
@endsection