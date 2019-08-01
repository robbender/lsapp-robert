@extends('layout')

@section('content')

    <a href="/posts" class="btn btn-primary">Back</a>
    <br>

    <h1>{{ $post->title }}</h1>
    <br>
    <p> {{ $post->body }}</p>
    <br>
    <small>Written on {{ $post->created_at }}</small>
 

    
@endsection

