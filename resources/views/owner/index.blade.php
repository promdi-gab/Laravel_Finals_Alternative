@extends('home')

@section('contents')

<div class="pt-8 pb-4 px-8">
    <a href="owner/create" class="p-3 border-none italic text-white bg-black text-lg">
        Add a new owner &rarr;
    </a>
</div>

<div class="py-3">
    <table class="table-auto">
        <tr class="text-white"> 
            <th class="w-screen text-3xl">Id</th>
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
            {{ $owner->owner_id }}
        </td>
          <td class=" text-center text-3xl">
                {{ $owner->first_name }}
          </td>
          <td class=" text-center text-3xl">
            {{ $owner->last_name }}
          </td>
          <td class=" text-center text-3xl">
            {{ $owner->phone_number }}
          </td>
          <td class="pl-16">
            <img src="{{ asset('uploads/images/'.$owner->owner_pic)}}" alt="I am A Pic" width="75" height="75">
          </td>
          <td class=" text-center">
            <a href="owner/{{ $owner->owner_id }}/edit" class="text-center text-3xl bg-green-600 p-2">
                Update &rarr; 
               </a>
          </td>
          <td class=" text-center">
            <form action="/owner/{{ $owner->owner_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-center text-3xl bg-red-600 p-2">
                    Delete &rarr;
                </button>
           </form>
          </td>
      </tr>
            @empty
                <p>No Owner Data in the Database</p>
            @endforelse
        </table>
    </div>
</div>
@endsection