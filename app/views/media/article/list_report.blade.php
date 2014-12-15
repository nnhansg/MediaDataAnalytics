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
            </div>
        </h3>
    </div>
    <div class="col-md-4">
        <table id="media" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-2">{{{ Lang::get('media/table.name') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('media/table.main_cat') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('media/table.company_brand') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('media/table.sub_cat_main_ind') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('media/table.sub_ind_headline') }}}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="col-md-8">

    </div>
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
                "sAjaxSource": "{{ URL::to('media/article/datalist') }}",
                "fnDrawCallback": function ( oSettings ) {
                    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                }
            });
        });
    </script>
@stop