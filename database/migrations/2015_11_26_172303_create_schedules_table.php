<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name_schedule', 50);
            $table->integer('type')->unsigned();
            $table->float('total_time')->unsigned();
            $table->boolean('break');

            $table->time('start_1')->nullable();
            $table->time('entrance_1')->nullable();
            $table->time('break_1')->nullable();
            $table->time('return_1')->nullable();
            $table->time('departure_1')->nullable();
            $table->time('end_1')->nullable();

            $table->time('start_2')->nullable();
            $table->time('entrance_2')->nullable();
            $table->time('break_2')->nullable();
            $table->time('return_2')->nullable();
            $table->time('departure_2')->nullable();
            $table->time('end_2')->nullable();

            $table->time('start_3')->nullable();
            $table->time('entrance_3')->nullable();
            $table->time('break_3')->nullable();
            $table->time('return_3')->nullable();
            $table->time('departure_3')->nullable();
            $table->time('end_3')->nullable();
            
            $table->time('start_4')->nullable();
            $table->time('entrance_4')->nullable();
            $table->time('break_4')->nullable();
            $table->time('return_4')->nullable();
            $table->time('departure_4')->nullable();
            $table->time('end_4')->nullable();

            $table->time('start_5')->nullable();
            $table->time('entrance_5')->nullable();
            $table->time('break_5')->nullable();
            $table->time('return_5')->nullable();
            $table->time('departure_5')->nullable();
            $table->time('end_5')->nullable();

            $table->time('start_6')->nullable();
            $table->time('entrance_6')->nullable();
            $table->time('break_6')->nullable();
            $table->time('return_6')->nullable();
            $table->time('departure_6')->nullable();
            $table->time('end_6')->nullable();

            $table->time('start_7')->nullable();
            $table->time('entrance_7')->nullable();
            $table->time('break_7')->nullable();
            $table->time('return_7')->nullable();
            $table->time('departure_7')->nullable();
            $table->time('end_7')->nullable();            
            
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
        Schema::drop('schedules');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
