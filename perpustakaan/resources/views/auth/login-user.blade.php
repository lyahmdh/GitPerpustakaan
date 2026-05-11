@extends('layouts.app')

@section('content')

<h2>Login User</h2>

<form method="POST" action="/login-user">
    @csrf

    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <button class="btn btn-primary">
        Login
    </button>
</form>

@endsection