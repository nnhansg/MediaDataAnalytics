@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
  <div class="page-header">
  <h3>
    {{ $title }}
    <div class="pull-right">
      <button class="btn btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
    </div>
  </h3>
</div>
  <!-- Tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    </ul>
  <!-- ./ tabs -->

  {{-- Edit Blog Form --}}
  <form class="form-horizontal" method="post" action="@if (isset($article)){{ URL::to('media/article/' . $article->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
      <!-- General tab -->
      <div class="tab-pane active" id="tab-general">
        <!-- Article name -->
        <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="name">Category name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($article) ? $article->name : null) }}}" />
            {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
          </div>
        </div>
        <!-- ./ article name -->

        <!-- article main_cat -->
        <div class="form-group {{{ $errors->has('main_cat') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="main_cat">Main cat</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{{ Input::old('main_cat', isset($article) ? $article->main_cat : null) }}}" />
            {{{ $errors->first('slug', '<span class="help-block">:message</span>') }}}
          </div>
        </div>
        <!-- ./ article main_Cat -->

        <!-- Company brand -->
        <div class="form-group {{{ $errors->has('company_brand') ? 'has-error' : '' }}}">
          <div class="col-md-12">
                        <label class="control-label" for="company_brand">Options</label>
            <input class="form-control full-width" name="company_brand" value="company_brand" rows="10">{{{ Input::old('company_brand', isset($article) ? $article->company_brand : null) }}}</input>
            {{{ $errors->first('company_brand', '<span class="help-block">:message</span>') }}}
          </div>
        </div>
        <!-- ./ company brand -->
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
