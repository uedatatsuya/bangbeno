<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("component_pictures", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_board_id')->nullable()->unsigned();
            $table->string('path', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [component_pictures]--
            // ----------------------------------------------------
            // $query = DB::table("component_pictures")
            // ->leftJoin("distribution_boards","distribution_boards.id", "=", "component_pictures.distribution_board_id")
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
        Schema::dropIfExists("component_pictures");
    }
}
