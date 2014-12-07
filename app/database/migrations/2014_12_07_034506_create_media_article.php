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
				$table->string('content')->nullable();
				$table->string('category_ids')->unsigned();
				$table->string('category_names')->nullable();
				$table->string('category_sids')->nullable();
				$table->string('main_cat')->nullable();
				$table->string('company_brand')->nullable();
				$table->string('sub_cat_main_ind')->nullable();
				$table->string('sub_ind_headline')->nullable();
				$table->string('original_link')->nullable();
				$table->string('fileName')->nullable();
				$table->string('media_title')->nullable();
				$table->string('media_type')->nullable();
				$table->string('lang')->nullable();
				$table->string('freq')->nullable();
				$table->string('circulation')->nullable();
				$table->string('readership_type')->nullable();//Readership/Viewership/Listenership
				$table->string('section_color')->nullable();
				$table->string('page')->nullable();
				$table->string('article')->nullable();
				$table->string('size_duration')->nullable();
				$table->string('total_size')->nullable();
				$table->integer('advalue')->nullable();
				$table->integer('mention')->nullable();
				$table->integer('prvalue')->nullable();
				$table->string('journalist')->nullable();
				$table->string('photono')->nullable();
				$table->string('spoke')->nullable();
				$table->string('person')->nullable();
				$table->string('tone')->nullable();
				$table->string('gist')->nullable();
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
