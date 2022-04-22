@extends('SuperAdmin.master')
@section('title')
Admins List
@endsection

@section('section')
<div style="color: black" class="float-left" >
    <a href="{{ URL::to('/adminSignup') }}" class="float-left"><i class="fas fa fa-plus fa-x"></i>Add Admin</a>
    </div>@endsection
