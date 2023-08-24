@extends('layout.employee-sidenav-layout')
@section('content')
@include('components.employee.summary')
@include('components.employee.employee-list')
@include('components.employee.leave-create')
@endsection
