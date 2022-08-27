<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../config/database.php";
include_once "../objects/district.php";
$database = new Database();
$db = $database->getConnection();
$obj = new district($db);
$province=isset($_GET["province"]) ? $_GET["province"] : "";
$stmt = $obj->listData($province);
$num = $stmt->rowCount();
if($num>0){
		$objArr=array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				$objItem=array(
					"id"=>$id,
					"code"=>$code,
					"disName_Th"=>$disName_Th,
					"disName_En"=>$disName_En,
					"prv_Code"=>$prv_Code,
				);
				array_push($objArr, $objItem);
			}
			echo json_encode($objArr);
}
else{
			echo json_encode(array("message" => false));
}
?>