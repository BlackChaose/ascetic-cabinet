<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket_num');
            $table->string('name_org');
            $table->string('data_visit');
            $table->string('doctor_name');
            $table->string('doctor_spec');
            $table->string('cab_num');
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
        Schema::dropIfExists('records');
    }
}
