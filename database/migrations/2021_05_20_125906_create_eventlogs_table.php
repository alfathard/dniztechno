<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventlogs', function (Blueprint $table) {
            $table->id('idEvent');
            $table->string('idUser')->references('id')->on('users');
            $table->string('eventLog');
            $table->string('created_by');
            $table->date('created_date');
            $table->time('created_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventlogs');
    }
}
