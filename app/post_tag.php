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
  public function tag() {
    return $this->belongsTo('App\tag');
  }
  public function post() {
    return $this->belongsTo('App\Post');
  }
}
