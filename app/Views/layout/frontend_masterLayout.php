<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php
  $session = session();
  ?>
  <title>Guzaarish | <?= !empty($session->get('pageTitle')) ? $session->get('pageTitle') : ""; ?></title>
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/backend/assets/images/gujarish-icon.png">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/flaticon.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/nice-select.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/magnific.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/spacing.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/slick.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/assets/css/style.css">
</head>

<body class='sc5'>

  <!-- preloader area start -->
  <div class="preloader" id="preloader">
    <div class="preloader-inner">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
  </div>
  <!-- preloader area end -->

  <!-- search popup start-->
  <div class="td-search-popup" id="td-search-popup">
    <form action="index.html" class="search-form">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search.....">
      </div>
      <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
  </div>
  <!-- search popup end-->
  <div class="body-overlay" id="body-overlay"></div>

  <!-- navigation -->

  <?= include('frontend_navigation.php') ?>

  <?= $this->renderSection('body-frontend-content'); ?>

  <!-- footer area start -->
  <footer class="footer-area mt-95 footer-area--three overlay text-white" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/footer/footer-three-bg.jpg);">
    <div class="container">
      <div class="footer-top">
        <div class="row no-gutter">
          <div class="col-lg-7">
            <div class="subscribe-part">
              <h4>Subscribe Newslatters</h4>
              <form action="#">
                <input type="email" placeholder="Email address" required>
                <button class="btn btn--style-two" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="hotline-part overlay bgs-cover" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/footer/footer-bg.jpg);">
              <h4><i class="flaticon-headphones"></i> Hot Line</h4>
              <span class="h3"><a href="callto:333444555">333 - 444 555</a></span>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-75 justify-content-between">
        <div class="col-xl-3 col-sm-6">
          <div class="widget widget_about">
            <div class="logo_footer mb-25">
              <a href="index.html">
                <img src="<?= base_url(); ?>assets/frontend/assets/img/logos/logo-white.png" alt="Logo">
              </a>
            </div>
            <p>Wimply dummy text of the priatypeset ting industry orem Ipsum has Maecenas quis eros at ante
              lacinia efficitur.</p>
            <div class="footer-counter-wrap">
              <div class="counter-item counter-text-wrap">
                <div class="counter-item__icon counter-item__icon--green"><i class="flaticon-solidarity"></i></div>
                <div class="counter-item__content">
                  <span class="count-text" data-speed="3000" data-stop="876000">0</span>
                  <h5 class="counter-title">Donation</h5>
                </div>
              </div>
              <div class="counter-item counter-text-wrap">
                <div class="counter-item__icon"><i class="flaticon-help"></i></div>
                <div class="counter-item__content">
                  <span class="count-text" data-speed="3000" data-stop="45000">0</span>
                  <h5 class="counter-title">Volunteers</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-3 col-6">
          <div class="widget widget_nav_menu">
            <h5 class="widget-title">About</h5>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Donation</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Event</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-2 col-sm-3 col-6">
          <div class="widget widget_nav_menu">
            <h5 class="widget-title">Quick links</h5>
            <ul>
              <li><a href="#">Causes</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">New campaign</a></li>
              <li><a href="#">Site map</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-5">
          <div class="row">
            <div class="col-sm-6">
              <div class="widget widget_recent_post">
                <h4 class="widget-title">Latest News</h4>
                <ul>
                  <li>
                    <div class="image">
                      <img src="<?= base_url(); ?>assets/frontend/assets/img/footer/latest-news1.jpg" alt="News">
                    </div>
                    <div class="content">
                      <h6><a href="blog-details.html">Children in South Africa</a></h6>
                      <span class="date"><a href="#"><i class="flaticon-time"></i> 12 Dec,
                          2022</a></span>
                    </div>
                  </li>
                  <li>
                    <div class="image">
                      <img src="<?= base_url(); ?>assets/frontend/assets/img/footer/latest-news2.jpg" alt="News">
                    </div>
                    <div class="content">
                      <h6><a href="blog-details.html">Education for All Poor Child</a></h6>
                      <span class="date"><a href="#"><i class="flaticon-time"></i> 18 Dec,
                          2022</a></span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="widget widget_map">
                <h4 class="widget-title">Our Footprint</h4>
                <img src="<?= base_url(); ?>assets/frontend/assets/img/footer/map.png" alt="Map">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom mt-30">
      <div class="container">
        <div class="footer-bottom__inner">
          <div class="donate-by">
            <span>Donate by :</span>
            <img src="<?= base_url(); ?>assets/frontend/assets/img/footer/donate-by.png" alt="Donate By">
          </div>
          <div class="copyright">
            <p>Copyright 2022 All Right Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer area end -->

  <!-- back to top area start -->
  <div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->

  <!-- all plugins here -->
  <script src="<?= base_url(); ?>assets/frontend/assets/js/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/nice-select.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/circle-progress.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/skill.bars.jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/magnific.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/appear.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/isotope.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/imageload.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/assets/js/slick.min.js"></script>

  <!-- main js  -->
  <script src="<?= base_url(); ?>assets/frontend/assets/js/main.js"></script>
</body>

</html>