<?php 
ob_start();
    session_start();
    $pageTitle = 'الإتصال';
    include "init.php";

  ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php getTitle(); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

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
  <header style="top:0;" id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">



      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="index.php">عن الموقع</a></li>
          <li><a class="nav-link scrollto" href="index.php">مميزات</a></li>
          <li><a class="nav-link scrollto" href="index.php">الصور</a></li>
          <li class="dropdown"><a href=""><span>الأقسام</span> <i class="bi bi-chevron-down"></i></a>
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
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="margin-top:50px;">
      <div class="container">

        <div class="section-title">
          <h2><span>اتصل</span> بنا</h2>
          <p>يمكنك ارسال رسالة الينا للاصتفسار عن أي شئ أو اضافة وصفات جديدة</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed/v1/place?q=mansoura%20university&key=AIzaSyC2QBUYIKCu3_6Ije44qoEx4YhaeAR6uoA" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>العنوان :</h4>
              <p>جامعة<br>المنصورة</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>ساعات العمل :</h4>
              <p>سوميا<br>10:00 صياحا - 10:00 مساءا</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>البريد الإلكتروني :</h4>
              <p>info@example.com<br>contact@example.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>الاتصال :</h4>
              <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
            </div>
          </div>
        </div>

        <form style="margin-top: 50px;" action="contact.php" method="post">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="أدخل اسمك" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="أدخل بريدك الالكتروني" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="الرسالة" required></textarea>
          </div>
          <div class="text-center"><button class="btn btn-warning" type="submit">إرسال رسالة</button></div>
        </form>
<?php
                
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //get variables from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $con->prepare("INSERT INTO contact (name, email, subject, message)
     VALUES (:name, :email, :subject, :message)");
    $stmt->execute(array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    )); 

    echo '<div class="alert alert-success">لقد تم ارسال رسالتك بنجاح</div>';
    header("refresh:2;url=index.php");
    exit();

}

?>
      </div>
    </section><!-- End Contact Section -->

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

      <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
ob_end_flush();
?>