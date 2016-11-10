<div class="col-sm-6 col-sm-offset-3" id="login-form">
	<div class="lucky888user">
		<div class="page-header">
			<h1><i class="fa fa-user-times" aria-hidden="true"></i> <?php echo lang('deactivate_heading');?></h1>
			<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
		</div>

<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary hidden-xs"');?></p>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary btn-block visible-xs"');?></p>

<?php echo form_close();?>
	</div>
</div>