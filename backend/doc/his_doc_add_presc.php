<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id = $_SESSION['doc_id'];

 global $con;
 $query = "select * from his_docs WHERE doc_id = $doc_id";
 $result = mysqli_query($mysqli,$query);
 while( $row = mysqli_fetch_array($result) )
 {
  $doc_fname = $row['doc_fname'];
  $doc_lname = $row['doc_lname'];
 }


  if(isset($_GET['cancel']))
  {
    $query=mysqli_query($mysqli,"update appointment set doctorStatus='0' , appdate='0' , apptime='0' where id = '".$_GET['id']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }
?>

<!DOCTYPE html>
<html >
    
<?php include('assets/inc/head.php');?>

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

.table-sortable .th-sort-asc,
.table-sortable .th-sort-desc {
  background: rgba(0, 0, 0, 0.1);
}
.table-sortable .pointer {
  background: rgba(0, 0, 0, 0.1);
}
</style>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                <?php include("assets/inc/sidebar.php");?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmacy</a></li>
                                            <li class="breadcrumb-item active">Give Prescription</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Prescriptions</h4>
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
                                            <div class="col-12 text-sm-center form-inline" >
                                                <div class="form-group mr-2" style="display:none">
                                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                        <option value="">Show all</option>
                                                        <option value="Discharged">Discharged</option>
                                                        <option value="OutPatients">OutPatients</option>
                                                        <option value="InPatients">InPatients</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                    <table class="table table-hover table-sortable">
                <thead>
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Appoint ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th class="pointer" scope="col">Appointment Date</th>
                    <th  scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Prescribe</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $query = "select pid,id,fname,lname,gender,email,phone,appdate,apptime,userStatus,doctorStatus from appointment where doctor='$doc_fname';";
                    $result = mysqli_query($mysqli,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                      <td><?php echo $row['pid'];?></td>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      echo "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo "Cancelled by Patient";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo "Cancelled by You";
                    }
                        ?></td>

                     <td>
                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

													
	                        <a href="./his_doc_add_presc.php?id=<?php echo $row['id']?>&cancel=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>

                        <td>

                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

                        <a href="his_doc_add_single_pres.php?pid=<?=$row['pid']?>&id=<?=$row['id']?>&fname=<?=$row['fname']?>&lname=<?=$row['lname']?>&appdate=<?=$row['appdate']?>&apptime=<?= $row['apptime']?>"
                        tooltip-placement="top" tooltip="Remove" title="prescribe">
                        <button class="btn btn-success">Prescibe</button></a>
                        <?php } else {

                            echo "-";
                            } ?>
                        
                        </td>


                      </tr></a>
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
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                 <?php include('assets/inc/footer.php');?>
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