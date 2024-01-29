<?php echo $this->extend('layout/frontend_masterLayout');
echo  $this->section('body-frontend-content');
?>
<!-- page banner start -->
<div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/page-banner.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8">
        <div class="breadcrumb-inner text-center">
          <h2 class="page-title">Donation Details</h2>
          <ul class="page-list">
            <li><a href="index.html">Home</a></li>
            <li>Donation Details</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page banner end -->

<div class="cause-details-area py-120">
  <div class="container">
    <div class="row gap-60">
      <div class="col-lg-8">
        <div class="cause-details-content">
          <div class="details-image mb-30">
            <?php
            if (empty($causeDetails['details_images'])) { ?>
              <img src="<?= base_url(); ?>assets/backend/assets/img/causes/cause-details.jpg" alt="Cause details">
            <?php } else { ?>
              <img src="<?= base_url(); ?>assets/backend/assets/images/causes/main/<?= $causeDetails['details_images'] ?>" alt="<?= !empty($causeDetails['cause_title']) ? $causeDetails['cause_title'] : "" ?>">
            <?php  }
            ?>

          </div>
          <h3 class="title"><?= !empty($causeDetails['cause_title']) ? $causeDetails['cause_title'] : "" ?></h3>
          <p><?= !empty($causeDetails['cause_short_description']) ? $causeDetails['cause_short_description'] : "" ?></p>
          <div class="cause-price mt-30">
            <span><?= !empty($causeDetails['raised_amount']) ? "Raised :" . '<i class="fas fa-rupee-sign"></i>' . " "  . $causeDetails['raised_amount'] : "Raised : " . '<i class="fas fa-rupee-sign"></i>' . " "  . 0 ?></span>
            <span>Goal : <?= !empty($causeDetails['goal_amount']) ? '<i class="fas fa-rupee-sign"></i>' . " "  . $causeDetails['goal_amount'] : "Goal: " . '<i class="fas fa-rupee-sign"></i>' . " "  . 0 ?></span>
          </div>
          <?php
          if ($causeDetails['raised_amount'] != 0) {
            $progress = ($causeDetails['raised_amount'] / $causeDetails['goal_amount']) * 100;
          } else {
            $progress = 0;
          }

          ?>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?= $progress; ?>%">
            </div>
          </div>
          <div class="row pt-30 pb-5">
            <?php
            foreach ($causeDetails['cause_thumbnail_images'] as $key => $value) { ?>
              <div class="col-sm-6">
                <div class="image mb-30">
                  <img src="<?= base_url(); ?>assets/backend/assets/images/causes/detailImages/<?= $value ?>" alt="Cause">
                </div>
              </div>
            <?php }
            ?>

          </div>
          <p><?= !empty($causeDetails['cause_long_description']) ? $causeDetails['cause_long_description'] : "" ?>
          </p>
          <br>
          <h4>Why Donate for Child Education</h4>
          <div class="row pt-15 pb-30">
            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
              <div class="feature-item feature-item--bordered">
                <div class="feature-item__icon"><i class="flaticon-help"></i></div>
                <h5><a href="cause-details.html">Donate and Help</a></h5>
                <p>Fusce vulputate pureleestibulum purus qlerisque umollis</p>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
              <div class="feature-item feature-item--bordered">
                <div class="feature-item__icon feature-item__icon--green"><i class="flaticon-heart"></i></div>
                <h5><a href="cause-details.html">With Big Strength</a></h5>
                <p>Fusce vulputate pureleestibulum purus qlerisque umollis</p>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
              <div class="feature-item feature-item--bordered">
                <div class="feature-item__icon feature-item__icon--yellow"><i class="flaticon-donation"></i></div>
                <h5><a href="cause-details.html">Full Inspiration</a></h5>
                <p>Fusce vulputate pureleestibulum purus qlerisque umollis</p>
              </div>
            </div>
          </div>
        </div>
        <form action="#" class="donation-form">
          <div class="row">
            <div class="col-lg-12">
              <h5>How Mouch Would You Like To Donate ?</h5>
              <div class="custom-radio-price">
                <div class="radio-item">
                  <input type="radio" name="donationPrice" id="price50" checked>
                  <label for="price50">50$</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="donationPrice" id="price100">
                  <label for="price100">100$</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="donationPrice" id="price200">
                  <label for="price200">200$</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="donationPrice" id="price300">
                  <label for="price300">300$</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="donationPrice" id="price400">
                  <label for="price400">400$</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="donationPrice" id="priceAmount">
                  <label for="priceAmount">Other your amount</label>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <h5>I want like to make</h5>
              <div class="custom-radios">
                <div class="radio-item">
                  <input class="form-check-input" type="radio" name="donationType" id="oneTime" checked>
                  <label class="form-check-label" for="oneTime">
                    One Time
                  </label>
                </div>
                <div class="radio-item">
                  <input class="form-check-input" type="radio" name="donationType" id="monthly">
                  <label class="form-check-label" for="monthly">
                    Monthly
                  </label>
                </div>
                <div class="radio-item">
                  <input class="form-check-input" type="radio" name="donationType" id="yearly">
                  <label class="form-check-label" for="yearly">
                    Yearly
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <h5>Personal Info</h5>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" class="form-control" value="" placeholder="Your First Name" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" class="form-control" value="" placeholder="Your Last Name" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="" placeholder="Your Email Address" required>
              </div>
            </div>
            <!-- <div class="col-lg-12">
              <h5>Select Payment Method</h5>
              <div class="custom-radios">
                <div class="radio-item">
                  <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                  <label class="form-check-label" for="creditCard">
                    Credit Card
                  </label>
                </div>
                <div class="radio-item">
                  <input class="form-check-input" type="radio" name="paymentMethod" id="payPal">
                  <label class="form-check-label" for="payPal">
                    PayPal
                  </label>
                </div>
                <div class="radio-item">
                  <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer">
                  <label class="form-check-label" for="bankTransfer">
                    Bank Transfer
                  </label>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <h5>Credit Card Info</h5>
            </div>
             <div class="col-sm-6">
              <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" class="form-control" value="" placeholder="Card Number">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="cvc_number">CVC</label>
                <input type="text" id="cvc_number" name="cvc" class="form-control" value="" placeholder="CVC">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="cardholderName">Cardholder Name</label>
                <input type="text" id="cardholderName" name="cardholderName" class="form-control" value="" placeholder="Cardholder Name">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="expirationDate">Expiration</label>
                <input type="date" id="expirationDate" name="expirationDate" class="form-control" value="">
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="form-group pt-10 mb-0">
                <div class="total-price">
                  <div class="price-part">
                    <h5>Total donation</h5>
                    <span class="price">$50</span>
                  </div>
                  <button type="submit" class="btn ml-5">Donation Now</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>






      <div class="col-lg-4">
        <div class="main-sidebar rmt-75">
          <div class="widget widget-recent-causes">
            <h5 class="widget-title">Recent Causes</h5>
            <ul>
              <li>
                <div class="image">
                  <img src="<?= base_url(); ?>assets/backend/assets/images/causes/thumbnail/<?= $causeDetails['thumbnail_image'] ?>" alt="Cause">
                </div>
                <div class="content">
                  <h6><a href="cause-details.html">Clothes For Everyone</a></h6>
                  <div class="cause-price">
                    <span><i class="flaticon-line-chart"></i> Raised : $23,785</span>
                    <span><i class="flaticon-target"></i> Goal : $87,563</span>
                  </div>
                </div>
              </li>
              <li>
                <div class="image">
                  <img src="<?= base_url(); ?>assets/frontend/assets/img/widgets/cause2.jpg" alt="Cause">
                </div>
                <div class="content">
                  <h6><a href="cause-details.html">New Kindergarten</a></h6>
                  <div class="cause-price">
                    <span><i class="flaticon-line-chart"></i> Raised : $17,568</span>
                    <span><i class="flaticon-target"></i> Goal : $20,898</span>
                  </div>
                </div>
              </li>
              <li>
                <div class="image">
                  <img src="<?= base_url(); ?>assets/frontend/assets/img/widgets/cause3.jpg" alt="Cause">
                </div>
                <div class="content">
                  <h6><a href="cause-details.html">Food for childen</a></h6>
                  <div class="cause-price">
                    <span><i class="flaticon-line-chart"></i> Raised : $30,635</span>
                    <span><i class="flaticon-target"></i> Goal : $50,658</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="widget widget_cta">
            <div class="cta-widget-inner" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/widgets/cta-bg.jpg);">
              <h5>We have provided financial help to 5 million people</h5>
              <a class="btn ml-5" href="<?= base_url('donate') ?>">Donate Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>