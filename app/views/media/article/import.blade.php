@extends('admin.layouts.default')

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
  <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{{ URL::to('media/article/import') }}}" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    </ul>
    <!-- ./ tabs -->

    <!-- Tabs Content -->
    <div class="tab-content">
      <!-- General tab -->
      <div class="tab-pane active" id="tab-general">
        <div class="col-md-12">
          <!-- Choose file to import -->
          <div class="form-group">
            <label for="fileInput">File input</label>
            <input type="file" id="fileInput" name="fileInput" />
            <p class="help-block">Choose a file (*.xls, *.csv).</p>
            <p class="help-block">Today {{{ time() }}}</p>
            <p class="help-block">Upload file to path: {{{ public_path() . '/imports/' }}}</p>
          </div>
          <!-- ./ choose file to import -->
        </div>
      </div>
      <!-- ./ general tab -->
    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="btn btn-success">Import</button>
      </div>
    </div>
    <!-- ./ form actions -->
  </form>
@stop
