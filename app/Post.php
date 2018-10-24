<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'title', 'user_id', 'content','thumbnail'
  ];

  public function post_imgs() {
    return $this->hasMany('App\Post_img');
  }
  
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function post_tags() {
    return $this->hasMany('App\Post_tag');
  }
}
