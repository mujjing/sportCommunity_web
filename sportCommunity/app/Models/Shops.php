<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'category',
        'shop_name',
        'shop_image_title',
        'shop_latitude',
        'shop_longitude',
        'point',
        'reviewcnt',
        'distance',
        'shop_addr_short',
        'shop_machine',
        'shop_machine_num',
        'shop_time',
        'shop_type',
        'price',
        'original_price',
        'has_coupon',
        'slug',
        'certification',
        'option_moving',
        'option_floor',
        'option_dawn',
        'option_locker',
        'option_park',
        'option_lesson',
        'option_group',
        'option_left',
        'option_sand',
        'option_putt',
        'option_cloth',
        'option_outside',
        'option_rent',
        'immediate_bookable'
    ];
}
