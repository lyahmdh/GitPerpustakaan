@extends('layouts.app')

@section('content')

<h2>Login Admin</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="/login-admin">

    @csrf

    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button class="btn btn-primary">
        Login
    </button>

</form>

@endsection