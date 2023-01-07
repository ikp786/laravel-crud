<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Styles -->
    <style>
        .register {
            background: linear-gradient(to right, rgba(57, 49, 175, 1) 0, rgba(0, 198, 255, 1) 100%);
            margin-top: 3%;
            padding: 3%;
            overflow: hidden;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        @media (max-width: 991px) {
            .register .register-form {
                margin-top: 16%;
            }
        }

        @media (max-width: 667px) {
            .register .register-form {
                margin-top: 20%;
            }
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        @media (max-width: 991px) {
            .register .nav-tabs {
                width: 33%;
                margin-top: 8%;
            }
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            animation: mover 1s infinite alternate;
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .fade {
            opacity: 1 !important;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }

        @media (max-width: 991px) {
            .register-heading {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="user-ragistration">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                </div>
                <div class="col-md-9 register-right">
                    <h3 class="register-heading">Add Employee</h3>
                    <div class="row register-form">
                        @if(Session::has('Success'))
                        <p class="alert alert-success">{{ Session::get('Success') }}</p>
                        @endif
                        @if(Session::has('Failed'))
                        <p class="alert alert-danger">{{ Session::get('Failed') }}</p>
                        @endif
                                                {!! Form::model($employee, ['method' => 'PATCH','route' => ['employees.update', $employee->id]]) !!}


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Name</label>
                                {!! Form::text('name', $employee->name, ['placeholder' => 'Enter Name', 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{  $errors->first('name')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Department</label>
                                {!! Form::text('department', $employee->department, ['placeholder' => 'Enter Department', 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{  $errors->first('department')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Choose your gender</label>
                                <br>
@php
    $m = $employee->gender == 'M' ? true: false;
    $f = $employee->gender == 'F' ? true: false;
    $o = $employee->gender == 'F' ? true: false;
@endphp
                                {{ Form::radio('gender', 'M', $m, ['class'=>'form-check-input']) }}
                                <span> Male </span>

                                {{ Form::radio('gender', 'F', $f, ['class'=>'form-check-input']) }}

                                <span>Female </span>

                                {{ Form::radio('gender', 'O', $o, ['class'=>'form-check-input']) }}

                                <span>Other </span>
                                <div class="alert-danger">{{  $errors->first('gender')}}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                {!! Form::email('email', $employee->email, ['placeholder' => 'Enter Email', 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{  $errors->first('email')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Phone number</label>
                                {!! Form::number('phone', $employee->phone, ['placeholder' => 'Enter Phone Number', 'class' => 'form-control']) !!}
                                <div class="alert-danger">{{  $errors->first('phone')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Choose your Profile picture</label>
                                {!! Form::file('profile_picture', ['class' => 'form-control']) !!}
                                <div class="alert-danger">{{  $errors->first('profile_picture')}}</div>
                            </div>
                            <input type="submit" class="btnRegister" value="Submit" />
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
