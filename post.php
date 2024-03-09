<?php
include('inc/config.php');
include('inc/head.php');
include('inc/nav.php');
?>
        <!-- Page content-->
        <div class="container mt-5 py-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <?php 
                        if(isset($_GET['pid'])){
                            $pid=$_GET['pid'];
                        }
                        $post="SELECT * FROM `posts` WHERE `post_id`=$pid";
                        $postOne = mysqli_query($mysqli,$post);
                        while ($row=mysqli_fetch_assoc($postOne)) {
                            $post_id=$row['post_id'];
                             $post_title=$row['post_title'];
                            $post_date=$row['post_date'];
                            $post_content= $row['post_content'];
                             $post_image=$row['post_image'];
                             $cat_id=$row['cat_id'];
                        
                    ?>
                    <article class="card border-0">
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= $post_title ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?= $post_date ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none text-white link-light" href="postCat.php?cid=<?=$cat_id?>">
                            <?php 
                        if(isset($_GET['pid'])){
                            $pid=$_GET['pid'];
                        }
                        $categories="SELECT * FROM `categories` WHERE `cat_id`=$cat_id";
                        $catconn = mysqli_query($mysqli,$categories);
                        while ($row=mysqli_fetch_assoc($catconn)) {
                            $cat_title=$row['cat_title'];
                             
                        
                    ?>
                      <?=  $cat_title ?>          
                                <?php } ?>
                            </a>
                            
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="./backend/admin/assets/images/blog/<?= $post_image ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?= $post_content ?></p>
                        </section>
                    </article>
                            <?php } ?>
                    <!-- Comments section-->
                    
                </div>
                <!-- Side widgets-->
                <?php
                include('inc/sidebsr.php')
                ?>
            </div>
        </div>
        <!-- Footer-->
        <?php
                include('inc/footer.php')
                ?>
      