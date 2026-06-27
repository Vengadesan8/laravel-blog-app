@extends('layouts.app')

@section('content')

<div class="card bg-secondary text-white shadow-sm mb-4">
    <div class="card-body">
        <h2>

Admin Dashboard

</h2>

        <h4 class="mb-0">
             Total Blogs : {{ $count }}
        </h4>

    </div>
</div>

<a href="/create"

class="btn btn-primary mb-3">

Add Blog

</a>

<table class="table table-bordered">

<tr>

<th>ID</th>

<th>Title</th>

<th>Image</th>
<th>Content</th>

<th>Action</th>

</tr>

@foreach($posts as $post)

<tr>

<td>

{{ $post->id }}

</td>

<td>

{{ $post->title }}

</td>
<td>

<img src="{{ asset('storage/'.$post->image) }}"

width="100">

</td>

<td>
{{ Str::limit(strip_tags($post->content),100)}}

<td>
<div class="d-flex gap-2">
<a href="/edit/{{ $post->id }}"

class="btn btn-warning btn-sm">

Edit

</a>

<form method="POST"

action="/delete/{{ $post->id }}"

class="d-inline">

@csrf

@method('DELETE')

<button class="btn btn-danger btn-sm">

Delete

</button>

</form>
</td>
</tr>
@endforeach

</table>

{{ $posts->links() }}   

@endsection