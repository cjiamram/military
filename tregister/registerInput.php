<?php
	session_start();
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-With");
	include_once "../config/database.php";
	include_once "../config/config.php";
	include_once "../objects/tregister.php";
	include_once "../objects/classLabel.php";
	$cnf=new Config();
	$rootPath=$cnf->path;
	$restURL=$cnf->restURL;
	$database = new Database();
	$db = $database->getConnection();
	$objLbl = new ClassLabel($db);
	$fullName=isset($_SESSION["FullName"])?$_SESSION["FullName"]:"";
	$userCode=isset($_SESSION["UserCode"])?$_SESSION["UserCode"]:"";
	$objReg=new tregister($db);
	$id=$objReg->getIdByStdCode($userCode);
	//print_r($userCode);
	$topic= $objLbl->getLabel("t_register","topic","th");

?>

<link type="text/css" href="<?=$rootPath?>/calendar/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?=$rootPath?>/calendar/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?=$rootPath?>/calendar/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/'
        + (d.getMonth() + 1) + '/'
        + (d.getFullYear() + 543);

				// Datepicker
		    $("#obj_birthDate").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});


		</script>
<section class="content-header">
	<h1>
        <b><?=$cnf->systemModule?></b>

        <small>>><?=$topic?></small>
      </h1>
<form role='form' method="post">
<input id="obj_id" type="hidden" value="<?=$id?>">
<input id="obj_docType" type="hidden" >
<div class="col-sm-12">
<div class="box">
<div class="box box-success">
		<div class="col-sm-12">
		 <div class="box-header with-border">
	      <h3 class="box-title"><b>ข้อมูลนักศึกษา</b></h3>
	      </div>
	     </div> 
		<div class='form-group'>
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","studentCode","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_studentCode' 
							 value='<?=$userCode?>'>
					</td>
					</tr>
				</table>
				
			</div>
			<div class="col-sm-4">
					<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","studentName","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_studentName' 
							placeholder='studentName' value='<?=$fullName?>'>
					</td>
					</tr>
				</table>
				
			</div>
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","personalId","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_personalId' 
							 placeholder="x-xxxx-xxxxx-xx-x">
					</td>
					</tr>
				</table>
				
			</div>
		</div>
		<div class='col-sm-12'>&nbsp;
		</div>

		<div class='form-group'>
			
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","birthYear","th").":" ?></label>
					</td>
					<td>
					
						<div class="form-group has-feedback">
						   
						    <input type="text" id="obj_birthDate" class="form-control date-picker" /> 
						    <i class="fa fa-calendar form-control-feedback" id="btnCal"></i>
						</div>
					</td>
					</tr>
				</table>

				
			</div>
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","age","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_age' 
							placeholder='age'>
					</td>
					</tr>
				</table>
				
			</div>
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","telNo","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_TelNo' 
							placeholder='Tel'>
					</td>
					</tr>
				</table>

				
				
			</div>
		</div>

		<div class="col-sm-12">
			  <div class="box-header with-border">
		         <h3 class="box-title"><b>ข้อมูลการศึกษา</b></h3>
		      </div>
		</div>
		<div class="col-sm-4">
			<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","eduType","th").":" ?></label>
					</td>
					<td>
						
						<select class="form-control" id='obj_eduType'></select>
					</tr>
				</table>
		</div>
		<div class="col-sm-8">&nbsp;
		</div>

		<div class="col-sm-12">&nbsp;</div>
		<div class="col-sm-4">
			<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","eduLevel","th").":" ?></label>
					</td>
					<td>
						
						<select class="form-control" id='obj_eduLevel'></select>
					</tr>
				</table>
		</div>
		<div class="col-sm-4">
			<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","departmentCode","th").":" ?></label>
					</td>
					<td>
						
						<select class="form-control" id='obj_departmentCode'></select>
					</tr>
				</table>
		</div>
		<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","eduProgram","th").":" ?></label>
					</td>
					<td>
						<input type="text" id="obj_eduProgram" class="form-control">
						
					</tr>
				</table>
		</div>
		
		<div class="col-sm-12">
			  <div class="box-header with-border">
		         <h3 class="box-title"><b>ภูมิลำเนาทหาร(ตาม สด.9)</b></h3>
		      </div>
		</div>
		<div class='form-group'>
			<div class="col-sm-4">
				
					<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","street","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_street' 
							placeholder='<?=$objLbl->getLabel("t_register","street","th")?>'>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","homeNo","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_homeNo' 
							placeholder='<?=$objLbl->getLabel("t_register","homeNo","th")?>'>
					</tr>
				</table>
				
			</div>
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","mooNo","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_mooNo' 
							placeholder='<?=$objLbl->getLabel("t_register","mooNo","th")?>'>
					</tr>
				</table>
				
			</div>
			
		</div>
		
		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-4">
			<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","subDistrict","th").":" ?></label>
					</td>
					<td>
						<input type="text" 
							class="form-control" id='obj_subDistrict' 
							placeholder='<?=$objLbl->getLabel("t_register","subDistrict","th")?>'>
					</tr>
				</table>
				
		</div>
		<div class="col-sm-8">
		</div>
		<div class='col-sm-12'>&nbsp;
		</div>
		
		<div class='form-group'>
			
			
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","province","th").":" ?></label>
					</td>
					<td>
						<select class="form-control" id='obj_province' ></select>
					</tr>
				</table>

				
			</div>
			
			<div class="col-sm-4">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","district","th").":" ?></label>
					</td>
					<td>
						<select class="form-control" id='obj_district' ></select>
					</tr>
				</table>



			</div>
			<div class="col-sm-4">
					<table width="100%">
					<tr>
					<td width='150px'>
						<label><?php echo $objLbl->getLabel("t_register","postalCode","th").":" ?></label>
					</td>
					<td>
							<input type="text" 
							class="form-control" id='obj_postalCode' 
							placeholder='<?=$objLbl->getLabel("t_register","postalCode","th")?>'>
					</tr>
				</table>
				
			</div>
		
		</div>
		
	
		<div class='col-sm-12'>&nbsp;
		</div>
		<div class="form-group">
		<div class="col-sm-4">
			<table width="100%">
				<tr>
				<td width='150px'>
					<label><?php echo $objLbl->getLabel("t_register","fatherName","th").":" ?></label>
				</td>
				<td>
						<input type="text" 
						class="form-control" id='obj_fatherName' 
						placeholder='<?=$objLbl->getLabel("t_register","fatherName","th")?>'>
				</tr>
			</table>
		</div>
		<div class="col-sm-4">
			<table width="100%">
				<tr>
				<td width='150px'>
					<label><?php echo $objLbl->getLabel("t_register","fatherTel","th").":" ?></label>
				</td>
				<td>
						<input type="text" 
						class="form-control" id='obj_fatherTel' 
						placeholder='<?=$objLbl->getLabel("t_register","fatherTel","th")?>'>
				</tr>
			</table>
		</div>
		<div class="col-sm-4">&nbsp;
		</div>
	   </div>
		<div class="col-sm-12">&nbsp;</div>

		<div class="form-group">
		<div class="col-sm-4">
			<table width="100%">
				<tr>
				<td width='150px'>
					<label><?php echo $objLbl->getLabel("t_register","motherName","th").":" ?></label>
				</td>
				<td>
						<input type="text" 
						class="form-control" id='obj_motherName' 
						placeholder='<?=$objLbl->getLabel("t_register","motherName","th")?>'>
				</tr>
			</table>
		</div>
		<div class="col-sm-4">
			<table width="100%">
				<tr>
				<td width='150px'>
					<label><?php echo $objLbl->getLabel("t_register","motherTel","th").":" ?></label>
				</td>
				<td>
						<input type="text" 
						class="form-control" id='obj_motherTel' 
						placeholder='<?=$objLbl->getLabel("t_register","motherTel","th")?>'>
				</tr>
			</table>
		</div>
		<div class="col-sm-12"><hr/>
		</div>
		<div class="form-group">
			
			<div class="col-sm-12">
				<table width="100%">
					<tr>
					<td width='150px'>
						<label ><?php echo $objLbl->getLabel("t_register","everRequest","th").":" ?></label>

					</td>
					<td width='50px'>
						<input type="checkbox"  class="form-check-input" id="obj_everRequest">
					</td>
					<td>
						<input type="text" id="obj_everSchool" class="form-control">

					</td>	
					</tr>
				</table>
			</div>
		</div>
		<div class="col-sm-12">&nbsp;</div>	
		<div class="form-group">
			<div class="col-sm-8">
				<table width="100%">
				<tr>
				<td width='150px'>
					<label><?php echo $objLbl->getLabel("t_register","description","th").":" ?></label>
				</td>
				<td>
						<textarea class="form-control" id='obj_description' rows="4" 
						style="width:100%"
						></textarea>
				</tr>
			</table>
			</div>
			<div class="col-sm-4">&nbsp;
			</div>
		</div>
		
	   </div>
	
	
		<div class="col-sm-12">&nbsp;</div>
		 <div class="modal-footer">

         			<a href="#" class="btn btn-primary pull-left" id="btnSave"><i class="fa fa-floppy-o" ></i>&nbsp;บันทึก </a>
         			<a href="#" class="btn btn-success pull-left" id="btnGrace"><i class="fa fa-fighter-jet" ></i>&nbsp;ขอผ่อนผันการเกณทหาร </a>
         			<a href="#" class="btn btn-info pull-left" id="btnPrint"><i class="fa fa-print" ></i>&nbsp;พิมพ์เอกสาร </a>
         			
          </div>
		
</div>

</div>
</div>

<div class="col-sm-12">
	<div class="box box-success">
	<div id="dvDocument" style="display:none">
	</div>
	</div>
</div> 

</form>
<div style="display:none">
	<input type="file" id="obj_file" accept="application/pdf" name="obj_file">
	
</div>
</section>

<script>




var input = document.getElementById('obj_birthDate');

  function getPDF(){
     var url="<?=$rootPath?>/report/genTotalPDF.php?id="+$("#obj_id").val();
     window.open(url);
  }

function getBirthDate(birthDate){
	var strDate="";
	for(i=0;i<birthDate.length;i++){
		switch(i){
			case 1:
				strDate+=birthDate[i]+"/";
				break;
			case 4:
				strDate+=birthDate[i]+"/";
				break;
			default:
				strDate+=birthDate[i];
				break;
		}
	}
	return strDate;
}
  
var dateInputMask = function dateInputMask(elm) {
  elm.addEventListener('keypress', function(e) {
    if(e.keyCode < 47 || e.keyCode > 57) {
      e.preventDefault();
    }
    
    var len = elm.value.length;
    
    // If we're at a particular place, let the user type the slash
    // i.e., 12/12/1212
    if(len !== 1 || len !== 3) {
      if(e.keyCode == 47) {
        e.preventDefault();
      }
    }
    
    // If they don't add the slash, do it for them...
    if(len === 2) {
      elm.value += '/';
    }

    // If they don't add the slash, do it for them...
    if(len === 5) {
      elm.value += '/';
    }
  });
};
  
dateInputMask(input);

var idInput = document.getElementById('obj_personalId');

function getIdMask(personalId){
	var strId="";
	//console.log(personalId);
	for(i=0;i<personalId.length;i++){
		switch(i){
			case 0:{
				strId+=personalId[i]+"-";
				break;}
			case 4:{
				strId+=personalId[i]+"-";
				break;}
			case 9:{
				strId+=personalId[i]+"-";
				break;}
			case 11:{
				strId+=personalId[i]+"-";
				break;}
			default:{
				strId+=personalId[i];
				break;}
		}		

	}
	//console.log(strId);
	return strId;
}

var idInputMask = function idInputMask(elm) {
  elm.addEventListener('keypress', function(e) {
    if(e.keyCode < 47 || e.keyCode > 57) {
      e.preventDefault();
    }
    
    var len = elm.value.length;
    
    // If we're at a particular place, let the user type the slash
    // i.e., 12/12/1212
    if(len !== 1 || len !== 3) {
      if(e.keyCode == 47) {
        e.preventDefault();
      }
    }
    
    // If they don't add the slash, do it for them...
    if(len === 1) {
      elm.value += '-';
    }

    // If they don't add the slash, do it for them...
    if(len === 6) {
      elm.value += '-';
    }

    // If they don't add the slash, do it for them...
    if(len === 12) {
      elm.value += '-';
    }

     if(len === 15) {
      elm.value += '-';
    }


  });
};


idInputMask(idInput);
	 
	function defaultDate(){
		var url="<?=$rootPath?>/tregister/initDate.php";
		var data=queryData(url);
		$("#obj_birthDate").val(data.bDate);
		$("#obj_age").val(data.age);
	}

	function checkPersonalID(id){
	    if(! IsNumeric(id)) return false;
	    if(id.substring(0,1)== 0) return false;
	    if(id.length != 13) return false;
	    for(i=0, sum=0; i < 12; i++)
	        sum += parseFloat(id.charAt(i))*(13-i);
	    if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
	    return true;
	}
	function IsNumeric(input){
	    var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
	    return (RE.test(input));
	}


	function setProvice(){
		var url="<?=$rootPath?>/province/listData.php";
		setDDLPrefix(url,"#obj_province","***จังหวัด***");
	}

	function setDistrict(province){
		var url="<?=$rootPath?>/district/listData.php?province="+province;
		setDDLPrefix(url,"#obj_district","***อำเภอ***");
	}


	function setFaculty(){
		var url="<?=$rootPath?>/tdepartment/getFaculty.php";
		setDDLPrefix(url,"#obj_departmentCode","***คณะ***");
	}


	function setEduLevel(){
		var url="<?=$rootPath?>/tedulevel/getData.php";
		setDDLPrefix(url,"#obj_eduLevel","***ระดับการศึกษา***");
	}

	function setEduType(){
		var url="<?=$rootPath?>/tstudenttype/getData.php";
		setDDLPrefix(url,"#obj_eduType","***นักศึกษาภาค***");
	}






	function createData(){
		var url='<?=$rootPath?>/tregister/create.php';
		jsonObj={
			studentCode:$("#obj_studentCode").val(),
			studentName:$("#obj_studentName").val(),
			personalId:getPersonalId(),
			birthDate:$("#obj_birthDate").val(),
			age:$("#obj_age").val(),
			street:$("#obj_street").val(),
			homeNo:$("#obj_homeNo").val(),
			mooNo:$("#obj_mooNo").val(),
			subDistrict:$("#obj_subDistrict").val(),
			district:$("#obj_district").val(),
			province:$("#obj_province").val(),
			postalCode:$("#obj_postalCode").val(),
			fatherName:$("#obj_fatherName").val(),
			motherName:$("#obj_motherName").val(),
			description:$("#obj_description").val(),
			fatherTel:$("#obj_fatherTel").val(),
			motherTel:$("#obj_motherTel").val(),
			description:$("#obj_description").val(),
			departmentCode:$("#obj_departmentCode").val(),
			telNo:$("#obj_TelNo").val(),
			eduLevel:$("#obj_eduLevel").val(),
			eduProgram:$("#obj_eduProgram").val(),
			eduType:$("#obj_eduType").val(),
			everRequest:$("#obj_everRequest").checked,
			everSchool:$("#obj_everSchool").val() 

		}
		var jsonData=JSON.stringify (jsonObj);
		var flag=executeData(url,jsonObj,false);
		return flag;
	}
	function updateData(){
			var url='<?=$rootPath?>/tregister/update.php';
			jsonObj={
				studentCode:$("#obj_studentCode").val(),
				studentName:$("#obj_studentName").val(),
				personalId:getPersonalId(),
				birthDate:$("#obj_birthDate").val(),
				age:$("#obj_age").val(),
				street:$("#obj_street").val(),
				homeNo:$("#obj_homeNo").val(),
				mooNo:$("#obj_mooNo").val(),
				subDistrict:$("#obj_subDistrict").val(),
				district:$("#obj_district").val(),
				province:$("#obj_province").val(),
				postalCode:$("#obj_postalCode").val(),
				fatherName:$("#obj_fatherName").val(),
				motherName:$("#obj_motherName").val(),
				description:$("#obj_description").val(),
				fatherTel:$("#obj_fatherTel").val(),
				motherTel:$("#obj_motherTel").val(),
				description:$("#obj_description").val(),
				departmentCode:$("#obj_departmentCode").val(),
				telNo:$("#obj_TelNo").val(),
				eduLevel:$("#obj_eduLevel").val(),
				eduProgram:$("#obj_eduProgram").val(),
				eduType:$("#obj_eduType").val(),
				everRequest:1,
				everSchool:$("#obj_everSchool").val(), 
				id:$("#obj_id").val()
			}
			var jsonData=JSON.stringify (jsonObj);
			//console.log(jsonData);
			var flag=executeData(url,jsonObj,false);
			return flag;
	}

	function clearData(){
			$("#obj_personalId").val("");
			$("#obj_birthYear").val("");
			$("#obj_age").val("");
			$("#obj_street").val("");
			$("#obj_homeNo").val("");
			$("#obj_mooNo").val("");
			$("#obj_subDistrict").val("");
			$("#obj_district").val("");
			$("#obj_province").val("");
			$("#obj_postalCode").val("");
			$("#obj_fatherName").val("");
			$("#obj_motherName").val("");
			$("#obj_description").val("");
			$("#obj_fatherTel").val("");
			$("#obj_motherTel").val("");
			$("#obj_departmentCode").val("");
			$("#obj_TelNo").val("");
			$("#obj_eduProgram").val("");
			$("#obj_eduLevel").val("");
			$("#obj_everRequest").checked(false);
			$("#obj_everSchool").val("");
			/*
				everRequest:$("#obj_everRequest").checked
			*/

   }


   function removeDocument(docType,regId){
   		//var url="<?=$rootPath?>/tattachment/";	
   }

	function saveData(){
		var flag;
		flag=true;
		if(flag==true){
			if(eval($("#obj_id").val())!==0){
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
				}).then((result)=>{
					

				});
		
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

	function getPersonalId(){
		personalId=$("#obj_personalId").val();
		strId="";
		for(i=0;i<personalId.length;i++){
			if(personalId[i]!=='-')
				strId+=String(personalId[i]);
		}
		return strId;
	}

	function isDate(str) {    
		  var parms = str.split(/[\.\-\/]/);
		  var yyyy = parseInt(parms[2],10);
		  var mm   = parseInt(parms[1],10);
		  var dd   = parseInt(parms[0],10);
		  var date = new Date(yyyy,mm-1,dd,0,0,0,0);
		  return mm === (date.getMonth()+1) && dd === date.getDate() && yyyy === date.getFullYear();
	}

	function readOne(id){
		if(id!=""){
		var url='<?=$rootPath?>/tregister/readOne.php?id='+id;
		console.log(url);
		data=queryData(url);
		//console.log(JSON.stringify(data));
		if(data!=""){
						$("#obj_studentCode").val(data.studentCode);
						$("#obj_studentName").val(data.studentName);
						$("#obj_age").val(data.age);
						$("#obj_street").val(data.street);
						$("#obj_homeNo").val(data.homeNo);
						$("#obj_mooNo").val(data.mooNo);
						$("#obj_subDistrict").val(data.subDistrict);
						$("#obj_province").val(data.province);
						setDistrict(data.province);
						$("#obj_district").val(data.district);
						$("#obj_postalCode").val(data.postalCode);
						$("#obj_fatherName").val(data.fatherName);
						$("#obj_motherName").val(data.motherName);
						$("#obj_description").val(data.description);
						$("#obj_fatherTel").val(data.fatherTel);
						$("#obj_motherTel").val(data.motherTel);
						$("#obj_id").val(data.id);
						$("#obj_personalId").val(getIdMask(data.personalId));
						$("#obj_departmentCode").val(data.departmentCode);
						$("#obj_TelNo").val(data.telNo);
						$("#obj_eduProgram").val(data.eduProgram);
						$("#obj_eduLevel").val(data.eduLevel);
						$("#obj_eduType").val(data.eduType);
						if(data.everRequest===1)
							//$("#obj_everRequest").checked(true);
							$('#obj_everRequest').attr('checked', true);
						else
							$('#obj_everRequest').attr('checked', false);

						$("#obj_everSchool").val(data.everSchool);
				}
			}
		}

	function displayDocument(){
		if($("#obj_id").val()!==""){
			$("#dvDocument").attr('style','display: block');
			var url="<?=$rootPath?>/tdocumenttype/displayDocType.php?id="+$("#obj_id").val();
			$("#dvDocument").load(url);
		}else{
			$("#dvDocument").attr('style','display: none');
		}
	}

	function getFileId(code){
		jQuery('#obj_file').trigger('click');
		$("#obj_docType").val(code);
	}

	function addFile(fName){
		var url="<?=$rootPath?>/tattachment/create.php";
		var jsonObj={
			fileName:fName,
			docType:$("#obj_docType").val(),
			registerId:$("#obj_id").val()
		}
		var flag=executeData(url,jsonObj,false);



		return flag;
	}

	function removeFile(){
		var url="<?=$rootPath?>/tattachment/removeFile.php?docType="+$("#obj_docType").val()+"&regId="+$("#obj_id").val();
		var flag=executeGet(url);
		return flag;
	}

	function removeFileByRegId(docType){

		swal.fire({
			title: "คุณต้องการที่จะลบข้อมูลนี้หรือไม่?",
			text: "***กรุณาตรวจสอบข้อมูลให้ครบถ้วนก่อนกดปุ่มตกลง",
			type: "warning",
			confirmButtonText: "ตกลง",
			cancelButtonText: "ยกเลิก",
			showCancelButton: true,
			showConfirmButton: true
		}).then((result)=>{
				var url="<?=$rootPath?>/tattachment/removeFile.php?docType="+docType+"&regId="+$("#obj_id").val();
				var flag=executeGet(url);
				displayDocument();
				return flag;
			}

		);

		return false;
	}

	




	function uploadFile(){
		if($("#obj_file").val()!=""){
			 
              var file=$("#obj_file").val().split('\\').pop();
              var ext=file.split('.').pop();
              if(ext==="pdf"){	
		              var fileName =  "<?=$cnf->restURL?>uploads/"+$("#obj_id").val()+"/"+file;
		              fileUpload("obj_file","../uploads/"+$("#obj_id").val());
		              removeFile();
		              addFile(fileName);
		              var cnvUrl="<?=$restURL?>tregister/convert.php?folder="+$("#obj_id").val()+"&filename="+file+"&alias="+$("#obj_docType").val();
					  flag =executeGet(cnvUrl);
			  }else{
			  		swal.fire({
						title: "เพิ่มได้เฉพาะไฟล์ .pdf เท่านั้น!",
						type: "error",
						buttons: [false, "ปิด"],
						dangerMode: true,
					});
			  }
          }
	}




	$(document).ready(function(){
		setProvice();
		setDistrict($("#obj_province").val());
		defaultDate();
		setFaculty();
		setEduLevel();
		setEduType();
		
		readOne($("#obj_id").val());
		displayDocument();
	


		if($("#obj_id").val()!==""){
			 readOne($("#obj_id").val());
		}

		$('#obj_file').change(function(){ 

			uploadFile(); 
			displayDocument();
		});

		$("#btnGrace").click(function(){
			var url="<?=$rootPath?>/tgrace/requestGrace.php";
			$("#dvMain").load(url);
		});

		

		$("#obj_birthDate").change(function(){
			if (isDate($("#obj_birthDate").val())===false){
				swal.fire({
						title: "วัน/เดือน/ปี(เกิด) ไม่ถูกต้อง",
						type: "error",
						buttons: [false, "ปิด"],
						dangerMode: true,
						}).then((result)=>{
							displayDocument();
							//return;
						});
			}
		});

		$("#obj_personalId").change(function(){
			
			personalId=getPersonalId();
			if(checkPersonalID(personalId)===false){
					swal.fire({
						title: "เลขบัตรประชาชนไม่ถูกต้อง",
						type: "error",
						buttons: [false, "ปิด"],
						dangerMode: true,
						}).then((result)=>{
							return;
						});
					
			}
		});

		$("#obj_birthDate").change(function(){
			var url="<?=$rootPath?>/tregister/dateDiff.php?birthDate="+$("#obj_birthDate").val();
			data=queryData(url);
			$("#obj_age").val(data.age);
		});

		$("#obj_everRequest").change(function(){
			if(this.checked===false){
				$("#obj_everSchool").val("");
				$("#obj_everSchool").attr("disabled", "disabled"); 
			}else{
			 	$("#obj_everSchool").removeAttr("disabled");
			 } 
		});

		$("#btnPrint").click(function(){
			getPDF();
		});


		$("#obj_province").change(function(){
			 setDistrict($("#obj_province").val());
		});
		$("#btnSave").click(function(){
			personalId=getPersonalId();
			if(checkPersonalID(personalId)===true){
				saveData();	
			}else{
				swal.fire({
						title: "เลขบัตรประชาชนไม่ถูกต้อง",
						type: "error",
						buttons: [false, "ปิด"],
						dangerMode: true,
						});
					}
				
		});
	});


	
</script>


