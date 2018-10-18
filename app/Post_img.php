<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_img extends Model
{
  protected $fillable = [
    'post_id', 'path'
  ];
  
}
