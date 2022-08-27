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
$data = json_decode(file_get_contents("php://input"));
$obj->id = isset($_GET['id']) ? $_GET['id'] : 0;
$stmt=$obj->readOne();
$num=$stmt->rowCount();
if($num>0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		$item = array(
			"id"=>$id,
			"code" =>  $code,
			"disName_Th" =>  $disName_Th,
			"disName_En" =>  $disName_En,
			"prv_Code" =>  $prv_Code
		);
}
echo(json_encode($item));
?>