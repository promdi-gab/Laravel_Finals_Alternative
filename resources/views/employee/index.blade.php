@extends('home')

@section('contents')

<div class="py-3">
    <table class="table-auto">
        <tr class="text-white"> 
            <th class="w-screen text-3xl">Id</th>
            <th class="w-screen text-3xl">Full Name</th>
            <th class="w-screen text-3xl">Email</th>
            <th class="w-screen text-3xl">Employee Pic</th>
            <th class="w-screen text-3xl">Update</th>
            <th class="w-screen text-3xl">Delete</th>
        </tr>
  @forelse ($employees as $employee)
      <tr>
        <td class=" text-center text-3xl">
            {{ $employee->employee_id  }}
        </td>
          <td class=" text-center text-3xl">
                {{ $employee->full_name }}
          </td>
          <td class=" text-center text-3xl">
            {{ $employee->email }}
          </td>
          <td class="pl-24">
            <img src="{{ asset('uploads/images4/'.$employee->employee_pic)}}" alt="I am A Pic" width="75" height="75">
          </td>
          <td class=" text-center">
            <a href="employee/{{ $employee->employee_id }}/edit" class="text-center text-3xl bg-green-600 p-2">
                Update &rarr; 
               </a>
          </td>
          <td class=" text-center">
            <form action="/employee/{{ $employee->employee_id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-center text-3xl bg-red-600 p-2">
                    Delete &rarr;
                </button>
           </form>
          </td>
      </tr>
            @empty
                <p>No Employee Data in the Database</p>
            @endforelse
        </table>
    </div>
</div>
@endsection