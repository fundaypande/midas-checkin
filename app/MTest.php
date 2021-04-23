<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MTest extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
