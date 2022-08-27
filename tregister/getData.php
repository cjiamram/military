<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../config/database.php";
include_once "../objects/tregister.php";
$database = new Database();
$db = $database->getConnection();
$obj = new tregister($db);
$keyWord=isset($_GET["keyWord"]) ? $_GET["keyWord"] : "";
$stmt = $obj->getData($keyWord);
$num = $stmt->rowCount();
if($num>0){
		$objArr=array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				$objItem=array(
					"id"=>$id,
					"studentCode"=>$studentCode,
					"studentName"=>$studentName,
					"personalId"=>$personalId,
					"birthYear"=>$birthYear,
					"age"=>$age,
					"street"=>$street,
					"homeNo"=>$homeNo,
					"mooNo"=>$mooNo,
					"subDistrict"=>$subDistrict,
					"district"=>$district,
					"province"=>$province,
					"postalCode"=>$postalCode,
					"fatherName"=>$fatherName,
					"motherName"=>$motherName,
					"description"=>$description,
					"fatherTel"=>$fatherTel,
					"motherTel"=>$motherTel,
				);
				array_push($objArr, $objItem);
			}
			echo json_encode($objArr);
}
else{
			echo json_encode(array("message" => false));
}
?>