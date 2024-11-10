<?php 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	include("connection.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
	<img src="logonm.png" width="150" height="100" style = "margin-top: 10px; margin-left: 30px;">
    <h1 class = "mx-auto p-2 text-center">Register</h1>
	<br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<form method = "POST" action = "regis_db.php" enctype='mulipart/form-data'>
	<?php include("errors.php");?>
	<center>
	<?php if(isset($_SESSION['error'])): ?>
		<div class="error">
			<h3>
				<?php 
					echo $_SESSION['error'];
					unset($_SESSION['error']);
				?>
			</h3>
		</div>
<?php endif ?>
<br><br>
	</center>
    <div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-3">
			<label class="form-label">ชื่อ</label>
			<input type="text" class="form-control" name = "Firstname" id = "Firstname" required>
			</div>
			<div class="col-3">
			<label class="form-label">นามสกุล</label>
			<input type="text" class="form-control" name = "Lastname" id = "Lastname" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-3">
			<label class="form-label">เพศ</label>
			<select name = "Sex"  id = "Sex" class="form-select" aria-label="Default select example" required>
				<option selected >โปรดระบุ</option>
				<option value="ชาย">ชาย</option>
				<option value="หญิง">หญิง</option>
			</select>
			</div>
			<div class="col-3">
			<label class="form-label">อายุ</label>
			<input type="text" class="form-control" name = "Age" id = "Age" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
			<label class="form-label">เบอร์โทรศัพท์</label>
			<input type="text" class="form-control" name = "Telephone" id = "Telephone" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
			<label class="form-label">สร้างรหัสผ่าน</label>
			<input type="text" class="form-control" name = "password"  id = "password" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
			<label class="form-label">เลขบัตรประจำตัวประชาชน</label>
			<input type="text" class="form-control" name = "CardID" id = "CardID" required>
			</div>
		</div>

		<br>
		<div class="row ">
			<div class="col-3"></div>
			<div class="col-4">
			<p>มีบัญชีอยู่แล้ว : <a  href="login.php">Log in</a></p></div>
			<div class="col-4">
			<input  class="btn btn-danger" type="reset" value="Cancel">
			<button class="btn btn-primary" type="submit" name="submit_user">Submit</button>
			</div>
		</div>
	</form>
  </body>
</html>