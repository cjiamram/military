<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../config/database.php";
include_once "../objects/tattachment.php";
$database = new Database();
$db = $database->getConnection();
$obj = new tattachment($db);
$data = json_decode(file_get_contents("php://input"));
$docType = isset($_GET['docType']) ? $_GET['docType'] : "";
$regId = isset($_GET['regId']) ? $_GET['regId'] : 0;

$fileName=$obj->getFile($docType,$regId);
//unlink($fileName);
$flag=$obj->removeFile($docType,$regId);

if($flag){
		echo json_encode(array("message"=>true));
}
else{
		echo json_encode(array("message"=>false));
}
?>