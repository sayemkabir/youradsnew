<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('user_image')->nullable();
            $table->string('user_name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('balance')->default('0');
            $table->string('deposit_balance')->default('0');
            $table->string('wallet_address')->nullable();
            $table->string('user_status')->default('Active');
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
        Schema::dropIfExists('users');
    }
}
