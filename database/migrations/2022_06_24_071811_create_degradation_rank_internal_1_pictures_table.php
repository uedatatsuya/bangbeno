<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegradationRankInternal1PicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("degradation_rank_internal_1_pictures", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_board_id')->nullable()->unsigned();
            $table->string('path', 100)->nullable();
            $table->integer('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [degradation_rank_internal_1_pictures]--
            // ----------------------------------------------------
            // $query = DB::table("degradation_rank_internal_1_pictures")
            // ->leftJoin("distribution_boards","distribution_boards.id", "=", "degradation_rank_internal_1_pictures.distribution_board_id")
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
        Schema::dropIfExists("degradation_rank_internal_1_pictures");
    }
}
