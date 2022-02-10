@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Create Service
        </h1>
    </div>
<div>

        <div class="flex justify-center pt-3">
            <form action="/service" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <label for="service_name" class="text-lg">Service Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="service_name"
                    placeholder="Service Name">

                    <label for="cost" class="text-lg">Cost</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="cost"
                    placeholder="Cost">

                    <label for="haircut_pic"" class="text-lg">Haircut Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="haircut_pic">

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