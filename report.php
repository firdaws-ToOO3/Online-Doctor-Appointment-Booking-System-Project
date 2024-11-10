<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");
include("regis_db.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>report</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <br>
  <style>
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
	@media print {
            .no-print { display: none; }
        }
	</style>
 <form method = "POST" action = "report.php">
 <header>
 <center>
 <img src ="logonm.png"  width ="150" height="100">
  <br><br>
 <h3 class = "mx-auto p-2 text-center">ประวัติการจองคิวประจำเดือน</h3>
 <br>
 <h4 class = "mx-auto p-2 text-center">โรงพยาบาลส่งเสริมสุขภาพตำบลกะทู้</h4>
 <br><br>
 <?php
    // Fetch reservation data from the database
	$cardID = mysqli_real_escape_string($con, $_SESSION['cardID']);
    $result = mysqli_query($con, "SELECT * FROM reservation where CardID = '$cardID' order by date ASC ");
?>
 <div class="container">
		<div class="row">

			<div class="col-6">
				<label class="form-label">ชื่อ : &nbsp;&nbsp;<?php echo $_SESSION['name']?>&nbsp;&nbsp;&nbsp;&nbsp; นามสกุล : &nbsp;&nbsp;<?php echo $_SESSION['Lname'];?></label>
			</div>
			<div class="col-6">
				<label class="form-label">หมายเลขบัตรประชาชน :  <?php echo $_SESSION['cardID']?></label>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-6">
				<label class="form-label"><p> เพศ : &nbsp;&nbsp;<?php echo $_SESSION['sex']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อายุ :&nbsp;&nbsp; <?php echo $_SESSION['age'];?>&nbsp;&nbsp; ปี</p></label>
			</div>
		</div>
		<div class="row">
			<div class="col-5">
				<label class="form-label"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เบอร์โทรศัพท์ :&nbsp;&nbsp; <?php echo $_SESSION['phone']; ?></p></label>
			</div>
		</div>

		
		<div class="row">

			<div class="col-12">
		<?php
			if (mysqli_num_rows($result) > 0) {
        // Display reservation data in a table
				echo "<table>";
				echo "<thead><tr><th>วันที่</th><th>เวลา</th><th>อาการ</th><th>แผนก</th></tr></thead>";
				echo "<tbody>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['time'] . "</td>";
					echo "<td>" . $row['symptom'] . "</td>";
					echo "<td>" . $row['department'] . "</td>";
					echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
			} else {
				echo "ไม่พบข้อมูล";
			}
		// Close the database connection
			mysqli_close($con);
		?>
			</div>
		</div>
		<br><br>
		<div class="row">
		<div class="col-10"></div>		
		<div class="col-2">
		<input class="btn btn-success no-print" type="button" value="Back" onclick="window.location.href='Profile.php?id=<?php $_SESSION['cardID']?>'">
		<button class="btn btn-success no-print" onclick="window.print()">Print Report</button>
		</div>
	</Div>
</div>
 </center>
</header>
</body>
</html>

