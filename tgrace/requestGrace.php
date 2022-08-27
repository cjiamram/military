<?php
      session_start();
      include_once '../config/database.php';
      include_once '../config/config.php';
      include_once '../objects/classLabel.php';
      $cnf=new Config();
      $rootPath=$cnf->path;
      $database = new Database();
      $db = $database->getConnection();
      $objLbl=new ClassLabel($db);

      function mb_basename($path) {
            if (preg_match('@^.*[\\\\/]([^\\\\/]+)([\\\\/]+)?$@s', $path, $matches)) {
                return $matches[1];
            } else if (preg_match('@^([^\\\\/]+)([\\\\/]+)?$@s', $path, $matches)) {
                return $matches[1];
            }
            return '';
      }
      $dir= getcwd();

      $lastPath=mb_basename($dir);
      $topic= $objLbl->getLabel("t_grace","topic","th");
      $userCode=isset($_SESSION["UserCode"])?$_SESSION["UserCode"]:"";
      //print_r($userCode);
      $fullName=isset($_SESSION["FullName"])?$_SESSION["FullName"]:"";


?>
<input type="hidden" id="obj_id" value="">
<section class="content-header">
	<h1>
        <b><?=$cnf->systemModule?></b>

        <small>>><?=$topic?></small>
      </h1>

<div class="box">
<div class="box box-success">
<table class="table table-bordered">
<tr><td>
		<div class='form-group'>
			<label class="col-sm-12"><?php echo $objLbl->getLabel("t_grace","studentCode","th").":" ?>/<?php echo $objLbl->getLabel("t_grace","studentName","th").":" ?></label>
			<div class="col-sm-2">
				<input type="text" 
							class="form-control" id='obj_studentCode' 
							value="<?=$userCode?>">
			</div>
			<div class="col-sm-10">
				<input type="text" 
							class="form-control" id='obj_studentName' 
							value="<?=$fullName?>">
			</div>
		</div>
		<div class='form-group'>
			<label class="col-sm-12"><?php echo $objLbl->getLabel("t_grace","graceYear","th").":" ?>/<?php echo $objLbl->getLabel("t_grace","description","th").":" ?></label>
			<div class="col-sm-2">
				<input type="text" 
							class="form-control" id='obj_graceYear' 
							value="<?=date("Y")+543?>"
							>
			</div>
			<div class="col-sm-10">
				<input type="text" 
							class="form-control" id='obj_description' 
							placeholder='<?=$objLbl->getLabel("t_grace","description","th")?>'>
			</div>
		</div>
		<div class='form-group'>
			<label class="col-sm-12"><?php echo $objLbl->getLabel("t_grace","graceNo","th").":" ?></label>
			<div class="col-sm-2">
				<input type="text" id="obj_graceNo" class="form-control" value="0">
			</div>
			<div class="col-sm-10">
			&nbsp;ครั้ง
			</div>
		</div>
		<div class="col-sm-12">&nbsp;</div>
		 <div class="modal-footer">
         			<a href="#" class="btn btn-primary pull-left" id="btnSave"><i class="fa fa-floppy-o" ></i>&nbsp;บันทึก </a>
         			
          </div>
	</td></tr>
	</table>	
		
</div>



</div>

<div class="box box-warning">
  <table id="tblDisplay" class="table table-bordered table-hover">
  </table>
</div>


</section>
<script src="<?=$rootPath?>/bower_components/jquery/dist/jquery.min.js"></script>

<script>
	function createData(){
			var url='tgrace/create.php';
			jsonObj={
				studentCode:$("#obj_studentCode").val(),
				graceYear:$("#obj_graceYear").val(),
				description:$("#obj_description").val(),
				graceNo:$("#obj_graceNo").val()
			}
			var jsonData=JSON.stringify (jsonObj);
			//console.log();
			var flag=executeData(url,jsonObj,false);
			return flag;
	}
	function updateData(){
			var url='tgrace/update.php';
			jsonObj={
				studentCode:$("#obj_studentCode").val(),
				graceYear:$("#obj_graceYear").val(),
				description:$("#obj_description").val(),
				graceNo:$("#obj_graceNo").val(),
				id:$("#obj_id").val()
			}
			var jsonData=JSON.stringify (jsonObj);
			var flag=executeData(url,jsonObj,false);
			return flag;
	}
	function readOne(id){
			var url='tgrace/readOne.php?id='+id;
			data=queryData(url);
			if(data!=""){
				$("#obj_studentCode").val(data.studentCode);
				$("#obj_graceYear").val(data.graceYear);
				$("#obj_description").val(data.description);
				$("#obj_graceNo").val(data.graceNo);
				$("#obj_id").val(data.id);
			}
	}
	function saveData(){
			var flag;
			flag=true;
			if(flag==true){
						if($("#obj_id").val()!=""){
				flag=updateData();
				}else{
				flag=createData();
			}
			if(flag==true){
				swal.fire({
				title: "การบันทึกข้อมูลเสร็จสมบูรณ์แล้ว",
				type: "success",
				buttons: [false, "ปิด"],
				dangerMode: true,
			});
			displayData();
			
			}
			else{
				swal.fire({
				title: "การบันทึกข้อมูลผิดพลาด",
				type: "error",
				buttons: [false, "ปิด"],
				dangerMode: true,
			});
			}
			}else{
				swal.fire({
				title: "รูปแบบการกรอกข้อมูลไม่ถูกต้อง",
				type: "error",
				buttons: [false, "ปิด"],
				dangerMode: true,
				});
				}
	}
	function confirmDelete(id){
			swal.fire({
				title: "คุณต้องการที่จะลบข้อมูลนี้หรือไม่?",
				text: "***กรุณาตรวจสอบข้อมูลให้ครบถ้วนก่อนกดปุ่มตกลง",
				type: "warning",
				confirmButtonText: "ตกลง",
				cancelButtonText: "ยกเลิก",
				showCancelButton: true,
				showConfirmButton: true
			}).then((willDelete) => {
			if (willDelete.value) {
				url="tgrace/delete.php?id="+id;
				executeGet(url,false,"");
				displayData();
				clearData();
			swal.fire({
				title: "ลบข้อมูลเรียบร้อยแล้ว",
				type: "success",
				buttons: "ตกลง",
			});
			} else {
				swal.fire({
				title: "ยกเลิกการทำรายการ",
				type: "error",
				buttons: [false, "ปิด"],
				dangerMode: true,
			})
			}
			});
	}

	function displayData(){
		var url="<?=$rootPath?>/tgrace/displayData.php?studentCode="+$("#obj_studentCode").val();
		//console.log(url);

		$("#tblDisplay").load(url);
	}

	function setGraceNo(){
		var url="<?=$rootPath?>/tgrace/getGraceNo.php?userCode="+$("#obj_studentCode").val();
		var data=queryData(url);
		$("#obj_graceNo").val(data.graceNo);
	}



	function clearData(){
				$("#obj_graceYear").val('<?=date("Y")+543?>');
				$("#obj_description").val("");
	}

	$(document).ready(function(){
		displayData();
		setGraceNo();
		$("#btnSave").click(function(){
			saveData();
			setGraceNo();

		});
	});
</script>