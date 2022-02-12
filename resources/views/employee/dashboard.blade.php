@extends('home')

@section('contents')

<h1 class="text-center text-5xl pb-8">Welcome To ACME Pet Clinic, {{ $data->full_name }}</h1>
<hr>
<div class="py-3">
    <table class="table-auto">
        <tr class="text-white"> 
            <th class="w-screen text-3xl">Id</th>
            <th class="w-screen text-3xl">Full Name</th>
            <th class="w-screen text-3xl">Email</th>
            <th class="w-screen text-3xl">Action</th>
        </tr>

      <tr>
        <td class=" text-center text-3xl">
            {{ $data->employee_id }}
        </td>
        <td class=" text-center text-3xl">
            {{ $data->full_name }}
        </td>
          <td class=" text-center text-3xl">
                {{ $data->email }}
          </td>
          <td class=" text-center text-3xl ">
            <a href="logout" class="bg-red-600 py-2 px-6">Logout &rarr;</a>
          </td>
      </tr>
        </table>
    </div>
</div>
<hr>
@endsection     	