<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../config/database.php";
include_once "../objects/tgrace.php";
include_once "../objects/manage.php";
$database = new Database();
$db = $database->getConnection();
$obj = new tgrace($db);
$studentCode=isset($_GET["studentCode"]) ? $_GET["studentCode"] : "";
$stmt = $obj->getData($studentCode);
$num = $stmt->rowCount();
if($num>0){
		$objArr=array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
				$objItem=array(
					"id"=>$id,
					"studentCode"=>$studentCode,
					"graceYear"=>$graceYear,
					"createDate"=>Format::getTextDateBusdism($createDate),
					"adminAprove"=>$adminAprove,
					"description"=>$description,
					"graceNo"=>$graceNo,
					"everSchool"=>$everSchool
				);
				array_push($objArr, $objItem);
			}
			echo json_encode($objArr);
}
else{
			echo json_encode(array("message" => false));
}
?>