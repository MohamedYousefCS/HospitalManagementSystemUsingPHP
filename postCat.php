<?php
include('inc/config.php');
include('inc/head.php');
include('inc/nav.php');
?>
        <!-- Page header with logo and tagline-->
       
        <!-- Page content-->
        <div class="container py-5">
            <div class="row">
                <!-- Blog entries-->
                
                <div class="col-lg-8 py-5">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                    <?php
                    if(isset($_GET['cid'])){
                        $cid=$_GET['cid'];
                    }
                                        $sql = "SELECT * FROM `posts` WHERE `cat_id` = $cid";
                                        $posts=mysqli_query($mysqli,$sql);
                                        while($row = mysqli_fetch_assoc($posts)){
                                            $post_id=$row['post_id'];
                                            $post_title=substr($row['post_title'],0,20);
                                            $post_date=$row['post_date'];
                                            $post_content=substr( $row['post_content'],0,150);
                                            $post_image=$row['post_image'];
                                        
                                        ?>
                                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="./backend/admin/assets/images/blog/<?= $post_image ?>" height="200" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?= $post_date ?></div>
                                    <h2 class="card-title h4"><?= $post_title ?></h2>
                                    <p class="card-text"><?= $post_content ?></p>
                                    <a class="btn btn-primary" href="post.php?pid= <?= $post_id ?> ">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                        </div>
                                        <?php  }?>
                        
                    
                    </div>
                    <!-- Pagination-->
                   
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
      