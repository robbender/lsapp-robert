<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // $posts = Post::orderBy('title', 'desc')->get();
        // $posts = DB::select('SELECT * FROM posts');
        // return view ('posts.index')->with('posts', $posts);

        // return $posts;

        $posts = Post::orderBy('title', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('create');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {
            $this->validate($request, [
                'title' => 'required',
                'body'  => 'required',
                'image' => 'image|nullable|max:1999|mimes:jpg,png',
            ]);

            // return request()->all();
                Log::debug('testing');
            // Handle File Upload
            if($request->hasFile('image')) {
                Log::debug('request hasFile');
                //Get filename with the extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo(filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                //Create filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload the image
                Log::debug('fileNameToStore='. $fileNameToStore);
                $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
                Log::debug('path='.$path);
            } else {
                Log::debug('request doesNot have a image');
                $fileNameToStore = 'noimage.jpg';
            }

        //     //Create Post
            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->image = $fileNameToStore;
            $post->save();

            return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts/edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
        ]);

        // Handle File Upload
        if($request->hasFile('image')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo(filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Create filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // return request()->all();

    //     //Create Post
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // $post->image = $fileNameToStore;

        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if($post->image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/images/'.$post->image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
