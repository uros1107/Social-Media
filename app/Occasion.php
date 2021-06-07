<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $fillable = [
        'occasion_id',
        'occasion_name'
    ];
}
