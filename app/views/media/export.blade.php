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
        <div class="col-md-5">
          <div class="form-group">
            <label class="col-md-3 control-label" for="From date">From date</label>
            <div class="col-md-9">
              <div class='input-group date' id='datetimepicker1'>
                  <input type='text' class="form-control" placeholder="yyyy/mm/dd" id="from_date" name="from_date" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
              <script type="text/javascript">
                  $(function () {
                      $('#datetimepicker1').datetimepicker();
                  });
              </script>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="To date">To date</label>
            <div class="col-md-9">
              <div class='input-group date' id='datetimepicker2'>
                  <input type='text' class="form-control" placeholder="yyyy/mm/dd" id="to_date" name="to_date" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
              <script type="text/javascript">
                  $(function () {
                      $('#datetimepicker2').datetimepicker();
                  });
              </script>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="Company">Company</label>
            <div class="col-md-9">
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
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="Media Type">Media Type</label>
            <div class="col-md-9">
              <select class="form-control" id="media_type" name="media_type">
                <option>Magazine</option>
                <option>Newspaper</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="Export Type">Export Type</label>
            <div class="col-md-9">
              <select class="form-control" id="export_type" name="export_type">
                <option>Excel 2003 (.xls)</option>
                <option>Excel 2007 (.xlsx)</option>
                <option>PDF (.pdf)</option>
                <option>Word (.doc)</option>
                <option>Chart</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
          <div class="form-group">
            <h4>Choose fields for export:</h4>
          </div>
          <div class="form-group">
            <label class="checkbox-inline">
              <input type="checkbox" id="dateCheckbox" value="date"> Date
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="mainCatCheckbox" value="main_cat"> Main Cat
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="companyCheckbox3" value="company"> Company
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="brandCheckbox3" value="brand"> Brand
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="subCoatCheckbox3" value="sub_cat"> Sub Cat
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="mainIndCheckbox3" value="main_ind"> Main Ind
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="headlineCheckbox3" value="healine"> Headline
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="subIndCheckbox" value="sub_ind"> Sub Ind
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="original_linkCheckbox" value="original_link"> Original link
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="media_titleCheckbox" value="media_title"> Media title
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="media_typeCheckbox" value="media_type"> Media type
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="programCheckbox" value="program"> Program
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="langCheckbox" value="lang"> Lang
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="freqCheckbox" value="freq"> freq
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="circulationCheckbox" value="circulation"> Circulation
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="readership_typeCheckbox" value="readership_type"> Readership/Viewership/Listenership
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="sectionCheckbox" value="section"> Section
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="colorCheckbox" value="color"> Color
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="pageCheckbox" value="page"> Page
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="article_size_durationCheckbox" value="article_size_duration"> Article Size/Duration
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="total_sizeCheckbox" value="total_size"> Total Size
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="advalCheckbox" value="adval"> AdVal
            </label>
          </div>
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
