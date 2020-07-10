<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->unsignedInteger('company_id');
			$table->foreign('company_id') // foreign key column name.
            ->references('id') // parent table primary key.
            ->on('companies') // parent table name.
            ->onDelete('cascade'); // this will delete all the children rows when the parent row is deleted.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('employees');
		 Schema::table('employees', function (Blueprint $table) {
        $table->dropForeign(['company_id']); // drop the foreign key.
        $table->dropColumn('company_id'); // drop the column
    });
    }
}
