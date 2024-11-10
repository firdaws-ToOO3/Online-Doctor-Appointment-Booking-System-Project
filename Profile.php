<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");
include("regis_db.php");
include("checkLogin.php");


	if(!isset($_SESSION['cardID'])){
		header('location: login.php');
	}if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['cardID']);
		header('location: login.php');
	}


// รับค่าที่ผู้ใช้ป้อนหรือเลือกจากฟอร์มจองคิว
/*
$hospital = ($_POST["hospital"] ?? "");
$department = ($_POST["department"] ?? "");
$date = ($_POST["date"] ?? "");
$time = ($_POST["time"] ?? "");
$symptom = ($_POST["symptom"] ?? "");

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO reservation (hospital, department, date, time, symptom) VALUES ('$hospital', '$department', '$date', '$time', '$symptom')";
$result = mysqli_query($con, $sql);

// ตรวจสอบการเพิ่มข้อมูล
if ($result) {
    echo "การจองสำเร็จ";
} else {
    echo "มีข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($con);
}


*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 10%;
  height: 250px; /* only for demonstration, should be removed */
  padding: 25px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 10px;
  width: 40%;
  height: 250px; /* only for demonstration, should be removed */
}
aside {
  float: left;
  padding: 20px;
  width: 50%;
  height: 250px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  padding: 30px;
  float: left;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article, aside {
    width: 100%;
    height: auto;
  }
}

button {
	  background-color: #04AA6D;
	  color: #ffffff;
	  border: none;
	  padding: 10px 20px;
	  font-size: 12px;
	  font-family: Arial;
	  cursor: pointer;
	  border-radius: 50px;
	}
table {
            border-collapse: collapse;
            width: 100%;
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
a[role="button"] {
  background-color: #3cb371; 
  color: white; 
  padding: 5px 15px; 
  text-decoration: none;
  border-radius: 5px; 
  cursor: pointer;
}

/* เมื่อลิงก์ถูกโฮเวอร์ */
a[role="button"]:hover {
  background-color: #005f6b; 
}
a[role="button2"] {
  background-color: #ff0000; 
  color: white; 
  padding: 5px 15px; 
  text-decoration: none; 
  border-radius: 5px; 
  cursor: pointer;
}

/* เมื่อลิงก์ถูกโฮเวอร์ */
a[role="button2"]:hover {
  background-color: #005f6b; /* เปลี่ยนสีพื้นหลังเมื่อโฮเวอร์ */
}

a[role="button3"] {
  background-color: #04AA6D; 
  color: white; 
  padding: 5px 8px; 
  text-decoration: none; 
  margin-bottom: 20px;

}
</style>
</head>
<body>

<?php if(isset($_SESSION['success'])): ?>
    <script>
        window.alert("<?php echo $_SESSION['success']; ?>");
    </script>
<?php		
    unset($_SESSION['success']);
 endif; ?>
<form name="frmSearch" method="POST" action="search.php" enctype='multipart/form-data'>
<header>

  <h2><img src="logonm.png" width="80" height="50"></h2>
	<input type="text" class="form-control"placeholder="ค้นหาแผนก"name="txtKeyword"id="txtKeyword" value="">
	<a role="button3"  href="search.php?txtKeyword=<?php echo isset($strKeyword) ? $strKeyword : ''; ?>">แสดงทั้งหมด</a>

</header>
</form>


<section>
  <nav>
	<h3>Profile</h3>
	<h4><img src="avatar.png" width="100" height="100"></h4>
    
  </nav>
  
  <article>
  <br>
  <br>
  <br>
    <h1></h1>
    <p></p>
	<?php if(isset($_SESSION['name']) and isset($_SESSION['Lname'])) : ?>
		<p>ชื่อ : <?php echo $_SESSION['name'];?> นามสกุล : <?php echo $_SESSION['Lname'];?></p>
		<?php endif ?>
		<?php if(isset($_SESSION['cardID']))  : ?>
		<p>หมายเลขบัตรประจำตัวประชาชน : <?php echo $_SESSION['cardID']; ?></p>
		<?php endif ?>
		<?php if(isset($_SESSION['phone']))  : ?>
		<p>เบอร์โทรศัพท์ : <?php echo $_SESSION['phone']; ?></p>
		<?php endif ?>
		<?php if(isset($_SESSION['sex']) and isset($_SESSION['age'])) : ?>
		<p>เพศ : <?php echo $_SESSION['sex'];?> อายุ : <?php echo $_SESSION['age'];?></p>
		<?php endif ?>
  </article>
  <aside>
 
<form action="report.php" method="post">
    <h3 style = "text-align: center;">ประวัติการจอง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  name = "submit_report" type="submit">Report/mont</button></h3>
    <?php
    // Fetch reservation data from the database
	$cardID = mysqli_real_escape_string($con, $_SESSION['cardID']);
    $result = mysqli_query($con, "SELECT * FROM reservation where CardID = '$cardID' order by date ASC ");

    // Check if there are any rows
if (mysqli_num_rows($result) > 0) {
    // Display reservation data in a table
    echo "<table>";
    echo "<thead><tr><th>วันที่</th><th>เวลา</th><th>อาการ</th><th>แผนก</th><th>แก้ไข/ลบ</th></tr></thead>";
    echo "<tbody>";

    // Fetch the first row to get the hospital value
    $firstRow = mysqli_fetch_assoc($result);
    echo "<tr>";
    echo "<td>" . $firstRow['date'] . "</td>";
    echo "<td>" . $firstRow['time'] . "</td>";
    echo "<td>" . $firstRow['symptom'] . "</td>";
    echo "<td>" . $firstRow['department'] . "</td>";
    echo '<td><a role="button" href="update.php?id=' . $firstRow['id'] . '">Update</a>';
    echo "&nbsp;&nbsp;";
    echo '<a role="button2" href="delete.php?id=' . $firstRow['id'] . '">Delete</a></td>';
    echo "</tr>";

    // Loop through the rest of the rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['symptom'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo '<td><a role="button" href="update.php?id=' . $row['id'] . '">Update</a>';
        echo "&nbsp;&nbsp;";
        echo '<a role="button2" href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";


    // Display the hospital value from the first row

	$_SESSION['hospital'] = $firstRow['hospital'];
	} else {
    echo "ไม่พบข้อมูล";
	}

  
    // Close the database connection
    mysqli_close($con);
    ?>
	
<br><br><br>
	<?php if(isset($_SESSION['cardID'])) : ?>
	<div style="text-align:right;width:100%;">
		<a role="button"  href="reseve.php?id='.$row['id'].'">จองคิว</a>
		<a role="button2"  href="Profile.php?logout='1'">Exit</a>
	</div>
	<?php endif ?>
</form>
</aside>
</section>
</body>
</html>


