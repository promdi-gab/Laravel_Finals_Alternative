@extends('home')

@section('contents')

<div class="py-5 px-10">
    <a href="owner/create" class="p-3 border-none italic text-white bg-black">
        Add a new owner &rarr;
    </a>
</div>

<div class="py-3">
    <table class="table-auto">
        <tr>
            <th class="w-screen text-3xl">First Name</th>
            <th class="w-screen text-3xl">Last Name</th>
            <th class="w-screen text-3xl">Phone Number</th>
            <th class="w-screen text-3xl">Owner Pic</th>
            <th class="w-screen text-3xl">Update</th>
            <th class="w-screen text-3xl">Delete</th>
        </tr>
  @forelse ($owners as $owner)
      <tr>
          <td class=" text-center text-3xl">
                {{ $owner->first_name }}
          </td>
          <td class=" text-center text-3xl">
            {{ $owner->last_name }}
          </td>
          <td class=" text-center text-3xl">
            {{ $owner->phone_number }}
          </td>
          <td class="pl-24">
            <img src="{{ asset('uploads/images/'.$owner->owner_pic)}}" alt="I am A Pic" width="75" height="75">
          </td>
          <td class=" text-center">
            <a href="owner/{{ $owner->owner_id }}/edit" class="text-center text-green-600 text-3xl">
                Edit &rarr; 
               </a>
          </td>
          <td class=" text-center">
            <form action="/owner/{{ $owner->owner_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-center text-red-600 text-3xl">
                    Delete &rarr;
                </button>
           </form>
          </td>
      </tr>
            @empty
                <p>No Owner in the Database</p>
            @endforelse
        </table>
    </div>
</div>
@endsection