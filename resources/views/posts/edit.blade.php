@extends('layout')

@section('content')

    <br>
    <h1>Edit Post</h1>
    <br>
    <br>
    <form method="POST" action="/posts/{{ $post->id }}">
        @method('PATCH')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Title</label>
              <input type="text" name="title" class="form-control" id="" placeholder="Title" value="{{ $post->title }}">
          </div>
        </div>
        <div class="form-group">
            <label for="">Body</label>
            <textarea class="form-control rounded-0" name="body" id="" rows="10">{{ $post->body }}</textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <form method="POST" action="/posts/{{ $post->id }}">
        @method('DELETE')
        @csrf

         <div class="field">

             <div class="control">
                 <button type="submit" class="button is-danger is-large">Delete</button>

             </div>
         </div>
     </form>



@endsection
