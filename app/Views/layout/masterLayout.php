<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>UKBOCWWB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/backend/assets/images/favicon.png">

  <!-- Bootstrap Css -->
  <link href="<?= base_url(); ?>assets/backend/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?= base_url(); ?>assets/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url(); ?>assets/backend/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

  <link href="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- Responsive datatable examples -->
  <link href="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="dark">
  <!-- Begin page -->
  <!-- Loader -->
  <div id="preloader">
    <div id="status">
      <div class="spinner">
        <i class="ri-loader-line spin-icon"></i>
      </div>
    </div>
  </div>
  <div id="layout-wrapper">
    <?= include('navigation.php'); ?>
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">
          <?= $this->renderSection('body-content'); ?>

        </div> <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © UKBOCWWB.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-end d-none d-sm-block">
                Design & Developed by <a href="https://coretegra.com/">Coretegra Technologies Private Limited</a>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->
  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- JAVASCRIPT -->
  <script src="<?= base_url(); ?>assets/backend/assets/libs/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/node-waves/waves.min.js"></script>

  <!-- Required datatable js -->
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/jszip/jszip.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/pdfmake/build/vfs_fonts.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

  <!-- Responsive examples -->
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

  <!-- Datatable init js -->
  <script src="<?= base_url(); ?>assets/backend/assets/js/pages/datatables.init.js"></script>

  <script src="<?= base_url(); ?>assets/backend/assets/js/pages/form-advanced.init.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/libs/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url(); ?>assets/backend/assets/js/pages/form-editor.init.js"></script>

  <script src="<?= base_url(); ?>assets/backend/assets/js/app.js"></script>

</body>

</html>