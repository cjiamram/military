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
$keyword=isset($_GET["keyWord"])?$_GET["keyWord"]:"";
$path="tregister/getData.php?keyWord=".$keyword;
$url=$cnf->restURL.$path;
$api=new ClassAPI();
$data=$api->getAPI($url);
echo "<thead>";
		echo "<tr>";
			echo "<th>No.</th>";
			echo "<th>".$objLbl->getLabel("t_register","studentCode","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","studentName","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","personalId","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","birthYear","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","age","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","street","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","homeNo","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","mooNo","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","subDistrict","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","district","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","province","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","postalCode","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","fatherName","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","motherName","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","description","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","fatherTel","TH")."</th>";
			echo "<th>".$objLbl->getLabel("t_register","motherTel","TH")."</th>";
			echo "<th>จัดการ</th>";
		echo "</tr>";
echo "</thead>";
if($data!=""){
echo "<tbody>";
$i=1;
foreach ($data as $row) {
		echo "<tr>";
			echo '<td>'.$i++.'</td>';
			echo '<td>'.$row["studentCode"].'</td>';
			echo '<td>'.$row["studentName"].'</td>';
			echo '<td>'.$row["personalId"].'</td>';
			echo '<td>'.$row["birthYear"].'</td>';
			echo '<td>'.$row["age"].'</td>';
			echo '<td>'.$row["street"].'</td>';
			echo '<td>'.$row["homeNo"].'</td>';
			echo '<td>'.$row["mooNo"].'</td>';
			echo '<td>'.$row["subDistrict"].'</td>';
			echo '<td>'.$row["district"].'</td>';
			echo '<td>'.$row["province"].'</td>';
			echo '<td>'.$row["postalCode"].'</td>';
			echo '<td>'.$row["fatherName"].'</td>';
			echo '<td>'.$row["motherName"].'</td>';
			echo '<td>'.$row["description"].'</td>';
			echo '<td>'.$row["fatherTel"].'</td>';
			echo '<td>'.$row["motherTel"].'</td>';
			echo "<td>
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
?>
