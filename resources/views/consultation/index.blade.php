@extends('home')

@section('contents')

<div class="pt-8 pb-4 px-8">
    <a href="consultation/create" class="p-3 border-none italic text-white bg-black text-lg">
        Add a new consultation &rarr;
    </a>
    <form action="{{ url('search') }}" type="GET" class="text-center">
        <input type="search" name="search" placeholder="Search Your History" class="pb-1 px-2 mr-4">
        <button class=" text-center text-white px-4 pb-1 text-md bg-blue-600">Search</button>
    </form>
</div>

<div class="py-3">
    <table class="table-auto">
        <tr class="text-white">
            <th class="w-screen text-3xl">Id</th> 
            <th class="w-screen text-3xl">Employee</th>
            <th class="w-screen text-3xl">Pet</th>
            <th class="w-screen text-3xl">Date of Consultation</th>
            <th class="w-screen text-3xl">Disease & Injuries</th>
            <th class="w-screen text-3xl">Price</th>
            <th class="w-screen text-3xl">Comments</th>
            <th class="w-screen text-3xl">Update</th>
            <th class="w-screen text-3xl">Delete</th>
        </tr>

  @forelse ($consultations as $consultation)
      <tr>
        <td class=" text-center text-3xl">
            {{ $consultation->consultation_id }}
      </td>
          <td class=" text-center text-3xl">
                {{ $consultation->employee->full_name }}
          </td>
          <td class=" text-center text-3xl">
                {{ $consultation->pet->pet_name }}
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
          <td class=" text-center">
            <a href="consultation/{{ $consultation->consultation_id }}/edit" class="text-center text-3xl bg-green-600 p-2">
                Update &rarr; 
               </a>
          </td>
          <td class=" text-center">
            <form action="/consultation/{{ $consultation->consultation_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-center text-3xl bg-red-600 p-2">
                    Delete &rarr;
                </button>
           </form>
          </td>
      </tr>
            @empty
                <p>No Consultation Data in the Database</p>
            @endforelse
        </table>
    </div>
</div>
@endsection