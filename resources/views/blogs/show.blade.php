@extends('layouts.app')
@section('content')

<div class="card">
<img src="{{ asset('storage/'.$post->image) }}">

<div class="card-body">
<h1>

{{ $post->title }}

</h1>

{!! $post->content !!}

</div>
</div>
@endsection