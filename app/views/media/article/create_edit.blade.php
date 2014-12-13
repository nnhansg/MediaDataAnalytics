@extends('admin.layouts.default')
<div class="page-header">
  <h3>
    {{ $title }}
    <div class="pull-right">
      <button class="btn btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
    </div>
  </h3>
</div>

{{-- Content --}}
@section('content')
  <!-- Tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    </ul>
  <!-- ./ tabs -->

  {{-- Edit Blog Form --}}
  <form class="form-horizontal" method="post" action="@if (isset($category)){{ URL::to('media/category/' . $category->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
      <!-- General tab -->
      <div class="tab-pane active" id="tab-general">
        <!-- Category name -->
        <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="name">Category name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($category) ? $category->name : null) }}}" />
            {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
          </div>
        </div>
        <!-- ./ category name -->

        <!-- Category slug -->
        <div class="form-group {{{ $errors->has('slug') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="slug">Slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{{ Input::old('slug', isset($category) ? $category->slug : null) }}}" />
            {{{ $errors->first('slug', '<span class="help-block">:message</span>') }}}
          </div>
        </div>
        <!-- ./ category slug -->

        <!-- Options -->
        <div class="form-group {{{ $errors->has('options') ? 'has-error' : '' }}}">
          <div class="col-md-12">
                        <label class="control-label" for="options">Options</label>
            <input class="form-control full-width" name="options" value="options" rows="10">{{{ Input::old('options', isset($category) ? $category->option : null) }}}</input>
            {{{ $errors->first('options', '<span class="help-block">:message</span>') }}}
          </div>
        </div>
        <!-- ./ options -->
      </div>
      <!-- ./ general tab -->
    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
      <div class="col-md-12">
        <!-- <element class="btn-cancel close_popup">Cancel</element> -->
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </div>
    <!-- ./ form actions -->
  </form>
@stop
