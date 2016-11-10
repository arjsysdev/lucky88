<div class="col-sm-6 col-sm-offset-3" id="login-form">
<div class="lucky888user">
  <div class="page-header">
    <h1><i class="fa fa-user" aria-hidden="true"></i> <?php echo lang('edit_user_heading');?></h1>
    <p><?php echo lang('edit_user_subheading');?></p>
  </div>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

            <div class="form-group">
              <?php echo lang('edit_user_fname_label', 'first_name');?>
              <?php echo form_input($first_name,'', 'class="form-control l-login-input" placeholder="First Name"');?>
            </div>

            <div class="form-group">
              <?php echo lang('edit_user_lname_label', 'last_name');?>
              <?php echo form_input($last_name,'', 'class="form-control l-login-input" placeholder="Last Name"');?>
            </div>

            <div class="form-group">
              <?php echo lang('edit_user_company_label', 'company');?>
              <?php echo form_input($company,'', 'class="form-control l-login-input" placeholder="Company"');?>
            </div>

            <div class="form-group">
              <?php echo lang('edit_user_phone_label', 'phone');?>
              <?php echo form_input($phone,'', 'class="form-control l-login-input" placeholder="Phone"');?>
            </div>

            <div class="form-group">
              <?php echo lang('edit_user_password_label', 'password');?>
              <?php echo form_input($password,'', 'class="form-control l-login-input" placeholder="Password"');?>
            </div>

            <div class="form-group">
              <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
              <?php echo form_input($password_confirm,'', 'class="form-control l-login-input" placeholder="Confirm Password"');?>
            </div>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3 class="page-header"><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <div class="checkbox">
                <label>
                  <?php
                      $gID=$group['id'];
                      $checked = null;
                      $item = null;
                      foreach($currentGroups as $grp) {
                          if ($gID == $grp->id) {
                              $checked= ' checked="checked"';
                          break;
                          }
                      }
                  ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
              </div>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary mt20 hidden-xs"');?></p>

      <!-- Mobile Visibility -->
      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary mt20 btn-block visible-xs"');?></p>

<?php echo form_close();?>
</div>
</div>