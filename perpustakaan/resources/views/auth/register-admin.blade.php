@extends('layouts.app')

@section('content')

<h2>Register Admin</h2>

<form method="POST" action="/register-admin">

    @csrf

    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button class="btn btn-success">
        Register
    </button>

</form>

@endsection