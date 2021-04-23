<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'page_id';
    protected $guarded = [];

    protected $casts = [
      "page_id" => 'string'
    ];
}
