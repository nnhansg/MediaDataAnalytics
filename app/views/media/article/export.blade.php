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

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
              <div class='input-group date' id='datetimepicker1'>
                  <input type='text' class="form-control" placeholder="yyyy/mm/dd" id="begin-datetimepicker" name="begin-datetimepicker" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
              <script type="text/javascript">
                  $(function () {
                      $('#datetimepicker1').datetimepicker();
                  });
              </script>
          </div>
          <div class="form-group">
              <div class='input-group date' id='datetimepicker2'>
                  <input type='text' class="form-control" placeholder="yyyy/mm/dd" id="end-datetimepicker" name="end-datetimepicker" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
              <script type="text/javascript">
                  $(function () {
                      $('#datetimepicker2').datetimepicker();
                  });
              </script>
          </div>
          <select class="form-control" id="company" name="company">
            <option>Dat Xanh Real Estate Service & Construction Corporation</option>
            <option>An Gia Real Estate Co.</option>
            <option>Ascott International</option>
            <option>Bach Dang Construction</option>
            <option>Becamex Coproration</option>
            <option>Ben Thanh Construction Company</option>
            <option>Binh Duong Real Estate</option>
            <option>Bitexco</option>
          </select>
        </div>
        <div class="col-md-6 col-md-offset-2">
          123
        </div>
      </div>
    </div>

    <!-- Form Actions -->
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="btn btn-success">Export</button>
      </div>
    </div>
    <!-- ./ form actions -->
  </form>
@stop
