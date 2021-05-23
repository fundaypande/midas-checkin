<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MRoomType extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
