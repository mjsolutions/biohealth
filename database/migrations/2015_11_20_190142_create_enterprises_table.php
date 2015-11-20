<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->increments('id_enterprise')->unique();
            $table->string('name', 50);
            $table->string('address', 100);
            $table->integer('postalcode');
            $table->string('state', 100);
            $table->string('county', 100);
            $table->string('phone', 15);
            $table->string('rfc', 20);
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
        Schema::drop('enterprises');
    }
}

