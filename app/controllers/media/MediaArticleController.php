<?php
class MediaArticleController extends AdminController {
	public function getIndex() {
		$article       = new MediaArticle;
		$article->name = "Noi dung 1";
		$article->save();

		$title = 'Media Article';
		return View::make('media/article/index', compact('title'));
	}

	public function getCreate() {
		$title = "Article create";
		return View::make('media/article/create_edit', compact('title'));
	}

	public function postCreate() {

	}

	public function getEdit($article_id) {

	}

	public function postEdit($article_id) {

	}

	public function getDelete($article_id) {

	}

	public function postDelete($article_id) {

	}

	public function getData() {
		$articles = MediaArticle::select(array('id', 'name', 'main_cat', 'company_brand',
				'sub_cat_main_ind', 'sub_ind_headline', 'original_link', 'media_title',
				'media_type', 'media_type', 'lang', 'freq', 'circulation', 'readership_type',
				'section_color', 'page', 'article', 'size_duration', 'total_size', 'advalue',
				'mention', 'prvalue', 'journalist', 'photono', 'spoke', 'person',
				'tone', 'gist', 'source'));
		return Datatables::of($articles)
			->remove_column('id')
			->make();
	}
}