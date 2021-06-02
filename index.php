<?php 

    session_start();
    $pageTitle = 'الرئيسية';
    include "init.php";

  ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php getTitle(); ?></title>
    <link rel="stylesheet" href="<?php echo $css; ?>bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $css; ?>front.css" />
    <link rel="stylesheet" href="<?php echo $css; ?>all.min.css" />

  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">



      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="#about">عن الموقع</a></li>
          <li><a class="nav-link scrollto" href="#specials">مميزات</a></li>
          <li><a class="nav-link scrollto" href="#gallery">الصور</a></li>
          <li class="dropdown"><a href="#"><span>الأقسام</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <?php
          foreach (getCat() as $cat) {
            echo 
            '<li>
              <a href="category.php?pageid='.$cat['ID'].'&pagename='.str_replace(' ','-',$cat['name']).'" class="nav-link">' . $cat['name'] . '</a>
            </li>';
          }
        ?>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="contact.php">اتصل بنا</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>صبايا</span></h2>
                <p class="animate__animated animate__fadeInUp">الموقع يضم خدمة ومعلومات كثيرة عن جميع الوصفات من الأكل والحلوي بجميع الأنواع بالاضافة الي وصفات كثيرة للعناية بالبشرة والشعر بجميع أنواعة</p>
                <div>
                  <a href="contact.php" class="btn-menu animate__animated animate__fadeInUp scrollto">اتصل بنا</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-2.jpg);">
          <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>صبايا</span></h2>
                <p class="animate__animated animate__fadeInUp">الموقع يضم خدمة ومعلومات كثيرة عن جميع الوصفات من الأكل والحلوي بجميع الأنواع بالاضافة الي وصفات كثيرة للعناية بالبشرة والشعر بجميع أنواعة</p>
                <div>
                  <a href="contact.php" class="btn-menu animate__animated animate__fadeInUp scrollto">اتصل بنا</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>صبايا</span></h2>
                <p class="animate__animated animate__fadeInUp">الموقع يضم خدمة ومعلومات كثيرة عن جميع الوصفات من الأكل والحلوي بجميع الأنواع بالاضافة الي وصفات كثيرة للعناية بالبشرة والشعر بجميع أنواعة</p>
                <div>
                  <a href="contact.php" class="btn-menu animate__animated animate__fadeInUp scrollto">اتصل بنا</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/about.jpg");'>
            <a href="https://www.youtube.com/watch?v=KBMHSOImze4" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>  خدمة جميع الوصفات الأكل والحلوي والاعتناء بالشعر والبشرة</h3>
              <p>
                سوف تجد جميع الوصفات الصحية لعمل الحلوي وعمل الكثير من الأطعمة في البيت
              </p>
              <p class="fst-italic">
                وأيضا سوف تجد جميع الوصفات والتركيبات التي تهتم بالشعر بجميع أنواعه وأيضا بجميع أنواع البشرات
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i>الحصول علي أكل صحي في البيت</li>
                <li><i class="bx bx-check-double"></i> الحصول علي جميع الحلوي الصحية</li>
                <li><i class="bx bx-check-double"></i> الحصول علي جميع التركيبات والوصفات للاعتناء بالشعر والبشرة</li>
              </ul>
              <p>
                معنا سوف تجد كل ما تحتاج اليه من وصفات أكل وحلويات أو تركيبات للاعتناء بالشعر والبشرة
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>لماذا <span>نحن</span></h2>
          <p>بعض الخدمات التي تميزنا عن أي خدمة أخري</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>وصفات الأكل</h4>
              <p>سوف تجد جميع وصفات الأكل الصحية وليس فقط ذلك بل جميع الخطوات للوصول الي ذلك الأكل</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>وصفات الحلوي</h4>
              <p>سوف تجد جميع وصفات الحلوي الصحية وليس فقط ذلك بل جميع الخطوات للوصول الي تلك الحلوي</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4> تركيبات الشعر والبشرة</h4>
              <p>سوف تجد جميع تركيبات اشعر والبشرة الصحية وليس فقط ذلك بل جميع الخطوات للوصول الي هذه التركيبات المميزة</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->



    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container">

        <div class="section-title">
          <h2>نظرة علي <span>مميزاتنا</span></h2>
          <p>سوف نقدم لك مميزات كثيرة للحصول علي أفضل خدمة </p>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">الأكل</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">الحلوي</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">الشعر</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">البشرة</a>
              </li>

            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>بعض مميزات وصفات الأكل</h3>
                    <p class="fst-italic">في المنزل يكون من السهل عليك التحكم في كمية الطعام الذي تتناوله فلا يوجد ضغط لأكل كل شيء على طبقك لأنك دفعت ثمنه، وهذا يمكن أن يجعل من الأسهل تناول كميات صحية من الطعام
                    الطهي المنزلي يجعلك تستمتع بالجودة التي تستحقها أنت وعائلتك، فإذا كنت ترغب في شراء المنتجات العضوية، أو اللحوم، أو تقليل كمية المواد الحافظة التي تتناولها فمن الأسهل القيام بذلك في المنزل لأنك تختار المكونات</p>
                    في المنزل يمكنك أن تقرر كيف سيتم إعداد طعامك للحفاظ على أقصى قدر من التغذية الصحية على سبيل المثال يمكنك اختيار الطبخ على البخار، أو الشواء بدلاً من الأطعمة المقلية مما يساعدك على تقليل الدهون، والحفاظ على المزيد من القيمة الغذائية للطعام الذي تتناوله
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/specials-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>بعض مميزات وصفات الحلوي</h3>
                    <p class="fst-italic">يعد صنع الحلويات في المنزل الذ من تلك التي يتم شرائها من السوق عادة حيث يمكن صنع الحلوى نفسها باخذ المقادير الخاصة بها مع تجنب وضع المواد الكيميائية المصنعة التي تضعها معظم المحلات لجذب انتباه المشتري او زيادة مدة صلاحيتها
                    يعتبر من اقوى الاسباب التي تدفع الاشخاص لصنع الحلويات في المنزل فبامكانهم صنع حلوى قليلة الدسم و خالية من المواد المصنعة باستخدام مكونات طبيعية و اكثر صحية</p>
                  
                    يمكن توفير بعض النقود بمجرد صنع الحلوى في المنزل حيث ان مكوناتها الاساسية لا تعتبر مكلفة ابدا و يمكن الاحتفاظ بجودتها لفترة اطول من تلك التي يتم بيعها في المحلات و التي تعتبر ذات تكلفة عالية</div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/des.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>بعض مميزات وصفات الشعر</h3>
                    <p class="fst-italic">وصفات طبيعية من المنزل لتنعيم الشعر حيث أن وصفات الطبيعة للشعر مذهلة للعديد من الأسباب، إنها توفر لشعرك الكثير من الفوائد الصحية والجمال والدلال، وهذه المجموعة من وصفات الشعر تتطلب فقط بعض المكونات لكل منها، يمكنك العثور على معظم المكونات في الثلاجة أو الخزانة حتى لا تضطرين سيدتي إلى الذهاب بعيدًا
                    بعض فوائد وصفات الشعر تشمل إضافة لمعان رائع لشعرك، مما يمنح شعرك دفعة للنمو والتنعيم والترطيب ويساعد على محاربة الالتهابات</p>
                    هذه بعضا من أهم العناصر الطبيعية التي يمكن استخدامها في تنعيم الشعر والتي سوف نستخدم بعضا منها في وصفاتنا
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/hair.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>بعض مميزات وصفات البشرة</h3>
                    <p class="fst-italic">العناية بالبشرة في المنزل أمر رائع فيما يتعلق بتوفير المال. وقد لا يكون ذلك مبعث للاسترخاء مثل اللجوء للمنتجعات الصحية والسبا، ولكنه روتين فعال جداً إذا ما تم اتباع القواعد الصحيحة
                    تحديد نوع بشرتك أمر مهم جداً بغض النظر عن روتين العناية بالبشرة الذي تنوين اتباعه. قبل البدء في العناية ببشرتك في المنزل، حددي ما إذا كانت بشرتك دهنية، جافة أو عادية بحيث يمكنك اختيار المنتجات المناسبة التي تتيح لك الحصول على أقصى استفادة</p>
                    استخدام ماسكات الوجه المصنوعة بالمنزل يضمن لك السيطرة على المكونات التي تُوضع على وجهك، لتجنب أضرار المواد المصنعة. هناك العديد من المكونات الطبيعية التي يمكنك مزجها لصنع ما تحتاجه بشرتك
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/face.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->




    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>بعض الصور من <span>موقعنا</span></h2>
          <p> هذه مجموعة من الصور عن الوصفات الموجودة بالموقع</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/eat.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/eat.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/eat1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/eat1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/des.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/des.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/des1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/des1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/hair.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/hair.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/hair1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/hair1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/face.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/face.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/face1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/face1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->





  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>صبايا</h3>
      <p>أفضل الوصفات والتركيبات للحصول علي أكل وحلويات صحية في المنزل وأيضا الاعتناء بالبشرة والشعر</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; أصلي -  <strong><span>صبايا</span></strong> - كل الحقوق محفوظة
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="<?php echo $js; ?>jquery-3.6.0.min.js"></script>
    <script src="<?php echo $js; ?>bootstrap.min.js"></script>
    <script src="<?php echo $js; ?>front.js"></script>

</body>

</html>