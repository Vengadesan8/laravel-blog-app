@if(session('success'))

<div class="container mt-3">

<div class="alert alert-success">

{{ session('success') }}

</div>

</div>

@endif

@extends('layouts.app')

@section('content')

<div class="card p-4">

<form method="POST"

action="/update/{{ $post->id }}"

enctype="multipart/form-data">

@csrf

@method('PUT')

<input type="text"

name="title"

value="{{ $post->title }}"

class="form-control mb-3">

<img src="{{ asset('storage/'.$post->image) }}"

width="150">

<input type="file"

name="image"

class="form-control mb-3">

<textarea

name="content"

id="editor"

class="form-control">

{!! $post->content !!}

</textarea>


<button class="btn btn-primary mt-3">

Update

</button>

</form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js">

</script>

<script>

ClassicEditor

.create(

document.querySelector('#editor')

);

</script>

@endsection