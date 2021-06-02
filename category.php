<?php 

session_start();
include "init.php";
$pagename = '';
$pageTitle = 'الأقسام';
if (!isset($_GET['pagename'])) {
    $_GET['pagename'] = 'Choose category to show';
}

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
<header style="top:0;" id="header" class="fixed-top d-flex align-items-center">
<div class="container-fluid container-xl d-flex align-items-center justify-content-between">



  <nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
      <li><a class="nav-link scrollto active" href="index.php">الرئيسية</a></li>
      <li><a class="nav-link scrollto" href="index.php">عن الموقع</a></li>
      <li><a class="nav-link scrollto" href="index.php">مميزات</a></li>
      <li><a class="nav-link scrollto" href="index.php">الصور</a></li>
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

<div style="margin-top:100px;margin-bottom:50px;" class="container cats text-center">
    <h1 class="ais text-center"><?php echo str_replace('-',' ',$_GET['pagename']); ?></h1>
    <div class="row">
    <?php
        $pageid =  isset($_GET['pageid']) && is_numeric($_GET['pageid']) ? intval($_GET['pageid']) : 0;
        foreach (getItem('cat_id', $pageid) as $item) {

            echo '<div class="text-center col-xs-12 col-sm-6 col-md-3 cat-info">';
            ?>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo 'admin/uploads/' . $item['image']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['name']; ?></h5>
                        <div class="sidebar-resources-categories">الخطوات</div>
                        <p class="card-text"><?php echo $item['description']; ?></p>
                    </div>
                </div>
            <?php
            echo '</div>';
            
        }
    ?>
    </div>
</div> 


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