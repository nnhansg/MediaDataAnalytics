@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

@section('keywords')DALO administration @stop
@section('author')nhantamio @stop
@section('description')DALO administration @stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
            {{{ $title }}}

            <div class="pull-right">
                <!-- <a href="{{{ URL::to('media/article/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a> -->
                <a href="{{{ URL::to('media/article/create') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
                <a href="{{{ URL::to('media/article/import') }}}" class="btn btn-small btn-info"><span class="glyphicon glyphicon-import"></span> Import</a>
            </div>
        </h3>
    </div>

    <table id="media" class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-2">{{{ Lang::get('media/table.name') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.main_cat') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.company_brand') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.sub_cat_main_ind') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.sub_ind_headline') }}}</th>
                <!-- <th class="col-md-2">{{{ Lang::get('media/table.original_link') }}}</th> -->
                <!-- <th class="col-md-2">{{{ Lang::get('media/table.media_title') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.media_type') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.lang') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.freq') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.circulation') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.readership_type') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.section_color') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.page') }}}</th>
                <th class="col-md-2">{{{ Lang::get('media/table.article') }}}</th> -->
                <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#media').dataTable( {
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page [article]"
                },
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('media/article/data') }}",
                "fnDrawCallback": function ( oSettings ) {
                    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                }
            });
        });
    </script>
@stop