<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content');
?>
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Dashboard</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Acumen</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->
<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex">
          <div class="flex-grow-1">
            <p class="text-truncate font-size-14 mb-2">Total Donation</p>
            <h4 class="mb-2">1452</h4>
            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
          </div>
          <div class="avatar-sm">
            <span class="avatar-title bg-light text-primary rounded-3">
              <i class="fas fa-rupee-sign font-size-24"></i>
            </span>
          </div>
        </div>
      </div><!-- end cardbody -->
    </div><!-- end card -->
  </div><!-- end col -->
  <div class="col-xl-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex">
          <div class="flex-grow-1">
            <p class="text-truncate font-size-14 mb-2">Users</p>
            <h4 class="mb-2">938</h4>
            <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
          </div>
          <div class="avatar-sm">
            <span class="avatar-title bg-light text-success rounded-3">
              <i class="fas fa-user font-size-24"></i>
            </span>
          </div>
        </div>
      </div><!-- end cardbody -->
    </div><!-- end card -->
  </div><!-- end col -->
  <div class="col-xl-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex">
          <div class="flex-grow-1">
            <p class="text-truncate font-size-14 mb-2">Volunteer</p>
            <h4 class="mb-2">8246</h4>
            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
          </div>
          <div class="avatar-sm">
            <span class="avatar-title bg-light text-primary rounded-3">
              <i class="fas fa-users font-size-24"></i>
            </span>
          </div>
        </div>
      </div><!-- end cardbody -->
    </div><!-- end card -->
  </div><!-- end col -->
  <div class="col-xl-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex">
          <div class="flex-grow-1">
            <p class="text-truncate font-size-14 mb-2">Unique Visitors</p>
            <h4 class="mb-2">29670</h4>
            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
          </div>
          <div class="avatar-sm">
            <span class="avatar-title bg-light text-success rounded-3">
              <i class="mdi mdi-currency-btc font-size-24"></i>
            </span>
          </div>
        </div>
      </div><!-- end cardbody -->
    </div><!-- end card -->
  </div><!-- end col -->
</div><!-- end row -->
<?= $this->endSection(); ?>