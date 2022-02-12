@extends('home')

@section('contents')

<div class="pt-8 pb-4 px-8">
    <a href="service/create" class="p-3 border-none italic text-white bg-black text-lg">
        Add a new service &rarr;
    </a>
</div>

<div class="py-3">
    <table class="table-auto">
        <tr class="text-white"> 
            <th class="w-screen text-3xl">Id</th>
            <th class="w-screen text-3xl">Service Name</th>
            <th class="w-screen text-3xl">Cost</th>
            <th class="w-screen text-3xl">Haircut Pic</th>
            <th class="w-screen text-3xl">Update</th>
            <th class="w-screen text-3xl">Delete</th>
        </tr>
  @forelse ($services as $service)
      <tr>
        <td class=" text-center text-3xl">
            {{ $service->service_id  }}
        </td>
          <td class=" text-center text-3xl">
                {{ $service->service_name }}
          </td>
          <td class=" text-center text-3xl">
            {{ $service->cost }}
          </td>
          <td class="pl-24">
            <img src="{{ asset('uploads/images3/'.$service->haircut_pic)}}" alt="I am A Pic" width="75" height="75">
          </td>
          <td class=" text-center">
            <a href="service/{{ $service->service_id }}/edit" class="text-center text-3xl bg-green-600 p-2">
                Update &rarr; 
               </a>
          </td>
          <td class=" text-center">
            <form action="/service/{{ $service->service_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-center text-3xl bg-red-600 p-2">
                    Delete &rarr;
                </button>
           </form>
          </td>
      </tr>
            @empty
                <p>No Service Data in the Database</p>
            @endforelse
        </table>
    </div>
</div>
@endsection