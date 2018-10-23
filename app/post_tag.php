<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_tag extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'post_id',
    'tag_id'
  ];
  public function tags() {
    return $this->hasMany('App\tag');
  }
  public function posts() {
    return $this->hasMany('App\Post');
  }
}
