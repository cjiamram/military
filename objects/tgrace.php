<?php
include_once "keyWord.php";
class  tgrace{
	private $conn;
	private $table_name="t_grace";
	public function __construct($db){
            $this->conn = $db;
        	}
	public $studentCode;
	public $graceYear;
	public $createDate;
	public $adminAprove;
	public $description;
	public $graceNo;
	public $everSchool;
	public function create(){
		$query="INSERT INTO t_grace  
        	SET 
			studentCode=:studentCode,
			graceYear=:graceYear,
			createDate=:createDate,
			adminAprove=:adminAprove,
			description=:description,
			graceNo=:graceNo,
			everSchool=:everSchool
			";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":studentCode",$this->studentCode);
		$stmt->bindParam(":graceYear",$this->graceYear);
		$stmt->bindParam(":createDate",$this->createDate);
		$stmt->bindParam(":adminAprove",$this->adminAprove);
		$stmt->bindParam(":description",$this->description);
		$stmt->bindParam(":graceNo",$this->graceNo);
		$stmt->bindParam(":everSchool",$this->everSchool);
		$flag=$stmt->execute();
		return $flag;
	}
	public function update(){
		$query="UPDATE t_grace 
        	SET 
			studentCode=:studentCode,
			graceYear=:graceYear,
			createDate=:createDate,
			adminAprove=:adminAprove,
			description=:description,
			graceNo=:graceNo,
			everSchool=:everSchool
		 WHERE id=:id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":studentCode",$this->studentCode);
		$stmt->bindParam(":graceYear",$this->graceYear);
		$stmt->bindParam(":createDate",$this->createDate);
		$stmt->bindParam(":adminAprove",$this->adminAprove);
		$stmt->bindParam(":description",$this->description);
		$stmt->bindParam(":graceNo",$this->graceNo);
		$stmt->bindParam(":everSchool",$this->everSchool);
		$stmt->bindParam(":id",$this->id);
		$flag=$stmt->execute();
		return $flag;
	}
	public function readOne(){
		$query='SELECT  id,
			studentCode,
			graceYear,
			createDate,
			adminAprove,
			description,
			graceNo,
			everSchool
		FROM t_grace WHERE id=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id',$this->id);
		$stmt->execute();
		return $stmt;
	}
	public function getGraceNo($studenCode){
		$query="SELECT MAX(graceNo) AS graceNo FROM t_grace 
		WHERE studentCode=:studentCode";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':studentCode',$studentCode);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		return intval($row["graceNo"])+1;
		
	}

	public function updateEverSchool($everSchool,$studentCode){	
		$query="UPDATE t_register 
			SET 
				everSchool=:everSchool,
				everRequest=1
			WHERE studentCode=:studentCode
		";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(":studentCode",$studentCode);
		$stmt->bindParam(":everSchool",$everSchool);
		//print_r($everSchool);
		//print_r($studentCode);
		$flag=$stmt->execute();
		return $flag;

	} 

	public function getData($studentCode){
		$query='SELECT  id,
			studentCode,
			graceYear,
			createDate,
			adminAprove,
			description,
			graceNo,
			everSchool
		FROM t_grace WHERE studentCode LIKE :studentCode ORDER BY graceYear';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':studentCode',$studentCode);
		$stmt->execute();
		return $stmt;
	}
	function delete(){
		$query='DELETE FROM t_grace WHERE id=:id';
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
		$query ="SELECT MAX(CODE) AS MXCode FROM t_grace WHERE CODE LIKE ?";
		$stmt = $this->conn->prepare($query);
		$prefix="{$prefix}%";
		$stmt->bindParam(1, $prefix);
		$stmt->execute();
		return $stmt;
	}
}

?>