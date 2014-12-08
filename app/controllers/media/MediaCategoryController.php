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

	public function postCreate() {
		$this->category->name    = Input::get('name');
		$this->category->slug    = Str::slug(Input::get('slug'));
		$this->category->options = Input::get('options');
		if ($this->category->save()) {
			return Redirect::to('media/category/'.$this->category->id.'/edit')->with('success', Lang::get('media/category/messages.create.success'));
		}
		return Redirect::to('media/category/create')->with('error', Lang::get('media/category/messages.create.error'));
	}

	public function getEdit($category_id) {
		$category = MediaCategory::find($category_id);
		$title    = Lang::get('media/category/main.title');
		return View::make('/media/category/create_edit', compact('title', 'category'));
	}

	public function postEdit($category_id) {
		$category          = MediaCategory::find($category_id);
		$category->name    = Input::get('name');
		$category->slug    = Str::slug(Input::get('slug'));
		$category->options = Input::get('options');
		if ($category->save()) {
			return Redirect::to('media/category/'.$category->id.'/edit')->with('success', Lang::get('media/category/messages.create.success'));
		}
		return Redirect::to('media/category/create')->with('error', Lang::get('media/category/messages.create.error'));
	}

	public function getDelete($category_id) {
		$title    = Lang::get('media/category/main.title_delete');
		$category = MediaCategory::find($category_id);
		return View::make('media/category/delete', compact('title', 'category'));
	}

	public function postDelete($category_id) {
		$category = MediaCategory::find($category_id);
		$category->delete();
		$category = MediaCategory::find($category_id);
		if (empty($category)) {
			return Redirect::to('media/category')->with('success', Lang::get('admin/blogs/messages.delete.success'));
		}
		return Redirect::to('media/category')->with('error', Lang::get('admin/blogs/messages.delete.error'));
	}

	public function getData() {
		$category = MediaCategory::select(array('id', 'name', 'slug', 'created_at'));
		return Datatables::of($category)
			->add_column('actions', '<a href="{{{ URL::to(\'media/category/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'media/category/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')
			->remove_column('id')
			->make();
	}
}