<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactsInfo', function (Blueprint $table) {
            $table->id('idContactInfo');
            $table->string('typeContactInfo');
            $table->mediumtext('textContactInfo');
            $table->string('imgFilepath');
            $table->datetime('deleted_at')->nullable();
            $table->string('created_by');
            $table->datetime('created_at');
            $table->string('updated_by');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactsInfo');
    }
}
