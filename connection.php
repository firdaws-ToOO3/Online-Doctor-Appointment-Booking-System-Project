
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hospital1";
$con= mysqli_connect($hostname,$username, $password,$dbname) ;

if(!$con){
	die("Error: " . mysqli_connect_error($con));
}

?>