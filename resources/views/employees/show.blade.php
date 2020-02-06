@extends('templates.master')

@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> LARAVEL 6.0 ADVANCE CRUD APPLICATION WITH IMAGE UPLOAD</span></h2>

</div>

<div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Employee profile <span class="fa fa"> {{ $employee->fullname }}  </span></legend>



<div class="jumbotron text-center">
 <div align="center">
 <img src="{{ URL::to('/') }}/images/{{ $employee->image }}" class="rounded-circle" width='100' height="100" />
<div align="center">
<h3><span >First Name :</span> {{ $employee->fullname }}</h3>
<h3>Gender     : {{ $employee->gender }}  </h3>
<h3>Email      : {{ $employee->email }}</h3>
<h3>Department      : {{ $employee->department }}</h3>
</div>
<a href="{{ route('employees.index') }}" class="btn bg-dark" style="color:white">Cancel</a>

</div>
@endsection