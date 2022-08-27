<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../config/database.php";
include_once "../objects/tdepartment.php";
$database = new Database();
$db = $database->getConnection();
$obj = new tdepartment($db);
$departmentCode = isset($_GET['departmentCode']) ? $_GET['departmentCode'] : "";
$stmt=$obj->getDepartmentName($departmentCode);
$num=$stmt->rowCount();
if($num>0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		$item = array(

			"departmentName" =>  $departmentName
		);
}
echo(json_encode($item));
?>