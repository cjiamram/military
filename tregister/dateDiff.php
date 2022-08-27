<?php
	header("Content-Type: application/json; charset=UTF-8");

	$birthDate=isset($_GET["birthDate"])?$_GET["birthDate"]:"";
	$pieces = explode("/", $birthDate);
	$birthDate=strval(intval($pieces[2])-543)."-".$pieces[1]."-".$pieces[0];
	//print_r($birthDate)
	//$birthDate=date_create($birthDate);
	$date1=date_create($birthDate);
	$currentDate=date("Y-m-d");
	
	$pieces = explode("-", $currentDate);
	$currentDate=$pieces[2]."-".$pieces[1]."-".$pieces[0];
	//print_r($currentDate)
	$date2=date_create($currentDate);
	$date2=date_create($currentDate);

	$diff=date_diff($date1,$date2);
	echo json_encode(array("age"=>$diff->y));
?>