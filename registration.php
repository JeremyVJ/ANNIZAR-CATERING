<!DOCTYPE html>
<html lang="en">
<?php

session_start(); //temp session
error_reporting(0); // hide undefine index
include("connection/connect.php"); // connection
if(isset($_POST['submit'] )) //if submit btn is pressed
{
     if(empty($_POST['firstname']) ||  //fetching and find if its empty
   	empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "Harap isi semua kolom!";
		}
	else
	{
		//cheching username & email if already present
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  //matching passwords
       	$message = "Password not match";
    }
	elseif(strlen($_POST['password']) < 6)  //cal password length
	{
		$message = "Password Must be >=6";
	}
	elseif(strlen($_POST['phone']) < 10)  //cal phone length
	{
		$message = "invalid phone number!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$message = "Invalid email address please type a valid email!";
    }
	elseif(mysqli_num_rows($check_username) > 0)  //check username
     {
    	$message = 'username Already exists!';
     }
	elseif(mysqli_num_rows($check_email) > 0) //check email
     {
    	$message = 'Email Already exists!';
     }
	else{
       
	 //inserting values into db
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		
		
		
		
		 header("refresh:5;url=login.php"); // redireted once inserted success
    }
	}

}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/assets/logo-icon.png">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style-fix.css" rel="stylesheet">
</head>
<body>
     
         <!--header starts-->
         <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" href="index.php"> <img style="width:100px" src="images/assets/logocrop.png" alt=""> </a>
                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                     <ul class="nav navbar-nav">
							<li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Kategori Makanan <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
							}
						else
							{
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
							 
                        </ul>
                  </div>
               </div>
            </nav>
            <!-- /.navbar -->
         </header>
            <div class="page-wrapper" style="background-image: url('images/footer_pattern.png'); background-size:cover;padding-left:50px;padding-right:50px;">
               <div class="breadcrumb" >
                  <div class="container">
                     <div>
                        <div style=" margin:auto">
                           <h1 style="color:white; text-align:center; font-size: 24px; margin-top:25px; font-weight:800;text-shadow:1px 1px 1px rgba(0,0,0,0.5);">Disini tempatnya makanan enak!</h1>
                           <p style="text-align:center; color:white;text-shadow:1px 1px 1px rgba(0,0,0,0.5);">Isi data dirimu dulu ya</p>
                           <hr>
                           <img src="images/assets/iconregister.png" style="width:300px; margin-left:50%; transform: translateX(-50%);" alt="">
                        </div>
                        <form style="width:85%;margin:auto; padding-right:30px; padding-left:30px;" action="" method="post">
                           <div class="row">
                              <div class="form-group col-sm-12">
                                 <label class="text-white" for="exampleInputEmail1">User-Name</label>
                                 <input class="form-control border-rad" type="text" name="username" id="example-text-input" placeholder="UserName"> 
                              </div>
                              <div class="form-group col-sm-6">
                                 <label class="text-white" for="exampleInputEmail1">Nama Depan</label>
                                 <input class="form-control border-rad" type="text" name="firstname" id="example-text-input" placeholder="First Name"> 
                              </div>
                              <div class="form-group col-sm-6">
                                 <label class="text-white" for="exampleInputEmail1">Nama Belakang</label>
                                 <input class="form-control border-rad" type="text" name="lastname" id="example-text-input-2" placeholder="Last Name"> 
                              </div>
                              <div class="form-group col-sm-6">
                                 <label class="text-white" for="exampleInputEmail1">Email</label>
                                 <input type="text" class="form-control border-rad" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
                              </div>
                              <div class="form-group col-sm-6">
                                 <label class="text-white" for="exampleInputEmail1">No. Telepon</label>
                                 <input class="form-control border-rad" type="text" name="phone" id="example-tel-input-3" placeholder="Phone">  
                              </div>
                              <div class="form-group col-sm-6">
                                 <label class="text-white" for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control border-rad" name="password" id="exampleInputPassword1" placeholder="Password"> 
                              </div>
                              <div class="form-group col-sm-6">
                                 <label class="text-white" for="exampleInputPassword1">Konfirmasi password</label>
                                 <input type="password" class="form-control border-rad" name="cpassword" id="exampleInputPassword2" placeholder="Password"> 
                              </div>
                              <div class="form-group col-sm-12">
                                 <label class="text-white" for="exampleTextarea">Alamat</label>
                                 <textarea class="form-control border-rad" id="exampleTextarea"  name="address" rows="3"></textarea>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-4">
                                 <p> <input type="submit" value="Register" name="submit" class="btn theme-btn border-rad"> </p>
                              </div>
                              <ul>
                                 <li>
                                    <a href="#" class="active">
                                       <span style="color:red;text-align:center"><?php echo $message; ?></span>
                                       <span style="color:green;"><?php echo $success; ?></span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </form>

                        

                     </div>
                  </div>
               </div>
            </div>
         <!-- end:page wrapper -->

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animsition.min.js"></script>
      <script src="js/bootstrap-slider.min.js"></script>
      <script src="js/jquery.isotope.min.js"></script>
      <script src="js/headroom.js"></script>
      <script src="js/foodpicky.min.js"></script>
</body>

</html>