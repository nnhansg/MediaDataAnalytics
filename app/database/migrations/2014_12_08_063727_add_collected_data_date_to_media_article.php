<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCollectedDataDateToMediaArticle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('media_article', function (Blueprint $table) {
				$table->datetime('collected_data_date')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('media_article', function (Blueprint $table) {
				//
			});
	}

}
