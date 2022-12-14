<?php
include_once "keyWord.php";
class  tattachment{
	private $conn;
	private $table_name="t_attachment";
	public function __construct($db){
            $this->conn = $db;
        	}
	public $fileName;
	public $docType;
	public $registerId;
	public function create(){
		$query='INSERT INTO t_attachment  
        	SET 
			fileName=:fileName,
			docType=:docType,
			registerId=:registerId
	';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":fileName",$this->fileName);
		$stmt->bindParam(":docType",$this->docType);
		$stmt->bindParam(":registerId",$this->registerId);
		$flag=$stmt->execute();
		return $flag;
	}
	public function update(){
		$query='UPDATE t_attachment 
        	SET 
			fileName=:fileName,
			docType=:docType,
			registerId=:registerId
		 WHERE id=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":fileName",$this->fileName);
		$stmt->bindParam(":docType",$this->docType);
		$stmt->bindParam(":registerId",$this->registerId);
		$stmt->bindParam(":id",$this->id);
		$flag=$stmt->execute();
		return $flag;
	}
	public function readOne(){
		$query='SELECT  id,
			fileName,
			docType,
			registerId
		FROM t_attachment WHERE id=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id',$this->id);
		$stmt->execute();
		return $stmt;
	}


	public function getData($docType,$regId){
	
		$query='SELECT  id,
			fileName,
			docType,
			registerId
		FROM t_attachment 
		WHERE docType=:docType 
		AND registerId=:regId
		';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':docType',$docType);
		$stmt->bindParam(':regId',$regId);
		$stmt->execute();
		return $stmt;
	}

	public function getFile($docType,$regId){
	
		$query='SELECT  id,
			fileName,
			docType,
			registerId
		FROM t_attachment 
		WHERE docType=:docType 
		AND registerId=:regId
		';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':docType',$docType);
		$stmt->bindParam(':regId',$regId);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			return $fileName;
		}
		return "";
	}

	function getDoc($registerId,$docType){
		$query="SELECT fileName FROM t_attachment 
		WHERE registerId=:registerId 
		AND docType=:docType 
		";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(":registerId",$registerId);
		$stmt->bindParam(":docType",$docType);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			if($fileName!==""){
				$strT="<div style='width:842px;height:850'><img src='../uploads/".$registerId."/".$docType.".png' width='842px'></div>";
				return $strT;
			}
			return "";
		}
		return "";
		
	}

	function getDocIframe($registerId,$docType){
		$query="SELECT fileName FROM t_attachment 
		WHERE registerId=:registerId 
		AND docType=:docType 
		";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(":registerId",$registerId);
		$stmt->bindParam(":docType",$docType);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		//$strT="<embed src='".$fileName."#toolbar=0' width='842px' height='850px'"; 
 		//$strT.="type='application/pdf' frameBorder='0' scrolling='no'>";
 		$strT="<iframe id='fred' style='border:1px solid #666CCC' title='PDF in an i-Frame' src='".$fileName."#toolbar=0' frameborder='0' scrolling='auto' height='850' width='850' ></iframe>";
		return $strT;
	}


	
	function removeFile($docType,$regId){
		$query="DELETE FROM t_attachment 
		WHERE docType=:docType AND registerId=:regId";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':docType',$docType);
		$stmt->bindParam(':regId',$regId);
		$flag=$stmt->execute();
		return $flag;
	}

	function delete(){
		$query='DELETE FROM t_attachment WHERE id=:id';
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
		$query ="SELECT MAX(CODE) AS MXCode FROM t_attachment WHERE CODE LIKE ?";
		$stmt = $this->conn->prepare($query);
		$prefix="{$prefix}%";
		$stmt->bindParam(1, $prefix);
		$stmt->execute();
		return $stmt;
	}
}

?>