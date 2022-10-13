<?php 
	$folder=isset($_GET["folder"])?$_GET["folder"]:0;
	$filename=isset($_GET["filename"])?$_GET["filename"]:"";
	$alias=isset($_GET["alias"])?$_GET["alias"]:"";
	$str="python3 pdf2img.py ".$folder." ".$filename." ".$alias;
	print_r($str);

	passthru($str);
	$output = ob_get_clean();
?>