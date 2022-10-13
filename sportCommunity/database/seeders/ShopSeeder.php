<?php

namespace Database\Seeders;

use App\Models\Shops;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/json/golfSample.json');
        $shops = json_decode($json, true);

        foreach ($shops as $shop) {
            Shops::query()->updateOrCreate([
                'category' => $shop['category'],
                'shop_name' => $shop['shop_name'],
                'shop_image_title' => $shop['shop_image_title'],
                'shop_latitude' => $shop['shop_latitude'],
                'shop_longitude' => $shop['shop_longitude'],
                'point' => $shop['point'],
                'reviewcnt' => $shop['reviewcnt'],
                'distance' => $shop['distance'],
                'shop_addr_short' => $shop['shop_addr_short'],
                'shop_machine' => $shop['shop_machine'],
                'shop_machine_num' => $shop['shop_machine_num'],
                'shop_time' => $shop['shop_time'],
                'shop_type' => $shop['shop_type'],
                'price' => $shop['price'],
                'original_price' => $shop['original_price'],
                'has_coupon' => $shop['has_coupon'],
                'slug' => $shop['slug'],
                'certification' => $shop['certification'],
                'option_moving' => $shop['option_moving'],
                'option_floor' => $shop['option_floor'],
                'option_dawn' => $shop['option_dawn'],
                'option_locker' => $shop['option_locker'],
                'option_park' => $shop['option_park'],
                'option_lesson' => $shop['option_lesson'],
                'option_group' => $shop['option_group'],
                'option_left' => $shop['option_left'],
                'option_sand' => $shop['option_sand'],
                'option_putt' => $shop['option_putt'],
                'option_cloth' => $shop['option_cloth'],
                'option_outside' => $shop['option_outside'],
                'option_rent' => $shop['option_rent'],
                'immediate_bookable' => $shop['immediate_bookable']
            ]);
        }
    }
}
