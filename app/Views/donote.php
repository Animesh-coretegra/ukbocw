  <!-- page banner start -->
  <?php echo $this->extend('layout/frontend_masterLayout');
  echo  $this->section('body-frontend-content');
  ?>
  <!-- page banner start -->
  <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/page-banner.jpg);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8">
          <div class="breadcrumb-inner text-center">
            <h2 class="page-title">Our Donation</h2>
            <ul class="page-list">
              <li><a href="index.html">Home</a></li>
              <li>Donation</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- page banner end -->


  <!-- Our cause area start -->
  <div class="our-cause-page py-120 rel z-1">
    <div class="container">
      <div class="row justify-content-center">
        <?php
        $i = 0;

        if (isset($causeData) && !empty($causeData)) {
          foreach ($causeData as $key => $causeValue) {
            $mainClass = "";
            $priceClass = "";
            $buttonClass = "";
            $progress = "";
            if ($i == 2) {
              $mainClass = "cause-green";
              $priceClass = "#20B86D";
              $buttonClass = "btn--green";
              $progress = "three";
              $i = 0;
            } else if ($i == 1) {
              $mainClass = "cause-yellow";
              $priceClass = "#FFB840";
              $buttonClass = "btn--yellow";
              $progress = "two";
              $i++;
            } else {
              $progress = "one";
              $priceClass = "#F84D42";
              $i++;
            }

        ?>
            <div class="col-xl-4 col-md-6">
              <div class="cause-item <?= $mainClass ?>">
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
                  <h4><a href="<?= base_url('cause-details/') . base64_encode(urlencode($causeValue['cause_id'])); ?>"><?= !empty($causeValue['cause_title']) ? $causeValue['cause_title'] : "" ?></a></h4>
                  <p><?= !empty($causeValue['cause_short_description']) ? $causeValue['cause_short_description'] : "" ?></p>
                  <div class="cause-price" style="color: <?= $priceClass ?>;font-weight:800;font-size:18px;">
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
                    <a class="btn <?= $buttonClass ?>" href="<?= base_url('cause-details/') . base64_encode(urlencode($causeValue['cause_id'])); ?>">Donation now</a>
                  </div>
                </div>
              </div>
            </div>
        <?php }
        }

        ?>
      </div>


      <div class="pagination pt-20">
        <?= $pager->links('default', 'common_pagination') ?>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>