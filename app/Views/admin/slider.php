<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Slider Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Guzaarish</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('slider') ?>">Slider</a></li>
        </ol>
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
        <form action="<?= base_url('slider'); ?>" method="POST" class="form-horizontal auth-form" id="slider" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Slider Id</label>
                  <div class="col-sm-8">
                    <?php
                    helper('util');
                    $sliderId = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'sliderId',
                      'id' => 'sliderId',
                      'value' => !empty($sliderData) ? $sliderData['slider_id'] : generateRandom('alnum', 16),
                      'required' => 'required',
                      'readonly' => 'readonly',

                    );
                    echo form_input($sliderId);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label"> Title</label>
                  <div class="col-sm-8">
                    <?php
                    $sliderTitle = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'sliderTitle',
                      'id' => 'sliderTitle',
                      'placeholder' => 'Title',
                      'required' => 'required',
                      'value' => !empty($sliderData) ? $sliderData['slider_title'] : "",
                      'autocomplete' => 'off',
                    );
                    echo form_input($sliderTitle);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('sliderTitle') : "";  ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">SubTitle</label>
                  <div class="col-sm-8">
                    <?php
                    $subtitle = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'subtitle',
                      'id' => 'subtitle',
                      'value' => !empty($sliderData) ? $sliderData['slider_subtitle'] : "",
                      'placeholder' => "Subtitle",
                      'required' => 'required'

                    );
                    echo form_input($subtitle);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('subtitle') : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                    <div>
                      <input type="checkbox" name="status" id="switch3" switch="bool" <?= !empty($sliderData) && $sliderData['status'] == 1 ? "checked" : "" ?> />
                      <label for="switch3"></label>
                    </div>
                  </div>
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
              </div>
              <input type="hidden" name="oldThumbnail" value="<?= !empty($sliderData) ? $sliderData['slider_image'] : "" ?>">
              <div class="col-md-2" id="preview-thumbnailImage"></div>
              <?php
              if (!empty($sliderData)) { ?>
                <img src="<?= base_url() ?>assets/backend/assets/images/<?= $sliderData['slider_image'] ?>" alt="" srcset="" width="900" height="400">
              <?php }

              ?>
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
    document.getElementById("slider").submit();
  }

  document.getElementById("thumbnailImage").addEventListener("change", function() {
    getThumbnailImage();
  });

  function getThumbnailImage() {
    const files = document.getElementById("thumbnailImage").files[0];
    if (files) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(files);
      fileReader.addEventListener("load", function() {
        document.getElementById("preview-thumbnailImage").style.display = "block";
        document.getElementById("preview-thumbnailImage").innerHTML = '<img src="' + this.result + '" width="900" height="400"/>';
      });
    }
  }
</script>
<?= $this->endSection(); ?>