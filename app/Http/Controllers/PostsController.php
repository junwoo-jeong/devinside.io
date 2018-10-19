<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

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
      $title = $request->input('title');
      $content = $request->input('content');

      Post::create([
        'title'=>$title,
        'user_id'=>Auth::id(),
        'content'=>$content,
        'thumbnail'=>''
      ]);

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
