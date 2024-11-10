<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");
include("errors.php");
include("regis_db.php");

$errors = array();
if(isset($_POST['submit_login'])){
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	if (empty($username)) {
		array_push($errors, "username is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}
	
	if(count($errors) == 0){
		
		$query1 = "SELECT * from user where ( CardID = '$username' or Telephone = '$username') and password = '$password'";
		$query2 = "SELECT * from user where password = '$password'";
		$result1 = mysqli_query($con, $query1);
		$result2 = mysqli_query($con, $query2);

		if (mysqli_num_rows($result1) == 1 ){
			// เมื่อพบผู้ใช้งานโดยใช้เบอร์โทรศัพท์และรหัสผ่านที่ตรงกัน
			$row = mysqli_fetch_assoc($result1);
			$_SESSION['name'] = $row['Firstname'];
			$_SESSION['Lname'] = $row['Lastname'];
			$_SESSION['phone'] = $row['Telephone'];
			$_SESSION['cardID'] = $row['CardID'];
			$_SESSION['sex'] = $row['Sex'];
			$_SESSION['age'] = $row['Age'];
			$_SESSION['success'] = "You are now logged in";
			header('location: Profile.php');
		} else if (mysqli_num_rows($result2) == 1) {
			// เมื่อพบผู้ใช้งานโดยใช้รหัสผ่านที่ตรงกัน โดยไม่ได้ใช้เบอร์โทรศัพท์
			$row = mysqli_fetch_assoc($result2);
			$_SESSION['name'] = $row['Firstname'];
			$_SESSION['Lname'] = $row['Lastname'];
			$_SESSION['cardID'] = $row['CardID'];
			$_SESSION['phone'] = $row['Telephone'];
			$_SESSION['sex'] = $row['Sex'];
			$_SESSION['age'] = $row['Age'];
			$_SESSION['success'] = "You are now logged in";
			header('location: Profile.php');
		} else {
			// ถ้าไม่พบผู้ใช้งาน
			array_push($errors, "เบอร์/หมายเลขบัตรประชาชน หรือรหัสผ่านของคุณไม่ถูกต้อง");
			$_SESSION['error'] = "เบอร์/หมายเลขบัตรประชาชน หรือรหัสผ่านของคุณไม่ถูกต้อง";
			header('location: login.php');
		}

	}
}
?>