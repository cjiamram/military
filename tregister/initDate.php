<?php

header("content-type:application/json;charset=UTF-8");
//$date1=date_create($birthDate);
$currentDate=date("Y-m-d");
$pieces = explode("-", $currentDate);
$currentDate=$pieces[2]."-".$pieces[1]."-".$pieces[0];
$date1=date_create($currentDate);
date_add($date1,date_interval_create_from_date_string("525 years"));
//print_r($date1->format('Y-m-d'));
$strDate=$date1->format('d/m/Y');
echo json_encode(array("bDate"=>$strDate,"age"=>18));

?>