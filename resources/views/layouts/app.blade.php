<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Blog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="{{ asset('css/style.css') }}">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand fw-bold fs-2"
href="{{ url('/') }}">
Blog
</a>


<form method="GET"
action="{{ url('/') }}"
class="d-flex ms-auto me-3">

<input type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search Blog"
class="form-control me-2">

<button class="btn btn-primary">
Search
</button>

</form>

<div>
@auth

@if(auth()->user()->is_admin)

<a href="{{ route('dashboard') }}"
class="btn btn-success">

Dashboard

</a>

@endif


<form action="{{ route('logout') }}"
method="POST"
class="d-inline">

@csrf

<button class="btn btn-danger">

Logout

</button>

</form>

@endauth

@guest

<a href="{{ route('login') }}"
class="btn btn-primary">

Login

</a>

<a href="{{ route('register') }}"
class="btn btn-warning">

Register

</a>

@endguest

</div>

</div>

</nav>

@if(session('success'))

<div class="container mt-3">

<div class="alert alert-success">

{{ session('success') }}

</div>

</div>

@endif

<div class="container mt-4">

@yield('content')

</div>

<div class="footer">

<p>

Copyright © 2026

Laravel Blog

</p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>