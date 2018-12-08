<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function write(Request $request) {
      $validator = $request->validate([
        'post_id' => 'required|integer',
        'user_id' => 'required|integer',
        'text' => 'required|string',
        'reply_to' => 'integer|nullable',
        'level' => 'integer|max:3|nullable',
        'has_replies' => 'boolean|nullable',
        'deleted' => 'boolean|nullable',
      ]);

      Comment::create($validator);
      return $validator;
    }

    public function listComments(Request $request) {
      $validator = $request->validate([
        'post_id' => 'required|integer',
        'reply_to' => 'integer|nullable',
      ]);
      
      if(isset($validator['reply_to'])){
        $commentList = Comment::with('user:id,thumbnail')
          ->where([
            'post_id' => $validator['post_id'],
            'reply_to' => $validator['reply_to']
           ])
           ->orderBy('updated_at')
           ->get();
      }else {
        $commentList = Comment::with('user:id,thumbnail')
          ->where([
            'post_id' => $validator['post_id'],
            'level' => 0,
          ])
          ->orderBy('updated_at')
          ->get();
      }
      return $commentList;
    }
}
