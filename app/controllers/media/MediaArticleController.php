<?php
class MediaArticleController extends AdminController {
	public function getIndex() {
		$title = 'Media Article';
		return View::make('media/article/index', compact('title'));
	}
}