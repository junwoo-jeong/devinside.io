<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'post_id',
    'user_id',
    'text',
    'reply_to',
    'level',
    'has_replies',
    'deleted',
  ];
  public function post() {
    return $this->belongsTo('App\Post');
  }
  public function user() {
    return $this->belongsTo('App\User');
  }
}
