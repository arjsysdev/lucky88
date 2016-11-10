<div class="col-sm-6 col-sm-offset-3" id="login-form">
	<div class="lucky888user">
		<div class="page-header">
			<h1><i class="fa fa-question-circle" aria-hidden="true"></i> <?php echo lang('forgot_password_heading');?></h1>
			<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
		</div>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity, '', 'class="form-control l-login-input" placeholder="Identity"');?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary"');?></p>

<?php echo form_close();?>
	</div>	
</div>