<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddProgramToMediaArticle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('media_article', function (Blueprint $table) {
				$table->string('program')->default('');
				$table->string('tonality')->default('');
				$table->string('paragraph')->default('');
				$table->string('soe')->default('');
				$table->string('paragraph_mentioned')->default('');
				$table->string('total_paragraph')->default('');
				$table->string('soepicture')->default('');
				$table->string('adve')->default('');
				$table->string('spoke_person')->default('');
				// Tonality, Paragraph, SOE, Paragraph Mentioned, Total Paragraph, SOEPicture, ADVE
				// gom field: Spoke, Person -> spoke_person
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
