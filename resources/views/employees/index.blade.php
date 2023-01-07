@extends('layouts.master')
@section('content')
    <h3 class="register-heading">Employee List</h3>

    <div class="row register-form">
        @if (Session::has('Success'))
            <p class="alert alert-success">{{ Session::get('Success') }}</p>
        @endif
        @if (Session::has('Failed'))
            <p class="alert alert-danger">{{ Session::get('Failed') }}</p>
        @endif

        <div style="background: linear-gradient(to right, rgba(57, 49, 175, 1) 0, rgba(0, 198, 255, 1) 100%);">
            <div class=" table-responsive py-5">
                <table class="table table-bordered table-hover" style="background:white;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Profile picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Department</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $key => $employee)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>

                                    <img style="height: 30px; with:30px;"
                                        src="{{ asset('storage/app/public/profile_pictures/' . $employee->profile_picture) }}"
                                        alt="">
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>
                                    <a class="btn btn-primary shadow btn-xs sharp me-1"
                                        href="{{ route('employees.edit', $employee->id) }}"><i class="fa fa-edit"
                                            style="font-size:14px"></i></a>

                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['employees.destroy', $employee->id],
                                        'style' => 'display:inline',
                                    ]) !!}
                                    <button onclick="return confirm('Are you sure to delete Employee?')"
                                        class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @empty
                            <div>Data Not Found</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
