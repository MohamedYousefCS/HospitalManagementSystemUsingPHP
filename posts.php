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
                
                <?php
                include('inc/blogI.php')
                ?>
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
      