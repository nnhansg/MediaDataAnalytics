<?php
class TestController extends BaseController {
	public function getIndex() {
		// $cate       = new MediaViewCategory;
		// $cate->name = "Steven Nguyen";
		// $cate->slug = "steven-nguyen";
		// $cate->sid  = sha1($cate->name);
		// $cate->save();
		$category = MediaViewCategory::all();
		$title    = 'Test controller';
		return View::make('admin/mediaviewcategory/index', compact('title', 'category'));
	}
}
