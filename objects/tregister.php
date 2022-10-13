<?php
include_once "keyWord.php";
class  tregister{
	private $conn;
	private $table_name="t_register";
	public function __construct($db){
            $this->conn = $db;
        	}
	public $studentCode;
	public $studentName;
	public $personalId;
	public $birthYear;
	public $birthDate;
	public $age;
	public $street;
	public $homeNo;
	public $mooNo;
	public $subDistrict;
	public $district;
	public $province;
	public $postalCode;
	public $fatherName;
	public $motherName;
	public $description;
	public $fatherTel;
	public $motherTel;
	public $departmentCode;
	public $telNo;
	public $eduLevel;
	public $eduProgram;
	public $registYear;
	public $eduType;
	public $everRequest;
	public $everSchool;



	public function getIdByStdCode($stdCode){
		$query="SELECT id FROM t_register 
		WHERE studentCode=:studentCode";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(":studentCode",$stdCode);
		$stmt->execute();
		
		if($stmt->rowCount()>0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			return $id;
		}else{
			return 0;
		}
		return 0;

	}

	/*public function isExist($stuentCode){
		$query="SELECT studentCode 
		FROM t_register WHERE studentCode";
	}*/



	public function create(){

	
		$query="INSERT INTO t_register  
        	SET 
			studentCode=:studentCode,
			studentName=:studentName,
			personalId=:personalId,
			birthYear=:birthYear,
			birthDate=:birthDate,
			age=:age,
			street=:street,
			homeNo=:homeNo,
			mooNo=:mooNo,
			subDistrict=:subDistrict,
			district=:district,
			province=:province,
			postalCode=:postalCode,
			fatherName=:fatherName,
			motherName=:motherName,
			description=:description,
			fatherTel=:fatherTel,
			motherTel=:motherTel,
			departmentCode=:departmentCode,
			telNo=:telNo,
			eduLevel=:eduLevel,
			eduProgram=:eduProgram,
			registYear=:registYear,
			eduType=:eduType,
			everRequest=:everRequest,
			everSchool=:everSchool";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":studentCode",$this->studentCode);
		$stmt->bindParam(":studentName",$this->studentName);
		$stmt->bindParam(":personalId",$this->personalId);
		$stmt->bindParam(":birthYear",$this->birthYear);
		$stmt->bindParam(":birthDate",$this->birthDate);
		$stmt->bindParam(":age",$this->age);
		$stmt->bindParam(":street",$this->street);
		$stmt->bindParam(":homeNo",$this->homeNo);
		$stmt->bindParam(":mooNo",$this->mooNo);
		$stmt->bindParam(":subDistrict",$this->subDistrict);
		$stmt->bindParam(":district",$this->district);
		$stmt->bindParam(":province",$this->province);
		$stmt->bindParam(":postalCode",$this->postalCode);
		$stmt->bindParam(":fatherName",$this->fatherName);
		$stmt->bindParam(":motherName",$this->motherName);
		$stmt->bindParam(":description",$this->description);
		$stmt->bindParam(":fatherTel",$this->fatherTel);
		$stmt->bindParam(":motherTel",$this->motherTel);
		$stmt->bindParam(":departmentCode",$this->departmentCode);
		$stmt->bindParam(":telNo",$this->telNo);
		$stmt->bindParam(":eduLevel",$this->eduLevel);
		$stmt->bindParam(":eduProgram",$this->eduProgram);
		$stmt->bindParam(":registYear",$this->registYear);
		$stmt->bindParam(":eduType",$this->eduType);
		$stmt->bindParam(":everRequest",$this->everRequest);
		$stmt->bindParam(":everSchool",$this->everSchool);


		$flag=$stmt->execute();
		$arr = $stmt->errorInfo();
		return $flag;
	}
	public function update(){
		$query='UPDATE t_register 
        	SET 
			studentCode=:studentCode,
			studentName=:studentName,
			personalId=:personalId,
			birthYear=:birthYear,
			birthDate=:birthDate,
			age=:age,
			street=:street,
			homeNo=:homeNo,
			mooNo=:mooNo,
			subDistrict=:subDistrict,
			district=:district,
			province=:province,
			postalCode=:postalCode,
			fatherName=:fatherName,
			motherName=:motherName,
			description=:description,
			fatherTel=:fatherTel,
			motherTel=:motherTel,
			departmentCode=:departmentCode,
			telNo=:telNo,
			eduLevel=:eduLevel,
			eduProgram=:eduProgram,
			registYear=:registYear,
			eduType=:eduType,
			everRequest=:everRequest,
			everSchool=:everSchool
		 WHERE id=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":studentCode",$this->studentCode);
		$stmt->bindParam(":studentName",$this->studentName);
		$stmt->bindParam(":personalId",$this->personalId);
		$stmt->bindParam(":birthYear",$this->birthYear);
		$stmt->bindParam(":birthDate",$this->birthDate);
		$stmt->bindParam(":age",$this->age);
		$stmt->bindParam(":street",$this->street);
		$stmt->bindParam(":homeNo",$this->homeNo);
		$stmt->bindParam(":mooNo",$this->mooNo);
		$stmt->bindParam(":subDistrict",$this->subDistrict);
		$stmt->bindParam(":district",$this->district);
		$stmt->bindParam(":province",$this->province);
		$stmt->bindParam(":postalCode",$this->postalCode);
		$stmt->bindParam(":fatherName",$this->fatherName);
		$stmt->bindParam(":motherName",$this->motherName);
		$stmt->bindParam(":description",$this->description);
		$stmt->bindParam(":fatherTel",$this->fatherTel);
		$stmt->bindParam(":motherTel",$this->motherTel);
		$stmt->bindParam(":departmentCode",$this->departmentCode);
		$stmt->bindParam(":telNo",$this->telNo);
		$stmt->bindParam(":eduLevel",$this->eduLevel);
		$stmt->bindParam(":eduProgram",$this->eduProgram);
		$stmt->bindParam(":registYear",$this->registYear);
		$stmt->bindParam(":eduType",$this->eduType);
		$stmt->bindParam(":everRequest",$this->everRequest);
		$stmt->bindParam(":everSchool",$this->everSchool);

		$stmt->bindParam(":id",$this->id);
		$flag=$stmt->execute();
		$arr = $stmt->errorInfo();
		return $flag;
	}

	
	public function readOne(){
		$query='SELECT  id,
			studentCode,
			studentName,
			personalId,
			birthDate,
			age,
			street,
			homeNo,
			mooNo,
			subDistrict,
			district,
			province,
			postalCode,
			fatherName,
			motherName,
			description,
			fatherTel,
			motherTel,
			departmentCode,
			telNo,
			eduLevel,
			eduProgram,
			registYear,
			eduType,
			everRequest,
			everSchool
		FROM t_register WHERE id=:id';
	
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id',$this->id);
		$stmt->execute();
		return $stmt;
	}

	public function getDataById($id){
		$query="SELECT  A.id,
			A.studentCode,
			A.studentName,
			A.personalId,
			A.birthDate,
			A.age,
			A.street,
			A.homeNo,
			A.mooNo,
			A.subDistrict,
			B.disName_TH AS district,
			C.prvName_TH AS province,
			A.postalCode,
			A.fatherName,
			A.motherName,
			A.fatherTel,
			A.motherTel,
			A.eduLevel,
			A.eduProgram,
			A.registYear,
			A.eduType,
			A.departmentCode,
			A.everRequest,
			A.everSchool,
			A.telNo,
			A.registYear
		FROM t_register A  INNER JOIN district B 
		ON A.district=B.code INNER JOIN province C 
		ON A.province=C.code 
		 WHERE A.id=:id";
	
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		return $stmt;
	}

	public function getData($keyWord){

		$query="SELECT  id,
			studentCode,
			studentName,
			personalId,
			birthYear,
			age,
			street,
			homeNo,
			mooNo,
			subDistrict,
			district,
			province,
			postalCode,
			fatherName,
			motherName,
			description,
			fatherTel,
			motherTel,
			telNo,
			eduLevel,
			eduProgram,
			registYear,
			everRequest,
			everSchool
		FROM t_register WHERE 
		CONCAT(studentCode,' ',studentName,' ',personalId) 
		LIKE :keyWord";
		$stmt = $this->conn->prepare($query);
		$keyWord="%{$keyWord}%";
		$stmt->bindParam(':keyWord',$keyWord);
		$stmt->execute();
		return $stmt;
	}
	function delete(){
		$query='DELETE FROM t_register WHERE id=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id',$this->id);
		$flag=$stmt->execute();
		return $flag;
	}
	public function genCode(){
		$curYear = date("Y")-2000+543;
		$curYear = substr($curYear,1,2);
		$curYear = sprintf("%02d", $curYear);
		$curMonth=date("n");
		$curMonth = sprintf("%02d",$curMonth);
		$prefix= $curYear .$curMonth;
		$query ="SELECT MAX(CODE) AS MXCode FROM t_register WHERE CODE LIKE ?";
		$stmt = $this->conn->prepare($query);
		$prefix="{$prefix}%";
		$stmt->bindParam(1, $prefix);
		$stmt->execute();
		return $stmt;
	}
}

?>