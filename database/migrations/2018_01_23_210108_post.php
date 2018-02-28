<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('catagory_name');
            $table->string('sub_catagory_name');
            $table->string('post_title');
            $table->text('post_description');
            $table->string('post_image');
            $table->string('post_creator');
            $table->string('post_status');
            $table->integer('post_count');
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
        Schema::dropIfExists('post');
    }
}
