<?php
	header ("Content-Type: application/json; charset=utf-8");

	session_start();
	require_once("lib/nusoap.php");
	include_once "config/database.php";
	include_once "objects/menu.php";
	$database = new Database();
	$db = $database->getConnection();
	$obj = new Menu($db);



	$userCode=isset($_GET["userCode"])?$_GET["userCode"]:"";
	$client = new nusoap_client("http://entrance.nrru.ac.th/nrruwebservice/nrruWebService_SSO.php?wsdl",true);
	$obj->setPrivillageDefault($userCode);
	$params = array(
		'userlogin' => $userCode
	);
	$data = $client->call("getUserLogin",$params); 
	$obj = json_decode($data);

	if($userCode===""){
		//header("location:messageNotify.php");
	}


	
	if(count($obj)>0){
		$user=$obj[0];
		if(intval($user->staffstatus)>0){
						$_SESSION["staffid"]=$user->staffid	;
						$_SESSION["UserCode"]=$user->username;
						$_SESSION["UserName"]=$user->username;
						$_SESSION["FullName"]=$user->firstname.' '.$user->lastname;
						$_SESSION["Picture"]=$user->picture;
						$_SESSION["programname"]=$user->departmentcode1;
						header("location:page.php");
						//print_r("Staff");
						//print_r($_SESSION["userCode"]);
		}
		else
		if($user->studentid!==""){
						$_SESSION["staffid"]=$user->studentid	;
						$_SESSION["UserCode"]=$user->username;
						$_SESSION["UserName"]=$user->username;
						$_SESSION["FullName"]=$user->studentname.' '.$user->studentsurname;
						$_SESSION["Picture"]=$user->picture;
						$_SESSION["programname"]=$user->programname;
						$_SESSION["StudentYear"]=$user->studentsetyear;
						$_SESSION["Faculty"]=$user->facultyname;
						//print_r("Student");
						header("location:page.php");
		} 


	}else{
		header("location:messageNotify.php");
	}
	

	

?>