<?php
		include_once "../config/database.php";
		include_once "../objects/tattachment.php";
		$database=new Database();
		$db=$database->getConnection();
		$obj=new tattachment($db);

		$strT=$obj->getDocIframe(16,"01");
		echo $strT;


?>