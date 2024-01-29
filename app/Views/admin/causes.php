<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>


<div id="cause-view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Cause Detail</h5>
        <button type="button" class="btn-close" id="btn-close-cause" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <dl class="row" id="cause-data">

        </dl>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Causes Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Guzaarish</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('menu') ?>">Causes</a></li>
        </ol>&nbsp;&nbsp;
        <a id="" href="<?= base_url('cause-create') ?>" class="btn btn-info waves-effect waves-light">
          Create causes <i class="ri-arrow-right-line align-middle ms-2"></i>
        </a>
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
              <th>Cause Id</th>
              <th>Title</th>
              <th>Raised Amount</th>
              <th>Goal Amount</th>
              <th>Urgent Cause</th>
              <th>Latest Cause</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($causeData) && !empty($causeData)) {
              $slNo = 1;
              foreach ($causeData as $key => $value) { ?>
                <tr>
                  <td><?= $slNo++ ?></td>
                  <td><?= !empty($value['cause_id']) ? $value['cause_id'] : "" ?></td>
                  <td><?= !empty($value['cause_title']) ? $value['cause_title'] : "-- NA --" ?></td>
                  <td><?= !empty($value['raised_amount']) ? '<i class="fas fa-rupee-sign"></i>' . " " . $value['raised_amount'] : '<i class="fas fa-rupee-sign"></i> 0' ?></td>
                  <td><?= !empty($value['goal_amount']) ? '<i class="fas fa-rupee-sign"></i>' . " "  . $value['goal_amount'] : '<i class="fas fa-rupee-sign"></i> 0' ?></td>
                  <td><?= !empty($value['is_urgent']) && $value['is_urgent'] == 1  ? '<span class="badge badge-soft-success">Yes</span>' : '<span class="badge badge-soft-danger">No</span>' ?></td>
                  <td><?= !empty($value['is_latest']) && $value['is_latest'] == 1  ? '<span class="badge badge-soft-success">Yes</span>' : '<span class="badge badge-soft-danger">No</span>' ?></td>
                  <td><?= !empty($value['status']) && $value['status'] == 1  ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item" href="<?= base_url('cause-edit') . "/" . urlencode(base64_encode($value['cause_id'])); ?>"><i class="fas fa-edit"></i> Edit</a>
                        <a class="dropdown-item cause-view" href="#" causeId="<?= $value['cause_id'] ?>"><i class="fas fa-eye"></i> View</a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
  function onSubmit(token) {
    document.getElementById("menuForm").submit();
  }

  function onEdit(token) {
    document.getElementById("menu-edit").submit();
  }
  $(document).ready(function() {
    $('.cause-view').click(function() {
      var causeId = $(this).attr('causeId');
      causesData = ``;
      $.ajax({
        url: "<?php echo base_url('cause-view'); ?>",
        method: 'GET',
        data: {
          'cause_id': causeId,
        },
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if (response.data != "") {
            var cause_thumbnail_images = response.data.cause_thumbnail_images.map((el) => {
              return `
              <img src="<?= base_url(); ?>assets/backend/assets/images/causes/detailImages/${el}" alt="${response.data.cause_title}" />
              `
            });
            console.log(cause_thumbnail_images);
            causesData = causesData + `
            <dt class="col-sm-4">
  <p><strong>Cause Id : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.data.cause_id}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Cause Title : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.data.cause_title}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Raised Amount : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.data.raised_amount}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Goal Amount : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.data.goal_amount}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Short Description : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.data.cause_short_description}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Long Description : </strong></p>
</dt>
<dd class="col-sm-8">
  <p> ${response.data.cause_long_description}</p>
</dd>
<dt class="col-sm-4">
  <p><strong>Thumbnail Images : </strong></p>
</dt>
<dd class="col-sm-8">
  <img src="<?= base_url(); ?>assets/backend/assets/images/causes/thumbnail/${response.data.thumbnail_image}" alt="${response.data.cause_title}" />
</dd>
<dt class="col-sm-4">
  <p><strong>Main Images : </strong></p>
</dt>
<dd class="col-sm-8">
  <img src="<?= base_url(); ?>assets/backend/assets/images/causes/main/${response.data.details_images}" width="500" height="250" alt="${response.data.cause_title}" />
</dd>
</dd>
<dt class="col-sm-4">
  <p><strong>Detail Images : </strong></p>
</dt>
<dd class="col-sm-8 d-flex">
  ${cause_thumbnail_images}
</dd>
<dt class="col-sm-4">
  <p><strong>Urgent Cause : </strong></p>
</dt>
<dd class="col-sm-8">
  <div>
    <input type="checkbox" name="latestCause" id="switch2" switch="bool" ${response.data.is_urgent==1 ? "checked" : "" } />
    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
  </div>
</dd>
<dt class="col-sm-4">
  <p><strong>Latest Cause : </strong></p>
</dt>
<dd class="col-sm-8">
  <div>
    <input type="checkbox" name="latestCause" id="switch2" switch="bool" ${response.data.is_latest==1 ? "checked" : "" } />
    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
  </div>
</dd>
<dt class="col-sm-4">
  <p><strong>Status : </strong></p>
</dt>
<dd class="col-sm-8">
  <div>
    <input type="checkbox" name="latestCause" id="switch2" switch="bool" ${response.data.status==1 ? "checked" : "" } />
    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
  </div>
</dd>
            `
          }
          $('#cause-data').html(causesData);

        }
      });

      document.getElementById('cause-view').setAttribute(`style`, `display:block`);
      document.getElementById('cause-view').classList.add('show')

    });
  });
  $(document).ready(function() {
    $('#btn-close-cause').click(function() {
      document.getElementById('cause-view').setAttribute(`style`, `display:none`);
    })
  });
  $(document).ready(function() {
    $('#btn-close-modals').click(function() {
      document.getElementById('cause-view').setAttribute(`style`, `display:none`);
    })
  })



  $(document).ready(function() {
    $('.menu_edit').click(function() {
      var menuId = $(this).attr('menuId');
      var paymentTermData = `<option value="">--- Select Parent Menu ---</option>`
      $.ajax({
        url: "<?php echo base_url('menu-id'); ?>",
        data: {
          'menu_id': menuId
        },
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response.data);
          if (response.data != "") {
            response.data.parentName.map((e) => {
              paymentTermData = paymentTermData + `<option value="${e.menu_id}">${e.menu_name}</option>`;
            });
          }
          $('#parentMenuEdit').html(paymentTermData);
          document.getElementById('menuNameEdit').setAttribute(`value`, `${response.data.menu_name}`);
          document.getElementById('menu_id').setAttribute(`value`, `${response.data.menu_id}`);
        }
      });
      document.getElementById('menu-modal').setAttribute(`style`, `display:block`);
      document.getElementById('menu-modal').classList.add('show')

    });
  });

  $(document).ready(function() {
    $('#btn-close-menu').click(function() {
      document.getElementById('menu-modal').setAttribute(`style`, `display:none`);
    })
  });
  $(document).ready(function() {
    $('#btn-close-menus').click(function() {
      document.getElementById('menu-modal').setAttribute(`style`, `display:none`);
    })
  })
</script>

<?= $this->endSection(); ?>