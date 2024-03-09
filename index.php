<?php
session_start();
include("./contact.php");
include("./inc/head.php");


?>
  <style>
    /* about */
    

html{
  font-size: 90%;
  overflow-x: hidden;
}

  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar" >
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
              <a href="#"><span class="mai-call text-primary"></span> +01033993202</a>
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

  <div class="page-hero bg-image overlay-dark" style="background-image: url(./assets/img/facilities/2.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <h1 class="display-4">مستشفي حياة كريمه </h1>
        <span >هو منشأة رعاية صحية حديثة تقع في مدينه المنصوره ، محافظه الدقهليه تتمثل المهمة في تقديم جودة عالية</span>
        
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>التواصل</span> مع الأطباء</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
            <p>من اجل الحفاظ علي صحتك </p>
            </div>
          </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
      
        
          <div class="col-lg-6 py-3 wow fadeInUp text-right">
            <h1>مرحبا بك في <br> مستشفي حياة كريمه  </h1>
            <p class="text-grey mb-4">
            في مستشفى الرحمة ، نحن ملتزمون بتقديم رعاية استثنائية وشاملة لمرضانا. يلتزم فريقنا من المتخصصين ذوي الخبرة في الرعاية الصحية باستخدام أحدث التقنيات والتقنيات لضمان حصول كل مريض على أعلى مستويات الجودة من الرعاية. نحن نفخر بأنفسنا على التزامنا بالتميز ونسعى جاهدين لإحداث تغيير إيجابي في حياة من نخدمهم. انضم إلينا في مهمتنا للنهوض بالرعاية الصحية وتحسين الحياة.
            </p>
            <a href="about.html" class="btn btn-primary">اقرأ المزيد </a>
          </div>
          
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="./assets/img/doctors/doc-2.jpg" alt="" style="border-radius:10px">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <!-- about section start  -->

<section class="about mt-3" id="about">
  <h1 class="text-center mb-5 wow fadeInUp p-4">   جزء من الخدمات المتوفره  </h1>
  <div class="container">
  
      <div class="row min-vh-100 align-items-center">
        
      <div class="col-md-6 d-none d-md-block" data-aos="fade-right">
              <img src="./assets//img/facilities/11.jpg" width="90%" alt="" style="border-radius:10px">
          </div>
  
          <div class="col-md-6 content" data-aos="fade-right">
  
              <div class="box">
                  <h3> <i class="fas fa-ambulance"></i> خدمه الاسعاف  </h3>
                  <p>جميع خدمات هيئة الإسعاف المصرية وكيفية الحصول عليها للتسهيل علي المواطن والتوعية بالخدمات. المستندات والاجراءات والشروط</p>
              </div>
  
              <div class="box">
                  <h3> <i class="fas fa-procedures"></i> غرف الطوارئ </h3>
                  <p>توفير الرعاية الطبية والجراحية للمرضى القادمين إلى المستشفى والذين يحتاجون إلى رعاية فورية</p>
              </div>
  
              <div class="box">
                  <h3> <i class="fas fa-stethoscope"></i> الفحوصات الطبية </h3>
                  <p>اجراء الفحوصات الطبيه من فحص الدم · التصوير الشعاعي للثدي · تحليل فيتامين د · فحص تعداد الدم ·</p>
              </div>
  
          </div>
  
          
  
      </div>
  
  </div>
  
  </section>
  
  <!-- about section ends -->
  
<!-- review section starts  -->

<section class="review" id="review">

  <div class="container">
  
  <h1 class="heading text-center mb-5 wow fadeInUp pt-3"><span>'</span> اراء المرضي  <span>'</span></h1>
  
  <div class="box-container">
  
      <div class="box" data-aos="fade-right">
          <p>لم أكن أتوقع أن يصل المستشفى إلى هذا المستوى من التطور»، مؤكدًا أن المستشفى على أعلى مستوى والخدمة رائعة، والأطباء يقدمون المساعدة لنا، هناك تطور سريع</p>
          <h3>بعض اراء المرضي </h3>
          <span> يناير 5 , 2022 </span>
          <img src="./assets/img/people/pic-1.png" alt="">
      </div>
  
      <div class="box" data-aos="fade-up">
          <p>خدمه ممتازه وتتطور عظيم وان المستشفي علي اعلي مستوي من الخدمه الجيده و الاطباء يقدمون المساعده لنا </p>
          <h3>بعض اراء المرضي </h3>
          <span> يناير 10 , 2022 </span>
          
          <img src="./assets/img/people/pic-2.png" alt="">
      </div>
  
      <div class="box" data-aos="fade-left">
        <p>لم أكن أتوقع أن يصل المستشفى إلى هذا المستوى من التطور»، مؤكدًا أن المستشفى على أعلى مستوى والخدمة رائعة، والأطباء يقدمون المساعدة لنا، هناك تطور سريع</p>
        <h3>بعض اراء المرضي </h3>
        <span> يناير 25 , 2022 </span>
          <img src="./assets/img/people/pic-3.png" alt="">
      </div>
  
  </div>
  
  </div>
  
  </section>
  
  <!-- review section ends  -->
  
  <!-- counter section starts  -->

<section class="counter">

  <div class="container">

      <div class="box-container">

          <div class="box" data-aos="fade-up">
              <i class="fas fa-hospital"></i>
              <span>120+</span>
              <h3>المستشفيات</h3>
          </div>

          <div class="box" data-aos="fade-up">
              <i class="fas fa-users"></i>
              <span>100+</span>
              <h3>طاقم عمل</h3>
          </div>

          <div class="box" data-aos="fade-up">
              <i class="fas fa-smile"></i>
              <span>1200+</span>
              <h3> المرضي  </h3>
          </div>

          <div class="box" data-aos="fade-up">
              <i class="fas fa-procedures"></i>
              <span>130+</span>
              <h3>مرفق السرير</h3>
          </div>

      </div>

  </div>

</section>

<!-- counter section ends -->
   <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">الأراء</h1>

      <form class="main-form text-right" dir="rtl"  method="post" >
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" required name="full_name" class="form-control" placeholder="الاسم بالكامل">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input required type="email" name="email" class="form-control" placeholder="الايميل الشخصي">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input required type="date" readonly value="<?php echo date('Y-m-d'); ?>" name="his_date" class="form-control">
          </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
              <select name="department" id="departement" class="custom-select">
                <option value="general">الصحة العامة</option>
                <option value="cardiology"> طب القلب</option>
                <option value="dental">الأسنان</option>
                <option value="neurology">طب الأعصاب</option>
                <option value="orthopaedics">جراحة العظام</option>
              </select>
            </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input required type="text" name="phone" class="form-control" placeholder="رقم الهاتف...">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="Messages" id="message" class="form-control" rows="6" placeholder="رسالتك"></textarea>
          </div>
        </div>

        <button type="submit" name="btnSubmit" data-style="expand-right" class=" btn btn-primary mt-3 wow zoomIn">تاكيد  </button>
      </form>
    </div>
  </div>
   <!-- .page-section -->





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