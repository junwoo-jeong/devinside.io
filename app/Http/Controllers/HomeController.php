<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
      $sorting = $request->input('sorting') ?? 'tranding';
      
      if($sorting == 'tranding') {
        $posts = Post::with('user:id,thumbnail,name')->orderBy('hit', 'desc')->get();
      }else if($sorting == 'recent') {
        $posts = Post::with('user:id,thumbnail,name')->orderBy('updated_at', 'desc')->get();
      }
      
      return view('home', [
        'sorting'=>$sorting,
        'posts'=>$posts
      ]);
    }
}
