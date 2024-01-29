<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Contacts Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Guzaarish</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('contacts') ?>">Contacts</a></li>
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
        <form action="<?= base_url('contacts'); ?>" method="POST" class="form-horizontal auth-form" id="slider" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Contact Id</label>
                  <div class="col-sm-8">
                    <?php
                    helper('util');
                    $sliderId = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'contactId',
                      'id' => 'contactId',
                      'value' => !empty($sliderData) ? $sliderData['contact_id'] : generateRandom('alnum', 16),
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
                  <label for="example-text-input" class="col-sm-4 col-form-label">Email Id</label>
                  <div class="col-sm-8">
                    <?php
                    $contactEmail = array(
                      'type' => 'email',
                      'class' => 'form-control',
                      'name' => 'email',
                      'id' => 'contactEmail',
                      'placeholder' => 'Contact Email Id',
                      'required' => 'required',
                      'value' => !empty($contact) ? $contact['email'] : "",
                      'autocomplete' => 'off',
                    );
                    echo form_input($contactEmail);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('email') : "";  ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
                  <div class="col-sm-8">
                    <?php
                    $phoneNumber = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'phoneNumber',
                      'id' => 'phoneNumber',
                      'value' => !empty($contact) ? $contact['phone_number'] : "",
                      'placeholder' => "Phone Number",
                      'required' => 'required'

                    );
                    echo form_input($phoneNumber);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('phoneNumber') : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Address</label>
                  <div class="col-sm-8">
                    <?php
                    $address = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'address',
                      'id' => 'address',
                      'value' => !empty($contact) ? $contact['address'] : "",
                      'placeholder' => "Company Address",
                      'required' => 'required'

                    );
                    echo form_input($address);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('phoneNumber') : "";  ?></p>
              </div>
            </div>

          </div>



          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Facebook Link</label>
                  <div class="col-sm-8">
                    <?php
                    $facebook = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'facebook',
                      'id' => 'facebook',
                      'value' => !empty($contact) ? $contact['facebook'] : "",
                      'placeholder' => "Facebook Link",
                      'required' => 'required'

                    );
                    echo form_input($facebook);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('facebook') : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Instagram Link</label>
                  <div class="col-sm-8">
                    <?php
                    $instagram = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'instagram',
                      'id' => 'instagram',
                      'value' => !empty($contact) ? $contact['instagram'] : "",
                      'placeholder' => "Instagram Link",
                      'required' => 'required'

                    );
                    echo form_input($instagram);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('instagram') : "";  ?></p>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Linkedin Link</label>
                  <div class="col-sm-8">
                    <?php
                    $linkedin = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'linkedin',
                      'id' => 'linkedin',
                      'value' => !empty($contact) ? $contact['linkedin'] : "",
                      'placeholder' => "LinkedIn Link",
                      'required' => 'required'

                    );
                    echo form_input($linkedin);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('linkedin') : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Twitter</label>
                  <div class="col-sm-8">
                    <?php
                    $twitter = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'twitter',
                      'id' => 'twitter',
                      'value' => !empty($contact) ? $contact['twitter'] : "",
                      'placeholder' => "twitter Link",
                      'required' => 'required'

                    );
                    echo form_input($twitter);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('twitter') : "";  ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
                  <div class="col-sm-8">
                    <div>
                      <input type="checkbox" name="status" id="switch3" switch="bool" <?= !empty($contact) && $contact['status'] == 1 ? "checked" : "" ?> />
                      <label for="switch3"></label>
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
    document.getElementById("slider").submit();
  }
</script>
<?= $this->endSection(); ?>