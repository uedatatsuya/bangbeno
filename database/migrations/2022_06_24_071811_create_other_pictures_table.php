<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("other_pictures", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_board_id')->nullable()->unsigned();
            $table->integer('path')->nullable();
            $table->string('memo', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [other_pictures]--
            // ----------------------------------------------------
            // $query = DB::table("other_pictures")
            // ->leftJoin("distribution_boards","distribution_boards.id", "=", "other_pictures.distribution_board_id")
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
        Schema::dropIfExists("other_pictures");
    }
}
