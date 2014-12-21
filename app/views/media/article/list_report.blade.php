@extends('admin.layouts.media_default')

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

    </div>
@stop

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#media').dataTable( {
                "sDom": "<'row'<'col-md-1 hide'l><'col-md-11 pull-left'f>r>t<'row'<'col-md-12'i><'col-md-12'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records"
                },
                "bProcessing": true,
                "bServerSide": true,
                "bPaginate": true,
                "bInfo": true,
                "iDisplayLength": 22,
                "sAjaxSource": "{{ URL::to('media/article/listdata') }}",
                "fnDrawCallback": function ( oSettings ) {
                    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    $('td:eq(1)', nRow).html('<a href="/media/article/listdetail/' + aData[0] + '">' + aData[1] + '</a>');
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