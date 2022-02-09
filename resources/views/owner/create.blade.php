@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Create Owner
        </h1>
    </div>
<div>

        <div class="flex justify-center pt-3">
            <form action="/owner" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <label for="first_name" class="text-lg">First Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="first_name"
                    placeholder="First Name">

                    <label for="last_name" class="text-lg">Last Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="last_name"
                    placeholder="Last Name">

                    <label for="phone_number" class="text-lg"r">Phone Number</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="phone_number"
                    placeholder="Phone Number">

                    <label for="owner_pic"" class="text-lg">Owner Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="owner_pic">

                    <button type="submit" class="bg-gray-800 text-white block p-2 mt-5 w-full font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>
        @if ($errors->any())
        <div class="text-center">
            @foreach ($errors->all() as $error)
                <li class="list-none text-red-500">
                    {{ $error }}
                </li>
            @endforeach
        </div>
        @endif
@endsection