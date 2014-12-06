<?php

class MediaCategoryController extends AdminController {
	public function __construct() {

	}

	public function getIndex() {
		$category = MediaCategory::all();
		return View::make('media/index', compact('category'));
	}
}