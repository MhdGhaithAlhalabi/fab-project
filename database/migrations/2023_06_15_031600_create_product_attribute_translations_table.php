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
        Schema::create('product_attribute_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('attribute_id');
            $table->string('locale')->index();  // ar en tr
            $table->json('values');
            $table->unique(['product_id','attribute_id'], 'locale');
            $table->foreign('product_id')->references('product_id')->on('products_attributes')->onDelete('cascade');
            $table->foreign('attribute_id')->references('attribute_id')->on('products_attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_translations');
    }
};
