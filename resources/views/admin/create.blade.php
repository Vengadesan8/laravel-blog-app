@if($errors->any())

<div class="alert alert-danger">

<ul>

@foreach($errors->all() as $error)

<li>
{{ $error }}

</li>
@endforeach
</ul>


</div>
@endif

@extends('layouts.app')

@section('content')

<div class="card p-4">

<h2>
Create Blog
</h2>

<form method="POST" action="/store" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label>
Title
</label>
<input type="text"
name="title"
class="form-control">
</div>

<div class="mb-3">
<label>
Image
</label>

<input type="file" name="image" class="form-control">

</div>

<div class="mb-3">
<label>
Content

</label>

<textarea name="content" id="editor" class="form-control">

</textarea>

</div>

<button class="btn btn-success">

Publish

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