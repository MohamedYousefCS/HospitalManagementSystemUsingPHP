<!--Server side code to handle  Patient Registration-->
<?php
ob_start();
session_start();
include('assets/inc/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
include('assets/inc/config.php');
include('assets/inc/functions.php');
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
                                        <li class="breadcrumb-item active">all posts</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                   
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
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
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Post Preview</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <?php
                                    $postsSql = " SELECT * FROM `posts` ";
                                    $allPosts = mysqli_query($mysqli, $postsSql);
                                    $cnt=1;
                                    while ($post =  mysqli_fetch_assoc($allPosts)) {
                                        $post_id = $post['post_id'];
                                        $post_title = $post['post_title'];
                                        $post_date = $post['post_date'];
                                        $post_image = $post['post_image'];
                                        $post_content = $post['post_content'];
                                        // $post_content = substr($post['post_content'] , 0 , 150 ) ;
                                        $category = $post['cat_id'];
                                    ?>

                                            <tbody>
                                            <tr>
                                            <td><?= $cnt ?></td>
                                            <td><?= $post_title ?></td>
                                            <td>
                                                <?php
                                                $categoriesSql = " SELECT * FROM `categories` WHERE `cat_id`= '$category' ";
                                                $allCategories = mysqli_query($mysqli, $categoriesSql);
                                                while ($category =  mysqli_fetch_assoc($allCategories)) {
                                                    $cat_id = $category['cat_id'];
                                                    $cat_title = $category['cat_title'];
                                                ?>
                                                    <?= $cat_title ?>
                                                <?php
                                                } // while
                                                ?>
                                            </td>


                                            <td><img src="assets/images/blog/<?= $post_image ?>" width="50" height="50" alt=""></td>
                                            <td class="text-center"><a target="_blank" href="../../post.php?pid=<?= $post_id ?>" class="btn btn-sm btn-primary">view</a></td>
                                            <td class="text-center"><a href="posts.php?del=<?= $post_id ?>" class="btn btn-sm btn-danger">delete</a></td>
                                        </tr>
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>

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

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>