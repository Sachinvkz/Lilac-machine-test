<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('fk_designation');
            $table->unsignedBigInteger('fk_department');
            $table->string('phone_number');
            $table->timestamps();
            $table->foreign('fk_designation')->references('id')->on('tbl_designation')->onDelete('cascade');
            $table->foreign('fk_department')->references('id')->on('tbl_department')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_users');
    }
}
