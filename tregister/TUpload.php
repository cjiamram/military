<?php
	session_start();
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
	include_once "../config/config.php";
	
	$cnf=new Config();
	$rootPath=$cnf->path;
	?>

<input type="file" id="obj_file"><input type="button" id="btnUpload" value="Upload">

<input type="text" value="14" id="obj_id">
<script>
function uploadFile(){
		console.log($("#obj_file").val());
		if($("#obj_file").val()!=""){
              var file=$("#obj_file").val().split('\\').pop();
              console.log(file);
              var fileName =  "<?=$cnf->restURL?>uploads/"+$("#obj_id").val()+"/"+file;
              fileUpload("obj_file","../uploads/"+$("#obj_id").val());
              //addFile(fileName);
          }
	}

$("#btnUpload").click(function(){
	uploadFile();
});

</script>