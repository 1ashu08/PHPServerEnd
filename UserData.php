<?php

	include 'databaseConnection.php';
	
	class User
	{
		private $registration_number;
		private $CollegeId;
		private $college_address;
		private $user_address;
		private $registration_year;
		private $present_academic_year;
		private $branch;
		private $type;
		private $creation_date;
		private $last_change_date;
		private $user_id;
		private $password;
		
		public function setRegistrationNumber($registration_number){
			$this->registration_number = $registration_number;
		}
		public function getRegistrationNumber(){
			return $this->registration_number;
		}
		public function setCollegeId($CollegeId){
			$this->CollegeId = $CollegeId;
		}
		public function getCollegeId(){
			return $this->CollegeId;
		}
		public function setCollegeAddress($college_address){
			$this->college_address = $college_address;
		}
		public function getCollegeAddress(){
			return $this->college_address;
		}
		public function setUserAddress($user_address){
			$this->user_address = $user_address;
		}
		public function getUserAddress(){
			return $this->user_address;
		}
		public function setRegistrationYear($registration_year){
			$this->registration_year = $registration_year;
		}
		public function getRegistrationYear(){
			return $this->registration_year;
		}
		public function setPresentAcademicYear($present_academic_year){
			$this->present_academic_year = $present_academic_year;
		}
		public function getPresentAcademicYear(){
			return $this->present_academic_year;
		}
		public function setBranch($branch){
			$this->branch = $branch;
		}
		public function getBranch(){
			return $this->branch;
		}
		public function setType($type){
			$this->type = $type;
		}
		public function getType(){
			return $this->type;
		}
		public function setCreationDate($creation_date){
			$this->creation_date = $creation_date;
		}
		public function getCreationDate(){
			return $this->creation_date;
		}
		public function setLastChangeDate($last_change_date){
			$this->last_change_date = $last_change_date;
		}
		public function getLastChangeDate(){
			return $this->last_change_date;
		}
		public function setUserId($user_id){
			$this->user_id = $user_id;
		}
		public function getUserId(){
			return $this->user_id;
		}
		public function setPassword($password){
			$this->password = $password;
		}
		public function getPassword(){
			return $this->password;
		}
	}

	function createUser($user)
	{
		$conn=databaseConnect();				

		$sql = "INSERT INTO UserMasterRecord(registration_number,CollegeId,college_address,user_address,registration_year,present_academic_year,branch,type,user_id,password) VALUES('$user->getRegistrationNumber()','$user->getCollegeId()','$user->getCollegeAddress()','$user->getUserAddress()','$user->getRegistrationYear()','$user->getPresentAcademicYear()','$user->getBranch()','$user->getType()','$user->getUserId()','$user->getPassword()')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}        
		$conn->close();	
	}
	$user=new User();
	
	$user->setRegistrationNumber($_POST["registration_number"]);
	$user->setCollegeId($_POST["collegeId"]);
	$user->setCollegeAddress($_POST["college_address"]);
	$user->setUserAddress($_POST["user_address"]);
	$user->setRegistrationYear($_POST["registration_year"]);
	$user->setPresentAcademicYear($_POST["present_academic_year"]);
	$user->setBranch($_POST["branch"]);
	$user->setType($_POST["type"]);
	$user->setCreationDate($_POST["creation_date"]);
	$user->setLastChangeDate($_POST["last_change_date"]);	
	$user->setUserId($_POST["user_id"]);
	$user->setPassword($_POST["password"]);
	
	createUser($user);
	
	$conn=databaseConnect();	
	
	$sql = "SELECT * FROM Product";
	$result = $conn->query($sql);
	$stack = array();
	

	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
			$data=$row["Name"]."+".$row["Type"]."+".$row["Description"]."+".$row["Price"]."+".$row["Tax"]."+".$row["ImagePath"];
			array_push($stack,$data);		
		}
		
		$conn->close();	
		echo $stack;
	} 
	else {
		echo "0 results";
        }
	

?>

