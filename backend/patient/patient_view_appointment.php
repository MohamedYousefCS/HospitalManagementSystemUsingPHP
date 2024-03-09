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

if (isset($_GET['cancel'])) {
  $query = mysqli_query($mysqli, "update appointment set userStatus='0' , appdate='0' , apptime='0'  where id = '" . $_GET['ID'] . "'");
  if ($query) {
    echo "<script>alert('Your appointment successfully cancelled');</script>";
  }
}



?>

<!DOCTYPE html>
<html >

<?php include('assets/inc/head.php'); ?>
<style>
  .table-sortable .pointer {
  cursor: pointer;
}

.table-sortable .th-sort-asc::after {
  content: "\25b4";
}

.table-sortable .th-sort-desc::after {
  content: "\25be";
}

.table-sortable .th-sort-asc::after,
.table-sortable .th-sort-desc::after {
  margin-left: 5px;
}

.table-sortable .pointer {
  background: rgba(0, 0, 0, 0.1);
}
</style>
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

                    <table class="table table-hover table-sortable">
                      <thead>
                        <tr>

                          <th scope="col">#</th>
                          <th scope="col">Doctor Name</th>
                          <th scope="col">Consultancy Fees</th>
                          <th class="pointer" scope="col"> Appointment Date</th>
                          <th scope="col"> Appointment Time</th>
                          <th scope="col">Current Status</th>
                          <th scope="col"> Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $query = "select id,doctor,docFees,appdate,apptime,userStatus,doctorStatus from appointment where fname ='$fname' and lname='$lname';";
                        $result = mysqli_query($mysqli, $query);
                        while ($row = mysqli_fetch_array($result)) {

                          // $fname = $row['fname'];
                          // $lname = $row['lname'];
                          // $email = $row['email'];
                          // $contact = $row['phone'];
                        ?>
                          <tr>
                            <td><?php echo $i++ ?> </td>
                            <td><?php echo $row['doctor']; ?></td>
                            <td><?php echo $row['docFees']; ?></td>
                            <td><?php echo $row['appdate']; ?></td>
                            <td><?php echo $row['apptime']; ?></td>

                            <td>
                              <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                echo "Active";
                              }
                              if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                echo "Cancelled by You";
                              }

                              if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                echo "Cancelled by Doctor";
                              }
                              ?></td>
                          <td>
                      <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>



                        <a href="patient_view_appointment.php?ID=<?=$row['id'] ?> &cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-outline-danger">Cancel</button></a>
                      <?php } else {

                        echo "Cancelled";
                      } ?>

                    </td>

                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                    <script>
                              function sortTableByColumn(table, column, asc = true) {
                              const dirModifier = asc ? 1 : -1;
                              const tBody = table.tBodies[0];
                              const rows = Array.from(tBody.querySelectorAll("tr"));

                              // Sort each row
                              const sortedRows = rows.sort((a, b) => {
                                  const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
                                  const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

                                  return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
                              });

                              // Remove all existing TRs from the table
                              while (tBody.firstChild) {
                                  tBody.removeChild(tBody.firstChild);
                              }

                              // Re-add the newly sorted rows
                              tBody.append(...sortedRows);

                              // Remember how the column is currently sorted
                              table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
                              table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
                              table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
                          }

                          document.querySelectorAll(".table-sortable .pointer").forEach(headerCell => {
                              headerCell.addEventListener("click", () => {
                                  const tableElement = headerCell.parentElement.parentElement.parentElement;
                                  const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
                                  const currentIsAscending = headerCell.classList.contains("th-sort-asc");

                                  sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
                              });
                          });
              </script>
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