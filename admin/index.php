<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($_POST["submit"])) {
		$loginquery = "SELECT * FROM admin WHERE username='$username' && password='" . md5($password) . "'";
		$result = mysqli_query($db, $loginquery);
		$row = mysqli_fetch_array($result);

		if (is_array($row)) {
			$_SESSION["adm_id"] = $row['adm_id'];
			header("refresh:1;url=dashboard.php");
		} else {
			$message = "Invalid Username or Password!";
		}
	}
}

if (isset($_POST['submit1'])) {
	if (
		empty($_POST['cr_user']) ||
		empty($_POST['cr_email']) ||
		empty($_POST['cr_pass']) ||
		empty($_POST['cr_cpass']) ||
		empty($_POST['code'])
	) {
		$message = "ALL fields must be fill";
	} else {


		$check_username = mysqli_query($db, "SELECT username FROM admin where username = '" . $_POST['cr_user'] . "' ");

		$check_email = mysqli_query($db, "SELECT email FROM admin where email = '" . $_POST['cr_email'] . "' ");

		$check_code = mysqli_query($db, "SELECT adm_id FROM admin where code = '" . $_POST['code'] . "' ");


		if ($_POST['cr_pass'] != $_POST['cr_cpass']) {
			$message = "Password not match";
		} elseif (!filter_var($_POST['cr_email'], FILTER_VALIDATE_EMAIL)) // Validate email address
		{
			$message = "Invalid email address please type a valid email!";
		} elseif (mysqli_num_rows($check_username) > 0) {
			$message = 'username Already exists!';
		} elseif (mysqli_num_rows($check_email) > 0) {
			$message = 'Email Already exists!';
		}
		if (mysqli_num_rows($check_code) > 0)           // if code already exist 
		{
			$message = "Unique Code Already Redeem!";
		} else {
			$result = mysqli_query($db, "SELECT id FROM admin_codes WHERE codes =  '" . $_POST['code'] . "'");  //query to select the id of the valid code enter by user! 

			if (mysqli_num_rows($result) == 0)     //if code is not valid
			{
				// row not found, do stuff...
				$message = "invalid code!";
			} else                                 //if code is valid 
			{

				$mql = "INSERT INTO admin (username,password,email,code) VALUES ('" . $_POST['cr_user'] . "','" . md5($_POST['cr_pass']) . "','" . $_POST['cr_email'] . "','" . $_POST['code'] . "')";
				mysqli_query($db, $mql);
				$success = "Admin Added successfully!";
			}
		}
	}
}
?>

<head>
	<meta charset="UTF-8">
	<title>Flat Login Form</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

	<link rel="stylesheet" href="../admin/css/loginx.css">

</head>

<body style="background-image: url(../admin/images/bglogin.jpeg); background-size:cover;">
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="index.php" method="post" style="font-size:30px">
				<h1>Create Account</h1>
				<div class="social-container">
				</div>
				<input type="text" placeholder="username" name="cr_user" />
				<input type="text" placeholder="email address" name="cr_email" />
				<input type="password" placeholder="password" name="cr_pass" />
				<input type="password" placeholder="Re-type password" name="cr_cpass" />
				<input type="password" placeholder="Kode unik" name="code" />
				<input type="submit" name="submit1" value="Create" />
				<!-- <button name="submit1">Sign Up</button> -->
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="index.php" method="post" style="font-size: 35px;">
				<h1>ADMIN LOGIN</h1>
				<div class="social-container">
				</div>
				<span style="margin-bottom:20px;">Masukkan data anda dengan tepat!</span>
				<input type="text" placeholder="username" name="username" />
				<input type="password" placeholder="password" name="password" />
				<input type="submit" name="submit" value="login" />
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Admin!</h1>
					<p>Klik tombol di bawah ini untuk login admin</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Welcome, Admin!</h1>
					<p>Klik tombol di bawah ini jika ada tidak memiliki akun</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script src="js/login.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='js/index.js'></script>
</body>

</html>