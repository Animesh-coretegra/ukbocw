<?php echo $this->extend('layout/frontend_masterLayout');
echo  $this->section('body-frontend-content'); ?>
<!-- Hero Area start -->
<?php
$sliderImg = "";
if (!empty($sliderData)) {
  $sliderImg = "assets/backend/assets/images/" . $sliderData['slider_image'];
} else {
  $sliderImg = "assets/frontend/assets/img/hero/hero.jpg";
}

?>
<div class="hero-area bgs-cover overlay pt-155 pb-170" style="background-image: url(<?= base_url() . $sliderImg ?>);">
  <div class="container container-1370">
    <div class="hero-content text-center text-white">
      <h1><?= !empty($sliderData) ? $sliderData['slider_title'] : "" ?></h1>
      <p><?= !empty($sliderData) ? $sliderData['slider_subtitle'] : "" ?></p>
      <div class="hero-btns pt-30 rpt-10">
        <a class="btn" href="<?= base_url('donate'); ?>">Donate Now</a>
        <a class="btn btn--yellow btn--style-two" href="<?= base_url('contact'); ?>">Contact us</a>
      </div>
    </div>
  </div>
</div>
<!-- Hero Area end -->
<!-- Urgent cause area start -->
<div class="urgent-cause-area overlay bgs-cover pt-120 pb-90 rel z-1" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/causes/urgent-causes.jpg);">
  <div class="container container-1370">
    <div class="row gap-40">
      <div class="col-xl-3 col-md-6">
        <div class="urgent-cause-content mb-30 rmb-65">
          <div class="section-title mb-30">
            <span class="section-title__subtitle mb-30">Urgent cause</span>
            <h3>We help more than <span>9k children</span> every year</h3>
          </div>
          <p>BigHearts is the largest global crowdfunding community connecting nonprofits, donors, and
            companies in nearly every country. We help nonprofits from</p>
          <a class="btn ml-5 mt-35" href="<?= base_url('donate'); ?>">View All causes</a>
        </div>
      </div>
      <?php
      if (isset($causeData) && !empty($causeData)) {
        foreach ($causeData as $key => $causeValue) { ?>
          <div class="col-xl-3 col-md-6">
            <div class="cause-item">
              <div class="image">
                <?php
                if (empty($causeValue['thumbnail_image'])) { ?>
                  <img src="http://localhost/gujarish/assets/frontend/assets/img/causes/cause1.jpg" alt="Cause">
                <?php } else { ?>
                  <a href="<?= base_url('cause-details/') . base64_encode(urlencode($causeValue['cause_id'])); ?>"> <img src="<?= base_url(); ?>assets/backend/assets/images/causes/thumbnail/<?= $causeValue['thumbnail_image'] ?>" alt="<?= !empty($causeValue['cause_title']) ? $causeValue['cause_title'] : "" ?>"></a>
                <?php  }
                ?>

              </div>
              <div class="content">
                <h5><a href="<?= base_url('cause-details/') . base64_encode(urlencode($causeValue['cause_id'])); ?>"><?= !empty($causeValue['cause_title']) ? $causeValue['cause_title'] : "" ?></a></h5>
                <p><?= !empty($causeValue['cause_short_description']) ? $causeValue['cause_short_description'] : "" ?></p>
                <div class="cause-price">
                  <span><?= !empty($causeValue['raised_amount']) ? "Raised :" . '<i class="fas fa-rupee-sign"></i>' . " "  . $causeValue['raised_amount'] : "Raised : " . '<i class="fas fa-rupee-sign"></i>' . " "  . 0 ?></span>
                  <span>Goal : <?= !empty($causeValue['goal_amount']) ? '<i class="fas fa-rupee-sign"></i>' . " "  . $causeValue['goal_amount'] : "Goal: " . '<i class="fas fa-rupee-sign"></i>' . " "  . 0 ?></span>
                </div>
                <?php
                if ($causeValue['raised_amount'] != 0) {
                  $progress = ($causeValue['raised_amount'] / $causeValue['goal_amount']) * 100;
                } else {
                  $progress = 0;
                }

                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?= $progress; ?>%">
                  </div>
                </div>
                <div class="cause-btn">
                  <a class="btn" href="">Donation now</a>
                </div>
              </div>
            </div>
          </div>
      <?php }
      }
      ?>

    </div>
  </div>
  <div class="urgent-cause-shapes">
    <img class="one top_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/half-circle-with-dots.png" alt="Shape">
    <img class="two left_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/circle-with-line-red.png" alt="Shape">
    <img class="three right_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/circle-with-line-green.png" alt="Shape">
  </div>
</div>
<!-- Urgent cause area end -->

<!-- About area start -->
<div class="about-area py-120">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-image-part">
          <div class="row">
            <div class="col-sm-6">
              <div class="image">
                <img src="<?= base_url(); ?>assets/frontend/assets/img/about/about1.jpg" alt="About">
              </div>
              <div class="project-complete mb-30">
                <div class="project-complete__icon">
                  <i class="flaticon-charity"></i>
                </div>
                <div class="project-complete__content">
                  <h5>We Complate 15000+ Project</h5>
                  <span>Donet for charity</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="image mt-65 rmt-15 rel">
                <img src="<?= base_url(); ?>assets/frontend/assets/img/about/about2.jpg" alt="About">
                <div class="experiences-years">
                  <span class="experiences-years__number">25</span>
                  <span class="experiences-years__text">Years Experiences</span>
                </div>
              </div>
              <div class="image">
                <img src="<?= base_url(); ?>assets/frontend/assets/img/about/about3.jpg" alt="About">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-content-part rmt-65">
          <div class="section-title mb-60">
            <span class="section-title__subtitle mb-10">About us</span>
            <h2>Check what makes us different <span>than others</span></h2>
          </div>
          <p>There are many variations of passages of orem Ipsum available, but the majority have suffered
            alteration in some form, by cted ipsum dolor sit amet, consectetur adipisicing elit, sed do
            usmod mponcid idunt ut labore et dolore magna aliqua.</p>
          <div class="counter-item counter-text-wrap mt-30">
            <div class="counter-item__icon"><i class="flaticon-solidarity"></i></div>
            <div class="counter-item__content">
              <span class="count-text" data-speed="3000" data-stop="876000">0</span>
              <span class="counter-title">Raised by 78,000 people in one year</span>
            </div>
          </div>
          <div class="counter-item counter-text-wrap">
            <div class="counter-item__icon counter-item__icon--green"><i class="flaticon-help"></i>
            </div>
            <div class="counter-item__content">
              <span class="count-text" data-speed="3000" data-stop="45000">0</span>
              <span class="counter-title">Volunteers are available to help you</span>
            </div>
          </div>
          <a class="btn ml-5 mt-25" href="<?= base_url('about'); ?>">Didcover more</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About area end -->


<!-- Why Choose Us area start -->
<div class="why-choose-area overlay py-120">
  <div class="container">
    <div class="row gap-100 align-items-center">
      <div class="col-lg-6">
        <div class="why-choose-content text-white rmb-65">
          <div class="section-title mb-60">
            <span class="section-title__subtitle mb-10">Why Choose Us</span>
            <h2>Trusted non profit donation <span>center</span></h2>
          </div>
          <div class="vission-mission-tab">
            <ul class="nav mb-25" role="tablist">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#mission">Mission</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vission">Vission</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#velu">Company
                  Velu</button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="mission">Our Mission: There are many
                variations of passages of Lorem Ipsum available, but the majority have suffered
                alteration in some form, by injected humour, or random aset words which don't look
                even slightly believable.</div>
              <div class="tab-pane fade" id="vission">Our Vission: There are many variations of
                passages of Lorem Ipsum available, but the majority have suffered alteration in some
                form, by injected humour, or random aset words which don't look even slightly
                believable.</div>
              <div class="tab-pane fade" id="velu">Our Company Velu: There are many variations of
                passages of Lorem Ipsum available, but the majority have suffered alteration in some
                form, by injected humour, or random aset words which don't look even slightly.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="why-choose-video">
          <div class="video rel">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/video/video-bg.jpg" alt="Video">
            <a class="video-play video-play--one" href="https://www.youtube.com/embed/Wimkqo8gDZ0" data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
          </div>
          <img class="leaf-shape top_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/three-round-green.png" alt="Shape">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Why Choose Us area end -->


<!-- Our cause area start -->
<div class="our-cause-area pt-120 pb-90 rel z-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="section-title text-center mb-50">
          <span class="section-title__subtitle mb-10">Our Causes</span>
          <h3>Our <span>Latest Causes</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati
            consectetur adipisicing</p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $i = 0;

      if (isset($latestData) && !empty($latestData)) {
        foreach ($latestData as $key => $latestValue) {
          $mainClass = "";
          $buttonClass = "";
          $progress = "";
          if ($i == 2) {
            $buttonClass = "btn--green";
            $progress = "progress-bar--green";
            $i = 0;
          } else if ($i == 1) {
            $buttonClass = "btn--yellow";
            $progress = "progress-bar--yellow";
            $i++;
          } else {
            $progress = "";
            $i++;
          }

      ?>
          <div class="col-xl-3 col-md-6">
            <div class="cause-item">
              <div class="image">
                <?php
                if (empty($latestValue['thumbnail_image'])) { ?>
                  <img src="http://localhost/gujarish/assets/frontend/assets/img/causes/cause1.jpg" alt="Cause">
                <?php } else { ?>
                  <a href="<?= base_url('cause-details/') . base64_encode(urlencode($latestValue['cause_id'])); ?>"> <img src="<?= base_url(); ?>assets/backend/assets/images/causes/thumbnail/<?= $latestValue['thumbnail_image'] ?>" alt="<?= !empty($latestValue['cause_title']) ? $latestValue['cause_title'] : "" ?>"></a>
                <?php  }
                ?>
              </div>
              <div class="content">
                <h5><a href="causes.html"><?= !empty($latestValue['cause_title']) ? $latestValue['cause_title'] : "" ?></a></h5>
                <p><?= !empty($latestValue['cause_short_description']) ? $latestValue['cause_short_description'] : "" ?></p>
                <div class="cause-price">
                  <span><?= !empty($latestValue['raised_amount']) ? "Raised :" . '<i class="fas fa-rupee-sign"></i>' . " "  . $latestValue['raised_amount'] : "Raised : " . '<i class="fas fa-rupee-sign"></i>' . " "  . 0 ?></span>
                  <span>Goal : <?= !empty($latestValue['goal_amount']) ? '<i class="fas fa-rupee-sign"></i>' . " "  . $latestValue['goal_amount'] : "Goal: " . '<i class="fas fa-rupee-sign"></i>' . " "  . 0 ?></span>
                </div>
                <div class="progress">
                  <?php
                  if ($latestValue['raised_amount'] != 0) {
                    $progressPercent = ($latestValue['raised_amount'] / $latestValue['goal_amount']) * 100;
                  } else {
                    $progressPercent = 0;
                  }

                  ?>
                  <div class="progress-bar <?= $progress; ?> progress-bar-striped progress-bar-animated" style="width: <?= $progressPercent ?>%">
                  </div>
                </div>
                <div class="cause-btn">
                  <a class="btn <?= $buttonClass; ?>" href="#">Donation now</a>
                </div>
              </div>
            </div>
          </div>
      <?php  }
      }
      ?>
    </div>
  </div>
  <div class="our-cause-shapes">
    <img class="one top_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/three-round-green.png" alt="Shape">
  </div>
</div>
<!-- Our cause area end -->


<!-- Features area start -->
<div class="features-area rel bgs-cover z-1" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/feature-bg.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-xl-3">
        <div class="feature-left-wrap bgs-cover text-white overlay" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/feature-slider-bg.jpg);">
          <div class="feature-left-slider">
            <div class="feature-single-slide">
              <div class="section-title mb-40">
                <h3>Child Education Help</h3>
                <p>Your little help can make milion childrean smile model sentence structures</p>
              </div>
              <a class="btn" href="<?= base_url('donate'); ?>">Donation now</a>
            </div>
            <div class="feature-single-slide">
              <div class="section-title mb-40">
                <h3>Child Education Help</h3>
                <p>Your little help can make milion childrean smile model sentence structures</p>
              </div>
              <a class="btn btn--yellow" href="#">Donation now</a>
            </div>
            <div class="feature-single-slide">
              <div class="section-title mb-40">
                <h3>Child Education Help</h3>
                <p>Your little help can make milion childrean smile model sentence structures</p>
              </div>
              <a class="btn btn--green" href="#">Donation now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9">
        <div class="feature-content">
          <div class="row justify-content-between">
            <div class="col-lg-8">
              <div class="section-title mb-35">
                <span class="section-title__subtitle mb-10">Our Features</span>
                <h2>How Could <span>You Help?</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem
                  obcaecati consectetur adipisicing</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="slider-arrow text-lg-end mb-20">
                <button class="feature-prev"><i class="flaticon-left-chevron"></i></button>
                <button class="feature-next"><i class="flaticon-next"></i></button>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="feature-right-slider mt-20">
                <div class="feature-item">
                  <div class="feature-item__icon"><i class="flaticon-help"></i></div>
                  <h4><a href="cause-details.html">Become an volunteer</a></h4>
                  <p>Lorem ipsum dolor sit amet consect cingo eiusmod tempor sentence structures
                    to generate Lorem Ipsum </p>
                </div>
                <div class="feature-item">
                  <div class="feature-item__icon feature-item__icon--green"><i class="flaticon-solidarity"></i></div>
                  <h4><a href="cause-details.html">Quick Fundraising</a></h4>
                  <p>Lorem ipsum dolor sit amet consect cingo eiusmod tempor sentence structures
                    to generate Lorem Ipsum </p>
                </div>
                <div class="feature-item">
                  <div class="feature-item__icon feature-item__icon--yellow"><i class="flaticon-donation"></i></div>
                  <h4><a href="cause-details.html">Start Donating</a></h4>
                  <p>Lorem ipsum dolor sit amet consect cingo eiusmod tempor sentence structures
                    to generate Lorem Ipsum </p>
                </div>
                <div class="feature-item">
                  <div class="feature-item__icon"><i class="flaticon-help"></i></div>
                  <h4><a href="cause-details.html">Become an volunteer</a></h4>
                  <p>Lorem ipsum dolor sit amet consect cingo eiusmod tempor sentence structures
                    to generate Lorem Ipsum </p>
                </div>
                <div class="feature-item">
                  <div class="feature-item__icon feature-item__icon--green"><i class="flaticon-solidarity"></i></div>
                  <h4><a href="cause-details.html">Quick Fundraising</a></h4>
                  <p>Lorem ipsum dolor sit amet consect cingo eiusmod tempor sentence structures
                    to generate Lorem Ipsum </p>
                </div>
                <div class="feature-item">
                  <div class="feature-item__icon feature-item__icon--yellow"><i class="flaticon-donation"></i></div>
                  <h4><a href="cause-details.html">Start Donating</a></h4>
                  <p>Lorem ipsum dolor sit amet consect cingo eiusmod tempor sentence structures
                    to generate Lorem Ipsum </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="feature-shapes">
    <img class="one right_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/three-round-green.png" alt="Shape">
  </div>
</div>
<!-- Features area end -->


<!-- Our Event area start -->
<div class="our-event-area pt-120 pb-95 rel z-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="section-title text-center mb-65">
          <span class="section-title__subtitle mb-10">Our Event</span>
          <h3>Our <span>Upcoming Event</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati
            consectetur adipisicing</p>
        </div>
      </div>
    </div>
    <div class="row events-active">
      <?php
      if (isset($upcomingEvent) && !empty($upcomingEvent)) {
        foreach ($upcomingEvent as $key => $eventValue) { ?>
          <?php
          $currentDate = !empty($eventValue['event_date_time']) ?  $eventValue['event_date_time'] : "";
          if (!empty($currentDate)) {
            $dateTime = new DateTime($currentDate);
            $eventDate = $dateTime->format('M d, Y');
          }
          $eventImg = "";
          if (!empty($eventValue['thumbnail_image'])) {
            $eventImg = "assets/backend/assets/images/events/" . $eventValue['thumbnail_image'];
          } else {
            $eventImg = "assets/frontend/assets/img/events/event1.jpg";
          }

          ?>
          <div class="col-xl-4 col-md-6 item">
            <div class="event-item">
              <img src="<?= base_url() . $eventImg; ?>" alt="Event">
              <div class="event-item__hover">
                <h4><a href="<?= base_url('event-details/') . base64_encode(urlencode($eventValue['event_id'])); ?>"><?= !empty($eventValue['event_title']) ? $eventValue['event_title'] : "" ?></a></h4>
                <ul>
                  <li><i class="flaticon-time"></i> <span><?= $eventDate; ?></span></li>
                  <li><i class="flaticon-map"></i> <span><?= !empty($eventValue['event_venue_city']) ? $eventValue['event_venue_city'] : "" ?></span></li>
                </ul>
              </div>
            </div>
          </div>
      <?php }
      }
      ?>


    </div>
  </div>
</div>
<!-- Our Event area end -->


<!-- Become Volunteer area start -->
<div class="become-volunteer-area py-120 overflow-hidden rel z-1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="volunteer-image rmb-65">
          <img src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer-left.png" alt="valunteer">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="volunteer-content form-style-one text-white">
          <div class="section-title mb-45">
            <span class="section-title__subtitle mb-10">Our Volunteer</span>
            <h3>Become a <span>volunteer</span></h3>
          </div>
          <form action="#" class="volunteer-form">
            <div class="row">
              <div class="col-xl-9 mb-10">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt</p>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">Your Name</label>
                  <input type="text" id="name" name="name" class="form-control" value="" placeholder="Your Name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Your Email</label>
                  <input type="email" id="email" name="email" class="form-control" value="" placeholder="Email Address" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" id="phone_number" name="phone_number" class="form-control" value="" placeholder="Phone Number">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="birth-day">Date Of Birth</label>
                  <input type="date" id="birth-day" name="birth-day" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" class="form-control" rows="3" placeholder="Write Your Messages" required></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group pt-10 mb-0">
                  <button type="submit" class="btn ml-5">Send us a message</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="become-volunteer-shapes">
    <img class="one" src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer-bg.png" alt="Shape">
    <img class="two" src="<?= base_url(); ?>assets/frontend/assets/img/valunteer/valunteer-bg.png" alt="Shape">
  </div>
</div>
<!-- Become Volunteer area end -->


<!-- Volunteer area start -->
<div class="volunteer-area pt-120 pb-90 rel z-1">
  <div class="container container-1170">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="section-title text-center mb-60">
          <span class="section-title__subtitle mb-10">Our Volunteers</span>
          <h3>Meet <span>With Volunteers</span></h3>
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
    </div>
  </div>
  <div class="valunteet-shapres">
    <img class="one top_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/hand-glass.png" alt="Shape">
    <img class="two left_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/circle-with-line-red.png" alt="Shape">
    <img class="three right_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/heart.png" alt="Shape">
    <img class="four top_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/house-heart.png" alt="Shape">
  </div>
</div>
<!-- Volunteer area end -->



<!-- Call to action area start -->
<div class="cta-area overlay bgs-cover pt-110 rpt-120 pb-120" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/cta.jpg);">
  <div class="container container-1170">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10">
        <div class="section-title text-center text-white">
          <h2>Welcome To Save Life And Make A Positive <span>Impact</span></h2>
          <p>Only when the society comes together and contributeswe will be able to make an impact.</p>
          <a class="btn mt-30" href="<?= base_url('donate'); ?>">Donate Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Call to action area end -->


<!-- Blog area start -->
<div class="blog-area pt-120 pb-90 rel z-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-x col-lg-8 col-md-10">
        <div class="section-title text-center mb-60">
          <span class="section-title__subtitle mb-10">Our Blog Post</span>
          <h2>Our Latest <span>News & Update</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati
            consectetur adipisicing</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-4 col-md-6">
        <div class="blog-item">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog1.jpg" alt="Blog">
            <div class="post-date">
              <b>13</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">tincidunt egeting semper</a></h4>
            <p>Maximus a augue. Nullam ante nunc poraretra are oullam fringill sem ealiquam
              suscipit.......</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6">
        <div class="blog-item">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog2.jpg" alt="Blog">
            <div class="post-date">
              <b>20</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">Aenean viverra rhoncus </a></h4>
            <p>Maximus a augue. Nullam ante nunc poraretra are oullam fringill sem ealiquam
              suscipit.......</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6">
        <div class="blog-item">
          <div class="blog-item__img">
            <img src="<?= base_url(); ?>assets/frontend/assets/img/blog/blog3.jpg" alt="Blog">
            <div class="post-date">
              <b>31</b>
              <span>dec</span>
            </div>
          </div>
          <div class="blog-item__content">
            <ul class="blog-meta">
              <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
              <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
            </ul>
            <h4><a href="blog-details.html">Donec vitae sapien libero</a></h4>
            <p>Maximus a augue. Nullam ante nunc poraretra are oullam fringill sem ealiquam
              suscipit.......</p>
            <a href="blog-details.html" class="read-more">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img class="blog-shape-one top_image_bounce" src="<?= base_url(); ?>assets/frontend/assets/img/shapes/three-round-yellow.png" alt="Shape">
</div>
<!-- Blog area end -->

<?= $this->endSection(); ?>