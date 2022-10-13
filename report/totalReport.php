<?php
		header("content-type:text/html;charset=UTF-8");
		
		include_once "../config/database.php";
		include_once "../objects/tregister.php";
		include_once "../objects/manage.php";

		$database=new Database();
		$db=$database->getConnection();
		$obj=new tregister($db);

		$id=isset($_GET["id"])?$_GET["id"]:14;
		//$obj->id=$id;
		$stmt=$obj->getDataById($id);
		if($stmt->rowCount()>0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			$studentCode=$studentCode;
			$fullName=$studentName;
			$age=$age;
			$personId=$personalId;
			$birthDate=Format::getSystemDate($birthDate);
			$homeNo=$homeNo;
			$road=$street;
			$mooNo=$mooNo;
			$subDistric=$subDistrict;
			$district=$district;
			$province =$province;
			$fatherName=$fatherName;
			$fatherTel=$fatherTel;
			$motherName=$motherName;
			$motherTel=$motherTel;
			$eduLevel=$eduLevel;
			$eduProgram=$eduProgram;
			$registYear=$registYear;
			$eduType=$eduType;
			$everRequest=$everRequest;
			$everSchool=$everSchool;
			$registYear=$registYear;
			$telNo=$telNo;



		}else{
			$fullName="..............................................";
			$age="...........";
			$personId="..............................................";
			$birthDate="....../....../.........";
			$homeNo="..........."; 
			$road="...........";
			$mooNo="...........";
			$subDistric="..............................................";
			$district="..............................................";
			$province="..............................................";
			$road="..............................................";
			$fatherName="..............................................";
			$motherName="..............................................";
			$fatherTel="..............................................";
			$motherTel="..............................................";
			$eduLevel="01";
			$eduProgram=$eduProgram;
			$registYear=date("Y")+543;
			$eduType="01";
			$everRequest=0;
			$everSchool="..............................................";


		}



?>



<html>
  <!--<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">-->

<style>

/* rest of your styles; like: */






body { margin: 30px; } 

.font-title {
    font-family: 'TH Sarabun';
    font-size:20pt;
    src: url('thsarabunnew_bolditalic-webfont.eot');
    src: url('thsarabunnew_bolditalic-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew_bolditalic-webfont.woff') format('woff'),
         url('thsarabunnew_bolditalic-webfont.ttf') format('truetype');
    font-weight: bold;

}

.font-head {
    font-family: 'TH Sarabun';
    font-size:18pt;
    src: url('thsarabunnew_bolditalic-webfont.eot');
    src: url('thsarabunnew_bolditalic-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew_bolditalic-webfont.woff') format('woff'),
         url('thsarabunnew_bolditalic-webfont.ttf') format('truetype');
    font-weight: bold;

}

.font-topic {
    font-family: 'TH Sarabun';
    font-size:15pt;
    
    font-weight: bold;

}


table, td, th {
  border: 1px solid #f4f4f4;;

}



html, body, form, fieldset, table, tr, td, span, img {
    margin: 0;
    padding: 0;
    font-size:15pt;
    font: 100%/150% 'TH Sarabun';
    src: url('thsarabunnew_bolditalic-webfont.eot');
    src: url('thsarabunnew_bolditalic-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew_bolditalic-webfont.woff') format('woff'),
         url('thsarabunnew_bolditalic-webfont.ttf') format('truetype');
}



/*** custom checkboxes ***/

</style>
<body>
<table style='height:842px;width:850px' border='1'>
<tr>
<td valign='top'>
	<table width='100%'>
		<tr>
			<td width='100px'>
				<img src="../img/Royal.jpg" style="width:100px;height:100px">
			</td>
			<td align='center' valign='bottom'>
				

			</td>
		</tr>
		<tr>
			<td colspan='2' align='center'><span class='font-title'>บันทึกข้อความ</span></td>
		</tr>
		

		<tr>
		
		<td colspan="2">
			
		<table width='100%'>
		<tr>
			<td width='150px'>
				<span class='font-topic'>ส่วนราชการ</span>
			</td>
			<td>&nbsp;&nbsp;<span>กองพัฒนานักศึกษา  มหาวิทยาลัยราชภัฏนครราชสีมา</span>
			</td>
		</tr>
		<tr>
				<td width='150px'>
				<span class='font-topic'>เรียน</span>
				</td>
				<td>&nbsp;&nbsp;<span>อธิการบดีมหาวิทยาลัยราชภัฎนครราชสีมา</span>
				</td>
		</tr>
		<tr>
			<td width='150px'>
				<span class='font-topic'>เรื่อง</span>
			</td>
			<td>&nbsp;&nbsp;ขอผ่อนผันตรวจเลือกเข้ารับราชการทหาร	
			</td>
		</tr>			
		
		</table>	
		</td>
		</tr>

		


		<tr>
		<td colspan='2'>
		<table width='100%'>
			<tr>
				<td align='right' width='100px'>
					<span >ข้าพเจ้า</span>
				</td>
				<td ><?=$fullName?>
				</td>
				<td align='right' width='200px'>
					เลขบัตรประจำตัวประชาชน
				</td>
				<td align='center'><?=$personId?>
				</td>
			</tr>

		</table>
		</td>
		</tr>

		<tr>
		<td colspan='2'>
		<table width='100%'>
			<tr>
				<td align='right' width='200px'>
					<span >วัน/เดือน/ปี เกิด</span>
				</td>
				<td width='250px' align='center'><?=$birthDate?>
					
				</td>
				<td align='right' width='100px'>
					อายุ
				</td>
				<td align='center'><?=$age?>
					
				</td>
				<td width='50px'>ปี
					
				</td>
			</tr>

		</table>
		</td>
		</tr>
		<tr>
			<td colspan='2'>
			<table width='100%'>
			<tr>
				<td width='70px'>นักศึกษา
				</td>
				<td>
					<?php
						if ($eduType==="01") 
							echo "<img src='../img/16C.png' width='16px'>";
						else
							echo "<img src='../img/16U.png' width='16px'>";


						//<i class="icon-check-empty"></i> icon-check-empty
					?>
					ภาคปกติ ชั้นปีที่<label></label>
					
				
				</td>
				<td><?php 
					 if($eduType==="02")
							echo "<img src='../img/16C.png' width='16px'>";
						else
							echo "<img src='../img/16U.png' width='16px'>";


					?>ภาค กศ.ปช.<label></label> 
				</td>
				<td><?php
					if($eduType==="03") 
							echo "<img src='../img/16C.png' width='16px'>";
						else
							echo "<img src='../img/16U.png' width='16px'>";


					?>ปริญญาโท รุ่นที่ <label></label> 
				</td>
			</tr>
			
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
					<table width='100%'>
					<tr>
					<td>
						สาขาวิชา
					</td>
					<td><label id="obj_Major"><?=$eduProgram?></label>
						
					</td>
					<td>
						รหัสประจำตัวนักศึกษา
					</td>
					<td><label id="obj_studentCode"><?=$studentCode?></label>
						
					</td>
					<td>
						หมายเลขโทรศัพท์
					</td>
					<td><label id="obj_telNo"><?=$telNo?></label>	
					</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<table width="100%">
			<tr>
			<td>ระดับ
			</td>
			<td>
			<?php 
				if($eduLevel==="01")
					echo "<img src='../img/16C.png' width='16px'>";
				else
					echo "<img src='../img/16U.png' width='16px'>";


			 	echo "ปริญญาตรี  4 ปี";
			 ?>
			</td>
			<td>
				<?php 
				if($eduLevel==="02")
					echo "<img src='../img/16C.png' width='16px'>";
				else
					echo "<img src='../img/16U.png' width='16px'>";

			 	echo "ปริญญาตรี  5 ปี";
			 ?>
			</td>
			<td>
				<?php 
				if($eduLevel==="03")
					echo "<img src='../img/16C.png' width='16px'>";
				else
					echo "<img src='../img/16U.png' width='16px'>";


			 	echo "ปริญญาตรี  2  ปี (ต่อเนื่อง/เทียบโอน)";
			 ?>
			</td>		
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<p><?php	
						for($i=0;$i<20;$i++)
							echo "&nbsp;";
					?>

				มีความประสงค์ขอให้มหาวิทยาลัย ฯ ทำการขอผ่อนผันการตรวจเลือกทหารกองเกินเข้ารับราชการทหาร              
				กองประจำการในคราวที่มีคนพอ ตามมาตรา 29 (3) แห่งพระราชบัญญัติรับราชหารทหาร พ.ศ.2497 เนื่องจากข้าพเจ้า
				มีกำหนดที่ต้องเข้ารับการตรวจเลือกเข้ารับราชการทหาร ตามกำหนดในหมายเรียกฯ ของนายอำเภอภูมิลำเนาทหาร         
				ประจำปี พ.ศ. <?php echo $registYear;?></p>
			</td>
		</tr>
		<tr>
		<tr>
			<td colspan="2">
				<?php 
					if($everRequest===1)
					{
						for($i=0;$i<20;$i++)
							echo "&nbsp;";
						echo '<img src=\'../img/16C.png\' width=\'16px\'>';

					}else{
						for($i=0;$i<20;$i++)
							echo "&nbsp;";
						echo '<img src=\'../img/16U.png\' width=\'16px\'>';
					}	
					echo 'ข้าพเจ้าไม่เคยขอผ่อนผันมาก่อน';
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
					$everYear=date("Y")+543; 
					$everSchool="มหาวิทยาลัยราชภัฏนครราชสีมา";
					if($everRequest!==1){
						for($i=0;$i<20;$i++)
							echo "&nbsp;";
						echo '<img src=\'../img/16C.png\' width=\'16px\'>';
					}
					else
					{
						for($i=0;$i<20;$i++)
							echo "&nbsp;";
						echo '<img src=\'../img/16U.png\' width=\'16px\'>';
					}


					echo 'ข้าพเจ้าเคยขอผ่อนผันมาแล้ว '.$registYear. " ณ.สถานศึกษา ".$everSchool;
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
					echo "&nbsp;&nbsp;&nbsp;<span style='font-weight:bold'>ภูมิลำเนาทหาร</span> (ตาม สด.9)  ของข้าพเจ้าบ้านเลขที่ ".$homeNo." หมู่ที่  ".$mooNo."  ถนน/ตรอก ".$road."\n";  
				?>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<?php
					echo "ตำบล".$subDistric."อำเภอ".$district."จังหวัด ".$province;
				?> 
			</td>
		</tr>
		<tr>
		<td colspan="2">
			<table width='100%'>
				<tr>
				<td width='150px'>&nbsp;
					ชื่อ - สกุล (บิดา)
				</td>
				<td>&nbsp;<?=$fatherName?>
				</td>
				<td width='150px'>หมายเลขโทรศัพท์
				</td>
				<td>
					&nbsp;<?=$fatherTel?>
				</td>
				</tr>
				<tr>
				<td width='150px' >&nbsp;
					ชื่อ - สกุล (มารดา)
				</td>
				<td>&nbsp;<?=$motherName?>
				</td>
				<td width='150px'>หมายเลขโทรศัพท์
				</td>
				<td>
					&nbsp;<?=$motherTel?>
				</td>
				</tr>
			</table>

		</td>	
		</tr>
		
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;&nbsp;&nbsp;<span style='font-weight:bold'>หลักฐานที่ส่งประกอบขอผ่อนผันเข้ารับราชการทหาร</span></td>
		</tr>
		<tr>
			<td colspan="2">
				<table width='100%'>
					<tr>
						<td width="100px">
						</td>
						<td>1.	สำเนา สด.9 (ถ่ายหน้า – หลัง)
						</td>
						<td width="150px" align='center'>
							3 ฉบับ
						</td>
					</tr>
					<tr>
						<td width="100px">
						</td>
						<td >2.	สำเนา สด.35 (หมายเรียก) (ถ่ายหน้า – หลัง)
						</td>
						<td width="150px" align='center'>
							3 ฉบับ
						</td>
					</tr>
					<tr>
						<td width="100px">
						</td>
						<td >3.	สำเนาทะเบียนบ้าน	
						</td>
						<td width="150px" align='center'>
							3 ฉบับ
						</td>
					</tr>
					<tr>
						<td width="100px">
						</td>
						<td >4.	สำเนาการเปลี่ยนชื่อ - สกุล (ถ้ามี)
						</td>
						<td width="150px" align='center'>
							3 ฉบับ
						</td>
					</tr>
					<tr>
						<td width="100px">
						</td>
						<td >5.	สำเนาบัตรประจำตัวนักศึกษา 
						</td>
						<td width="150px" align='center'>
							1 ฉบับ
						</td>
					</tr>

					<tr>
						<td colspan='3'>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา
						</td>
					</tr>
					
					<tr>
					<td>&nbsp;
					</td>
					<td colspan="2">
						<table width='100%'>

							<tr><td align='center'>ขอแสดงความนับถือ</td></tr>
							<tr><td align='center'>&nbsp;</td></tr>
							<tr><td align='center'>&nbsp;</td></tr>
							<tr><td>
								<?php
									for($i=0;$i<45;$i++)
										echo "&nbsp;";
									echo "ลงชื่อ..............................................................ผู้ขอผ่อนผัน
"
								?>
							</td></tr>
							<tr>
							<td>
								<?php
									for($i=0;$i<53;$i++)
										echo "&nbsp;";
									echo "(...............................................................)  
";
								?>

							</td></tr>
						</table>
					</td>	
					</tr>
				</table>
			</td>
		</tr>
	</table>
</td>
</tr>
</table>


</body>

</html>