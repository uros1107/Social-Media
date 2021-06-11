<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $primaryKey = 'review_id';

    protected $fillable = [
        'review_id',
        'review_idol_id',
        'review_fans_id',
        'review_rating',
        'review_feedback'
    ];
}
