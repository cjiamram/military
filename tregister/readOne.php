<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once "../config/database.php";
include_once "../objects/tregister.php";

function getFormat($i){
			return sprintf('%02s',$i);
}

$database = new Database();
$db = $database->getConnection();
$obj = new tregister($db);
$data = json_decode(file_get_contents("php://input"));
$obj->id = isset($_GET['id']) ? $_GET['id'] : 0;
$stmt=$obj->readOne();
$num=$stmt->rowCount();


if($num>0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		$d = date_parse_from_format("Y-m-d", $birthDate);

		//$d["year"]."-".self::getFormat($d["month"])."-".self::getFormat($d["day"]);
		$birthDate=getFormat($d["day"])."/".getFormat($d["month"])."/".strval($d["year"]+543);
		$item = array(
			"id"=>$id,
			"studentCode" =>  $studentCode,
			"studentName" =>  $studentName,
			"personalId" =>  $personalId,
			"birthDate" =>  $birthDate,
			"age" =>  $age,
			"street" =>  $street,
			"homeNo" =>  $homeNo,
			"mooNo" =>  $mooNo,
			"subDistrict" =>  $subDistrict,
			"district" =>  $district,
			"province" =>  $province,
			"postalCode" =>  $postalCode,
			"fatherName" =>  $fatherName,
			"motherName" =>  $motherName,
			"description" =>  $description,
			"fatherTel" =>  $fatherTel,
			"motherTel" =>  $motherTel,
			"departmentCode"=>$departmentCode,
			"telNo"=>$telNo,
			"eduLevel"=>$eduLevel,
			"eduProgram"=>$eduProgram,
			"registYear"=>$registYear,
			"eduType"=>$eduType
		);
		/*\
			$obj->telNo=$data->telNo;
			$obj->eduLevel=$data->eduLevel;
			$obj->eduProgram=$data->eduProgram;
			$obj->registYear=$data->registYear;
		*/
}
echo(json_encode($item));
?>