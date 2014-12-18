@extends('admin.layouts.media_default')

{{-- Content --}}
@section('content')
  <div class="page-header">
    <h3>
      {{ $title }}
      <div class="pull-right">
        <a href="{{{ URL::to('media/article') }}}" class="btn btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
      </div>
    </h3>
  </div>

  <div class="alert {{ (Session::get('result') == true) ? 'alert-success' : 'alert-danger' }} alert-dismissible {{ (Session::get('msg') != null) ? '' : 'hide' }}" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
    </button>
    {{{ Session::get('msg') }}}
  </div>

  {{-- Edit Blog Form --}}
  <form class="form-horizontal" method="post" action="{{{ Request::url() }}}" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->



    <!-- Form Actions -->
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="btn btn-success">Export</button>
      </div>
    </div>
    <!-- ./ form actions -->
  </form>
@stop
