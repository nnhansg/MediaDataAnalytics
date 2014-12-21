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
            <h4>Infomation export</h4>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="From date">From date</label>
            <div class="col-md-9">
                <input type='text' class="form-control datepicker" placeholder="yyyy/mm/dd" id="from_date" name="from_date" value="{{{ date('Y/m/d', time()) }}}" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="To date">To date</label>
            <div class="col-md-9">
                <input type='text' class="form-control datepicker" placeholder="yyyy/mm/dd" id="to_date" name="to_date" value="{{{ date('Y/m/d', time()) }}}" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="Company">Company</label>
            <div class="col-md-9">
              <select class="form-control" id="company" name="company">
                <option>All</option>
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
            <label class="col-md-3 control-label" for="Media Type">Media type</label>
            <div class="col-md-9">
              <select class="form-control" id="media_type" name="media_type">
                <option>All</option>
                <option>Magazine</option>
                <option>Newspaper</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" for="Export Type">Export type</label>
            <div class="col-md-9">
              <select class="form-control" id="export_type" name="export_type">
                <option value='xls'>Excel 2003 (.xls)</option>
                <option value='xlsx'>Excel 2007 (.xlsx)</option>
                <option value='csv'>CSV (.csv)</option>
                <option value='pdf'>PDF (.pdf)</option>
                <option value='doc'>Word (.doc)</option>
                <option value='chart'>Chart</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
          <div class="form-group">
            <h4>Choose fields for export</h4>
            <h5>(<a class="checkall" href="javascript:void(0)">Check All</a> / <a class="uncheckall" href="javascript:void(0)">Uncheck All</a>)</h5>
          </div>
          <div class="row choose-fields">
            <div class="col-md-6">
              <div class="form-group">
                <label class="checkbox">
                <input type="checkbox" id="dateCheckbox" value="date" checked="checked"> Date
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="mainCatCheckbox" value="main_cat" checked="checked"> Main Cat
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="companyCheckbox3" value="company" checked="checked"> Company
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="brandCheckbox3" value="brand" checked="checked"> Brand
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="subCoatCheckbox3" value="sub_cat" checked="checked"> Sub Cat
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="mainIndCheckbox3" value="main_ind" checked="checked"> Main Ind
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="headlineCheckbox3" value="healine" checked="checked"> Headline
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="subIndCheckbox" value="sub_ind" checked="checked"> Sub Ind
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="original_linkCheckbox" value="original_link" checked="checked"> Original link
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="media_titleCheckbox" value="media_title" checked="checked"> Media title
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="media_typeCheckbox" value="media_type" checked="checked"> Media type
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="programCheckbox" value="program" checked="checked"> Program
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="langCheckbox" value="lang" checked="checked"> Lang
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="freqCheckbox" value="freq" checked="checked"> freq
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="circulationCheckbox" value="circulation" checked="checked"> Circulation
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="readership_typeCheckbox" value="readership_type" checked="checked"> Readership/Viewership/Listenership
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="sectionCheckbox" value="section" checked="checked"> Section
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="colorCheckbox" value="color" checked="checked"> Color
                </label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="checkbox">
                  <input type="checkbox" id="pageCheckbox" value="page" checked="checked"> Page
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="article_size_durationCheckbox" value="article_size_duration" checked="checked"> Article Size/Duration
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="total_sizeCheckbox" value="total_size" checked="checked"> Total Size
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="advalCheckbox" value="adval" checked="checked"> AdVal
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="mentionCheckbox" value="mention" checked="checked"> Mention
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="mentionCheckbox" value="adval" checked="checked"> PRValue
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="roiCheckbox" value="roi" checked="checked"> ROI
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="tonalityCheckbox" value="tonality" checked="checked"> Tonality
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="journalistCheckbox" value="journalist" checked="checked"> Journalist
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="sourceCheckbox" value="source" checked="checked"> Source
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="spoke_personCheckbox" value="spoke_person" checked="checked"> Spoke Person
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="toneCheckbox" value="tone" checked="checked"> Tone
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="paragraphCheckbox" value="paragraph" checked="checked"> Paragraph
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="soeCheckbox" value="soe" checked="checked"> SOE
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="paragraph_mentionedCheckbox" value="paragraph_mentioned" checked="checked"> Paragraph Mentioned
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="total_paragraphCheckbox" value="total_paragraph" checked="checked"> Total Paragraph
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="soepictureCheckbox" value="soepicture" checked="checked"> SOEPicture
                </label>
                <label class="checkbox">
                  <input type="checkbox" id="adveCheckbox" value="adve" checked="checked"> ADVE
                </label>
              </div>
            </div>
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

@section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $(function () {
        $('#datetimepicker1').datetimepicker();
      });

      $(function () {
        $('#datetimepicker2').datetimepicker();
      });

      $('.checkall').click(funtion() {
        // alert('checkall');
        // $('.choose-fields input[type=checkbox]').prop('checked', true);
      });

      $('.uncheckall').click(funtion() {
        // $('.choose-fields input[type=checkbox]').prop('checked', false);
      });
    });
  </script>
@stop