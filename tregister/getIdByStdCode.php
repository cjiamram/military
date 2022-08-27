<?php
	header("content-type:application/json;charset=UTF-8");
	include_once "../config/config.php";
	include_once "../config/database.php";
	include_once "../objects/tregister.php";

	$database=new Database();
	$db=$database->getConnection();
	$obj=new tregister($db);
	$stdCode=isset($_GET["stdCode"])?$_GET["stdCode"]:0;
	$id=$obj->getIdByStdCode($stdCode);
	echo json_encode(array("id"=>$id));

?>