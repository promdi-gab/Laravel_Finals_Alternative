@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Update Service
        </h1>
    </div>
<div>
        <div class="flex justify-center pt-4">
            <form action="/service/{{ $services->service_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="block">
                    <label for="service_name" class="text-lg">Service Name</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="service_name"
                    value="{{ $services->service_name }}">

                    <label for="cost" class="text-lg">Cost</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="cost"
                    value="{{ $services->cost }}">

                    <label for="haircut_pic"" class="text-lg">Haircut Pic</label>
                    <input type="file"
                    class="block shadow-5xl p-2 w-full"
                    name="haircut_pic">
                    <img src="{{ asset('uploads/images3/'.$services->haircut_pic)}}" alt="I am A Pic" width="100" height="100" class="ml-24 pb-2">

                    <button type="submit" class="bg-gray-800 text-white block shadow-5xl p-2 w-full font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>
@endsection