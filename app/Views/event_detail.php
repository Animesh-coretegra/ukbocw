<?php echo $this->extend('layout/frontend_masterLayout');
echo  $this->section('body-frontend-content');
?>
<div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65" style="background-image: url(<?= base_url(); ?>assets/frontend/assets/img/background/page-banner.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8">
        <div class="breadcrumb-inner text-center">
          <h2 class="page-title">Event Details</h2>
          <ul class="page-list">
            <li><a href="index.html">Home</a></li>
            <li><a href="events.html">Events</a></li>
            <li>Event Details</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page banner end -->
<!-- Event Details area start -->
<div class="event-details-area py-120">
  <div class="container">
    <div class="row gap-60">
      <div class="col-lg-8">
        <div class="event-details-content mb-65">
          <div class="details-image mb-30">
            <?php
            if (empty($eventDetails['main_image'])) { ?>
              <img src="<?= base_url(); ?>assets/frontend/assets/img/events/event-details.jpg" alt="Event details">
            <?php } else { ?>
              <a href="<?= base_url('event-details/') . base64_encode(urlencode($eventDetails['event_id'])); ?>"> <img src="<?= base_url(); ?>assets/backend/assets/images/events/<?= $eventDetails['main_image'] ?>" alt="<?= !empty($eventDetails['event_title']) ? $eventDetails['event_title'] : "" ?>"></a>
            <?php  }
            ?>

          </div>
          <h3 class="title"><?= !empty($eventDetails['event_title']) ? $eventDetails['event_title'] : "" ?></h3>
          <p><?= !empty($eventDetails['event_long_description']) ? $eventDetails['event_long_description'] : "" ?></p>
        </div>
        <h4>Join With Us</h4>
        <form action="#" class="join-us-form form-style-two pt-15">
          <div class="row">
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
                <label for="subject">Subject</label>
                <select class="single-select" name="subject" id="subject">
                  <option value="default">Select One</option>
                  <option value="donation">Donation</option>
                  <option value="help">For Help</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Write Your Messages" required></textarea>
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
      <div class="col-lg-4">
        <div class="main-sidebar event-sidebar rmt-75">
          <div class="widget widget-event-info">
            <h5 class="widget-title">Event Info</h5>
            <ul>
              <li>
                <div class="icon"><i class="fa fa-calendar-alt"></i></div>
                <div class="content">
                  <h6>Event Date & Time</h6>
                  <?php
                  $currentDate = !empty($eventDetails['event_date_time']) ?  $eventDetails['event_date_time'] : "";
                  if (!empty($currentDate)) {
                    $dateTime = new DateTime($currentDate);
                    $eventDate = $dateTime->format('d M, Y');
                  }
                  ?>
                  <span><?= $eventDate; ?></span>
                </div>
              </li>
              <li>
                <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                <div class="content">
                  <h6>Event Venue</h6>
                  <span><?= !empty($eventDetails['event_venue']) ? $eventDetails['event_venue'] : "" ?></span>
                </div>
              </li>
              <li>
                <div class="icon"><i class="fa fa-phone-alt"></i></div>
                <div class="content">
                  <h6>Contact Number</h6>
                  <span><a href="tel:<?= !empty($eventDetails['event_contact']) ? $eventDetails['event_contact'] : "" ?>"><?= !empty($eventDetails['event_contact']) ? $eventDetails['event_contact'] : "" ?></a></span>
                </div>
              </li>
            </ul>
          </div>
          <div class="widget widget-upcoming-event">
            <h5 class="widget-title">Upcoming Event</h5>
            <ul>

              <?php
              if (isset($upcoming) && !empty($upcoming)) {
                foreach ($upcoming as $key => $causeValue) {
                  $currentDate = !empty($causeValue['event_date_time']) ?  $causeValue['event_date_time'] : "";
                  if (!empty($currentDate)) {
                    $dateTime = new DateTime($currentDate);
                    $eventDate = $dateTime->format('M d, Y');
                  }
              ?>
                  <li>
                    <div class="image">
                      <?php
                      if (empty($causeValue['thumbnail_image'])) { ?>
                        <img src="<?= base_url(); ?>assets/frontend/assets/img/widgets/event1.jpg" alt="Event">
                      <?php } else { ?>
                        <a href="<?= base_url('event-details/') . base64_encode(urlencode($causeValue['event_id'])); ?>"> <img src="<?= base_url(); ?>assets/backend/assets/images/events/<?= $causeValue['thumbnail_image'] ?>" alt="<?= !empty($causeValue['event_title']) ? $causeValue['event_title'] : "" ?>"></a>
                      <?php  }
                      ?>
                    </div>
                    <div class="content">
                      <h6><a href="<?= base_url('event-details/') . base64_encode(urlencode($causeValue['event_id'])); ?>"><?= !empty($causeValue['event_title']) ? $causeValue['event_title'] : "" ?></a></h6>
                      <ul class="blog-meta">
                        <li><i class="flaticon-map"></i> <?= !empty($causeValue['event_venue_city']) ? $causeValue['event_venue_city'] : "" ?></li>
                        <li><i class="flaticon-calendar"></i> <?= $eventDate ?></li>
                      </ul>
                    </div>
                  </li>
              <?php
                }
              }
              ?>

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
<!-- Event Details area end -->
<?= $this->endSection(); ?>