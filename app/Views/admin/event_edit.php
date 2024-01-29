<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content');
?>

<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Event Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Guzaarish</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('menu') ?>">Event</a></li>
        </ol>&nbsp;&nbsp;
        <button id="" href="<?= base_url('cause-create') ?>" class="btn btn-info waves-effect waves-light create-event-modal">
          Create Event <i class="ri-arrow-right-line align-middle ms-2"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between p-2">
        <h4></h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('event-edit'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">

                  <label for="example-text-input" class="col-sm-4 col-form-label">Event Id</label>
                  <div class="col-sm-8">
                    <?php
                    helper('util');
                    $eventTitle = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'eventId',
                      'id' => 'eventTitle',
                      'value' =>   !empty($eventData) ? $eventData['event_id'] : "",
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($eventTitle);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">

                  <label for="example-text-input" class="col-sm-4 col-form-label">Event Title</label>
                  <div class="col-sm-8">
                    <?php
                    $eventTitle = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'eventTitle',
                      'id' => 'eventTitle',
                      'value' =>   !empty($eventData) ? $eventData['event_title'] : "",
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($eventTitle);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Event Venue</label>
                  <div class="col-sm-8">
                    <?php
                    $eventVenue = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'eventVenue',
                      'id' => 'eventVenue',
                      'value' =>   !empty($eventData) ? $eventData['event_venue'] : "",
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($eventVenue);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Venue City</label>
                  <div class="col-sm-8">
                    <?php
                    $eventVenue = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'eventVenueCity',
                      'id' => 'eventVenue',
                      'value' =>   !empty($eventData) ? $eventData['event_venue_city'] : "",
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($eventVenue);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">

                  <label for="example-text-input" class="col-sm-4 col-form-label">Event Schedule</label>
                  <div class="col-sm-8">
                    <?php
                    if (!empty($eventData)) {
                      $dateTime = new DateTime($eventData['event_date_time']);
                      $eventDate = $dateTime->format('Y-m-d');
                    }
                    $schedule = array(
                      'type' => 'date',
                      'class' => 'form-control',
                      'name' => 'schedule',
                      'id' => 'schedule',
                      'value' =>   $eventDate,
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($schedule);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Contact Detail</label>
                  <div class="col-sm-8">
                    <?php
                    $contact = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'contact',
                      'id' => 'contact',
                      'value' =>   !empty($eventData) ? $eventData['event_contact'] : "",
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($contact);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Short Description</label>
                  <div class="col-sm-8">
                    <textarea id="elm1" name="shortDescription"><?= !empty($eventData) ? $eventData['event_short_description'] : "" ?></textarea>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('shortDescription') : "";  ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Long Description</label>
                  <div class="col-sm-8">
                    <textarea id="elm" name="longDescription"><?= !empty($eventData) ? $eventData['event_long_description'] : "" ?></textarea>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('shortDescription') : "";  ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Thumbnail Image</label>
                  <div class="col-sm-8">
                    <?php
                    $thumbnailImage = array(
                      'type' => 'file',
                      'class' => 'form-control',
                      'name' => 'thumbnailImage',
                      'id' => 'thumbnailImage',
                      'placeholder' => 'Goal Amount',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($thumbnailImage);
                    ?>
                  </div>
                </div>
                <input type="hidden" name="oldThumbnail" value="<?= $eventData['thumbnail_image'] ?>">
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('thumbnailImage') : "";  ?></p>
                <div class="col-md-2" id="preview-thumbnailImage">
                  <img src="<?= base_url(); ?>assets/backend/assets/images/events/<?= $eventData['thumbnail_image'] ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Main Image</label>
                  <div class="col-sm-8">
                    <?php
                    $images = array(
                      'type' => 'file',
                      'class' => 'form-control',
                      'name' => 'main_images',
                      'id' => 'mainImages',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($images);
                    ?>
                  </div>
                </div>
                <input type="hidden" name="old_main_images" value="<?= $eventData['main_image']; ?>">
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('old_main_images') : "";  ?></p>
                <div class="col-md-2" id="preview-mainImages">
                  <img src="<?= base_url(); ?>assets/backend/assets/images/events/<?= $eventData['main_image'] ?>" width="500" height="250">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Upcoming Event</label>
                  <div class="col-sm-8">
                    <div>
                      <input type="checkbox" name="upcoming" id="switch1" switch="bool" <?= $eventData['is_upcoming'] == '1' ? "checked" : "" ?> />
                      <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                    <div>
                      <input type="checkbox" name="status" id="switch3" switch="bool" <?= $eventData['status'] == '1' ? "checked" : "" ?> />
                      <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="g-recaptcha btn btn-info waves-effect waves-light" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmit'>Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function onSubmit(token) {
    document.getElementById("menuForm").submit();
  }
</script>
<?= $this->endSection(); ?>