@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <a class="btn btn-md btn-primary" href={{ route('employees.create') }}>Add Employee Account</a>
</div>
<div class="container mt-2">
  <div class="row">
    <div class="col-md">

      @if(session()->has('message'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{session('message')}} </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="card">
        <h5 class="card-header">List of Employees</h5>
        <div class="card-body">
          <table class="table table-hover ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              @foreach ($employees as $row)
              <tr>
                <th scope="row">100{{ $row->id }}</th>
                <td>{{ $row->first_name }}</td>
                <td>{{ $row->middle_name }}</td>
                <td>{{ $row->last_name }}</td>
                <td>
                  <a href="{{ route('employees.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                  <form action="{{ route('employees.destroy', $row->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr> @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection