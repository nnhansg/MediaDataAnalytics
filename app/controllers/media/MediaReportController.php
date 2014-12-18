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

        return
        Excel::create($filenameExport, function ($excel) use($input) {
                $sheetName1 = 'Sheet1';

                $excel->sheet($sheetName1, function ($sheet) use($input) {
                        $sheet->setOrientation('landscape');
                        $sheet->setPageMargin(0.25);
                        $sheet->setAllBorders('thin');
                        $sheet->setAutoFilter('A2:AI2');
                        $sheet->row(1, array('MIS Report - ' . $input['company'] . ' (' . $input['from_date'] . ' - ' . $input['to_date'] . ')'));
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

                        $listMediaArticle = MediaArticle::whereRaw('company = ?', array($input['company']))->get();
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

                            $contentSheet1[] = array($mediaArticle->collected_data_date, $mediaArticle->main_cat, $mediaArticle->company,
                                $mediaArticle->brand, $mediaArticle->sub_cat,
                                $mediaArticle->main_ind, $mediaArticle->sub_ind,
                                $mediaArticle->headline, $mediaArticle->filename,
                                $mediaArticle->media_title, $mediaArticle->media_type,
                                '', $mediaArticle->lang, $mediaArticle->circulation,
                                $mediaArticle->readership_type, $mediaArticle->section,
                                $mediaArticle->page, $mediaArticle->article_size_duration,
                                $mediaArticle->total_size, $mediaArticle->AdValue,
                                $mediaArticle->mention, $mediaArticle->prvalue,
                                '', '', $mediaArticle->journalist, $mediaArticle->source,
                                $mediaArticle->spoke, $mediaArticle->tone, $mediaArticle->gist,
                                '', '', '', '', '', '');
                        }

                        $sheet->fromArray($contentSheet1, null, 'A2', false, false);
                    });
            })->export('xls');
    }
}