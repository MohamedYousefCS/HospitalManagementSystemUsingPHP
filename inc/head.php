<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title>مستشفي حياه كريمه  </title>

  <link rel="icon" href="./assets/img/logo.png">
  <link rel="stylesheet" href="./assets/css/maicons.css">

  <link rel="stylesheet" href="./assets/css/bootstrap.css">

  <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="./assets/css/theme.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!--Load Sweet Alert Javascript-->
  <script src="assets/js/swal.js"></script>
       
       <!--Inject SWAL-->
       <?php if(isset($success)) {?>
       <!--This code for injecting an alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Success","<?php echo $success;?>","success");
                           },
                               100);
               </script>

       <?php } ?>

       <?php if(isset($err)) {?>
       <!--This code for injecting an alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Failed","<?php echo $err;?>","Failed");
                           },
                               100);
               </script>

       <?php } ?>