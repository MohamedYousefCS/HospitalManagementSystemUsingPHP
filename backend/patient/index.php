<?php
 session_start();
 include('assets/inc/config.php');//get configuration file
 if(isset($_POST['patiant_login'])){
	 $Email=$_POST['Email'];
	 $password=sha1(md5($_POST['password']));
	 $query="select * from login_patient where Email='$Email' and password='$password';";
	 $result=mysqli_query($mysqli,$query);
	 if(mysqli_num_rows($result)==1)
	 {
		 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	   $_SESSION['id'] = $row['id'];
	   $_SESSION['username'] = $row['Fname']." ".$row['Lname'];
	   $_SESSION['Fname'] = $row['Fname'];
	   $_SESSION['Lname'] = $row['Lname'];
	   $_SESSION['Gender'] = $row['Gender'];
	   $_SESSION['Phone'] = $row['Phone'];
	   $_SESSION['Email'] = $row['Email'];
	   $_SESSION['pat_number'] = $row['pat_number'];
	 }
	 
	 header("Location:his_pat_dashboard.php");
	 }
   else {
	{
		#echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
			$err = "Access Denied Please Check Your Credentials";
		}
	 // header("Location:error.php");
   }
		 
 }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        
        <script src="assets/js/swal.js"></script>

	<?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","error");
                            },
                                100);
                </script>

        <?php } ?>
</head>
<style>
	a{
		text-decoration: none;
		color: #21a99b !important;
	}
</style>
<body>
	<img class="wave" src="assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/bg.svg">
		</div>
		<div class="login-content">
			<form  method="post">
				<img src="assets/img/logo.jpg" style="border-radius: 50%;">
				<h2 class="title">تسجيل دخول المريض</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
           		   		<input type="email" name="Email" class="input" placeholder="الايميل">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" name="password" placeholder="الباسورد" class="input">
            	   </div>
            	</div>
            	
            	<input type="submit" name="patiant_login" class="btn" value="تسجيل الدخول">
				<div class="text-center fs-6 ">
				didn't have account ? <a href="./Regesrtration.php" class="text-success">Sign up</a>
			</div>
            </form>
        </div>
    </div>
  
</body>
</html>
