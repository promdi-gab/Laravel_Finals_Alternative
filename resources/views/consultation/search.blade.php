@extends('home')

@section('contents')

<h1 class="text-center text-5xl pb-8 text-blue-600">This is the Record of your Pet</h1>
<hr>

<div class="py-3">
    <table class="table-auto">
        <tr class="text-white">
            <th class="w-screen text-3xl">Employee</th>
            <th class="w-screen text-3xl">Date of Consultation</th>
            <th class="w-screen text-3xl">Disease & Injuries</th>
            <th class="w-screen text-3xl">Price</th>
            <th class="w-screen text-3xl">Comments</th>
        </tr>
@forelse ($consultations as $consultation)
      <tr>
          <td class=" text-center text-3xl">
                {{ $consultation->employee->full_name }}
          </td>
          <td class=" text-center text-3xl">
                {{ $consultation->date_of_Consultation }}
          </td>
          <td class=" text-center text-3xl">
                {{ $consultation->disease_Injuries }}
          </td>
          <td class=" text-center text-3xl">
                {{ $consultation->price }}
          </td>
          <td class=" text-center text-3xl">
            {{ $consultation->comments }}
          </td>
            @empty
                <p>No Consultation Data in the Database</p>
            @endforelse
        </table>
    </div>
</div>
    <hr>
        <h1 class="text-center text-5xl pb-8 text-green-700">Thank you for Choosing ACME Pet Clinic</h1>   
@endsection