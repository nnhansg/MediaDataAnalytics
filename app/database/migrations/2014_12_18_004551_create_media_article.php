<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaArticle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('media_article', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name')->nullable()->index();
				$table->text('content')->nullable();
				$table->string('category_ids')->default('');
				$table->text('category_names')->default('');
				$table->string('category_sids')->default('');
				$table->string('main_cat')->default('');
				$table->string('company')->default('');
				$table->string('brand')->default('');
				$table->string('sub_cat')->nullable();
				$table->string('main_ind')->nullable();
				$table->string('sub_ind')->nullable();
				$table->string('headline')->nullable();
				$table->string('original_link')->nullable();
				$table->string('filename')->nullable();
				$table->string('filename_src')->nullable();
				$table->string('media_title')->nullable();
				$table->string('media_type')->nullable();
				$table->string('lang')->nullable();
				$table->string('freq')->nullable();
				$table->string('circulation')->nullable();
				$table->string('readership_type')->nullable();//Readership/Viewership/Listenership
				$table->string('section')->nullable();
				$table->string('color')->nullable();
				$table->string('page')->nullable();
				$table->string('article_size_duration')->nullable();
				$table->string('total_size')->nullable();
				$table->integer('advalue')->unsigned()->default(0);
				$table->integer('mention')->unsigned()->default(0);
				$table->integer('prvalue')->unsigned()->default(0);
				$table->string('journalist')->nullable();
				$table->string('photono')->nullable();
				$table->string('spoke')->nullable();
				$table->string('person')->nullable();
				$table->string('tone')->nullable();
				$table->string('gist')->nullable();
				$table->string('program')->default('');
				$table->string('tonality')->default('');
				$table->string('paragraph')->default('');
				$table->string('soe')->default('');
				$table->string('paragraph_mentioned')->default('');
				$table->string('total_paragraph')->default('');
				$table->string('soepicture')->default('');
				$table->string('adve')->default('');
				$table->string('spoke_person')->default('');
				$table->datetime('collected_data_date')->nullable();
				$table->string('source')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('media_article');
	}

}
