@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Update Owner
        </h1>
    </div>
<div>
        <div class="flex justify-center pt-4">
            <form action="/owner/{{ $owners->owner_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="block">
                    <label for="first_name" class="text-lg">Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="first_name"
                    value="{{ $owners->first_name }}">

                    <label for="last_name" class="text-lg">Founded</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="last_name"
                    value="{{ $owners->last_name }}">

                    <label for="phone_number" class="text-lg">Description</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="phone_number"
                    value="{{ $owners->phone_number }}">

                    <label for="owner_pic"" class="text-lg">Owner Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="owner_pic">
                    <img src="{{ asset('uploads/images/'.$owners->owner_pic)}}" alt="I am A Pic" width="100" height="100" class="ml-24 pb-2">

                    <button type="submit" class="bg-gray-800 text-white block shadow-5xl p-2 w-full font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>
@endsection