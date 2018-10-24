<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name'
  ];
  public $timestamps = false;
  public function post_tags() {
    return $this->hasMany('App\Post_tag');
  }
}
