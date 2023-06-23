<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->float('downprice_first_left')->nullable();
            $table->float('downprice_first_right')->nullable();
            $table->float('downprice_third')->nullable();
            $table->string('image_first_left')->nullable();
            $table->string('image_first_right')->nullable();
            $table->string('image_second_left')->nullable();
            $table->string('image_second_right')->nullable();
            $table->string('image_third')->nullable();
            $table->string('logo_w')->nullable();
            $table->string('logo_b')->nullable();
            $table->string('favicon')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
