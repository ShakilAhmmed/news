<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advertise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise', function (Blueprint $table) {
            $table->increments('advertise_id');
            $table->string('advertise_title');
            $table->text('avdertise_description')->nullable()->default(null);;
            $table->string('advertise_image')->nullable()->default(null);;
            $table->string('advertise_creator');
            $table->string('advertise_status');
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
        Schema::dropIfExists('advertise');
    }
}
