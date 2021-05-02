<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('ad_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('admin_id')->nullable();
            $table->text('ad_link');
            $table->string('ad_content','1000')->nullable();
            $table->string('category_id');
            $table->integer('ad_clicks');
            $table->string('ad_price');
            $table->string('total_price');
            $table->string('ad_status')->default('active');
            $table->string('ad_duration');
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
        Schema::dropIfExists('ads');
    }
}
