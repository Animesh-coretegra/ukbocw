<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content');
?>
<div class="modal fade bs-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myExtraLargeModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user-edit'); ?>" method="POST" class="form-horizontal auth-form" id="menu-edit" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="<?= !empty($user[0]['user_id']) ? $user[0]['user_id'] : "" ?>">
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Full Name</label>
              <div class="col-sm-8">
                <?php
                $menuName = array(
                  'type' => 'text',
                  'class' => 'form-control',
                  'name' => 'userName',
                  'value' => !empty($user[0]['user_name']) ? $user[0]['user_name'] : "",
                  'id' => 'userName',
                  'required' => 'required',
                  'autocomplete' => 'off',
                );
                echo form_input($menuName);
                ?>
              </div>
            </div>

            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Email Id</label>
              <div class="col-sm-8">
                <?php
                $menuEmail = array(
                  'type' => 'email',
                  'class' => 'form-control',
                  'name' => 'userEmail',
                  'value' => !empty($user[0]['user_email']) ? $user[0]['user_email'] : "",
                  'id' => 'userEmail',
                  'readonly' => 'readonly',
                  'autocomplete' => 'off',
                );
                echo form_input($menuEmail);
                ?>
              </div>
            </div>

            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
              <div class="col-sm-8">
                <?php
                $phoneNumber = array(
                  'type' => 'text',
                  'class' => 'form-control',
                  'name' => 'phoneNumber',
                  'value' => !empty($user[0]['user_phone']) ? $user[0]['user_phone'] : "",
                  'required' => 'required',
                  'autocomplete' => 'off',
                );
                echo form_input($phoneNumber);
                ?>
              </div>
            </div>

            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <?php
                $password = array(
                  'type' => 'password',
                  'class' => 'form-control',
                  'name' => 'password',
                  'value' => !empty($user[0]['user_password']) ? base64_decode($user[0]['user_password']) : "",
                  'required' => 'required',
                  'autocomplete' => 'off',
                );
                echo form_input($password);
                ?>
              </div>
            </div>

            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Confirm Password</label>
              <div class="col-sm-8">
                <?php
                $confirmPassword = array(
                  'type' => 'password',
                  'class' => 'form-control',
                  'name' => 'confirmPassword',
                  'required' => 'required',
                  'value' => !empty($user[0]['user_password']) ? base64_decode($user[0]['user_password']) : "",
                  'autocomplete' => 'off',
                  'placeholder' => 'Confirm Password'
                );
                echo form_input($confirmPassword);
                ?>
              </div>
            </div>

            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light waves-effect" id="btn-close-menus">Close</button> &nbsp;&nbsp;
            <button type="submit" class="g-recaptcha btn btn-info waves-effect waves-light" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onEdit'>Save changes</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Profile</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">UKBOCWWB</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('profile') ?>">Profile</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="d-flex justify-content-center">
  <div class="col-md-6 col-xl-6">
    <div class="card">
    <img class="card-img img-fluid " src="<?= base_url(); ?>assets/backend/assets/images/users/multiuser.png" alt="Card image" style="height:200px; display: block;
      margin: 0 auto;
      width: 40%;">
      <div class="card-body mt-5">
        <dl class="row">
          <dt class="col-sm-6">
            <h5>Name : </h5>
          </dt>
          <dd class="col-sm-6">
            <h5><?= !empty($user[0]['user_name']) ? $user[0]['user_name'] : ""  ?></h5>
          </dd>
          <dt class="col-sm-6">
            <h5>Email Id : </h5>
          </dt>
          <dd class="col-sm-6">
            <h5><?= !empty($user[0]['user_email']) ? $user[0]['user_email'] : ""  ?></h5>
          </dd>
          <dt class="col-sm-6">
            <h5>Phone Number : </h5>
          </dt>
          <dd class="col-sm-6">
            <h5><?= !empty($user[0]['user_phone']) ? $user[0]['user_phone'] : ""  ?></h5>
          </dd>
          <dt class="col-sm-6">
            <h5>User Role : </h5>
          </dt>
          <dd class="col-sm-6">
            <h5><?= !empty($user[0]['usersData']['role_name']) ? $user[0]['usersData']['role_name'] : ""  ?></h5>
          </dd>
          <dt class="col-sm-6">
            <h5>Password : </h5>
          </dt>
          <dd class="col-sm-6">
            <h5><?= !empty($user[0]['user_password']) ? base64_decode($user[0]['user_password']) : ""  ?></h5>
          </dd>
        </dl>
        <div>

          <button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Edit User <i class="ri-arrow-right-line align-middle ms-2"></i></button>
        </div>
      </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function onEdit(token) {
    document.getElementById("menu-edit").submit();
  }

  $(document).ready(function() {
    var error = <?php echo json_encode(validation_errors()); ?>;
    console.log(error);
    if (!jQuery.isEmptyObject(error)) {
      document.getElementById('myModal').setAttribute(`style`, `display:block`);
      document.getElementById('myModal').classList.add('show')
    }
  })
</script>
<?= $this->endSection(); ?>