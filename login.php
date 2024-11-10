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
    <title>Log in</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <br>
 <form method = "POST" action = "checkLogin.php" enctype='mulipart/form-data'>
 <img src ="logonm.png"  width ="150" height="100">
 <h1 class = "text-center">LOG IN</h1>
 <br>
  <center>
 <?php include("errors.php");?>
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
</center>
<br>
 <div class="container">
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
		<label class="form-label">เบอร์/หมายเลขบัตรประชาชน:</label>
		<input type="text" class="form-control" name = "username" id = "username">
		</div>
	</div>
<br>

<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
<label class="form-label">Password:</label>
<input type="password" class="form-control" name = "password"  id = "password" placeholder=" ">



<br>

<center>
<input  class="btn btn-danger" type="reset" value="Cancel">
<button class="btn btn-primary" type="submit" name = "submit_login" >OK</button>
<br><br>
<p>สมัครสมาชิก : <a  href="Regis.php">Register</a></p>
<center>
</div>
</div>

  </form>
</body>
</html>


