<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasuringPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("measuring_pictures", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_board_id')->nullable()->unsigned();
            $table->string('path', 100)->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [measuring_pictures]--
            // ----------------------------------------------------
            // $query = DB::table("measuring_pictures")
            // ->leftJoin("distribution_boards","distribution_boards.id", "=", "measuring_pictures.distribution_board_id")
            // ->get();
            // dd($query); //For checking



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("measuring_pictures");
    }
}
