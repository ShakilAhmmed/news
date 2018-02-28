<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubCatagory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_catagory', function (Blueprint $table) {
            $table->increments('sub_catagory_id');
            $table->string('catagory_name');
            $table->string('sub_catagory_name');
            $table->string('sub_catagory_title');
            $table->text('sub_catagory_description');
            $table->string('sub_catagory_status');
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
        Schema::dropIfExists('sub_catagory');
    }
}
