<!DOCTYPE html>
<html>

<head>

    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="/dashboard">
            Perpustakaan
        </a>

        <div>

            <a href="/login-user" class="btn btn-outline-light btn-sm">
                Login User
            </a>

            <a href="/login-admin" class="btn btn-outline-light btn-sm">
                Login Admin
            </a>

            <a href="/register-admin" class="btn btn-warning btn-sm">
                Register Admin
            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    @yield('content')

</div>

</body>
</html>