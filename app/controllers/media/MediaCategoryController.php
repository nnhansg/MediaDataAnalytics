<?php

class MediaCategoryController extends AdminController {
	public function __construct() {

	}

	public function getIndex() {
		// $cate       = new MediaCategory;
		// $cate->name = "Trinh Nguyen";
		// $cate->slug = "trinh-nguyen";
		// $cate->save();

		$title    = 'Media Category';
		$category = MediaCategory::all();
		return View::make('media/index', compact('category', 'title'));
	}

	public function getData() {
		$category = MediaCategory::select(array('name', 'slug', 'created_at'));
		return Datatables::of($category)
			->remove_column('id')
			->make();
	}
}