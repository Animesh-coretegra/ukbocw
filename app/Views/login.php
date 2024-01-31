<?php echo $this->extend('layout/authMaster');
echo  $this->section('auth-content');
helper(['cookie', 'util']);
$userData =  decryptData(get_cookie('userData'));
$username = "";
$password = "";
if (!empty($userData)) {
  $username = $userData->username;
  $password = $userData->password;
}
?>

<div class="card">
  <div class="card-body">

    <div class="text-center mt-4">
      <div class="mb-3">
        <a href="index.html" class="auth-logo">
          <img src="<?= base_url(); ?>assets/backend/assets/images/gujarishLogo.png" height="180" class="logo-dark mx-auto" alt="">
          <img src="<?= base_url(); ?>assets/backend/assets/images/gujarishLogo.png" height="180" class="logo-light mx-auto" alt="">
        </a>
      </div>
    </div>

    <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
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
    <div class="p-3">
      <form class="form-horizontal mt-3" method="post" action="<?= base_url('sign-in') ?>">

        <div class="form-group mb-3 row">
          <div class="col-12">
            <input class="form-control" name="username" type="email" required="" value="<?= !empty(validation_errors())  ? set_value('username') : $username;  ?>" placeholder="Register User Email Id">
          </div>
          <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('username') : "";  ?></p>
        </div>

        <div class="form-group mb-3 row">
          <div class="col-12">
            <input class="form-control" name="password" value="<?= $password; ?>" type="password" required="" placeholder="Password">
            <!-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> -->
          </div>
          <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('password') : "";  ?></p>
        </div>

        <div class="form-group mb-3 row">
          <div class="col-12">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="rememberMe" class="custom-control-input" id="customCheck1">
              <label class="form-label ms-1" for="customCheck1">Remember me</label>
            </div>
          </div>
        </div>

        <div class="form-group mb-3 text-center row mt-3 pt-1">
          <div class="col-12">
            <button class="g-recaptcha btn btn-info w-100 waves-effect waves-light" type="submit" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmit'>Log In</button>
          </div>
        </div>

        <div class="form-group mb-0 row mt-4 text-center">
          <a href="<?= base_url('forgot-password') ?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
        </div>
      </form>
    </div>
    <!-- end -->
  </div>
</div>

<script type="text/javascript">
  function onSubmit(token) {

    document.getElementById("contactForm").submit();

  }
</script>
<!-- JAVASCRIPT -->
<?= $this->endSection(); ?>