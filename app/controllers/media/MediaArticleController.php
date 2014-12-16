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

	public function getImport() {
		$title = "Import media article";
		return View::make('media/article/import', compact('title'));
	}

	public function postImport() {
		$title = "Import media article";
		global $countRowInserted, $countRowNotInserted, $msg, $result;
		$countRowInserted    = 0;
		$countRowNotInserted = 0;
		$result              = true;

		if (Input::hasFile('fileInput')) {
			$file      = Input::file('fileInput');
			$path      = $file->getRealPath();
			$name      = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$size      = $file->getSize();
			$mime      = $file->getMimeType();

			$destinationPath = public_path().'/imports/';
			$newFileName     = time().'-'.$name;
			$file->move($destinationPath, $newFileName);

			Excel::load($destinationPath.$newFileName, function ($reader) {
					global $countRowInserted, $countRowNotInserted, $msg, $result;

					// Getting all results
					$results = $reader->get();

					// // Loop through all sheets
					$reader->each(function ($row) {
							global $countRowInserted, $countRowNotInserted, $msg, $result;

							// Import a new media article to media_article table
							$mediaArticle = new MediaArticle;
							$mediaArticle->main_cat = $row->main_cat;
							$mediaArticle->company_brand = $row->company.'|'.$row->brand;
							$mediaArticle->sub_cat_main_ind = $row->sub_cat.'|'.$row->main_ind;
							$mediaArticle->sub_ind_headline = $row->sub_ind.'|'.$row->headline;
							$mediaArticle->original_link = $row->original_link;
							$mediaArticle->fileName = $row->filename;
							$mediaArticle->media_title = $row->media_title;
							$mediaArticle->media_type = $row->media_type;
							$mediaArticle->lang = $row->lang;
							$mediaArticle->freq = $row->freq;
							$mediaArticle->circulation = $row->circulation;
							$mediaArticle->readership_type = $row->readershipviewershiplistenership;
							$mediaArticle->section_color = $row->section.'|'.$row->color;
							$mediaArticle->page = $row->page;
							$mediaArticle->article = $row->article_sizeduration;
							$mediaArticle->total_size = $row->total_size;
							$mediaArticle->advalue = $row->advalue;
							$mediaArticle->mention = $row->mention;
							$mediaArticle->prvalue = $row->prvalue;
							$mediaArticle->journalist = $row->journalist;
							$mediaArticle->photono = $row->photono;
							$mediaArticle->spoke = $row->spoke_person;
							$mediaArticle->tone = $row->tone;
							$mediaArticle->gist = $row->gisten;

							if ($mediaArticle->save()) {
								// echo 'Inserted a record...<br />';
								$countRowInserted++;
							} else {
								// echo 'Not inserted a record...<br />';
								$countRowNotInserted++;
							}
						});

					$msg = "Inserted ".$countRowInserted." record.";

					if ($countRowNotInserted > 0) {
						$msg .= $countRowNotInserted." have some problems and not insert.";
					}
				});
		} else {
			$result = false;
			$msg    = "You need to choose file!";
		}

		return Redirect::back()->with('msg', $msg)
		                       ->with('result', $result);
		//return View::make('media/article/import', compact('title'));
	}
}