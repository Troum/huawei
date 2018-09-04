<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_participants', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('phone');
	        $table->longText('address');
	        $table->string('imei');
	        $table->string('number')->default('');
	        $table->string('photo');
	        $table->string('directory');
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
        Schema::dropIfExists('approved_participants');
    }
}
