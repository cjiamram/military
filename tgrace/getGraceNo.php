<?php
	header("content-type:application/json;charset=UTF-8");
	include_once "../config/database.php";
	include_once "../objects/tgrace.php";
	$database=new Database();
	$db=$database->getConnection();
	$obj=new tgrace($db);
	$studentCode=isset($_GET["studentCode"])?$_GET["studentCode"]:"";
	$graceNo=$obj->getGraceNo($studentCode);
	echo json_encode(array("graceNo"=>$graceNo));

?>