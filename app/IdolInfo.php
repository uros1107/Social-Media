<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdolInfo extends Model
{
    protected $table = 'idol_info';  
    protected $primaryKey = 'idol_id';

    protected $fillable = [
        'idol_id',
        'idol_user_id',
        'idol_full_name',
        'idol_user_name',
        'idol_k_name',
        'idol_email',
        'idol_phone',
        'idol_bio',
        'idol_head_bio',
        'idol_photo',
        'idol_banner',
        'idol_fans',
        'idol_rating',
        'idol_cat_id',
        'idol_paypal_id',
        'idol_status',
        'idol_del_flag',
        'idol_wallet'
    ];
}
