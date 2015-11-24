<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id_branch')->unique();
            
            $table->integer('id_enterprise')->unsigned();
            $table->foreign('id_enterprise')->references('id_enterprise')->on('enterprises')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name_branch', 50);
            $table->string('address', 100);
            $table->integer('postalcode');
            $table->string('state', 100);
            $table->string('county', 100);
            $table->string('phone', 15);
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
        Schema::drop('branches');
    }
}
