<?php
    session_start();
    include('assets/inc/config.php');//get configuration file
    if(isset($_POST['lap_login']))
    {
        $lap_number = $_POST['lap_number'];
        //$lap_email = $_POST['lap_ea']
        $lap_pwd = sha1(md5($_POST['lap_pwd']));//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT lap_number, lap_pwd, lap_id FROM his_lap_emp WHERE  lap_number=? AND lap_pwd=? ");//sql to log in user
        $stmt->bind_param('ss', $lap_number, $lap_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($lap_number, $lap_pwd ,$lap_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['lap_id'] = $lap_id;
        $_SESSION['lap_number'] = $lap_number;//Assign session to lap_number id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:his_lap_dashboard.php");
            }

        else
            {
            #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
                $err = "Access Denied Please Check Your Credentials";
            }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html >
    
<head>
        <meta charset="utf-8" />
        <title>Hospital Management System -A Super Responsive Information System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="MartDevelopers" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        
        <script src="assets/js/swal.js"></script>
        <!--Inject SWAL-->
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

    <body >

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 "  >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../doc/index.php" style="color: black !important;">الدكاتره</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/index.php " style="color: black !important;">الادمن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Pharmacist/login.php" style="color: black !important;">الصيدلي</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../accountant/index.php" style="color: black !important;">الحسابات</a>
        </li>
        
      
       
      </ul>
      
    </div>
    <a class="navbar-brand text-black" href="../../index.php">HMS</a>
  </div>
</nav>
    <section class="vh-75">
      <div class="container-fluid h-custom py-5"
      >
      <div class="text-center">
        <h2>Laboratory doctor Login</h2>
      </div>
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img
              src="https://cdni.iconscout.com/illustration/premium/thumb/hospital-and-medical-assistants-and-ambulance-2681143-2233471.png"
              class="img-fluid"
              alt="Sample image"
            />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="post">

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input
                name="lap_number"
                  type="text"
                  id="emailaddress"
                  class="form-control form-control-lg"
                  placeholder="Enter a valid email address"
                />
                <label class="form-label" for="form3Example3"
                  >Laboratory doctor Number</label
                >
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input
                name="lap_pwd"
                  type="password"
                  id="password"
                  placeholder="Enter your password"
                  class="form-control form-control-lg"
                />
                <label class="form-label" for="form3Example4">Password</label>
              </div>


              <div class="text-center text-lg-start mt-4 pt-2">
                <button
                name="lap_login"
                 type="submit"
                  class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem"
                >
                  Login
                </button>
             
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </section>
        <!-- end page -->


        <?php include ("assets/inc/footer1.php");?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>