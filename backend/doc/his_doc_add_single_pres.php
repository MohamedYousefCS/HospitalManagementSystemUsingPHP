<?php
session_start();
include('assets/inc/config.php');
if (isset($_POST['add_patient_presc'])) {
    $pres_pat_name = $_POST['pres_pat_name'];
    $pres_pat_number = $_POST['pres_pat_number'];
    $pres_pat_addr = $_POST['pres_pat_addr'];
    $pres_pat_age = $_POST['pres_pat_age'];
    $pres_number = $_POST['pres_number'];
    $pres_ins = $_POST['pres_ins'];
    //sql to insert captured values
    $query = "INSERT INTO  his_prescriptions  (pres_pat_name, pres_pat_number, pres_pat_addr, pres_pat_age, pres_number, pres_ins) VALUES(?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssss', $pres_pat_name, $pres_pat_number,  $pres_pat_addr, $pres_pat_age, $pres_number,  $pres_ins);
    $stmt->execute();
    /*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Patient Prescription Addded";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

function display_pharm_cat()
{
    global $mysqli;
    $query = "select distinct(pharm_cat_name) from his_pharmaceuticals_categories";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $pharm_cat_name = $row['pharm_cat_name'];
        echo '<option data-value="' . $pharm_cat_name . '">' . $pharm_cat_name . '</option>';
    }
}

function display_phar()
{
    global $mysqli;
    $query = "select * from his_pharmaceuticals";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $phar_name = $row['phar_name'];

        $phar_cat = $row['phar_cat'];
        echo '<option value="' . $phar_name . '" data-phar_cat="' . $phar_cat . '">' . $phar_name . '</option>';
    }
}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html>

<!--Head-->
<?php include('assets/inc/head.php'); ?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php"); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
        $pid = $_GET['pid'];
        $ret = "SELECT  * FROM  login_patient WHERE id=$pid";
        $result = mysqli_query($mysqli, $ret);
        //$cnt=1;
        while ($row = $result->fetch_object()) {
        ?>
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
                                            <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmacy</a></li>
                                            <li class="breadcrumb-item active">Add Prescription</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Patient Prescription</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Patient Name</label>
                                                    <input type="text" required="required" readonly name="pres_pat_name" value="<?php echo $row->Fname; ?> <?php echo $row->Lname; ?>" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Patient Age</label>
                                                    <input required="required" type="text" readonly name="pres_pat_age" value="<?php echo $row->pat_age; ?>" class="form-control" id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>

                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Patient Number</label>
                                                    <input type="text" required="required" readonly name="pres_pat_number" value="<?php echo $row->pat_number; ?>" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Patient Address</label>
                                                    <input required="required" type="text" readonly name="pres_pat_addr" value="<?php echo $row->pat_addr; ?>" class="form-control" id="inputPassword4" placeholder="Patient`s Age">
                                                </div>



                                            </div>


                                            <hr>
                                            <div class="form-row">


                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php
                                                    $length = 5;
                                                    $pres_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Prescription Number</label>
                                                    <input type="text" name="pres_number" value="<?php echo $pres_no; ?>" class="form-control" id="inputZip">
                                                </div>
                                            </div>



                                            <div class="form-row justify-content-around">
                                                <div class="form-group col-md-6">


                                                    <label for="inputPassword4" class="col-form-label d-block">pharmacy category</label>
                                                    <select  required="required " style="min-width: 100%;" id="cat" name="Choose_medicine" class="form-select ">
                                                        <option disabled selected>Choose a pharmacy category</option>
                                                        <?php
                                                        display_pharm_cat();
                                                        ?>
                                                    </select>


                                                    <div></div>

                                                    <script>
                                                        document.getElementById('cat').onchange = function foo() {
                                                            let cat = this.value;
                                                            console.log(cat)
                                                            let phar = [...document.getElementById('phar').options];
                                                            console.log(phar);

                                                            phar.forEach((el, ind, arr) => {
                                                                console.log(arr[ind]);
                                                                arr[ind].setAttribute("style", "");

                                                                if (el.getAttribute("data-phar_cat") != cat) {
                                                                    arr[ind].setAttribute("style", "display: none");
                                                                }
                                                            });
                                                        };
                                                    </script>

                                                </div>
                                                    
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label d-block">Medicine</label>
                                                    <select  multiple id="phar" style="min-width: 100%;" required="required" name="phar" class="form-select">
                                                        <option disabled>Choose medicine</option>
                                                        <?php
                                                        display_phar();
                                                        ?>

                                                    </select>


                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Prescription</label>
                                                <textarea rows="7" required="required" id="textarea" type="text" class="form-control" name="pres_ins" id="editor"></textarea>
                                            </div>
                                            <script>
                                                let arr = []
                                                let phar = document.getElementById('phar');
                                                phar.onchange = function too() {
                                                    arr.push(phar.value)

                                                    function removeDuplicates(arr) {
                                                        return arr.filter((item,
                                                            index) => arr.indexOf(item) === index);
                                                    }
                                                    console.log(removeDuplicates(arr));

                                                    document.getElementById("textarea").value=removeDuplicates(arr).map(item=> ` ${item} \n` )
                                                };
                                            </script>
                                            <button type="submit" name="add_patient_presc" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient Prescription</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php'); ?>
                <!-- end Footer -->

            </div>
        <?php } ?>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor')
    </script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>


</body>

</html>