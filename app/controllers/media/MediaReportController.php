<?php
class MediaReportController extends AdminController {
    ///
    public function getExport() {
        $title = "Export media article";
        return View::make('media/export', compact('title'));
    }

    ///
    public function postExport() {
        $input = array(
            'from_date'    => Input::get('from_date'),
            'to_date' => Input::get('to_date'),
            'company' => Input::get('company'),
            'media_type' => Input::get('media_type'),
            'export_type' => Input::get('export_type'),
            'dateCheckbox' => Input::get('dateCheckbox'),
            'mainCatCheckbox' => Input::get('mainCatCheckbox'),
        );

        $filenameExport = 'export-'.time();

        if ($input['export_type'] == 'xls'
            || $input['export_type'] == 'xlsx'
            || $input['export_type'] == 'csv')

        return
        Excel::create($filenameExport, function ($excel) use($input) {
                $sheetName1 = 'Sheet1';

                $excel->sheet($sheetName1, function ($sheet) use($input) {
                        $sheet->setOrientation('landscape');
                        $sheet->setPageMargin(0.25);
                        $sheet->setAllBorders('thin');
                        $sheet->setAutoFilter('A2:AI2');
                        $sheet->row(1, array('MIS Report - ' . $input['company'] . ' (' .
                                    date('d M y', strtotime($input['from_date'])) .
                                    ' - ' . date('d M y', strtotime($input['to_date'])) . ')'));
                        $sheet->setHeight(1, 50);
                        $sheet->mergeCells('A1:AI1');
                        $sheet->setAutoSize(false);
                        $sheet->setStyle(array(
                                'font'  => array(
                                    'name' => 'Arial',
                                    'size' => 8,
                                )
                            ));

                        $sheet->cells('A1:A1', function ($cells) {
                                $cells->setFontSize(12);
                                $cells->setFontWeight('bold');
                            });

                        $sheet->cells('A2:AI2', function ($cells) {
                                $cells->setFontWeight('bold');
                            });

                        $whereRawMediaArticle = strtotime($input['from_date']) . ' <= UNIX_TIMESTAMP(collected_data_date) and UNIX_TIMESTAMP(collected_data_date) <= ' . strtotime($input['to_date']);

                        if ($input['company'] != 'All') {
                            $whereRawMediaArticle .= " and company = '" . $input['company'] . "'";
                        }

                        if ($input['media_type'] != 'All') {
                            $whereRawMediaArticle .= " and media_type = '" . $input['media_type'] . "'";
                        }

                        $listMediaArticle = MediaArticle::whereRaw($whereRawMediaArticle)->get();

                        $contentSheet1 = array();
                        $contentSheet1[] = array('Date', 'Main Cat', 'Company', 'Brand', 'Sub Cat', 'Main Ind',
                            'Sub Ind', 'Headline', 'FileName', 'Media Title', 'Media Type',
                            'Program', 'Lang', 'Circulation', 'Readership/Viewership/Listenership',
                            'Section', 'Page', 'Article Size/Duration', 'Total Size', 'AdValue',
                            'Mention', 'PRValue', 'ROI', 'Tonality', 'Journalist', 'Source',
                            'Spoke Person', 'Tone', 'Gist (en)', 'Paragraph', 'SOE',
                            'Paragraph Mentioned', 'Total Paragraph', 'SOEPicture', 'ADVE');

                        $stepRow = 2;
                        $sheet->row($stepRow, function ($row) {
                                $row->setBackground('#538ed5');
                            });

                        foreach ($listMediaArticle as $mediaArticle) {
                            $stepRow++;

                            if ($stepRow%2 != 0) {
                                $sheet->row($stepRow, function ($row) {
                                        $row->setBackground('#ffffff');
                                    });
                            } else {
                                $sheet->row($stepRow, function ($row) {
                                        $row->setBackground('#f5f5f5');
                                    });
                            }

                            $contentSheet1[] = array(date('d-M-y', strtotime($listMediaArticle[0]->collected_data_date)),
                                $mediaArticle->main_cat, $mediaArticle->company,
                                $mediaArticle->brand, $mediaArticle->sub_cat,
                                $mediaArticle->main_ind, $mediaArticle->sub_ind,
                                $mediaArticle->headline, Request::root() . '/media/export/download/VT_818_' . $mediaArticle->filename . '.pdf',
                                $mediaArticle->media_title, $mediaArticle->media_type,
                                $mediaArticle->program, $mediaArticle->lang, $mediaArticle->circulation,
                                $mediaArticle->readership_type, $mediaArticle->section,
                                $mediaArticle->page, $mediaArticle->article_size_duration,
                                $mediaArticle->total_size, $mediaArticle->AdValue,
                                $mediaArticle->mention, $mediaArticle->prvalue,
                                $mediaArticle->roi, $mediaArticle->tonality, $mediaArticle->journalist, $mediaArticle->source,
                                $mediaArticle->spoke, $mediaArticle->tone, $mediaArticle->gist,
                                $mediaArticle->paragraph, $mediaArticle->soe, $mediaArticle->paragraph_mentioned,
                                $mediaArticle->total_paragraph, $mediaArticle->soepicture, $mediaArticle->adve);
                        }

                        $sheet->fromArray($contentSheet1, null, 'A2', false, false);
                    });
            })->export($input['export_type']);
    }

    ///
    public function getExportDownload($file) {
        return Response::download(public_path() . '/report-pdf/' . $file);
    }
}