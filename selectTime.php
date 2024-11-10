<?php
include("connection.php");

ini_set('display_errors', 1);
error_reporting(~0);

$strKeyword = null;

if(isset($_POST["txtKeyword"]))
{
    $strKeyword = $_POST["txtKeyword"];
}

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "hospital1";

$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$sql = "SELECT * FROM reservation WHERE date LIKE '%" . $strKeyword . "%' ORDER BY date ASC, time ASC";



$query = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Select time</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style the header */
header {
  background-color: #99FFCC;
  text-align: center;
  padding: 1px;
  color: white;
  width: 100%; 

}
table {
            border-collapse: collapse;
            width: 50%;
            border: 2px solid black; /* เพิ่มเส้นขอบของตาราง */
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #04AA6D; /* สีเขียวสำหรับแถวแรก */
            color: white;
        }
a[role="button2"] {
  background-color: #04AA6D; 
  color: white; 
  padding: 5px 8px; 
  text-decoration: none; 
  border-radius: 5px; 
  cursor: pointer;
}

/* เมื่อลิงก์ถูกโฮเวอร์ */
a[role="button2"]:hover {
  background-color: #005f6b; /* เปลี่ยนสีพื้นหลังเมื่อโฮเวอร์ */
}
</style>
<header>

  <h2><img src="logonm.png" width="80" height="50"></h2>

</header>
</head>
<body>
<br>
<a role="button2"  href="javascript:history.go(-1);">BACK</a>
<center>
<h2>ตารางแสดงเวลาจองทั้งหมด</h2>
<br>
<form name="frmSearchtime" method="POST" action="selectTime.php" enctype='multipart/form-data'>
	<input type="text" class="form-control"placeholder="ค้นหาวันที่ ปปปป/ดด/วว"name="txtKeyword"id="txtKeyword" value="">
</form>
<br>
<br>
<table>
    <thead>
        <tr>
            <th>วันที่</th>
            <th>เวลา</th>
            <th>อาการ</th>
            <th>แผนก</th>
        </tr>
    </thead>
    <tbody>
        <?php
			if(mysqli_num_rows($query) > 0) { 
				// ถ้ามีข้อมูลจะทำการแสดงผล
				while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td><div align=\"center\">" . $result["date"] . "</div></td>";
					echo "<td>" . $result["time"] . "</td>";
					echo "<td>" . $result["symptom"] . "</td>";
					echo "<td><div align=\"center\">" . $result["department"] . "</div></td>";
					echo "</tr>";
				}
			} else {
				// ถ้าไม่มีข้อมูลในฐานข้อมูล จะแสดงข้อความว่าไม่พบข้อมูล
				echo "ไม่พบคิวการจองในวันนี้";
			}
		?>
    </tbody>
</table>



</center>