<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Post_tag;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $posts = Post::with('user:id,thumbnail,name')->orderBy('hit', 'desc')->get();
      return view('home', [
        'sorting'=>'trending',
        'posts'=>$posts
      ]);
    }
    public function recentIndex(Request $request)
    {
      $posts = Post::with('user:id,thumbnail,name')->orderBy('updated_at', 'desc')->get();
      return view('home', [
        'sorting'=>'recent',
        'posts'=>$posts
      ]);
    }
    public function tagsIndex(Request $request)
    {
      $tags = Post_tag::with('tag:id,name')->select(DB::raw("tag_id,count(*) as num"))->orderBy('num','desc')->groupBy("tag_id")->get();  
      return view('home', [
        'sorting'=>'tags',
        'tags'=>$tags
      ]);
    }
    public function tagsShow($tag)
    {
      $tag_id = Tag::where('name', $tag)->first()['id']; 
      $posts = Post_tag::with('post')->where('tag_id', $tag_id)->get();
      return view('home', [
        'sorting'=>'tagSearch',
        'posts'=>$posts,
        'tag'=>$tag
      ]);
    }
}
