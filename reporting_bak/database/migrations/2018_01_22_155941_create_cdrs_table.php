<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdrs', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer ( 'record_id' );
            $table->string ( 'firstname' );
            $table->string ( 'lastname' );
            $table->string ( 'email' );
            $table->string ( 'gender' );
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
        Schema::dropIfExists('cdrs');
    }
}
