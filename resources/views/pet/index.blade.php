@extends('home')

@section('contents')

<div class="pt-8 pb-4 px-8">
    <a href="pet/create" class="p-3 border-none italic text-white bg-black text-lg">
        Add a new pet &rarr;
    </a>
</div>

<div class="py-3">
    <table class="table-auto">
        <tr class="text-white">
            <th class="w-screen text-3xl">Id</th> 
            <th class="w-screen text-3xl">Pet Name</th>
            <th class="w-screen text-3xl">Age</th>
            <th class="w-screen text-3xl">Sex</th>
            <th class="w-screen text-3xl">Breed</th>
            <th class="w-screen text-3xl">Pet Pic</th>
            <th class="w-screen text-3xl">Owner</th>
            <th class="w-screen text-3xl">Update</th>
            <th class="w-screen text-3xl">Delete</th>
        </tr>

  @forelse ($pets as $pet)
      <tr>
        <td class=" text-center text-3xl">
            {{ $pet->pet_id }}
      </td>
          <td class=" text-center text-3xl">
                {{ $pet->pet_name }}
          </td>
          <td class=" text-center text-3xl">
                {{ $pet->age }}
          </td>
          <td class=" text-center text-3xl">
                {{ $pet->sex }}
          </td>
          <td class=" text-center text-3xl">
                {{ $pet->breed }}
          </td>
          <td class="pl-8">
            <img src="{{ asset('uploads/images2/'.$pet->pet_pic)}}" alt="I am A Pic" width="75" height="75">
          </td>
          <td class=" text-center text-3xl">
                {{ $pet->owner->first_name }}
          </td>
          <td class=" text-center">
            <a href="pet/{{ $pet->pet_id }}/edit" class="text-center text-3xl bg-green-600 p-2">
                Update &rarr; 
               </a>
          </td>
          <td class=" text-center">
            <form action="/pet/{{ $pet->pet_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-center text-3xl bg-red-600 p-2">
                    Delete &rarr;
                </button>
           </form>
          </td>
      </tr>
            @empty
                <p>No Pet Data in the Database</p>
            @endforelse
        </table>
    </div>
</div>
@endsection