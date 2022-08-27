var regDec = /^\d+(\.\d{1,2})?$/;
var regEmail=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
var regTel=/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g;
var regDate=/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/;
function validInput(){
		var flag=true;
		flag=regDec.test($("#obj_age").val());
		if (flag==false){
			$("#obj_age").focus();
			return flag;
}
		return flag;
}
function displayData(){
		var url="tregister/displayData.php?tableName=t_register&dbName=dbsodier&keyWord="+$("#txtSearch").val();
		$("#tblDisplay").load(url);
}
function createData(){
		var url='tregister/create.php';
		jsonObj={
			studentCode:$("#obj_studentCode").val(),
			studentName:$("#obj_studentName").val(),
			personalId:$("#obj_personalId").val(),
			birthYear:$("#obj_birthYear").val(),
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
			motherTel:$("#obj_motherTel").val()
		}
		var jsonData=JSON.stringify (jsonObj);
		var flag=executeData(url,jsonObj,false);
		return flag;
}
function updateData(){
		var url='tregister/update.php';
		jsonObj={
			studentCode:$("#obj_studentCode").val(),
			studentName:$("#obj_studentName").val(),
			personalId:$("#obj_personalId").val(),
			birthYear:$("#obj_birthYear").val(),
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
			id:$("#obj_id").val()
		}
		var jsonData=JSON.stringify (jsonObj);
		var flag=executeData(url,jsonObj,false);
		return flag;
}
function readOne(id){
		var url='tregister/readOne.php?id='+id;
		data=queryData(url);
		if(data!=""){
			$("#obj_studentCode").val(data.studentCode);
			$("#obj_studentName").val(data.studentName);
			$("#obj_personalId").val(data.personalId);
			$("#obj_birthYear").val(data.birthYear);
			$("#obj_age").val(data.age);
			$("#obj_street").val(data.street);
			$("#obj_homeNo").val(data.homeNo);
			$("#obj_mooNo").val(data.mooNo);
			$("#obj_subDistrict").val(data.subDistrict);
			$("#obj_district").val(data.district);
			$("#obj_province").val(data.province);
			$("#obj_postalCode").val(data.postalCode);
			$("#obj_fatherName").val(data.fatherName);
			$("#obj_motherName").val(data.motherName);
			$("#obj_description").val(data.description);
			$("#obj_fatherTel").val(data.fatherTel);
			$("#obj_motherTel").val(data.motherTel);
			$("#obj_id").val(data.id);
		}
}
function saveData(){
		var flag;
		flag=validInput();
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
			url="tregister/delete.php?id="+id;
			executeGet(url,false,"");
			displayData();
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
function clearData(){
			$("#obj_studentCode").val("");
			$("#obj_studentName").val("");
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
}
function genCode(){
		//var url="genCode.php";
		//var data=queryData(url);
		//return data.code;
}
