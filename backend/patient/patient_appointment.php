<?php
session_start();
include("assets/inc/func.php");
include("assets/inc/newfunc.php");
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
//$aid=$_SESSION['ad_id'];
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$email = $_SESSION['Email'];
$fname = $_SESSION['Fname'];
$gender = $_SESSION['Gender'];
$lname = $_SESSION['Lname'];
$contact = $_SESSION['Phone'];

if (isset($_POST['app-submit'])) {
    $pid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['Email'];
    $fname = $_SESSION['Fname'];
    $gender = $_SESSION['Gender'];
    $lname = $_SESSION['Lname'];
    $contact = $_SESSION['Phone'];
    $doctor = $_POST['doctor'];
    $docFees = $_POST['docFees'];
  
    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
    $cur_date = date("Y-m-d");
    date_default_timezone_set('Asia/Kolkata');
    $cur_time = date("H:i:s");
    $apptime1 = strtotime($apptime);
    $appdate1 = strtotime($appdate);
  
    if (date("Y-m-d", $appdate1) >= $cur_date) {
      if ((date("Y-m-d", $appdate1) == $cur_date and date("H:i:s", $apptime1) > $cur_time) or date("Y-m-d", $appdate1) > $cur_date) {
        $check_query = mysqli_query($mysqli, "select apptime from appointment where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");
  
        if (mysqli_num_rows($check_query) == 0) {
          $query = mysqli_query($mysqli, "insert into appointment(pid,fname,lname,gender,email,phone,doctor,docFees,appdate,apptime,userStatus,doctorStatus) values('$pid','$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1')");
            
          if ($query) {
            // echo "<script>alert('Your appointment successfully booked');</script>";
            $success="Your appointment successfully booked";
          } else {
            // echo "<script>alert('Unable to process your request. Please try again!');</script>";
            $err="alert('Unable to process your request. Please try again!";
          }
        } else {
          $err="alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!";
        }
      } else {
        echo "<script>alert('Select a time or date in the future!');</script>";
      }
    } else {
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  }

?>

<!DOCTYPE html>
<html >

<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">حجز ميعاد </a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">حجز موعد </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">

                                        <div class="form-group mx-auto">
                                            <div class="boxing ">
                                                <div class="title">Create an appointment </div>
                                                <div class="content">
                                                    <form action="./patient_appointment.php" method="post">
                                                      
                                                        <div class="user-details">

                                                            <div class="input-box">
                                                                <span class="details">Specialization</span>
                                                                <select class="select" required="required" id="spec" name="Choose_specialty" class="form-control">
                                                                    <option disabled selected>Choose a specialty</option>
                                                                   <?php
                                                                   display_doc_depts();
                                                                   ?>
                                                                </select>
                                                            </div>
                  
                                                            <div></div>

                                                            <script>
                        document.getElementById('spec').onchange = function foo() {
                          let spec = this.value;
                          console.log(spec)
                          let docs = [...document.getElementById('doctor').options];
                          console.log(docs);

                          docs.forEach((el, ind, arr) => {
                            console.log(arr[ind]);
                            arr[ind].setAttribute("style", "");

                            if (el.getAttribute("data-doc_dept") != spec) {
                              arr[ind].setAttribute("style", "display: none");
                            }
                          });
                        };
                      </script>
                                                            
                                                            <div class="input-box">
                                                                <span class="details">Doctors</span>
                                                                <select class="select" id="doctor" required="required" name="doctor" class="form-control">
                                                                    <option disabled selected>Choose Doctor</option>
                                                                    <?php
                                                                    display_docs();
                                                                    ?>

                                                                </select>
                                                            </div>
                                                            

                                                            <div class="input-box">
                                                                <span class="details">Appointment Date</span>
                                                                <input type="date" name="appdate" required>
                                                            </div>
                                                                                
                                                            <div class="input-box">
                                                                <span class="details">Appointment Time</span>
                                                                <select class="select" required="required" name="apptime">
                                                                    <option disabled selected>Choose Time</option>
                                                                    <option>9:00 AM</option>
                                                                    <option>9:30 AM</option>
                                                                    <option>10:00 AM</option>
                                                                    <option>10:30 AM</option>
                                                                    <option>11:00 AM</option>
                                                                    <option>11:30 AM</option>
                                                                    <option>12:00 PM</option>
                                                                    <option>12:30 PM</option>
                                                                    <option>1:00 PM</option>
                                                                    <option>1:30 PM</option>
                                                                    <option>2:00 PM</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div><label > Consultancy Fees</label> </div>  
                   <div class="mb-2">
                        <input class="form-control w-100" type="text" name="docFees" id="docFees" readonly="readonly" value="10"  />
                      </div>

                                                        <div>
                                                        
                                                            <input type="submit" class="btn btn-outline-success rounded-4" name="app-submit" value="Create an appointment  ">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end .table-responsive-->
                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <?php include('assets/inc/footer.php'); ?>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>