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
            $table->integer('id')->autoIncrement();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('company_id')->unasigned();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('no action');  
            $table->string('email')->unique();          
            $table->integer('phone'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
