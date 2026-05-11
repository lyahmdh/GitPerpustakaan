@extends('layouts.app')

@section('content')

<h1>Dashboard Perpustakaan</h1>

@if(session()->has('user'))

    <div class="alert alert-primary">
        Login sebagai User
    </div>

@endif


@if(session()->has('admin'))

    <div class="alert alert-success">
        Login sebagai Admin
    </div>

@endif

<a href="/logout" class="btn btn-danger">
    Logout
</a>

@endsection