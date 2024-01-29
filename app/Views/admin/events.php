<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content');
?>

<div id="event-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Event Create</h5>
        <button type="button" class="btn-close" id="btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <form action="<?= base_url('event'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm" enctype="multipart/form-data">
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
                      'value' =>  generateRandom('alnum', 16),
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
                      'placeholder' => 'Event Title',
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
                      'placeholder' => 'Event Venue',
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
                      'placeholder' => 'Event Venue City',
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
                    $schedule = array(
                      'type' => 'date',
                      'class' => 'form-control',
                      'name' => 'schedule',
                      'id' => 'schedule',
                      'placeholder' => 'Event Title',
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
                      'placeholder' => 'Contact Person Phone Number For This Event',
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
                    <textarea id="elm1" name="shortDescription"></textarea>
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
                    <textarea id="elm" name="longDescription"></textarea>
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
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('thumbnailImage') : "";  ?></p>
                <div class="col-md-2" id="preview-thumbnailImage"></div>
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
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('mein_images') : "";  ?></p>
                <div class="col-md-2" id="preview-mainImages"></div>
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
                      <input type="checkbox" name="upcoming" id="switch1" switch="bool" />
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
                      <input type="checkbox" name="status" id="switch3" switch="bool" />
                      <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light waves-effect" id="btn-close-modals">Close</button> &nbsp;&nbsp;
            <button type="submit" class="g-recaptcha btn btn-info waves-effect waves-light" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmit'>Save changes</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div id="cause-view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Event Detail</h5>
        <button type="button" class="btn-close" id="btn-close-cause" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <dl class="row" id="cause-data">

        </dl>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


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
        <?php if (!empty(session()->getFlashdata('failed'))) { ?>
          <div class="alert alert-danger alert-dismissible fade show border-0 b-round" role="alert">
            <?= session()->getFlashdata('failed')  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
          <div class="alert alert-success alert-dismissible fade show border-0 b-round" role="alert">
            <?= session()->getFlashdata('success');  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Event Id</th>
              <th>Title</th>
              <th>Schedule</th>
              <th>Venue</th>
              <th>Venue City</th>
              <th>Contact</th>
              <th>Upcoming Event</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($eventData) && !empty($eventData)) {
              $slNo = 1;
              foreach ($eventData as $key => $value) {
                $currentDate = !empty($value['event_date_time']) ?  $value['event_date_time'] : "";
                if (!empty($currentDate)) {
                  $dateTime = new DateTime($currentDate);
                  $eventDate = $dateTime->format('d M, Y');
                }

            ?>
                <tr>
                  <td><?= $slNo++ ?></td>
                  <td><?= !empty($value['event_id']) ? $value['event_id'] : "" ?></td>
                  <td><?= !empty($value['event_title']) ? $value['event_title'] : "-- NA --" ?></td>
                  <td><?= !empty($value['event_date_time']) ?  $eventDate : "" ?></td>
                  <td><?= !empty($value['event_venue']) ? $value['event_venue'] : "" ?></td>
                  <td><?= !empty($value['event_venue_city']) ? $value['event_venue_city'] : "" ?></td>
                  <td><?= !empty($value['event_contact']) ? $value['event_contact'] : "" ?></td>

                  <td><?= !empty($value['is_upcoming']) && $value['is_upcoming'] == 1  ? '<span class="badge badge-soft-success">Yes</span>' : '<span class="badge badge-soft-danger">No</span>' ?></td>
                  <td><?= !empty($value['status']) && $value['status'] == 1  ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item" href="<?= base_url('event-edit') . "/" . urlencode(base64_encode($value['event_id'])); ?>"><i class="fas fa-edit"></i> Edit</a>
                        <a class="dropdown-item event-view" eventId="<?= $value['event_id'] ?>"><i class="fas fa-eye"></i> View</a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php }
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function onSubmit(token) {
    document.getElementById("menuForm").submit();
  }
  document.getElementById("thumbnailImage").addEventListener("change", function() {
    getThumbnailImage();
  });
  document.getElementById("mainImages").addEventListener("change", function() {
    getMainImages();
  });

  function getThumbnailImage() {
    const files = document.getElementById("thumbnailImage").files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function() {
        document.getElementById("preview-thumbnailImage").style.display = "block";
        document.getElementById("preview-thumbnailImage").innerHTML = '<img src="' + this.result + '" />';
      });
    }
  }

  function getMainImages() {
    const files = document.getElementById("mainImages").files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function() {
        document.getElementById("preview-mainImages").style.display = "block";
        document.getElementById("preview-mainImages").innerHTML = '<img src="' + this.result + '" width="500" height="250" />';
      });
    }
  }
  $(document).ready(function() {
    $('.create-event-modal').click(function() {
      document.getElementById('event-model').setAttribute(`style`, `display:block`);
      document.getElementById('event-model').classList.add('show')
    });
  });
  $(document).ready(function() {
    $('#btn-close-modal').click(function() {
      document.getElementById('event-model').setAttribute(`style`, `display:none`);
    })
  });
  $(document).ready(function() {
    $('#btn-close-modals').click(function() {
      document.getElementById('event-model').setAttribute(`style`, `display:none`);
    })
  });


  $(document).ready(function() {
    $('.event-view').click(function() {
      var causeId = $(this).attr('eventId');
      causesData = ``;
      $.ajax({
        url: "<?php echo base_url('event-view'); ?>",
        method: 'GET',
        data: {
          'event_id': causeId,
        },
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if (response.data != "") {
            causesData = causesData + `
            <dt class="col-sm-4">
  <p><strong>Event Id : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_id}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Event Title : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_title}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Event Date : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_date_time}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Event Venue : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_venue}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Reachable Person Number : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_contact}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Short Description : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_short_description}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Long Description : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.event_long_description}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Thumbnail Images : </strong></p>
</dt>
<dd class="col-sm-8">
  <img src="<?= base_url(); ?>assets/backend/assets/images/events/${response.thumbnail_image}" alt="${response.event_title}" />
</dd>
<dt class="col-sm-4">
  <p><strong>Main Images : </strong></p>
</dt>
<dd class="col-sm-8">
  <img src="<?= base_url(); ?>assets/backend/assets/images/events/${response.main_image}" width="500" height="250" alt="${response.event_title}" />
</dd>
</dd>
<dt class="col-sm-4">
  <p><strong>Upcoming Event : </strong></p>
</dt>
<dd class="col-sm-8">
  <div>
    <input type="checkbox" name="latestCause" id="switch2" switch="bool" ${response.is_upcoming==1 ? "checked" : "" } />
    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
  </div>
</dd>
<dt class="col-sm-4">
  <p><strong>Status : </strong></p>
</dt>
<dd class="col-sm-8">
  <div>
    <input type="checkbox" name="latestCause" id="switch2" switch="bool" ${response.status==1 ? "checked" : "" } />
    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
  </div>
</dd>
            `
          }
          $('#cause-data').html(causesData);

        }
      });

      document.getElementById('cause-view').setAttribute(`style`, `display:block`);
      document.getElementById('cause-view').classList.add('show')

    });
  });
  $(document).ready(function() {
    $('#btn-close-cause').click(function() {
      document.getElementById('cause-view').setAttribute(`style`, `display:none`);
    })
  });
  $(document).ready(function() {
    $('#btn-close-modals').click(function() {
      document.getElementById('cause-view').setAttribute(`style`, `display:none`);
    })
  })
</script>
<?= $this->endSection(); ?>