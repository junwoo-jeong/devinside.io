<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;
use App\Post_tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if(!Auth::check()) {
        return redirect('/');
      }
      $edit_id = $request->input('edit_id', '');
      $post = Post::where(['id'=> $edit_id])->first();
      if($edit_id && $post) {
        return view('write', [
          'post'=> $post,
          'method'=> 'PUT' 
        ]);
      }
      return view('write', [
        'method'=> 'POST'
      ]);
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
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $title = $request->input('title');
      $content = $request->input('content');
      $tags = $request->input('tags');

      $file = $request->file('thumbnail');

      Storage::disk('s3')->put('', fopen($file, 'r+'), 'public');

      $tags = explode(',', $tags);

      $post = Post::create([
        'title'=>$title,
        'user_id'=>Auth::id(),
        'content'=>$content,
        'thumbnail'=>$file->getClientOriginalExtension()
      ]);
      
      $tags = array_map(function($tag) {
        return Tag::firstOrCreate([
          'name'=>$tag
        ]);
      }, $tags);

      foreach ($tags as $tag) {
        Post_tag::create([
          'post_id'=>$post->id,
          'tag_id'=>$tag->id
        ]);
      }

      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::with('user:id,name,thumbnail')->where(['id'=>$id])->first();

      return view('posts', [
        'post'=> $post
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
      $title = $request->input('title');
      $content = $request->input('content');

      Post::where(['id'=>$id])
        ->update([
          'title'=>$title,
          'content'=>$content,
          'thumbnail'=>''
        ]);
      return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
