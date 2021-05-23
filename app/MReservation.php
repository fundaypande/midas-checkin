<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MReservation extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
