<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTestimonisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('testimonis');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id('idTestimoni');
            $table->string('titleTestimoni');
            $table->mediumtext('textTestimoni');
            $table->datetime('deleted_at')->nullable();
            $table->string('created_by');
            $table->datetime('created_at');
            $table->string('updated_by');
            $table->datetime('updated_at');
        });
    }
}
