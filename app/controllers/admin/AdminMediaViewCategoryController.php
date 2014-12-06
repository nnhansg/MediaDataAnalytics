<?php

class AdminMediaViewCategoryController extends AdminController {
	public function __construct() {

	}

	public function getIndex() {
		$category = MediaViewCategory::all();
		return View::make('admin/mediaviewcategory/index', compact('category'));
	}
}