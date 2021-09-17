<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('page_id')->nullable();
            $table->bigInteger('post_id')->nullable();
            $table->text('ad_format')->nullable();

            $table->text('landanig_page')->nullable();
            $table->text('post_link')->nullable();
            $table->text('post_create')->nullable();

            $table->text('last_seen')->nullable();
            $table->text('interested')->nullable();
            $table->text('gender')->nullable();


            $table->text('age')->nullable();
            $table->text('country')->nullable();
            $table->text('lang')->nullable();
       

            
            $table->text('country_see_in')->nullable();
            $table->text('t_lang')->nullable();
            $table->text('page_link')->nullable();
     
            $table->text('button')->nullable();
            $table->text('share')->nullable();
            $table->text('comment')->nullable();
            $table->text('like')->nullable();
            $table->text('page_name')->nullable();
            $table->text('Ad_Description')->nullable();
            $table->text('title')->nullable();

           
    
           

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
        Schema::dropIfExists('posts');
    }
}
