<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoRequest extends Model
{
    protected $table = 'video_request';  

    protected $fillable = [
        'request_id',
        'request_idol_id',
        'request_lang',
        'request_video_price',
        'request_vocation',
        'request_video',
        'request_payment_method',
    ];
}
