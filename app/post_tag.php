<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_tag extends Model
{
  public function tags() {
    return $this->hasMany('App\tag');
  }
  public function posts() {
    return $this->hasMany('App\Post');
  }
}
