<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $primaryKey = 'order_id';

    protected $fillable = [
        'order_id',
        'order_idol_id',
        'order_fans_id',
        'order_who_for',
        'order_to',
        'order_occasion',
        'order_lang',
        'order_introduction',
        'order_payment_method',
        'order_price',
        'order_total_price',
        'order_fee',
        'order_status',
        'order_video',
    ];
}
