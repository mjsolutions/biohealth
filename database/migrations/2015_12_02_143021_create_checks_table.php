<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->increments('id')->unique();

            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('type_schedule')->unsigned();
            
            $table->date('current_date');
            $table->integer('day_number')->unsigned();

            $table->time('entrance');
            $table->time('break')->nullable();
            $table->time('return')->nullable();
            $table->time('departure')->nullable();
            $table->text('activity_report')->nullable();
            $table->string('token', 20);
            
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('checks');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
