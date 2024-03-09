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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">news</a></li>
                                            <li class="breadcrumb-item active">add news categories</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <h1 class="text-center mb-3">Add New Post</h1>
            <div class="row">
                   <div class="col-12">
                   <form class="form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label  class="pt-3 fw-bold">title</label>
                          <input type="text"
                            class="form-control" name="post_title" id="" aria-describedby="helpId" placeholder="">
                            <label  class="pt-3 fw-bold">Post Date</label>
                          <input type="text"
                            class="form-control " type="date" name="post_date" id="" aria-describedby="helpId" placeholder="">
                            <label  class="pt-3 fw-bold">Post image</label>
                          <input type="file"
                            class="form-control" type="file" name="post_image" id="" aria-describedby="helpId" placeholder="">
                            
                            <label  class="pt-3 fw-bold">Post category</label>
                            <select name="cat_id" class="form-control" id="">
                            <?php
                        $categoriesSql = " SELECT * FROM `categories` " ; 
                        $allCategories = mysqli_query($mysqli ,$categoriesSql);
                        while($category =  mysqli_fetch_assoc($allCategories) ){
                            $cat_id = $category['cat_id'];
                            $cat_title = $category['cat_title'];
                            ?>
                        <option value="<?=$cat_id ?>"><?=$cat_title?></option>
                        
                        <?php 
                        } // while
                                        ?>
                          </select>
                            <label  class="pt-3 fw-bold">Post content</label>
                          <textarea type="text"
                            class="form-control" name="post_content" type="" id="" aria-describedby="helpId" placeholder=""></textarea>

                            <div class="text-center">
                            <button type="submit" name="add-post" class="btn btn-success mt-4 w-75" >
                                Add New Post
                            </button>
                            </div>
                            <?php
                            insertPost();
                            ?>
                        </div>
                    </form>
                   </div>
                
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