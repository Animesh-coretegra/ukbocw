<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Menu Create</h5>
        <button type="button" class="btn-close" id="btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <form action="<?= base_url('menu'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm">
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Menu Name</label>
              <div class="col-sm-8">
                <?php
                $menuName = array(
                  'type' => 'text',
                  'class' => 'form-control',
                  'name' => 'menuName',
                  'id' => 'menuName',
                  'placeholder' => 'Menu Name',
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
              <label for="example-text-input" class="col-sm-4 col-form-label">Menu Url</label>
              <div class="col-sm-8">
                <?php
                $menuUrl = array(
                  'type' => 'text',
                  'class' => 'form-control',
                  'name' => 'menuUrl',
                  'id' => 'menuUrl',
                  'placeholder' => 'Menu End Point',
                  'required' => 'required',
                  'autocomplete' => 'off',
                );
                echo form_input($menuUrl);
                ?>
              </div>
            </div>
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>


          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Parent Menu</label>
              <div class="col-sm-8">
                <select name="parentMenu" id="parentMenu" class="form-select" aria-label="Default select example">
                </select>
              </div>
            </div>
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Menu Icon</label>
              <div class="col-sm-8">
                <select name="menuIcon" id="" class="form-select" aria-label="Default select example">
                  <option value="">--- Select Status ---</option>
                  <?php
                  if (isset($menuIcon) && !empty($menuIcon)) {
                    foreach ($menuIcon as $key => $menuValue) { ?>
                      <option value="<?= $menuValue['icons'] ?>"><?= $menuValue['icon_name'] ?></option>
                  <?php }
                  }
                  ?>
                </select>
              </div>
            </div>
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
                <select name="status" id="" class="form-select" aria-label="Default select example">
                  <option value="">--- Select Status ---</option>
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
              </div>
            </div>
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light waves-effect" id="btn-close-modals">Close</button> &nbsp;&nbsp;
            <button type="submit" class="g-recaptcha btn btn-info waves-effect waves-light" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmit'>Save changes</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div id="menu-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Menu Create</h5>
        <button type="button" class="btn-close" id="btn-close-menu" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <form action="<?= base_url('menu-edit'); ?>" method="POST" class="form-horizontal auth-form" id="menu-edit">
          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Menu Name</label>
              <div class="col-sm-8">
                <?php
                $menuName = array(
                  'type' => 'text',
                  'class' => 'form-control',
                  'name' => 'menuName',
                  'id' => 'menuNameEdit',
                  'placeholder' => 'Menu Name',
                  'required' => 'required',
                  'autocomplete' => 'off',
                );
                echo form_input($menuName);
                ?>
              </div>
            </div>
            <input type="hidden" name="menu_id" id="menu_id">
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>

          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Parent Menu</label>
              <div class="col-sm-8">
                <select name="parentMenu" id="parentMenuEdit" class="form-select" aria-label="Default select example">
                </select>
              </div>
            </div>
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>

          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Menu Icon</label>
              <div class="col-sm-8">
                <select name="menuIcon" id="" class="form-select" aria-label="Default select example">
                  <option value="">--- Select Status ---</option>
                  <?php
                  if (isset($menuIcon) && !empty($menuIcon)) {
                    foreach ($menuIcon as $key => $menuValue) { ?>
                      <option value="<?= $menuValue['icons'] ?>"><?= $menuValue['icon_name'] ?></option>
                  <?php }
                  }
                  ?>
                </select>
              </div>
            </div>
            <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
          </div>

          <div class="form-group mb-2">
            <div class="row mb-3">
              <label for="example-text-input" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
                <select name="status" id="" class="form-select" aria-label="Default select example">
                  <option value="">--- Select Status ---</option>
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
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
      <h4 class="mb-sm-0">Menu Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">UKBOCWWB</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('menu') ?>">Menu</a></li>
        </ol>&nbsp;&nbsp;
        <button type="button" id="" class="btn btn-info waves-effect waves-light createMenuModal">
          Create Menu <i class="ri-arrow-right-line align-middle ms-2"></i>
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
              <th>Menu Id</th>
              <th>Menu Name</th>
              <th>Parent Menu</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($menu) && !empty($menu)) {
              $slNo = 1;
              foreach ($menu as $key => $value) { ?>
                <tr>
                  <td><?= $slNo++ ?></td>
                  <td><?= !empty($value['menu_id']) ? $value['menu_id'] : "" ?></td>
                  <td><?= !empty($value['menu_name']) ? $value['menu_name'] : "" ?></td>
                  <td><?= !empty($value['parent_name']) ? $value['parent_name'] : "-- NA --" ?></td>
                  <td><?= !empty($value['status']) && $value['status'] == 1  ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item menu_edit" href="#" menuId="<?= $value['menu_id'] ?>"><i class="fas fa-edit"></i> Edit</a>
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
    $('.createMenuModal').click(function() {
      var paymentTermData = `<option value="">--- Select Parent Menu ---</option>`
      $.ajax({
        url: "<?php echo base_url('all-menu'); ?>",
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response.data);
          if (response.data != "") {
            response.data.map((e) => {
              paymentTermData = paymentTermData + `<option value="${e.menu_id}">${e.menu_name}</option>`;
            });
          }
          $('#parentMenu').html(paymentTermData);

        }
      });
      document.getElementById('myModal').setAttribute(`style`, `display:block`);
      document.getElementById('myModal').classList.add('show')

    });
  });
  $(document).ready(function() {
    $('#btn-close-modal').click(function() {
      document.getElementById('myModal').setAttribute(`style`, `display:none`);
    })
  });
  $(document).ready(function() {
    $('#btn-close-modals').click(function() {
      document.getElementById('myModal').setAttribute(`style`, `display:none`);
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