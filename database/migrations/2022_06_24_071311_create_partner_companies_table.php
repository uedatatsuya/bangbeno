<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreatePartnerCompaniesTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("partner_companies", function (Blueprint $table) {
						$table->increments('id');
						$table->string('name',50)->nullable();



						// ----------------------------------------------------
						// -- SELECT [partner_companies]--
						// ----------------------------------------------------
						// $query = DB::table("partner_companies")
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
                    Schema::dropIfExists("partner_companies");
                }
            }
        