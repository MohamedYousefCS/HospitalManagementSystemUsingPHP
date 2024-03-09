<div class="col-lg-4 py-5">
                    <!-- Search widget-->
                
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <?php
                                        $sql = "SELECT * FROM `categories`";
                                        $categories=mysqli_query($mysqli,$sql);
                                        while($row = mysqli_fetch_assoc($categories)){
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                        
                                        ?>
                                        <li><a href="postCat.php?cid=<?=$cat_id?>"><?= $cat_title ?></a></li>
                                        <?php  }?>
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>