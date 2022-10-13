<?php
include_once "../config/config.php";
require_once __DIR__ . '/vendor/autoload.php';
$str=__DIR__ . '/vendor/autoload.php';
include_once "../config/database.php";
include_once "../objects/tattachment.php";
$database=new Database();
$db=$database->getConnection();
$obj=new tattachment($db);


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

    for($i=0;$i<3;$i++){
        $strT=$obj->getDoc($id,"01");
        $mpdf->WriteHTML($strT);
        $mpdf->AddPage();
    }

     for($i=0;$i<3;$i++){
        $strT=$obj->getDoc($id,"02");
        $mpdf->WriteHTML($strT);
        $mpdf->AddPage();
    }

     for($i=0;$i<3;$i++){
        $strT=$obj->getDoc($id,"03");
        $mpdf->WriteHTML($strT);
        $mpdf->AddPage();
    }


    $blankpage=$mpdf->page+1;
    $mpdf->DeletePages($blankpage);

    $mpdf->Output();

} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception
    // name used for catch
    // Process the exception, log, print etc.
    echo $e->getMessage();
}


?>