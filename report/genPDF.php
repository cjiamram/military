<?php
include_once "../config/config.php";
require_once __DIR__ . '/vendor/autoload.php';
$str=__DIR__ . '/vendor/autoload.php';
$cnf=new Config();
$url=$cnf->restURL;
$rootPath=$cnf->path;
$id=isset($_GET["id"])?$_GET["id"]:0;


try {
    $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-P',
        'mode' => 'utf-8',
        'default_font_size' => 12,
        'default_font' => 'sarabun',
        'orientation' => 'P',
        'SetMargins' => '(0, 0, 0)',
        'tempDir' => __DIR__ . '/vendor/mpdf/mpdf/tmp'
    ]);

    $t=date("Y-m-h h:m:s");
    $url=$url."report/regReport.php?id=".$id;



    $html = file_get_contents($url);


    $mpdf->WriteHTML($html);
    $mpdf->AddPage();

    


    $mpdf->Output();

} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception
    // name used for catch
    // Process the exception, log, print etc.
    echo $e->getMessage();
}


?>