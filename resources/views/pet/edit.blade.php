@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Update Pet
        </h1>
    </div>
<div>
        <div class="flex justify-center pt-4">
            <form action="/pet/{{ $pets->pet_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="block">
                    <label for="pet_name" class="text-lg">Pet Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="pet_name"
                    value="{{ $pets->pet_name }}">

                    <label for="age" class="text-lg">Age</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="age"
                    value="{{ $pets->age }}">

                    <label for="sex" class="text-lg">Sex</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="sex"
                    value="{{ $pets->sex }}">

                    <label for="breed" class="text-lg">Breed</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="breed"
                    value="{{ $pets->breed }}">

                    <label for="owner_id"" class="text-lg">Owner</label>
                    <select name="owner_id" id="owner_id" class="block shadow-5xl p-2 w-full">Owner Id
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->owner_id }}">{{ $owner->last_name }},{{ $owner->first_name }}</option>
                        @endforeach
                    </select>

                    <label for="pet_pic"" class="text-lg">Pet Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="pet_pic">
                    <img src="{{ asset('uploads/images2/'.$pets->pet_pic)}}" alt="I am A Pic" width="100" height="100" class="ml-24 pb-2">

                    <button type="submit" class="bg-gray-800 text-white block shadow-5xl p-2 w-full font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>
@endsection