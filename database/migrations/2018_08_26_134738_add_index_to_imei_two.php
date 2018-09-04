<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToImeiTwo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('imeis', function(Blueprint $table)
		{
			$table->index('imei_two');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('imeis', function (Blueprint $table)
		{
			$table->dropIndex(['imei_two']);
		});
	}
}
