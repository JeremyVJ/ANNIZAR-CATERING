<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>login</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
<link rel="shortcut icon" href="images/shortcut-logo.png">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  font-weight: bold;
		  cursor: pointer;
		  border:0;
		  background-color: #FE9924;
	  }
	  </style> 
</head>

<body>
<?php
include("connection/connect.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions
if(isset($_POST['submit']))   // if button is submit
{
	$username = $_POST['username'];  //fetch records from login form
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   // if records were not empty
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))  // if matching records in the array & if everything is right
								{
                                    	$_SESSION["user_id"] = $row['u_id']; // put user id into temp session
										 header("refresh:1;url=index.php"); // redirect to index.php page
	                            } 
							else
							    {
                                      	$message = "username atau password salah!"; // throw error
                                }
	 }	
}
?>

<!-- Form Module-->
<div class="module form-module">
  <div class="form">
	<h1 style="font-size:36px; font-weight:bold; margin-bottom:5px; margin-top:10px; color:white;">Halo!</h1>
    <h2 style="color:#FE9924; margin-bottom:48px; font-size:15px">Silahkan Login ke akun Anda</h2>
	  <span><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input class="border-radius" style="margin-top:10px" type="text" placeholder="Username"  name="username"/>
      <input class="border-radius" style="margin-bottom:35px" type="password" placeholder="Password" name="password"/>
      <input class="border-radius button" style="width:50%; margin:auto;" type="submit" id="buttn" name="submit" value="Login" />
	  <div style="text-align:center; margin-top:20px; margin-bottom:55px">Tidak punya Akun?<a href="registration.php" style="color:#FE9924; font-weight:500; text-decoration:none"> Buat Akun</a></div>
=======
    <h2>Login to your account</h2>
	<span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Username"  name="username"/>
      <input type="password" placeholder="Password" name="password"/>
     <input type="submit" id="buttn" name="submit" value="login" />
>>>>>>> 2a1fef1061dc905f92172656aea1b23c5bd4c574
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>
