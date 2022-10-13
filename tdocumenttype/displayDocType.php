<?php
include_once "../config/config.php";
include_once "../objects/tdocumenttype.php";
include_once "../config/database.php";
include_once "../objects/classLabel.php";
include_once "../objects/tattachment.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
$database = new Database();
$db = $database->getConnection();
$objLbl = new ClassLabel($db);
$cnf=new Config();
$rootPath=$cnf->path;
$regId=isset($_GET["id"])?$_GET["id"]:0;

$obj = new tdocumenttype($db);
$stmt = $obj->getData();
$num = $stmt->rowCount();
$data=array();
if($num>0){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				$objItem=array(
					"id"=>$id,
					"code"=>$code,
					"description"=>$description,
				);
				array_push($data, $objItem);
			}

}


//$path="tdocumenttype/getData.php";
//$url=$cnf->restURL.$path;
//$api=new ClassAPI();
//$data=$api->getAPI($url);
$objAttach=new tattachment($db);
echo "<table id=\"tblDisplay\" class=\"table table-bordered table-hover\">\n";
echo "<thead>";
		echo "<tr>";
			echo "<th width='60px'>No.</th>";
			echo "<th width='60px'>Code</th>";
			echo "<th width=\"300px\">เอกสารแนบ</th>";
			echo "<th>Upload</th>";
			echo "<th>เอกสาร</th>";
			echo "<th>ลบ</th>";
			
		echo "</tr>";
echo "</thead>";
if($data!=""){
echo "<tbody>";
$i=1;

if(count($data)>0){

		foreach ($data as $row) {
					echo "<tr>";
					echo "<td>".$i++."</td>";
					echo '<td>'.$row["code"].'</td>';
					echo '<td>'.$row["description"].'</td>';
					echo "<td width=\"120px\"><a href='#' onclick=\"getFileId('".$row['code']."')\" class=\"btn btn-primary pull-center\" ><i class=\"fa fa-upload\">&nbsp;Upload</i></a></td>";
					$strFile=$objAttach->getFile($row['code'],$regId);
					if(strlen($strFile)){
						$files=explode("/", $strFile);
						$l=count($files);
						$file=$files[$l-1];
						$strFile="<a href='".$strFile."' target=\"_blank\"><i class=\"fa fa-file\" aria-hidden=\"true\">&nbsp;".$file."</i></a>\n";
					}else{
						$strFile="";
						$file="";
					}
					echo "<td>".$strFile."</td>";
					$strDel="<a href='#' onclick=\"removeFileByRegId('".$row['code']."')\" class='btn btn-danger pull-center'><i class=\"fa fa-trash\" ></i></a>\n";
					echo "<td width='80px'>".$strDel."</td>";
					echo "</tr>";
		}
}


echo "</tbody>";
echo "</table>";
}
?>
<script src="<?=$rootPath?>/bower_components/jquery/dist/jquery.min.js"></script>

