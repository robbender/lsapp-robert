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
          <br>

        <div class="field">
            {{-- <label class="label is-large" type="text" name="image"></label> --}}
            <input type="file" class="btn btn-info {{ $errors->has('image') ? 'is-danger' : '' }}" id="" name="image" accept="image/png, image/jpeg" enctype="multipart/form-data" placeholder="Image" required>
        </div>
        <br>

        <button type="submit" class="btn btn-primary btn-sm"">Submit</button>
      </form>
      <br>
      <form method="POST" action="/posts/{{ $post->id }}">
        @method('DELETE')
        @csrf

         <div class="field">

             <div class="control">
                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>

             </div>
         </div>
     </form>



@endsection
