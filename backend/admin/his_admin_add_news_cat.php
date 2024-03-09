<!--Server side code to handle  Patient Registration-->
<?php
ob_start();
	session_start();
	include('assets/inc/config.php');
	include('assets/inc/functions.php');
		
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html >
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
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
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                            <li class="breadcrumb-item active">add news categories</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                <div class="col-md-6">
                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    getCategories();
                                       ?>
                                    </tbody>
                                    <?php
                                   deleteCategories();
                                    
                                    ?>
                </table>

                </div><!-- table -->

                <div class="col-md-6">
                    <div class="card p-3">
                    <h3 class="text-center my-3">Add New Category</h3>

                            <?php
                               insertCategories();
                            
                            ?>

                        <form action="" method="post" class="text-center">
                            <input type="text" name="cat_title" class="form-control w-50 mx-auto mb-3" placeholder="Category Name">
                            <button type="submit" name="addCat" class="btn btn btn-primary mb-3">Add Category</button>
                        </form>
                    </div> <!-- card new cat -->

                    <?php
                                    if(isset($_GET["edit"])){
                                        $editId=$_GET["edit"];?>

                                            <div class="card p-3 my-2">
                                                <h3 class="text-center my-3">Edit Category</h3>

                                                <form action="" method="post" class="text-center">

                                                <?php

                                        $sql = "SELECT * FROM `categories` WHERE `cat_id`=$editId ";
                                        $categories=mysqli_query($mysqli,$sql);
                                        while($row = mysqli_fetch_assoc($categories)):
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                        
                                        ?>

                                                    <input type="text" name="cat_title" value=<?=$cat_title ?> class="form-control w-50 mx-auto mb-3" placeholder="Category Name">
                                        <?php endwhile; ?>

                                            <?php
                                            if(isset($_POST["EditCat"])){
                                                $cat_title=$_POST['cat_title'];
                                                $addCat="UPDATE `categories` SET `cat_title`='$cat_title' WHERE `cat_id`=$editId";
                                                $addOneCat=mysqli_query($mysqli,$addCat);
                                                header('location:his_admin_add_news_cat.php');
                                            }

                                            ?>
                                                    <button type="submit" name="EditCat" class="btn btn btn-primary mb-3">Update Category</button>

                                                 </form>
                                            </div>
                                        <?php
                                        // $edit="UPDATE `categories` SET `cat_title`='[value-2]' WHERE `cat_id`=$edit";
                                        // $editCategories=mysqli_query($mysqli,$edit);
                                        // header("location:categories.php");
                                    }
                                    
                                    ?>
                </div><!-- eight col -->

            </div><!-- row -->
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

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>