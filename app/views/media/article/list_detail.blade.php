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
        <h3>{{$article->headline}}</h3>
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
                <strong>company</strong>
            </div>
            <div class="col-md-9">
                {{$article->company}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>brand</strong>
            </div>
            <div class="col-md-9">
                {{$article->brand}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>sub_cat</strong>
            </div>
            <div class="col-md-9">
                {{$article->sub_cat}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <strong>main_ind</strong>
            </div>
            <div class="col-md-9">
                {{$article->main_ind}}
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
        <!-- begin -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-2">Property</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>headline</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>main_cat</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>company</td>
                        <td>Peter</td>
                    </tr>
                    <tr>
                        <td>brand</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>sub_cat</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>main_ind</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>sub_ind</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>original_link</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>filename</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>John</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- end -->
    </div>
@stop
<!--
main_cat
company
brand
sub_cat
main_ind
sub_ind
headline
original_link
filename
filename_src
media_title
media_type
lang
freq
circulation
readership_type
section
color
page
article_size_duration
total_size
advalue
mention
prvalue
journalist
photono
spoke
person
tone
gist
source
collected_data_date
created_at
updated_at
program
tonality
paragraph
soe
paragraph_mentioned
total_paragraph
soepicture
adve
spoke_person -->


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