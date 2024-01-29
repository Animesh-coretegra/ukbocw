<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>Guzaarish</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesdesign" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/backend/assets/images/gujarish-icon.png">

  <!-- Bootstrap Css -->
  <link href="<?= base_url(); ?>assets/backend/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?= base_url(); ?>assets/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url(); ?>assets/backend/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  <script src="https://www.google.com/recaptcha/api.js?render=<?= getenv('RECAPTCHA_SITE_V3_KEY') ?>"></script>

</head>

<body class="auth-body-bg">
  <div class="bg-overlay"></div>
  <div class="wrapper-page">
    <div class="container-fluid p-0">
      <?= $this->renderSection('auth-content'); ?>
      <!-- end cardbody -->
    </div>
    <!-- end card -->
  </div>
  <!-- end container -->
  <script src="<?= base_url(); ?>assets/backend/assets/libs/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/node-waves/waves.min.js"></script>

  <script src="<?= base_url(); ?>assets/backend/assets/js/app.js"></script>

</body>

</html>