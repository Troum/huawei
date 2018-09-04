<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModeratorNameDeclined extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('declined_participants', function (Blueprint $table) {
			$table->string('moderator');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('declined_participants', function (Blueprint $table) {
			$table->dropColumn('moderator');
		});
	}
}
