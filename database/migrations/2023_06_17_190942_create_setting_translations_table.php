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
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id');
            $table->string('locale')->index();  // ar en tr
            //title
            $table->string('title_first_left')->nullable();
            $table->string('title_first_right')->nullable();
            $table->string('title_first_right2')->nullable();
            $table->string('title_second_left')->nullable();
            $table->string('title_second_right')->nullable();
            $table->string('title_third')->nullable();
            //up title
            $table->string('uptitle_first_left')->nullable();
            $table->string('uptitle_first_right')->nullable();
            //down title
            $table->string('downtitle_first_left')->nullable();
            $table->string('downtitle_first_right2')->nullable();
            $table->string('downtitle_second_left')->nullable();
            $table->string('downtitle_second_right')->nullable();
            $table->string('downtitle_third')->nullable();

            $table->unique(['setting_id','locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
};
