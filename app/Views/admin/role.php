<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Role Create</h5>
        <button type="button" class="btn-close" id="btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <form action="<?= base_url('role'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">

                  <label for="example-text-input" class="col-sm-4 col-form-label">Role Name</label>
                  <div class="col-sm-8">
                    <?php
                    $menuName = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'roleName',
                      'id' => 'roleName',
                      'placeholder' => 'Role Name',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($menuName);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
            <div class="col-md-6">
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
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Navigation Access</h4>
              </div>
            </div>
          </div>
          <div class="row">
            <?php
            if (isset($menu) && !empty($menu)) {
              $i = 1;
              foreach ($menu as $key => $menuValue) { ?>
                <div class="col-md-4">
                  <div class="card card-header">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title"><?= $menuValue['menu_name'] ?></h3>
                      <div>
                        <input type="checkbox" name="menu[]" value="<?= $menuValue['menu_id'] ?>" id="switch<?= $i ?>" switch="bool" />
                        <label for="switch<?= $i++ ?>" data-on-label="Yes" data-off-label="No"></label>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <?php
                    foreach ($menuValue['child_menu'] as $key => $childValue) { ?>
                      <div class="d-flex justify-content-between">
                        <p class="card-text">
                          <?= $childValue['menu_name'] ?>
                        </p>
                        <div>
                          <input type="checkbox" name="menu[]" value="<?= $childValue['menu_id'] ?>" id="switch<?= $i ?>" switch="bool" />
                          <label for="switch<?= $i++ ?>" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                      </div>
                    <?php }
                    ?>

                  </div>
                </div>
            <?php }
            }
            ?>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Role Edit</h5>
        <button type="button" class="btn-close" id="btn-close-menu" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <form action="<?= base_url('role-edit'); ?>" method="POST" class="form-horizontal auth-form" id="menu-edit">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">

                  <label for="example-text-input" class="col-sm-4 col-form-label">Role Name</label>
                  <div class="col-sm-8">
                    <?php
                    $menuName = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'roleName',
                      'id' => 'roleNameEdit',
                      'placeholder' => 'Role Name',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($menuName);
                    ?>
                  </div>
                </div>
                <p style="color:red;"><?= isset($session['message']['username']) && !empty($session['message']['username'])  ? $session['message']['username'] : "";  ?></p>
              </div>
            </div>
            <input type="hidden" name="role_id" id="role_id">
            <div class="col-md-6">
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
            </div>
          </div>

          <div class="row mt-3 mb-3">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Navigation Access</h4>
              </div>
            </div>
          </div>
          <div id="userAccess">

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
      <h4 class="mb-sm-0">Role Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Acumen</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('role') ?>">Role</a></li>
        </ol>&nbsp;&nbsp;
        <button type="button" id="" class="btn btn-info waves-effect waves-light createMenuModal">
          Create Role <i class="ri-arrow-right-line align-middle ms-2"></i>
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
              <th>Role Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($role) && !empty($role)) {
              $slNo = 1;
              foreach ($role as $key => $value) { ?>
                <tr>
                  <td><?= $slNo++ ?></td>
                  <td><?= !empty($value['role_name']) ? $value['role_name'] : "" ?></td>
                  <td><?= !empty($value['status']) && $value['status'] == 1  ? '<span class="badge badge-soft-success">Enable</span>' : '<span class="badge badge-soft-danger">Disable</span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item role_edit" roleId="<?= $value['role_id'] ?>"><i class="fas fa-edit"></i> Edit</a>
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
      var roleId = $(this).attr('roleId');
      $.ajax({
        url: "<?php echo base_url('role-id'); ?>",
        data: {
          'role_id': roleId
        },
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response.data);
          if (response.data != "") {
            $("#roleNameEdit").val(response.data.role_name);
            $("#role_id").val(response.data.role_id);
          }
          //document.getElementById('menuNameEdit').setAttribute(`value`, `${response.data.menu_name}`);
          //document.getElementById('menu_id').setAttribute(`value`, `${response.data.menu_id}`);
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
  });

  $(document).ready(function() {
    $('.role_edit').click(function() {
      var roleId = $(this).attr('roleId');
      $.ajax({
        url: "<?php echo base_url('user-access-edit'); ?>",
        data: {
          'role_id': roleId
        },
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response);
          $("#roleNameEdit").val(response.role.role_name);
            $("#role_id").val(response.role.role_id);
            var roleId = response.role.role_id;
          if (response != "") {
            var i = 1;
            var userAccess = `<div class="row">`;
            response.menu.map((el) => {
              userAccess = userAccess + `
            <div class="col-md-4">
              <div class="card card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">${el.menu_name}</h3>
                  <div>
                    <input type="checkbox" name="menu[]" value="${el.menu_id}" onchange="updateMenu(this)" id="switchEdit${i}" switch="bool" ${el.checked !="" ? el.checked : ""} />
                    <label for="switchEdit${i++}" data-on-label="Yes" data-off-label="No"></label>
                  </div>
                </div>
              </div>
              <div class="card-body">
              ${
                el.child_menu.length >0 ? 
                el.child_menu.map((element)=>{
                 return `
                  <div class="d-flex justify-content-between">
                  <p class="card-text">
                  ${element.menu_name}
                  </p>
                  <div>
                    <input type="checkbox" name="menu[]" value="${element.menu_id}" onchange="updateMenu(this)" id="switchEdit${i}" switch="bool"${element.checked !="" ? element.checked : ""} />
                    <label for="switchEdit${i++}" data-on-label="Yes" data-off-label="No"></label>
                  </div>
                </div>
                  `
                })
                :""
              }
              </div>
            </div>
              `;
            })
            userAccess = userAccess + `</div>`;
            $('#userAccess').html(userAccess);
          }
        }

      });

      document.getElementById('menu-modal').setAttribute(`style`, `display:block`);
      document.getElementById('menu-modal').classList.add('show')

    });
  });

  function updateMenu(obj) {
    // console.log(obj.value);
    // console.log($('#role_id').val());
    $.ajax({
      url: "<?php echo base_url('edit-menu-mapping'); ?>",
      data: {
        'role_id': $('#role_id').val(),
        'menu_id': obj.value
      },
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        console.log(response);
      }
    });
  }
</script>

<?= $this->endSection(); ?>