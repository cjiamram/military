<?php
	header ("Content-Type: application/json; charset=utf-8");
	session_start();
	require_once("lib/nusoap.php");
	$client = new nusoap_client("http://entrance.nrru.ac.th/nrruwebservice/nrruWebService_SSO.php?wsdl",true);
	$params = array(
		'userlogin' =>'chatchai.j' 
	);
	$data = $client->call("getUserLogin",$params);
	print_r($data); 


?>