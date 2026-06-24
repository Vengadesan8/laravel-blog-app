@php
use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('content')

<div class="hero">

    <h1>Blog</h1>

    <p>Latest Articles and Tutorials</p>
    <p>
    {{ $count }} Articles Available
</p>


</div>

<div class="row">
@foreach($posts as $post)

<div class="col-md-4">
        
        <a href="{{url('blog/'.$post->id)}}"
            class="text-decoration-none text-dark">
             <div class="card mb-4 shadow-sm h-100" >

        <img src="{{ asset('storage/'.$post->image) }}"
             height="220"
             class="card-img-top">

        <div class="card-body">

            <h3>{{ $post->title }}</h3>
            <p>
            {{ Str::limit(strip_tags($post->content),80) }}
            </p>
            {{-- <a href="/blog/{{ $post->id }}"
               class="btn btn-primary">
                Read More --}}
            </a>

        </div>

    </div>

</div>

@endforeach

</div>

{{ $posts->appends(request()->query())->links() }}

@endsection