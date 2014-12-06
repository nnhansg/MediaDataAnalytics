<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaviewCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('mediaview_category', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name')->nullable();
				$table->string('slug')->nullable();
				$table->timestamps();
				$table->string('user_role')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('mediaview_category', function (Blueprint $table) {
				//
			});
	}

}
