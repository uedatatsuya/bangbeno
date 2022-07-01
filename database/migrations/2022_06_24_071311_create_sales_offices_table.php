<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("sales_offices", function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();



            // ----------------------------------------------------
            // -- SELECT [sales_offices]--
            // ----------------------------------------------------
            // $query = DB::table("sales_offices")
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
        Schema::dropIfExists("sales_offices");
    }
}
