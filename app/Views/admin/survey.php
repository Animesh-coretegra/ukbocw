<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Survey</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Acumen</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('menu') ?>">Survey</a></li>
        </ol>&nbsp;&nbsp;
        
        <button type="button" id="" class="btn btn-info waves-effect waves-light">
          Excel Export <i class="ri-arrow-right-line align-middle ms-2"></i>
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
              <th>Survey Id</th>
              <th>Full Name</th>
              <th>Gender</th>
              <th>District</th>
              <th>State</th>
              <th>Material Status</th>
              <th>Mobile Number</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($survey) && !empty($survey)) {
              $slNo = 1;
              foreach ($survey as $key => $value) { ?>
                <tr>
                  <td><?= $slNo++ ?></td>
                  <td><?= $value['survey_id']; ?></td>
                  <td><?= $value['fullName'] ?></td>
                  <td><?= $value['Gender'] ?></td>
                  <td><?= $value['district'] ?></td>
                  <td><?= $value['State'] ?></td>
                  <td><?= $value['MaritalStatus'] ?></td>
                  <td><?= $value['mobile_number'] ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item" href="<?= base_url('survey-details/').urlencode(base64_encode($value['survey_id'])) ?>"><i class="fas fa-eye"></i> View</a>
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
<?= $this->endSection(); ?>