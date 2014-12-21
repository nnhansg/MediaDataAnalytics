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
        <h3>{{$article->headline}}</h3>
        <!-- <div class="row">
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
        </div> -->
        <!-- begin -->
        <div class="table-responsive shadow">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-3">Property</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>headline</td>
                        <td>{{$article->headline}}</td>
                    </tr>
                    <tr>
                        <td>main_cat</td>
                        <td>{{$article->main_cat}}</td>
                    </tr>
                    <tr>
                        <td>company</td>
                        <td>{{$article->company}}</td>
                    </tr>
                    <tr>
                        <td>brand</td>
                        <td>{{$article->brand}}</td>
                    </tr>
                    <tr>
                        <td>sub_cat</td>
                        <td>{{$article->sub_cat}}</td>
                    </tr>
                    <tr>
                        <td>main_ind</td>
                        <td>{{$article->main_ind}}</td>
                    </tr>
                    <tr>
                        <td>sub_ind</td>
                        <td>{{$article->sub_ind}}</td>
                    </tr>
                    <tr>
                        <td>original_link</td>
                        <td>{{$article->original_link}}</td>
                    </tr>
                    <tr>
                        <td>filename</td>
                        <td>{{$article->filename}}</td>
                    </tr>
                    <tr>
                        <td>media_title</td>
                        <td>{{$article->media_title}}</td>
                    </tr>
                    <tr>
                        <td>media_type</td>
                        <td>{{$article->media_type}}</td>
                    </tr>
                    <tr>
                        <td>lang</td>
                        <td>{{$article->lang}}</td>
                    </tr>
                    <tr>
                        <td>freq</td>
                        <td>{{$article->freq}}</td>
                    </tr>
                    <tr>
                        <td>circulation</td>
                        <td>{{$article->circulation}}</td>
                    </tr>
                    <tr>
                        <td>readership_type</td>
                        <td>{{$article->readership_type}}</td>
                    </tr>
                    <tr>
                        <td>section</td>
                        <td>{{$article->section}}</td>
                    </tr>
                    <tr>
                        <td>color</td>
                        <td>{{$article->color}}</td>
                    </tr>
                    <tr>
                        <td>page</td>
                        <td>{{$article->page}}</td>
                    </tr>
                    <tr>
                        <td>article_size_duration</td>
                        <td>{{$article->article_size_duration}}</td>
                    </tr>
                    <tr>
                        <td>total_size</td>
                        <td>{{$article->total_size}}</td>
                    </tr>
                    <tr>
                        <td>advalue</td>
                        <td>{{$article->advalue}}</td>
                    </tr>
                    <tr>
                        <td>mention</td>
                        <td>{{$article->mention}}</td>
                    </tr>
                    <tr>
                        <td>prvalue</td>
                        <td>{{$article->prvalue}}</td>
                    </tr>
                    <tr>
                        <td>journalist</td>
                        <td>{{$article->journalist}}</td>
                    </tr>
                    <tr>
                        <td>photono</td>
                        <td>{{$article->photono}}</td>
                    </tr>
                    <tr>
                        <td>spoke</td>
                        <td>{{$article->spoke}}</td>
                    </tr>
                    <tr>
                        <td>person</td>
                        <td>{{$article->person}}</td>
                    </tr>
                    <tr>
                        <td>tone</td>
                        <td>{{$article->tone}}</td>
                    </tr>
                    <tr>
                        <td>gist</td>
                        <td>{{$article->gist}}</td>
                    </tr>
                    <tr>
                        <td>program</td>
                        <td>{{$article->program}}</td>
                    </tr>
                    <tr>
                        <td>tonality</td>
                        <td>{{$article->tonality}}</td>
                    </tr>
                    <tr>
                        <td>paragraph</td>
                        <td>{{$article->paragraph}}</td>
                    </tr>
                    <tr>
                        <td>soe</td>
                        <td>{{$article->soe}}</td>
                    </tr>
                    <tr>
                        <td>paragraph_mentioned</td>
                        <td>{{$article->paragraph_mentioned}}</td>
                    </tr>
                    <tr>
                        <td>total_paragraph</td>
                        <td>{{$article->total_paragraph}}</td>
                    </tr>
                    <tr>
                        <td>soepicture</td>
                        <td>{{$article->soepicture}}</td>
                    </tr>
                    <tr>
                        <td>adve</td>
                        <td>{{$article->adve}}</td>
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
                "sDom": "<'row'<'col-md-12'l><'col-md-11 pull-left'f>r>t<'row'<'col-md-12'i><'col-md-12'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records"
                },
                "bProcessing": true,
                "bServerSide": false,
                "bPaginate": false,
                "bInfo": true,
                "sAjaxSource": "{{ URL::to('media/article/listdata') }}",
                "iDisplayLength": 50,
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