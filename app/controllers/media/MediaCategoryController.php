<?php

class MediaCategoryController extends AdminController {
	protected $category;

	public function __construct(MediaCategory $category) {
		parent::__construct();
		$this->category = $category;
	}

	public function getIndex() {
		$title = 'Media Category';
		// $categories = MediaCategory::all();
		return View::make('media/category/index', compact('title'));
	}

	public function getCreate() {
		$title = Lang::get('media/category/main.title');
		return View::make('/media/category/create_edit', compact('title'));
	}

	public function postCreate($category) {

	}

	public function getEdit($category) {

	}

	public function postEdit($category) {

	}

	public function getData() {
		$category = MediaCategory::select(array('name', 'slug', 'created_at'));
		return Datatables::of($category)
			->remove_column('id')
			->make();
	}
}