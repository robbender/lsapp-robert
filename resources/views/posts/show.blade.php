@extends('layout')

@section('content')

    <a href="/posts" class="btn btn-primary">Back</a>
    <br>

    <h1>{{ $post->title }}</h1>
    <br>
    <div>
         {{ $post->body }}
    </div>
    <br>
    <small>Written on {{ $post->created_at }}</small>

    <hr>
 
    <a href="/post/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

    
@endsection

