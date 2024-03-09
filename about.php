<?php
session_start();
include("./inc/head.php");
include('./inc/config.php');
?>
</head>

<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row justify-content-between">

          <div class="col-sm-4 text-left text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
          <div class="col-sm-8 text-sm text-right">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +20 01033993202</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@gmail.com</a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <?php
    include("./inc/nav.php")
    ?>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(./assets/img/facilities/8.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">الصفحه الرئيسيه</a></li>
            <li class="breadcrumb-item active" aria-current="page">عنا</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">معلومات عنا</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-secondary text-white">
              <span class="mai-chatbubbles-outline"></span>
            </div>
            <p><span>التواصل </span>مع الدكاتره </p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-primary text-white">
              <span class="mai-shield-checkmark"></span>
            </div>
            <p><span>التطلع </span>الي الحمايه من الامراض</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-accent text-white">
              <span class="mai-basket"></span>
            </div>
            <p><span>صيدليه </span>الوحده الصحيه</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <h1 class="text-center mb-3"> مرحبا بكم في مستشفي حياة كريمه </h1>
          <div class="text-lg text-right">
            <p>في مستشفى الرحمة ، نحن ملتزمون بتقديم رعاية استثنائية وشاملة لمرضانا. يلتزم فريقنا من المتخصصين ذوي الخبرة في الرعاية الصحية باستخدام أحدث التقنيات والتقنيات لضمان حصول كل مريض على أعلى مستويات الجودة من الرعاية. نحن نفخر بأنفسنا على التزامنا بالتميز ونسعى جاهدين لإحداث تغيير إيجابي في حياة من نخدمهم. انضم إلينا في مهمتنا للنهوض بالرعاية الصحية وتحسين الحياة.</p>
          </div>
        </div>
        <div class="col-lg-10 mt-5">
          <h1 class="text-center mb-5 wow fadeInUp">هيئة العمل  
            <br>
            <small class="text-center mb-5">نحن نقدم خدمات مختلفة لتحسين صحتك</small>

          </h1>
          <div class="page-section">
    <div class="container">

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      <?php
                                                $ret="SELECT * FROM his_docs ORDER BY RAND() "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="./backend/doc/assets/images/users/<?php echo $row->doc_dpic;?>" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0"><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></p>
              <span class="text-sm text-grey"> <?php echo $row->doc_dept;?></span>
            </div>
          </div>
        </div>
       
        <?php } ?>
      </div>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  include("./inc/footer.php")
  ?>

  <script src="./assets/js/jquery-3.5.1.min.js"></script>

  <script src="./assets/js/bootstrap.bundle.min.js"></script>

  <script src="./assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="./assets/vendor/wow/wow.min.js"></script>

  <script src="./assets/js/theme.js"></script>

</body>

</html>