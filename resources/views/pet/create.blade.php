@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Create Pet
        </h1>
    </div>
<div>

        <div class="flex justify-center pt-3">
            <form action="/pet" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <label for="pet_name" class="text-lg">Pet Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="pet_name"
                    placeholder="Pet Name">

                    <label for="age" class="text-lg">Age</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="age"
                    placeholder="Age">

                    <label for="sex" class="text-lg"r">Sex</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="sex"
                    placeholder="Sex">

                    <label for="breed" class="text-lg"r">Breed</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="breed"
                    placeholder="Breed">

                    <label for="pet_pic"" class="text-lg">Pet Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="pet_pic">

                    <label for="owner_id"" class="text-lg">Owner</label>
                    <select name="owner_id" id="owner_id" class="block shadow-5xl p-2 w-full">Owner Id
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->owner_id }}">{{ $owner->last_name }},{{ $owner->first_name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-gray-800 text-white block p-2 mt-5 w-full font-bold">
                        Submit
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
@endsection