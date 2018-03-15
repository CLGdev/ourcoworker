<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('historyid');
            $table->string('callid')->nullable($value = true);
            $table->time('duration')->nullable($value = true);
            $table->dateTime('time_start')->nullable()->default(null);
//          $table->dateTime('time_answered')->nullable()->default(null);
            $table->dateTime('time_end')->nullable()->default(null);
            $table->string('reason_terminated')->nullable($value = true);
            $table->string('from_no')->nullable($value = true);
            $table->string('to_no')->nullable($value = true);
//          $table->string('from_dn')->nullable($value = true);
//          $table->string('to_dn')->nullable($value = true);
//          $table->string('dial_no')->nullable($value = true);
            $table->string('reason_changed')->nullable($value = true);
            $table->string('final_number')->nullable($value = true);
//          $table->string('final_dn')->nullable($value = true);
            $table->string('final_dispname')->nullable($value = true);
            $table->string('from_type')->nullable($value = true);
            $table->string('to_type')->nullable($value = true);
            $table->string('final_type')->nullable($value = true);
            $table->string('from_dispname')->nullable($value = true);
            $table->string('to_dispname')->nullable($value = true);
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
        Schema::dropIfExists('calls');
    }
}
