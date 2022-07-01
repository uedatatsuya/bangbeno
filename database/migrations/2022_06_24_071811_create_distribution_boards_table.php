<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionBoardsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("distribution_boards", function (Blueprint $table) {
			$table->increments('id');
			$table->integer('investigation_id')->nullable()->unsigned();
			$table->string('category', 1)->nullable();
			$table->string('target_circuit', 1)->nullable();
			$table->string('supply_range', 1)->nullable();
			$table->string('special_report', 100)->nullable();
			$table->string('carry_route_movie')->nullable();
			$table->string('memo', 100)->nullable();
			$table->string('is_update_proposal', 1)->nullable();
			$table->string('aged_rank_exterior_picture', 100)->nullable();
			$table->string('aged_rank_exterior_picture_comment', 100)->nullable();
			$table->string('target_repair_picture', 100)->nullable();
			$table->string('installation_location', 1)->nullable();
			$table->string('change_method', 1)->nullable();
			$table->string('power_outage_range', 1)->nullable();
			$table->string('remark', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();



			// ----------------------------------------------------
			// -- SELECT [distribution_boards]--
			// ----------------------------------------------------
			// $query = DB::table("distribution_boards")
			// ->leftJoin("investigations","investigations.id", "=", "distribution_boards.investigation_id")
			// ->leftJoin("investigations","investigations.id", "=", "distribution_boards.investigation_id")
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
		Schema::dropIfExists("distribution_boards");
	}
}
