<?php echo $this->extend('layout/frontend_masterLayout');
echo  $this->section('body-frontend-content');
?>
<!-- page banner start -->
<div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/page-banner.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8">
        <div class="breadcrumb-inner text-center">
          <h2 class="page-title">Our Latest Event</h2>
          <ul class="page-list">
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li>Events</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page banner end -->


<!-- Our events area start -->
<div class="our-events-page py-120 rel z-1">
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
            $mainClass = "item--green";
            $i = 0;
          } else if ($i == 1) {
            $mainClass = "item--yellow";
            $i++;
          } else {
            $i++;
          }
          $currentDate = !empty($causeValue['event_date_time']) ?  $causeValue['event_date_time'] : "";
          if (!empty($currentDate)) {
            $dateTime = new DateTime($currentDate);
            $eventDate = $dateTime->format('M d, Y');
          }
      ?>
          <div class="col-xl-4 col-md-6">
            <div class="event-item-three <?= $mainClass; ?>">
              <div class="image">
                <?php
                if (empty($causeValue['thumbnail_image'])) { ?>
                  <img src="<?= base_url(); ?>assets/frontend/assets/img/events/event-three1.jpg" alt="Event">
                <?php } else { ?>
                  <a href="<?= base_url('event-details/') . base64_encode(urlencode($causeValue['event_id'])); ?>"> <img src="<?= base_url(); ?>assets/backend/assets/images/events/<?= $causeValue['thumbnail_image'] ?>" alt="<?= !empty($causeValue['event_title']) ? $causeValue['event_title'] : "" ?>"></a>
                <?php  }
                ?>
              </div>
              <div class="content">
                <h4><a href="<?= base_url('event-details/') . base64_encode(urlencode($causeValue['event_id'])); ?>"><?= !empty($causeValue['event_title']) ? $causeValue['event_title'] : "" ?></a></h4>
                <ul class="blog-meta">
                  <li><i class="flaticon-time"></i> <?= $eventDate ?></li>
                  <li><i class="flaticon-map"></i> <?= !empty($causeValue['event_venue_city']) ? $causeValue['event_venue_city'] : "" ?></li>
                </ul>
                <p><?= !empty($causeValue['event_short_description']) ? $causeValue['event_short_description'] : "" ?></p>
                <a class="event-btn" href="<?= base_url('event-details/') . base64_encode(urlencode($causeValue['event_id'])); ?>">Read more <i class="flaticon-chevron"></i></a>
              </div>
            </div>
          </div>
      <?php }
      } ?>

    </div>
    <div class="pagination pt-10">
      <?= $pager->links('default', 'common_pagination') ?>
    </div>
  </div>
</div>
<!-- Our events area end -->
<?= $this->endSection(); ?>