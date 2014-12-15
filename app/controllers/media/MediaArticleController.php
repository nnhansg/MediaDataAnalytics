<?php
class MediaArticleController extends AdminController {
	public function getIndex() {
		// $article       = new MediaArticle;
		// $article->name = "Noi dung 1";
		// $article->save();
		// $articles = MediaArticle::all();
		// $index    = 0;
		// foreach ($articles as $article) {
		// 	$index++;
		// 	$article->main_cat         = "Main cat ".$index;
		// 	$article->company_brand    = "company brand ".$index;
		// 	$article->sub_cat_main_ind = "sub cat main ind ".$index;
		// 	$article->sub_ind_headline = "sub ind headline ".$index;
		// 	$article->save();
		// }

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
		$article = MediaArticle::find($article_id);
		$title   = Lang::get('media/article/main.title');
		return View::make('/media/category/create_edit', compact('title', 'article'));
	}

	public function postEdit($article_id) {

	}

	public function getDelete($article_id) {

	}

	public function postDelete($article_id) {

	}

	public function getData() {
		$f_article = array('id', 'name', 'main_cat', 'company_brand',
			'sub_cat_main_ind', 'sub_ind_headline', 'original_link', 'media_title',
			'media_type', 'media_type', 'lang', 'freq', 'circulation', 'readership_type',
			'section_color', 'page', 'article', 'size_duration', 'total_size', 'advalue',
			'mention', 'prvalue', 'journalist', 'photono', 'spoke', 'person',
			'tone', 'gist', 'source');
		$f_article = array('id', 'name', 'main_cat', 'company_brand',
			'sub_cat_main_ind', 'sub_ind_headline');
		$articles = MediaArticle::select($f_article);
		return Datatables::of($articles)
			->add_column('actions', '<a href="{{{ URL::to(\'media/article/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'media/article/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
            ')
			->remove_column('id')
			->make();
	}

	public function getListData() {
		$f_article = array('id', 'sub_ind_headline');
		$articles  = MediaArticle::select($f_article);
		return Datatables::of($articles)
		// ->remove_column('id')
			->make();
	}

	public function getListReport() {
		$title = "List report";
		return View::make('media/article/list_report', compact('title'));
	}

	public function getListDetail($article_id) {
		$title   = "List detail";
		$article = MediaArticle::find($article_id);
		return View::make('media/article/list_detail', compact('title', 'article'));
	}
}