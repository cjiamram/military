<?php
include_once "../config/config.php";
include_once "../lib/classAPI.php";
include_once "../config/database.php";
include_once "../objects/classLabel.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
$database = new Database();
$db = $database->getConnection();
$objLbl = new ClassLabel($db);
$cnf=new Config();
$studentCode=isset($_GET["studentCode"])?$_GET["studentCode"]:"";
$path="tgrace/getData.php?studentCode=".$studentCode;
$url=$cnf->restURL.$path;
//print_r($url);
$api=new ClassAPI();
$data=$api->getAPI($url);
echo "<thead>";
		echo "<tr>";
			echo "<th>No.</th>";
			echo "<th>".$objLbl->getLabel("t_grace","studentCode","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_grace","description","TH")."</th>";
			
			echo "<th>".$objLbl->getLabel("t_grace","graceYear","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_grace","createDate","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_grace","adminAprove","TH")."</th>";
			echo "<th>จัดการ</th>";
			
		echo "</tr>";
echo "</thead>";
if($data!=""){
echo "<tbody>";
$i=1;
if(!isset($data["message"])){
foreach ($data as $row) {
		echo "<tr>";
			echo '<td width="50px">'.$i++.'</td>';
			echo '<td width="200px">'.$row["studentCode"].'</td>';
			echo '<td>'.$row["description"].'</td>';
			echo '<td width="150px" align="center">'.$row["graceYear"].'</td>';
			echo '<td width="150px" align="center">'.$row["createDate"].'</td>';

			//$strAprove=($row["adminAprove"]===1)?"ตรวจสอบแล้ว":"ยังไม่ได้ตรส";
			$strAprove="";
			if(intval($row["adminAprove"])===1){
				$strAprove="ตรวจสอบแล้ว";
			}elseif(intval($row["adminAprove"])===0){
				$strAprove="ยังไม่ตรวจสอบ";
			}elseif(intval($row["adminAprove"])===2){
				$strAprove="ตรวจสอบไม่ผ่าน";
			}

			echo '<td>'.$strAprove.'</td>';
			
			echo "<td width=\"100px\">
			<button type='button' class='btn btn-info'
				data-toggle='modal' data-target='#modal-input'
				onclick='readOne(".$row['id'].")'>
				<span class='fa fa-edit'></span>
			</button>
			<button type='button'
				class='btn btn-danger'
				onclick='confirmDelete(".$row['id'].")'>
				<span class='fa fa-trash'></span>
			</button></td>";
			echo "</tr>";
}
echo "</tbody>";
}
}
?>
