<?php
echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>
<?php helper('util');
?>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">User Create</h5>
        <button type="button" class="btn-close" id="btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">User Details</h4>
            </div>
          </div>
        </div>
        <form action="<?= base_url('user'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">User Id</label>
                  <div class="col-sm-8">
                    <?php

                    $userId = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'userId',
                      'id' => 'userId',
                      'value' => generateRandom('alnum', 16),
                      'required' => 'required',
                      'autocomplete' => 'off',
                      'readonly' => 'readonly'
                    );
                    echo form_input($userId);
                    ?>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Full Name</label>
                  <div class="col-sm-8">
                    <?php
                    $userName = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'userName',
                      'id' => 'userName',
                      'value' => set_value('userName'),
                      'placeholder' => 'User Name',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($userName);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('userName') : "";  ?></p>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Email Id</label>
                  <div class="col-sm-8">
                    <?php

                    $emailId = array(
                      'type' => 'email',
                      'class' => 'form-control',
                      'name' => 'userEmail',
                      'id' => 'userEmail',
                      'value' => set_value('userEmail'),
                      'placeholder' => 'User Email Id',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($emailId);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('userEmail') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
                  <div class="col-sm-8">
                    <?php
                    $phoneNumber = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'phoneNumber',
                      'id' => 'phoneNumber',
                      'value' => set_value('phoneNumber'),
                      'maxLength' => 10,
                      'placeholder' => 'User Phone Number',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($phoneNumber);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('phoneNumber') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <?php

                    $password = array(
                      'type' => 'password',
                      'class' => 'form-control',
                      'name' => 'password',
                      'id' => 'password',
                      'placeholder' => 'User Password',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($password);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('password') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Confirm Password</label>
                  <div class="col-sm-8">
                    <?php
                    $confirmPassword = array(
                      'type' => 'password',
                      'class' => 'form-control',
                      'name' => 'confirmPassword',
                      'id' => 'confirmPassword',
                      'placeholder' => 'Confirm Password',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($confirmPassword);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('confirmPassword') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">User Role</label>
                  <div class="col-sm-8">
                    <select name="role" id="" class="form-select" aria-label="Default select example">
                      <option value="">--- Select Role ---</option>
                      <?php
                      if (isset($role) && !empty($role)) {
                        foreach ($role as $key => $roleValue) { ?>
                          <option value="<?= $roleValue['role_id'] ?>"><?= $roleValue['role_name'] ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>
                </div>
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
              </div>
            </div>
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
<div id="user-model-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Modify User</h5>
        <button type="button" class="btn-close" id="btn-close-user" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <hr>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">User Details</h4>
            </div>
          </div>
        </div>
        <form action="<?= base_url('user'); ?>" method="POST" class="form-horizontal auth-form" id="menuForm">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">User Id</label>
                  <div class="col-sm-8">
                    <?php

                    $userId = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'userId',
                      'id' => 'user-id',
                      'required' => 'required',
                      'autocomplete' => 'off',
                      'readonly' => 'readonly'
                    );
                    echo form_input($userId);
                    ?>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Full Name</label>
                  <div class="col-sm-8">
                    <?php
                    $userName = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'userName',
                      'id' => 'user-name',
                      'placeholder' => 'User Name',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($userName);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('userName') : "";  ?></p>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Email Id</label>
                  <div class="col-sm-8">
                    <?php

                    $emailId = array(
                      'type' => 'email',
                      'class' => 'form-control',
                      'name' => 'userEmail',
                      'id' => 'user-email',
                      'placeholder' => 'User Email Id',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($emailId);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('userEmail') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
                  <div class="col-sm-8">
                    <?php
                    $phoneNumber = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'phoneNumber',
                      'id' => 'phone-number',
                      'maxLength' => 10,
                      'placeholder' => 'User Phone Number',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($phoneNumber);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('phoneNumber') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <?php

                    $password = array(
                      'type' => 'text',
                      'class' => 'form-control',
                      'name' => 'password',
                      'id' => 'user-password',
                      'placeholder' => 'User Password',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($password);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('password') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">Confirm Password</label>
                  <div class="col-sm-8">
                    <?php
                    $confirmPassword = array(
                      'type' => 'password',
                      'class' => 'form-control',
                      'name' => 'confirmPassword',
                      'id' => 'confirm-password',
                      'placeholder' => 'Confirm Password',
                      'required' => 'required',
                      'autocomplete' => 'off',
                    );
                    echo form_input($confirmPassword);
                    ?>
                    <p style="color:red;"><?= !empty(validation_errors())  ? validation_show_error('confirmPassword') : "";  ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <div class="row mb-3">
                  <label for="example-text-input" class="col-sm-4 col-form-label">User Role</label>
                  <div class="col-sm-8">
                    <select name="role" id="user-role" class="form-select" aria-label="Default select example">
                      <?php
                      if (isset($role) && !empty($role)) {
                        foreach ($role as $key => $roleValue) { ?>
                          <option value="<?= $roleValue['role_id'] ?>"><?= $roleValue['role_name'] ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>
                </div>
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
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light waves-effect" id="btn-close-users">Close</button> &nbsp;&nbsp;
            <button type="submit" class="g-recaptcha btn btn-info waves-effect waves-light" data-sitekey="<?php echo getenv('RECAPTCHA_SITE_V3_KEY'); ?>" data-callback='onSubmit'>Save changes</button>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">User Setup</h4>
      <div class="page-title-right d-flex justify-content-around">
        <ol class="breadcrumb m-0 p-2">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Guzaarish</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User</a></li>
        </ol>&nbsp;&nbsp;
        <button type="button" id="" class="btn btn-info waves-effect waves-light createMenuModal">
          Create User <i class="ri-arrow-right-line align-middle ms-2"></i>
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
              <th>User Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (isset($userData) && !empty($userData)) {
              $slNo = 1;
              foreach ($userData as $key => $value) { ?>
                <tr>
                  <td><?= $slNo++ ?></td>
                  <td><?= !empty($value['user_id']) ? $value['user_id'] : "" ?></td>
                  <td><?= !empty($value['user_name']) ? $value['user_name'] : "" ?></td>
                  <td><?= !empty($value['user_email']) ? $value['user_email'] : "" ?></td>
                  <td><?= !empty($value['user_phone']) ? $value['user_phone'] : "" ?></td>
                  <td><?= !empty($value['role_name']) ? $value['role_name'] : "" ?></td>
                  <td><?= !empty($value['status']) && $value['status'] == 1  ? '<span class="badge badge-soft-success"><strong>Active</strong></span>' : '<span class="badge badge-soft-danger"><strong>Deactive</strong></span>' ?></td>
                  <td class="text-right">
                    <div class="dropdown d-inline-block">
                      <a class="dropdown-toggle arrow-none" id="dLabel11" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                        <a class="dropdown-item user_edit" userId="<?= $value['user_id'] ?>"><i class="fas fa-edit"></i> Edit</a>
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
    $('.user_edit').click(function() {
      var userId = $(this).attr('userId');
      $.ajax({
        url: "<?php echo base_url('user-access-edit'); ?>",
        data: {
          'user_id': userId
        },
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if (response != "") {
            document.getElementById('user-id').setAttribute(`value`, `${response.user_id}`);
            document.getElementById('user-name').setAttribute(`value`, `${response.user_name}`);
            document.getElementById('user-email').setAttribute(`value`, `${response.user_email}`);
            document.getElementById('phone-number').setAttribute(`value`, `${response.user_phone}`);
            document.getElementById('user-password').setAttribute(`value`, `${response.user_password}`);
            document.getElementById('confirm-password').setAttribute(`value`, `${response.user_password}`);

          }
        }
      });
      document.getElementById('user-model-edit').setAttribute(`style`, `display:block`);
      document.getElementById('user-model-edit').classList.add('show')

    });
  });

  $(document).ready(function() {
    $('#btn-close-user').click(function() {
      document.getElementById('user-model-edit').setAttribute(`style`, `display:none`);
    })
  });
  $(document).ready(function() {
    $('#btn-close-users').click(function() {
      document.getElementById('user-model-edit').setAttribute(`style`, `display:none`);
    })
  })

  $(document).ready(function() {
    var error = <?php echo json_encode(validation_errors()); ?>;
    if (!jQuery.isEmptyObject(error)) {
      document.getElementById('myModal').setAttribute(`style`, `display:block`);
      document.getElementById('myModal').classList.add('show')
    }
  })
</script>

<?= $this->endSection(); ?>