@extends('layouts.master')
@section('content')
    <h3 class="register-heading">Add Employee</h3>
    <div class="row register-form">
        @if (Session::has('Success'))
            <p class="alert alert-success">{{ Session::get('Success') }}</p>
        @endif
        @if (Session::has('Failed'))
            <p class="alert alert-danger">{{ Session::get('Failed') }}</p>
        @endif
        {!! Form::open(['route' => 'employees.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Enter Name</label>
                {!! Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control']) !!}
                <div class="alert-danger">{{ $errors->first('name') }}</div>
            </div>
            <div class="form-group">
                <label for="">Enter Department</label>
                {!! Form::text('department', null, ['placeholder' => 'Enter Department', 'class' => 'form-control']) !!}
                <div class="alert-danger">{{ $errors->first('department') }}</div>
            </div>
            <div class="form-group">
                <label for="">Choose your gender</label>
                <br>

                {{ Form::radio('gender', 'M', true, ['class' => 'form-check-input']) }}
                <span> Male </span>

                {{ Form::radio('gender', 'F', null, ['class' => 'form-check-input']) }}

                <span>Female </span>

                {{ Form::radio('gender', 'O', null, ['class' => 'form-check-input']) }}

                <span>Other </span>
                <div class="alert-danger">{{ $errors->first('gender') }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Enter Email</label>
                {!! Form::email('email', null, ['placeholder' => 'Enter Email', 'class' => 'form-control']) !!}
                <div class="alert-danger">{{ $errors->first('email') }}</div>
            </div>
            <div class="form-group">
                <label for="">Enter Phone number</label>
                {!! Form::number('phone', null, ['placeholder' => 'Enter Phone Number', 'class' => 'form-control']) !!}
                <div class="alert-danger">{{ $errors->first('phone') }}</div>
            </div>
            <div class="form-group">
                <label for="">Choose your Profile picture</label>
                {!! Form::file('profile_picture', ['class' => 'form-control']) !!}
                <div class="alert-danger">{{ $errors->first('profile_picture') }}</div>
            </div>
            <input type="submit" class="btnRegister" value="Submit" />
        </div>
        {!! Form::close() !!}
    @endsection
