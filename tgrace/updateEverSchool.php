<?php
	header("content-type:application/json;charset=UTF-8");
	include_once "../config/database.php";
	include_once "../objects/tgrace.php";
	$database=new Database();
	$db=$database->getConnection();
	$data =json_decode(file_get_contents("php://input"));
	$obj=new tgrace($db);
	$studentCode=$data->studentCode;
	$everSchool=$data->everSchool;
	$flag=$obj->updateEverSchool($everSchool,$studentCode);
	echo json_encode(array("flag"=>$flag));

?>