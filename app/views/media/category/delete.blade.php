@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')

{{-- Edit Blog Form --}}
<form class="form-horizontal" method="post" action="@if (isset($category)){{ URL::to('media/category/' . $category->id . '/delete') }}@endif" autocomplete="off">
  <!-- CSRF Token -->
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <!-- ./ csrf token -->
  <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
    <div class="col-md-12">
      <label class="control-label" for="name">Category name</label>
      <h2>{{{ Input::old('name', isset($category) ? $category->name : null) }}}</h2>
      {{{ $errors->first('name', '<span class="help-block">:message</span>') }}}
    </div>
  </div>
  <!-- Form Actions -->
  <div class="form-group">
    <div class="col-md-12">
      <!-- <element class="btn-cancel close_popup">Cancel</element> -->
      <!-- <button type="reset" class="btn btn-default">Reset</button> -->
      <button type="submit" class="btn btn-success">Delete</button>
      <button class="btn-cancel close_popup">Cancel</button>
    </div>
  </div>
  <!-- ./ form actions -->
</form>
@stop