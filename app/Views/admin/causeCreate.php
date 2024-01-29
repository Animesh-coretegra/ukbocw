<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>

<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Causes Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Guzaarish</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('menu') ?>">Causes</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($causeData) && !empty($causeData)) { ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between p-2">
          <h4></h4>
        </div>
        <div class="card-body">
          <form action="<?= base_url('cause-edit-action'); ?>" method="POST" class="form-horizontal auth-form" id="cause-edit" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Causes Id</label>
                    <div class="col-sm-8">
                      <?php
                      helper('util');
                      $causeId = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'causeId',
                        'id' => 'causeId',
                        'value' => !empty($causeData['cause_id']) ? $causeData['cause_id'] : "",
                        'required' => 'required',
                        'readonly' => 'readonly',

                      );
                      echo form_input($causeId);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Cause Title</label>
                    <div class="col-sm-8">
                      <?php
                      $menuUrl = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'causeTitle',
                        'id' => 'menuUrl',
                        'value' => !empty($causeData['cause_title']) ? $causeData['cause_title'] : "",
                        'required' => 'required',
                        'autocomplete' => 'off',
                      );
                      echo form_input($menuUrl);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('causeTitle') : "";  ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Raised Amount</label>
                    <div class="col-sm-8">
                      <?php
                      $raisedAmount = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'raisedAmount',
                        'id' => 'raisedAmount',
                        'value' => !empty($causeData['raised_amount']) ? $causeData['raised_amount'] : 0,
                        'required' => 'required',
                        'readonly' => 'readonly'

                      );
                      echo form_input($raisedAmount);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('raisedAmount') : "";  ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Goal Amount</label>
                    <div class="col-sm-8">
                      <?php
                      $goalAmount = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'goalAmount',
                        'id' => 'goalAmount',
                        'value' => $causeData['goal_amount'] != 0 ? $causeData['goal_amount'] : 0,
                        'required' => 'required',
                        'autocomplete' => 'off',
                      );
                      echo form_input($goalAmount);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('goalAmount') : "";  ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Short Description</label>
                        <div class="col-sm-8">
                          <textarea id="elm1" name="shortDescription"><?= $causeData['cause_short_description'] ?></textarea>
                        </div>
                        <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('shortDescription') : "";  ?></p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Long Description</label>
                        <div class="col-sm-8">
                          <textarea id="elm" name="longDescription"><?= $causeData['cause_long_description'] ?></textarea>
                        </div>
                        <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('longDescription') : "";  ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
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
                  <div class="col-md-2" id="preview-thumbnailImage">
                    <img src="<?= base_url(); ?>assets/backend/assets/images/causes/thumbnail/<?= $causeData['thumbnail_image'] ?>">

                  </div>
                </div>
                <input type="hidden" name="oldThumbnail" value="<?= $causeData['thumbnail_image'] ?>">
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Main Image</label>
                    <div class="col-sm-8">
                      <?php
                      $images = array(
                        'type' => 'file',
                        'class' => 'form-control',
                        'name' => 'mein_images',
                        'id' => 'mainImages',
                        'required' => 'required',
                        'autocomplete' => 'off',
                      );
                      echo form_input($images);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('mein_images') : "";  ?></p>
                  <div class="col-md-2" id="preview-mainImages">
                    <img src="<?= base_url(); ?>assets/backend/assets/images/causes/main/<?= $causeData['details_images'] ?>" width="500" height="250">

                  </div>
                </div>
                <input type="hidden" name="old_mein_images" value="<?= $causeData['details_images'] ?>">
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Detail Images</label>
                    <div class="col-sm-8">
                      <?php
                      $images = array(
                        'type' => 'file',
                        'class' => 'form-control',
                        'name' => 'details_images[]',
                        'id' => 'detailImages',
                        'placeholder' => 'Goal Amount',
                        'required' => 'required',
                        'autocomplete' => 'off',
                        'multiple' => 'multiple',
                      );
                      echo form_input($images);
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 d-flex preview-detailImages">

                  <?php
                  foreach ($causeData['cause_thumbnail_images'] as $key => $value) { ?>
                    <img src="<?= base_url(); ?>assets/backend/assets/images/causes/detailImages/<?= $value; ?>" width="250" height="250" />
                  <?php }

                  ?>
                </div>
                <input type="hidden" name="oldDetails_images" value="<?= $causeData['cause_thumbnail_image'] ?>">
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Urgent Cause</label>
                    <div class="col-sm-8">
                      <div>
                        <input type="checkbox" name="urgentCause" id="switch1" switch="bool" <?= $causeData['is_urgent'] != 0 ? "checked" : "" ?> />
                        <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Latest Cause</label>
                    <div class="col-sm-8">
                      <div>
                        <input type="checkbox" name="latestCause" id="switch2" switch="bool" <?= $causeData['is_latest'] != 0 ? "checked" : "" ?> />
                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <div>
                        <input type="checkbox" name="status" id="switch3" switch="bool" <?= $causeData['status'] != 0 ? "checked" : "" ?> />
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
<?php } else { ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between p-2">
          <h4></h4>
        </div>
        <div class="card-body">
          <form action="<?= base_url('cause-create'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Causes Id</label>
                    <div class="col-sm-8">
                      <?php
                      helper('util');
                      $causeId = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'causeId',
                        'id' => 'causeId',
                        'value' => generateRandom('alnum', 16),
                        'required' => 'required',
                        'readonly' => 'readonly',

                      );
                      echo form_input($causeId);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Cause Title</label>
                    <div class="col-sm-8">
                      <?php
                      $menuUrl = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'causeTitle',
                        'id' => 'menuUrl',
                        'placeholder' => 'Title',
                        'required' => 'required',
                        'autocomplete' => 'off',
                      );
                      echo form_input($menuUrl);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('causeTitle') : "";  ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Raised Amount</label>
                    <div class="col-sm-8">
                      <?php
                      $raisedAmount = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'raisedAmount',
                        'id' => 'raisedAmount',
                        'value' => 0,
                        'required' => 'required',
                        'readonly' => 'readonly'

                      );
                      echo form_input($raisedAmount);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('raisedAmount') : "";  ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Goal Amount</label>
                    <div class="col-sm-8">
                      <?php
                      $goalAmount = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'goalAmount',
                        'id' => 'goalAmount',
                        'placeholder' => 'Goal Amount',
                        'required' => 'required',
                        'autocomplete' => 'off',
                      );
                      echo form_input($goalAmount);
                      ?>
                    </div>
                  </div>
                  <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('goalAmount') : "";  ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
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

              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group mb-2">
                      <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Long Description</label>
                        <div class="col-sm-8">
                          <textarea id="elm" name="longDescription"></textarea>
                        </div>
                        <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('longDescription') : "";  ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
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
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Main Image</label>
                    <div class="col-sm-8">
                      <?php
                      $images = array(
                        'type' => 'file',
                        'class' => 'form-control',
                        'name' => 'mein_images',
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
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Detail Images</label>
                    <div class="col-sm-8">
                      <?php
                      $images = array(
                        'type' => 'file',
                        'class' => 'form-control',
                        'name' => 'details_images[]',
                        'id' => 'detailImages',
                        'placeholder' => 'Goal Amount',
                        'required' => 'required',
                        'autocomplete' => 'off',
                        'multiple' => 'multiple',
                      );
                      echo form_input($images);
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 d-flex preview-detailImages">
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Urgent Cause</label>
                    <div class="col-sm-8">
                      <div>
                        <input type="checkbox" name="urgentCause" id="switch1" switch="bool" />
                        <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group mb-2">
                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-4 col-form-label">Latest Cause</label>
                    <div class="col-sm-8">
                      <div>
                        <input type="checkbox" name="latestCause" id="switch2" switch="bool" />
                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
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
              <button type="submit" class="g-recaptcha btn btn-info waves-effect waves-light" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmits'>Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  function onSubmits(token) {
    document.getElementById("menuForm").submit();
  }

  function onSubmit(token) {
    document.getElementById("cause-edit").submit();
  }

  document.getElementById("thumbnailImage").addEventListener("change", function() {
    getThumbnailImage();
  });
  document.getElementById("mainImages").addEventListener("change", function() {
    getMainImages();
  });
  document.getElementById("detailImages").addEventListener("change", function() {
    getDetailsImages();
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

  $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

      if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();

          reader.onload = function(event) {
            $($.parseHTML('<img>')).attr('src', event.target.result).attr('width', 250).attr('height', 250).appendTo(placeToInsertImagePreview);
          }

          reader.readAsDataURL(input.files[i]);
        }
      }

    };

    $('#detailImages').on('change', function() {
      imagesPreview(this, 'div.preview-detailImages');
    });
  });
</script>
<?= $this->endSection(); ?>