<?php
            use Illuminate\Support\Facades\Schema;
            use Illuminate\Database\Schema\Blueprint;
            use Illuminate\Database\Migrations\Migration;
            
            class CreatePropertiesTable extends Migration
            {
                /**
                 * Run the migrations.
                 *
                 * @return void
                 */
                public function up()
                {
                    Schema::create("properties", function (Blueprint $table) {
						$table->increments('id');
						$table->integer('sfa_id')->nullable();
						$table->string('name',50)->nullable();
						$table->string('address',50)->nullable();
						$table->datetime('completion_date')->nullable();
						$table->integer('unit')->nullable();
						$table->string('agency',50)->nullable();
						$table->datetime('visit_date')->nullable();
						$table->string('client',50)->nullable();
						$table->integer(' department_id')->nullable();
						$table->integer('user_id')->nullable();
						$table->integer('investigation_user_id')->nullable();
						$table->integer('investigation_partner_company_id')->nullable();
						$table->integer('estimate1_partner_company_id')->nullable();
						$table->integer('estimate2_partner_company_id')->nullable();
						$table->datetime('estimate_date')->nullable();
						$table->datetime('estimate_request_date')->nullable();
						$table->datetime('estimate_submit_deadline_date')->nullable();
						$table->integer('estimate_money')->nullable();
						$table->string('aged_rank',1)->nullable();
						$table->string('aged_rank_comment',100)->nullable();
						$table->string(' degradation_rank',1)->nullable();
						$table->string('degradation_rank_comment',100)->nullable();
						$table->string('improvement_rank',1)->nullable();
						$table->string('improvement_rank_comment',100)->nullable();
						$table->string('cost_reduction_rank',1)->nullable();
						$table->string('cost_reduction_rank_comment',100)->nullable();
						$table->timestamps();
						$table->softDeletes();



						// ----------------------------------------------------
						// -- SELECT [properties]--
						// ----------------------------------------------------
						// $query = DB::table("properties")
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
                    Schema::dropIfExists("properties");
                }
            }
        