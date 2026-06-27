@extends('layouts.app')

@section('content')

<div class="hero">
<h1>
Blog
</h1>
<p>
Latest Articles and Tutorials
</p>

<p>

{{ $count }} Articles Available

</p>

</div>

<div class="row"

id="posts">

@include('blogs.posts')

</div>

@endsection