<?php
class MediaArticleController extends AdminController {
	public function getIndex() {
		// $article           = new MediaArticle;
		// $article->name     = "Noi dung 1";
		// $article->headline = "Headline 1";
		// $article->save();
		// $articles = MediaArticle::all();
		// $index    = 0;
		// foreach ($articles as $article) {
		// 	$index++;
		// 	$article->main_cat = "Main cat ".$index;
		// 	$article->company  = "company ".$index;
		// 	$article->brand    = "brand ".$index;
		// 	$article->main_ind = "main ind ".$index;
		// 	$article->headline = "headline ".$index;
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
			'sub_cat, main_ind', 'sub_ind, headline', 'original_link', 'media_title',
			'media_type', 'media_type', 'lang', 'freq', 'circulation', 'readership_type',
			'section_color', 'page', 'article', 'size_duration', 'total_size', 'advalue',
			'mention', 'prvalue', 'journalist', 'photono', 'spoke', 'person',
			'tone', 'gist', 'source');
		$f_article = array('id', 'headline', 'main_cat', 'company', 'brand',
			'main_ind');
		$articles = MediaArticle::select($f_article);
		return Datatables::of($articles)
			->add_column('actions', '<a href="{{{ URL::to(\'media/article/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'media/article/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
            ')
			->remove_column('id')
			->make();
	}

	public function getListData() {
		$f_article = array('id', 'headline');
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
			// $path      = $file->getRealPath();
			$name      = $file->getClientOriginalName();
			// $extension = $file->getClientOriginalExtension();
			// $size      = $file->getSize();
			// $mime      = $file->getMimeType();

			$destinationPath = public_path().'/imports/';
			$newFileName     = time().'-'.$name;
			$file->move($destinationPath, $newFileName);

			Excel::load($destinationPath . $newFileName, function ($reader) {
					global $countRowInserted, $countRowNotInserted, $msg, $result;

					// Getting all results
					$results = $reader->get();

					// // Loop through all sheets
					$reader->each(function ($row) {
							global $countRowInserted, $countRowNotInserted, $msg, $result;

							// Import a new media article to media_article table
							$mediaArticle = new MediaArticle;
							$mediaArticle->main_cat = $row->main_cat;
							$mediaArticle->company = $row->company;
							$mediaArticle->brand = $row->brand;
							$mediaArticle->sub_cat = $row->sub_cat;
							$mediaArticle->main_ind = $row->main_ind;
							$mediaArticle->sub_ind = $row->sub_ind;
							$mediaArticle->headline = $row->headline;
							$mediaArticle->original_link = $row->original_link;
							$mediaArticle->fileName = $row->filename;
							$mediaArticle->media_title = $row->media_title;
							$mediaArticle->media_type = $row->media_type;
							$mediaArticle->lang = $row->lang;
							$mediaArticle->freq = $row->freq;
							$mediaArticle->circulation = $row->circulation;
							$mediaArticle->readership_type = $row->readershipviewershiplistenership;
							$mediaArticle->section = $row->section;
							$mediaArticle->color = $row->color;
							$mediaArticle->page = $row->page;
							$mediaArticle->article_size_duration = $row->article_sizeduration;
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
								$countRowInserted++;
							} else {
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
	}

	///
	public function getExportXLS () {
		$title = "Export media article";
		return View::make('media/article/export', compact('title'));
	}

	///
	public function postExportXLS () {
        $filenameExport = 'export-' . time();

        return
                Excel::create($filenameExport, function($excel) {
                	$sheetName1 = 'Sheet1';

                    $excel->sheet($sheetName1, function($sheet) {
                        $sheet->setOrientation('landscape');
                        $sheet->setPageMargin(0.25);
                        $sheet->setAllBorders('thin');
                        $sheet->setAutoFilter('A2:AI2');
                        $sheet->row(1, array('MIS Report - Dat Xanh Group (1 Dec 2014 - 16 Dec 2014)'));
                        $sheet->setHeight(1, 50);
                        $sheet->mergeCells('A1:AI1');
                        $sheet->setAutoSize(false);
                        $sheet->setStyle(array(
						    'font' => array(
					        	'name' => 'Arial',
						        'size' => 8
						    )
						));

						$sheet->cells('A1:A1', function($cells) {
							$cells->setFontSize(12);
							$cells->setFontWeight('bold');
						});

						$sheet->cells('A2:AI2', function($cells) {
							$cells->setFontWeight('bold');
						});

                        $listMediaArticle = MediaArticle::whereRaw('company = ?', array('Abbott'))->get();
				        $contentSheet1 = array();
				        $contentSheet1[] = array('Date', 'Main Cat', 'Company', 'Brand', 'Sub Cat', 'Main Ind',
											'Sub Ind', 'Headline', 'FileName', 'Media Title', 'Media Type',
											'Program', 'Lang', 'Circulation', 'Readership/Viewership/Listenership',
											'Section', 'Page', 'Article Size/Duration', 'Total Size', 'AdValue',
											'Mention', 'PRValue', 'ROI', 'Tonality', 'Journalist', 'Source',
											'Spoke Person', 'Tone', 'Gist (en)', 'Paragraph', 'SOE',
											'Paragraph Mentioned', 'Total Paragraph', 'SOEPicture', 'ADVE');

				        $stepRow = 2;
				        $sheet->row($stepRow, function($row) {
						    $row->setBackground('#538ed5');
						});

				        foreach ($listMediaArticle as $mediaArticle) {
			        		$stepRow++;

			        		if ($stepRow % 2 != 0) {
			        			$sheet->row($stepRow, function($row) {
								    $row->setBackground('#ffffff');
								});
			        		} else {
			        			$sheet->row($stepRow, function($row) {
								    $row->setBackground('#f5f5f5');
								});
			        		}


				        	$contentSheet1[] = array('', $mediaArticle->main_cat, $mediaArticle->company,
				        								$mediaArticle->brand, $mediaArticle->sub_cat,
				        								$mediaArticle->main_ind, $mediaArticle->sub_ind,
				        								$mediaArticle->headline, $mediaArticle->filename,
				        								$mediaArticle->media_title, $mediaArticle->media_type,
				        								'', $mediaArticle->lang, $mediaArticle->circulation,
				        								$mediaArticle->readership_type, $mediaArticle->section,
				        								$mediaArticle->page, $mediaArticle->article_size_duration,
				        								$mediaArticle->total_size, $mediaArticle->AdValue,
				        								$mediaArticle->mention, $mediaArticle->prvalue,
				        								'', '', $mediaArticle->journalist, $mediaArticle->source,
				        								$mediaArticle->spoke, $mediaArticle->tone, $mediaArticle->gist,
				        								'', '', '', '', '', '');
						}

                        $sheet->fromArray($contentSheet1, null, 'A2', false, false);
                    });
                })->export('xls');
    }
}