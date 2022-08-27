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
$data = json_decode(file_get_contents("php://input"));

$pieces = explode("/", $data->birthDate);
//print_r($data->birthYear);
$birthDate=strval(intval($pieces[2])-543)."-".$pieces[1]."-".$pieces[0];

$registYear=date("Y")+543;

$obj->studentCode = $data->studentCode;
$obj->studentName = $data->studentName;
$obj->personalId = $data->personalId;
$obj->birthYear = $pieces[2];
$obj->birthDate = $birthDate;
$obj->age = $data->age;
$obj->street = $data->street;
$obj->homeNo = $data->homeNo;
$obj->mooNo = $data->mooNo;
$obj->subDistrict = $data->subDistrict;
$obj->district = $data->district;
$obj->province = $data->province;
$obj->postalCode = $data->postalCode;
$obj->fatherName = $data->fatherName;
$obj->motherName = $data->motherName;
$obj->description = $data->description;
$obj->fatherTel = $data->fatherTel;
$obj->motherTel = $data->motherTel;
$obj->departmentCode = $data->departmentCode;
$obj->telNo=$data->telNo;
$obj->eduLevel=$data->eduLevel;
$obj->eduProgram=$data->eduProgram;
$obj->registYear=$registYear;
$obj->eduType=$data->eduType;


if($obj->create()){
		echo json_encode(array('message'=>true));
}
else{
		echo json_encode(array('message'=>false));
}
?>