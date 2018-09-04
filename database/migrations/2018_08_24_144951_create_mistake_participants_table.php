<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMistakeParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mistake_participants', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
	        $table->string('phone');
	        $table->string('email');
	        $table->longText('address');
	        $table->string('imei_one');
	        $table->string('imei_two');
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
        Schema::dropIfExists('mistake_participants');
    }
}
