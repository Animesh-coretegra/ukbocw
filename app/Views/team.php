<?php echo $this->extend('layout/frontend_masterLayout');
echo  $this->section('body-frontend-content'); ?>
<!-- page banner start -->
<div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/page-banner.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8">
        <div class="breadcrumb-inner text-center">
          <h2 class="page-title">Our Team</h2>
          <ul class="page-list">
            <li><a href="index.html">Home</a></li>
            <li>Team</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page banner end -->
<!-- Volunteer area one start -->
<div class="volunteer-style-one pt-120 pb-90 rel z-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="section-title text-center mb-60">
          <span class="section-title__subtitle mb-10">Our Teams</span>
          <h2>Our <span>Teams</span> </h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati
            consectetur adipisicing</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-4 col-sm-6">
        <div class="valunteer-item valunteer-item--green">
          <div class="valunteer-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer1.jpg" alt="Valunteer">
            <div class="share">
              <button><i class="flaticon-share"></i></button>
              <div class="share__socials">
                <a href="#"><i class="flaticon-google-plus-logo"></i></a>
                <a href="#" class="twitter"><i class="flaticon-twitter"></i></a>
                <a href="#" class="facebook"><i class="flaticon-facebook"></i></a>
              </div>
            </div>
          </div>
          <div class="valunteer-item__designation">
            <h5>Robart Jonson</h5>
            <span>volunteer</span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6">
        <div class="valunteer-item">
          <div class="valunteer-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer2.jpg" alt="Valunteer">
            <div class="share">
              <button><i class="flaticon-share"></i></button>
              <div class="share__socials">
                <a href="#"><i class="flaticon-google-plus-logo"></i></a>
                <a href="#" class="twitter"><i class="flaticon-twitter"></i></a>
                <a href="#" class="facebook"><i class="flaticon-facebook"></i></a>
              </div>
            </div>
          </div>
          <div class="valunteer-item__designation">
            <h5>Leslie Alexander</h5>
            <span>volunteer</span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6">
        <div class="valunteer-item valunteer-item--yellow">
          <div class="valunteer-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer3.jpg" alt="Valunteer">
            <div class="share">
              <button><i class="flaticon-share"></i></button>
              <div class="share__socials">
                <a href="#"><i class="flaticon-google-plus-logo"></i></a>
                <a href="#" class="twitter"><i class="flaticon-twitter"></i></a>
                <a href="#" class="facebook"><i class="flaticon-facebook"></i></a>
              </div>
            </div>
          </div>
          <div class="valunteer-item__designation">
            <h5>Kristin Watson</h5>
            <span>volunteer</span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6">
        <div class="valunteer-item valunteer-item--green">
          <div class="valunteer-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer4.jpg" alt="Valunteer">
            <div class="share">
              <button><i class="flaticon-share"></i></button>
              <div class="share__socials">
                <a href="#"><i class="flaticon-google-plus-logo"></i></a>
                <a href="#" class="twitter"><i class="flaticon-twitter"></i></a>
                <a href="#" class="facebook"><i class="flaticon-facebook"></i></a>
              </div>
            </div>
          </div>
          <div class="valunteer-item__designation">
            <h5>Guy Hawkins</h5>
            <span>volunteer</span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6">
        <div class="valunteer-item">
          <div class="valunteer-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer5.jpg" alt="Valunteer">
            <div class="share">
              <button><i class="flaticon-share"></i></button>
              <div class="share__socials">
                <a href="#"><i class="flaticon-google-plus-logo"></i></a>
                <a href="#" class="twitter"><i class="flaticon-twitter"></i></a>
                <a href="#" class="facebook"><i class="flaticon-facebook"></i></a>
              </div>
            </div>
          </div>
          <div class="valunteer-item__designation">
            <h5>Theresa Webb</h5>
            <span>volunteer</span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6">
        <div class="valunteer-item valunteer-item--yellow">
          <div class="valunteer-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer6.jpg" alt="Valunteer">
            <div class="share">
              <button><i class="flaticon-share"></i></button>
              <div class="share__socials">
                <a href="#"><i class="flaticon-google-plus-logo"></i></a>
                <a href="#" class="twitter"><i class="flaticon-twitter"></i></a>
                <a href="#" class="facebook"><i class="flaticon-facebook"></i></a>
              </div>
            </div>
          </div>
          <div class="valunteer-item__designation">
            <h5>Brooklyn Simmons</h5>
            <span>volunteer</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Volunteer area one end -->
<?= $this->endSection(); ?>