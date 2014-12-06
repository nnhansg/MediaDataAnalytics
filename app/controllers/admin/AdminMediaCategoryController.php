<?php

class AdminMediaCategoryController extends AdminController {
	public function __construct() {

	}

	public function getIndex() {
		$category = MediaViewCategory::all();
		return View::make('admin/media/index', compact('category'));
	}
}