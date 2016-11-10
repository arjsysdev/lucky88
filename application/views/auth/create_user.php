<div class="col-sm-6 col-sm-offset-3" id="login-form">
  <div class="lucky888user">
    <div class="page-header">
      <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo lang('create_user_heading');?></h1>
      <p><?php echo lang('create_user_subheading');?></p>
    </div>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>
      
      <div class="form-group">
        <?php echo lang('create_user_fname_label', 'first_name');?>
        <?php echo form_input($first_name, '', 'class="form-control l-login-input" placeholder="First Name"');?>
      </div>

      <div class="form-group">
        <?php echo lang('create_user_lname_label', 'last_name');?>
        <?php echo form_input($last_name, '', 'class="form-control l-login-input" placeholder="Last Name"');?>
      </div>
      
      <div class="form-group">
        <?php
        if($identity_column!=='email') {
            echo '<p>';
            echo lang('create_user_identity_label', 'identity');
            echo '<br />';
            echo form_error('identity');
            echo form_input($identity, '', 'class="form-control l-login-input" placeholder="Identity"');
            echo '</p>';
        }
        ?>
      </div>

      <div class="form-group">
        <?php echo lang('create_user_company_label', 'company');?>
        <?php echo form_input($company, '', 'class="form-control l-login-input" placeholder="Company Name"');?>
      </div>

      <div class="form-group">
        <?php echo lang('create_user_email_label', 'email');?>
        <?php echo form_input($email, '', 'class="form-control l-login-input" placeholder="Email"');?>
      </div>

      <div class="form-group">
        <?php echo lang('create_user_phone_label', 'phone');?>
        <?php echo form_input($phone, '', 'class="form-control l-login-input"');?>
      </div>

      <div class="form-group">
        <?php echo lang('create_user_password_label', 'password');?>
        <?php echo form_input($password, '', 'class="form-control l-login-input" placeholder="Password"');?>
      </div>

      <div class="form-group">
        <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
        <?php echo form_input($password_confirm, '', 'class="form-control l-login-input" placeholder="Confirm Password"');?>
      </div>

      <p><?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?></p>

<?php echo form_close();?>
  </div>
</div>