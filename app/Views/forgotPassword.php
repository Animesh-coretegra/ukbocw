<?php echo $this->extend('layout/authMaster');
echo  $this->section('auth-content');
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

    <h4 class="text-muted text-center font-size-18"><b>Forgot Password</b></h4>

    <div class="p-3">
      <form class="form-horizontal mt-3" action="index.html" id="contactForm">

        <div class="form-group mb-3 row">
          <div class="col-12">
            <input class="form-control" type="email" required="" placeholder="Register Email">
          </div>
        </div>

        <div class="form-group mb-3 text-center row mt-3 pt-1">
          <div class="col-12">
            <button class="g-recaptcha btn btn-info w-100 waves-effect waves-light" type="submit" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmit'>Send Email</button>
          </div>
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