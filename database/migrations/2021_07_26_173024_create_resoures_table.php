<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResouresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resoures', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->mediumText('video')->nullable();
            $table->mediumText('image')->nullable();
            $table->mediumText('page_logo')->nullable();
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');
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
        Schema::dropIfExists('resoures');
    }
}
