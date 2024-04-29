@extends('layouts.app')

@section('content')
<div class="container h-100 mt-5">
        <div class="card">
            <div class="card-header">
                Create Employee Account
            </div>
            <div class="card-body"> 
                <form action="{{ route('employees.update', $employee->id) }}" method="post">
                    @csrf
        @method('PUT')
                    <div class="form-group">
                        <label for="title">First Name</label>
                        <input type="text" class="form-control" id="title" name="first_name" value="{{ $employee->first_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Middle Name</label>
                        <input type="text" class="form-control" id="title" name="middle_name" value="{{ $employee->middle_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Last Name</label>
                        <input type="text" class="form-control" id="title" name="last_name" value="{{ $employee->last_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Email</label>
                        <input type="email" class="form-control" id="title" name="email" value="{{ $employee->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Password</label>
                        <input type="password" class="form-control" id="title" name="password" value="{{ $employee->password }}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Account</button>
                </form>
            </div>
        </div>
</div>
@endsection