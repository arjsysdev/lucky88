<!-- Lucky888Food Login -->
      <div class="col-sm-6 col-sm-offset-3" id="login-form">
        <div class="lucky888login">
          <div class="page-header">
            <h1><strong class="uppercase fblue regular">Login</strong> to Lucky 888 Food International Inc.</h1>
            <p>Please login with your email/username and password below.</p>
          </div>
          <form action="<?= base_url('auth/login') ?>" method="POST">
            <?php
              if(!empty($message)){
            ?>
              <div class="alert alert-danger"><?php echo $message;?></div>
            <?php
              }
            ?>
            <div class="form-group">
              <label for="email"><?php echo lang('login_identity_label', 'identity');?></label>
              <input type="text" name="identity" value="" class="form-control l-login-input" id="identity" placeholder="Email/Username">
            </div>
            <div class="form-group">
              <label for="pwd"><?php echo lang('login_password_label', 'password');?></label>
              <input type="password" name="password" value="" class="form-control l-login-input" id="password" placeholder="Password">
            </div>
            <div class="checkbox">
              <label>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                Remember Me:
              </label>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
            <a href="forgot_password" class="btn btn-link"><?php echo lang('login_forgot_password');?></a>
          </form>
        </div>
      </div>