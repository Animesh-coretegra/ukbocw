<!-- navbar start -->
<div class="navbar-top pt-15 pb-10 bgc-black navtop--one">
  <div class="container">
    <div class="navtop-inner">
      <ul class="topbar-left">
        <li><span>HI</span>, Good Afternoon Dude! </li>
        <li><i class="flaticon-pin"></i> Shiloh, Hawaii 81063</li>
      </ul>
      <ul class="topbar-right">
        <li class="social-area">
          <span>Follow Us - </span>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<nav class="navbar navbar--one navbar-area navbar-expand-lg">
  <div class="container nav-container navbar-bg">
    <div class="responsive-mobile-menu">
      <button class="menu toggle-btn d-block d-lg-none" data-target="#Iitechie_main_menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-left"></span>
        <span class="icon-right"></span>
      </button>
    </div>
    <div class="logo">
      <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/backend/assets/images/gujarishLogo.png" alt="img" height="100"></a>
    </div>
    <div class="nav-right-part nav-right-part-mobile">
      <a class="search-bar-btn" href="#">
        <i class="flaticon-magnifying-glass"></i>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="Iitechie_main_menu">
      <ul class="navbar-nav menu-open text-lg-end">
        <li>
          <a href="<?= base_url(); ?>">Home</a>
        </li>
        <li>
          <a href="<?= base_url('about'); ?>">About Us</a>
        </li>
        <li>
          <a href="<?= base_url('events'); ?>">Event</a>
        </li>
        <li>
          <a href="<?= base_url('teams'); ?>">Our Teams</a>
        </li>
        <li>
          <a href="<?= base_url('blog'); ?>">Blog</a>
        </li>
        <li>
          <a href="<?= base_url('contact'); ?>">Contact us</a>
        </li>

      </ul>
    </div>
    <div class="nav-right-part nav-right-part-desktop">
      <div class="dropdown">
        <a class="dropdown-toggle" href="<?= base_url('sign-in') ?>">
          <i class="flaticon-user-1"></i>
        </a>
      </div>
      <a class="btn btn--style-two" href="<?= base_url('donate'); ?>">Donate Now</a>
    </div>
  </div>
</nav>
<!-- navbar end -->