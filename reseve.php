<?php 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reseve</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
  a[role="button3"] {
  background-color: #04AA6D; 
  color: white; 
  padding: 5px 8px; 
  text-decoration: none; 
  margin-bottom: 20px;
  border-radius: 5px;

}
</style>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <br>
 <form method = "POST" action = "reseve_db.php">
 <img src ="logonm.png"  width ="150" height="100">
 <h1 class = "mx-auto p-2 text-center">จองคิว</h1>
 <br>
 <br>
 <div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6"><label class="form-label" style="color: red;">*กรุณาตรวจสอบวันออกตรวจของแพทย์แต่ละแผนก ก่อนทำการจองคิว</label></div>
		<div class="col-3"></div> 
 </div>
	<br>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-5"><a role="button3"  href="search.php?txtKeyword=<?php echo isset($strKeyword) ? $strKeyword : ''; ?>">แสดงตารางวันออกตรวจทั้งหมด</a></div>
		<div class="col-4"></div> 

	</div>
	<br>
    <div class="row">
		<div class="col-3"></div>
		<div class="col-6">
<label class="form-label">รพ.สต</label>
<select class="form-control " name="hospital" required>
            <option value="" disabled="" selected="">โปรดระบุ</option>
            <option value="โรงพยาบาลส่งเสริมสุขภาพตำบลกะทู้">โรงพยาบาลส่งเสริมสุขภาพตำบลกะทู้</option>
</select>
</div> 
</div>

<br><br>
   <div class="row">
		<div class="col-3"></div>
		<div class="col-6">
<label class="form-label">แผนก</label>
<select class="form-control " name="department" required>
            <option value="" disabled="" selected="">โปรดระบุ</option>
            <option value="เวชกรรมทั่วไป">เวชปฏิบัติทั่วไป</option>
            <option value="ทันตกรรม">ทันตกรรม</option>
			<option value="สูตินรีเวช">สูตินรีเวช</option>
			<option value="กายภาพบำบัด">กายภาพบำบัด</option>	
            <option value="แพทย์แผนไทย">แพทย์แผนไทย</option>	
			<option value="Thai Traditional Medicine">Thai Traditional Medicine</option>
			
</select>
</div>
</div>
<br><br>

<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
 <head>วันที่จอง</head>
    <input type="date" name="date">

</div>
</div>
<br><br> 
<div class="row">
	<div class="col-3"></div>
	<div class="col-5"><a role="button3"  href="selectTime.php?txtKeyword=<?php echo isset($strKeyword) ? $strKeyword : ''; ?>">แสดงตารางเวลาจอง</a></div>
	<div class="col-4"></div> 
	</div>
<br>
<br>


<div class="row">
		<div class="col-3"></div>
		<div class="col-3">
		<label class="form-label">เวลาที่จอง</label>
		<input type="text" class="form-control" name = "time">
		</div>
	</div>
	
<br>
<br><br>

<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
ระบุอาการ: <textarea name="symptom" rows="5" cols="40"></textarea><br><br>
</div>
</div>

<div class="row ">
		<div class="col-3"></div>
			<div class="col-4">
				<input class="btn btn-success" type='button' value='Back' onclick='javascript:window.history.back()'>
			</div>
			
			<div class="col-4">
			<input  class="btn btn-danger" type="reset" value="Cancel">
			<button class="btn btn-primary" type="submit" name = "submit_reseve">Submit</button>
			</div>
		</div>
  </form>
</body>
</html>
