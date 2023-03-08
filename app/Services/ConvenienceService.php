<?php
/**
 * Created by PhpStorm.
 * User: trungtb
 * Date: 3/8/2023
 * Time: 11:33 AM
 */

namespace App\Services;


class ConvenienceService
{

    public function __construct()
    {

    }

    public function headerToCsv($arrayHeader, &$df)
    {
        unset($arrayHeader['index']);
        fprintf($df, chr(0xEF) . chr(0xBB) . chr(0xBF));
        fputcsv($df, array_values($arrayHeader));
    }

    public function writeDataToCsv($arrayHeader, $arrayValue): bool
    {
//        $this->download_send_headers("data_export_" . date("Y-m-d") . ".csv");
        // tạo thư mục lưu file nếu chưa có
//        if (!file_exists(storage_path('export-data/'))) {
//            mkdir(storage_path('export-data/'), 0777, true);
//        }

//        if (!file_exists($filePath)) {
//            $df = fopen($filePath, 'w');
//            $this->headerToCsv($arrayHeader, $df);
//        } else {
//            $df = fopen($filePath, "a");
//        }

        ob_start();
        $df = fopen("php://output", 'w');

        $this->headerToCsv($arrayHeader, $df);
        // Save file
        foreach ($arrayValue as $value) {
            $rowData = [];
            $value = (array)$value;
            foreach ($arrayHeader as $key => $header) {
                if ($key == 'index') {
                    continue;
                } else {
                    $rowData[] = $value[$key] ?? '';
                }
            }
            fprintf($df, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($df, $rowData);
        }

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . "data_export_" . date("Y-m-d") . ".csv" . '";');

        fpassthru($df);
        exit();
    }

    function download_send_headers($filename) {
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }

}