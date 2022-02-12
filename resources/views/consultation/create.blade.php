@extends('home')

@section('contents')
<div class="pb-20 my-5">
    <div class="text-center">
        <h1 class="text-5xl">
            Consult Your Pet
        </h1>
    </div>
<div>

        <div class="flex justify-center pt-3">
            <form action="/consultation" method="POST">
                @csrf
                <div class="block">

                    <label for="employee_id" class="text-lg">Vet</label>
                    <select name="employee_id" id="employee_id" class="block shadow-5xl p-2 my-5 w-full">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->employee_id }}">{{ $employee->full_name }}</option>
                        @endforeach
                    </select>

                    <label for="pet_id" class="text-lg">Pet</label>
                    <select name="pet_id" id="pet_id" class="block shadow-5xl p-2 my-5 w-full">
                        @foreach ($pets as $pet)
                            <option value="{{ $pet->pet_id }}">{{ $pet->pet_name }}</option>
                        @endforeach
                    </select>

                    <label for="date_of_Consultation" class="text-lg">Date of Consultation</label>
                    <input type="datetime-local"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="date_of_Consultation">

                    <label for="disease_Injuries" class="text-lg">Disease & Injuries</label>
                    <select name="disease_Injuries" class="block shadow-5xl p-2 my-5 w-full">
                      <option>Cataracts</option>
                      <option>Arthritis</option>
                      <option>Ear_Infections</option>
                      <option>Kennel_Cough</option>
                      <option>Diarrhoea</option>
                      <option>Fleas_and_ticks</option>
                      <option>Heartworm</option>
                      <option>Broken_Bones</option>
                      <option>Obesity</option>
                      <option>Cancer</option>
                    </select>

                    <label for="price" class="text-lg"r">Price</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="price"
                    placeholder="Price">

                    <label for="comments" class="text-lg ">Comments</label>
                    <input type="text"
                    class="block shadow-5xl p-2 my-5 w-full"
                    name="comments">

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