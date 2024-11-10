<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");
include("errors.php");

$errors = array();
if(isset($_POST['submit_user'])){
	$username = mysqli_real_escape_string($con, $_POST['CardID']);
	$name = mysqli_real_escape_string($con, $_POST['Firstname']);
	$Lname = mysqli_real_escape_string($con, $_POST['Lastname']);
	$sex = mysqli_real_escape_string($con, $_POST['Sex']);
	$age = mysqli_real_escape_string($con, $_POST['Age']);
	$phone = mysqli_real_escape_string($con, $_POST['Telephone']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	
	if (empty($username)) {
		array_push($errors, "CardID is required");
	}
	if (empty($name)) {
		array_push($errors, "Firstname is required");
	}
	if (empty($Lname)) {
		array_push($errors, "Lastname is required");
	}
	if (empty($sex)) {
		array_push($errors, "Sex is required");
	}
	if (empty($age)) {
		array_push($errors, "Age is required");
	}
	if (empty($phone)) {
		echo array_push($errors, "Telephone is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}
	
	
	$user_check_query = "SELECT * from user where CardID = '$username' OR Telephone = '$phone'";
	$query1 = mysqli_query($con, $user_check_query);
	$result = mysqli_fetch_assoc($query1);
	
	if($result){
		if($result['CardID'] == $username){
			array_push($errors, "CardID alreary exists");
		}
		if($result['Telephone'] == $phone){
			array_push($errors, "Telephone alreary exists");
		}
	}
	
	if(count($errors) == 0){

		$sql = "INSERT INTO user (CardID, Firstname, Lastname, Sex, Age, Telephone, password) 
				VALUES ('$username', '$name', '$Lname', '$sex', '$age', '$phone', '$password')";
		$save = mysqli_query($con, $sql);
		mysqli_close($con);
		$_SESSION['cardID'] = $username;
		$_SESSION['name'] = $name;
		$_SESSION['Lname'] = $Lname;
		$_SESSION['sex'] = $sex;
		$_SESSION['age'] = $age;
		$_SESSION['phone'] = $phone;
		$_SESSION['password'] = $password;
		$_SESSION['success'] = "You are now logged in";
		header('location: Profile.php');
		
		
	}else{
			array_push($errors, "มีชื่อผู้ใช้นี้อยู่ในระบบอยู่แล้ว");
			$_SESSION['error'] = "มีชื่อผู้ใช้นี้อยู่ในระบบอยู่แล้ว";
			header('location: Regis.php');
		}
}

?>