<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category')->comment("카테고리");
            $table->string('shop_name')->comment("가게이름");
            $table->string('shop_image_title')->nullable()->comment("가게이미지");
            $table->string('shop_latitude')->comment("위도");
            $table->string('shop_longitude')->comment("경도");
            $table->double('point', 8, 2)->nullable()->comment("가게평점");
            $table->integer('reviewcnt')->nullable()->comment("리뷰갯수");
            $table->double('distance', 30, 18)->nullable()->comment("거리");
            $table->string('shop_addr_short')->nullable()->comment("가게주소");
            $table->string('shop_machine')->nullable()->comment("기계");
            $table->string('shop_machine_num')->nullable()->comment("기계수");
            $table->string('shop_time')->comment("운영시간");
            $table->string('shop_type')->comment("가게타입");
            $table->string('price')->comment("가격");
            $table->string('original_price')->nullable()->comment("원래가격");
            $table->boolean('has_coupon')->comment("쿠폰");
            $table->string('slug')->comment("가게이름 & 주소");
            $table->boolean('certification')->comment("자격");
            $table->boolean('option_moving');
            $table->boolean('option_floor');
            $table->boolean('option_dawn');
            $table->boolean('option_locker');
            $table->boolean('option_park');
            $table->boolean('option_lesson');
            $table->boolean('option_group');
            $table->boolean('option_left');
            $table->boolean('option_sand');
            $table->boolean('option_putt');
            $table->boolean('option_cloth');
            $table->boolean('option_outside');
            $table->boolean('option_rent');
            $table->boolean('immediate_bookable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
