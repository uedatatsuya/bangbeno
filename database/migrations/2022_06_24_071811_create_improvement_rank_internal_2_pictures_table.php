<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImprovementRankInternal2PicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("improvement_rank_internal_2_pictures", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_board_id')->nullable()->unsigned();
            $table->integer('number')->nullable();
            $table->string('path', 100)->nullable();
            $table->string('comment', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [improvement_rank_internal_2_pictures]--
            // ----------------------------------------------------
            // $query = DB::table("improvement_rank_internal_2_pictures")
            // ->leftJoin("distribution_boards","distribution_boards.id", "=", "improvement_rank_internal_2_pictures.distribution_board_id")
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
        Schema::dropIfExists("improvement_rank_internal_2_pictures");
    }
}
