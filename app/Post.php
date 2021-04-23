<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $guarded = [];

    protected $casts = [
      "post_id" => 'string'
    ];
}
