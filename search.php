<?php

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

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$sql = "SELECT * FROM department2 WHERE department LIKE '%" . $strKeyword . "%'";



$query = mysqli_query($conn,$sql);

?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

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
            width: 80%;
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

<center>
<br>
<h2>โรงพยาบาลส่งเสริมสุขภาพตำบลกะทู้</h2>
<br>
<br>

<table width="600" border="1">
  <tr>
    <th width="80"> <div align="center">แผนกที่ให้บริการ</div></th>
    <th width="200"> <div align="center">คำอธิบาย</div></th>
    <th width="80"> <div align="center">แพทย์ประจำแผนก</div></th>
    <th width="50"> <div align="center">วันออกตรวจ</div></th>
  </tr>

<?php
if($query) {
    // ดำเนินการใช้ mysqli_fetch_array() เมื่อการคิวรี่สำเร็จ
    while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        ?>
	  <tr>
		<td><div align="center"><?php echo $result["department"];?></div></td>
		<td><?php echo $result["Description"];?></td>
		<td><?php echo $result["physician"];?></td>
		<td><div align="center"><?php echo $result["Inspection_day"];?></div></td>
	  </tr>
	<?php
    }
} else {
    // แสดงข้อความหรือทำอะไรก็ตามเมื่อเกิดข้อผิดพลาดในการคิวรี่
    echo "ไม่พบข้อมูลที่ตรงกับเงื่อนไข";
}
?>
</table>
</center>
<<br>
<br>
<footer>
<div style="text-align:center;width:100%;">
    <a role="button2"  href="Profile.php?id='.$row['id'].'">กลับไปยังหน้าโปรไฟล์</a>
	<a role="button2"  href="javascript:history.go(-1);">กลับไปยังหน้าการจอง</a>
</div>
</footer>
<?php
mysqli_close($conn);
?>
