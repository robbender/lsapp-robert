@extends('layout')

@section('content')

    <br>
    <h1>Create Post</h1>
    <br>
    <br>
    <form method="POST" action="/posts">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" id="" placeholder="Title">
          </div>
        </div>
        <div class="form-group">
            <label for="">Body</label>
            <textarea class="form-control rounded-0" name="body" id="article-ckeditor" rows="10" placeholder="Body Text"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


    
@endsection