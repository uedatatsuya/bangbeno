<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("investigations", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->nullable()->unsigned();
            $table->string('name_plate', 100)->nullable();
            $table->string('electric_meter', 100)->nullable();
            $table->integer('is_high_voltage_power_reception')->nullable();
            $table->integer('is_power_contract')->nullable();
            $table->string('cost_reduction_1', 1)->nullable();
            $table->string('cost_reduction_picture_1', 100)->nullable();
            $table->string('cost_reduction_comment_1', 100)->nullable();
            $table->string('cost_reduction_2', 1)->nullable();
            $table->string('cost_reduction_picture_2', 100)->nullable();
            $table->string('cost_reduction_comment_2', 100)->nullable();
            $table->string('is_renewal_board', 1)->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [investigations]--
            // ----------------------------------------------------
            // $query = DB::table("investigations")
            // ->leftJoin("properties","properties.id", "=", "investigations.property_id")
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
        Schema::dropIfExists("investigations");
    }
}
