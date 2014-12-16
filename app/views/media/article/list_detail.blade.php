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
        </h3>
    </div>
    <div class="col-md-3">
        <table id="media" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-1 hide">Id</th>
                    <th class="col-md-2">{{{ Lang::get('media/table.sub_ind_headline') }}}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="col-md-9">
        <h3>{{$article->sub_ind_headline}}</h3>
        <div class="row">
            <div class="col-md-3">
                <strong>main_cat</strong>
            </div>
            <div class="col-md-9">
                {{$article->main_cat}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>company_brand</strong>
            </div>
            <div class="col-md-9">
                {{$article->company_brand}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>sub_cat_main_ind</strong>
            </div>
            <div class="col-md-9">
                {{$article->sub_cat_main_ind}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>media_title</strong>
            </div>
            <div class="col-md-9">
                {{$article->media_title}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>media_type</strong>
            </div>
            <div class="col-md-9">
                {{$article->media_type}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>original_link</strong>
            </div>
            <div class="col-md-9">
                {{$article->original_link}}
            </div>
        </div>
    </div>
@stop

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#media').dataTable( {
                "sDom": "<'row'<'col-md-1'l><'col-md-11 pull-left'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page [article]"
                },
                "bProcessing": false,
                "bServerSide": true,
                "bPaginate": false,
                "bInfo": false,
                "sAjaxSource": "{{ URL::to('media/article/listdata') }}",
                "fnDrawCallback": function ( oSettings ) {
                    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    $('td:eq(1)', nRow).html('<a href="/media/article/listdetail/' + aData[0] + '">' +
                        aData[1] + '</a>');
                    $('td:eq(0)', nRow).html('').addClass('hide');
                    return nRow;
                }

            });
        });
    </script>
@stop

<!-- "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
    $('td:eq(1)', nRow).html('<a href="media/article/listdata?article_id=' + aData[0] + '">' +
        aData[0] + '</a>');
    return nRow;
} -->