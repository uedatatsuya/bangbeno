<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgedRankInternalPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("aged_rank_internal_pictures", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('distribution_board_id')->nullable()->unsigned();
            $table->string('path', 100)->nullable();
            $table->string('comment', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();


            // ----------------------------------------------------
            // -- SELECT [aged_rank_internal_pictures]--
            // ----------------------------------------------------
            // $query = DB::table("aged_rank_internal_pictures")
            // ->leftJoin("distribution_boards","distribution_boards.id", "=", "aged_rank_internal_pictures.distribution_board_id")
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
        Schema::dropIfExists("aged_rank_internal_pictures");
    }
}
