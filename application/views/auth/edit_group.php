<div class="col-sm-6 col-sm-offset-3" id="login-form">
<div class="lucky888user">
	<div class="page-header">
		<h1><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <?php echo lang('edit_group_heading');?></h1>
		<p><?php echo lang('edit_group_subheading');?></p>
	</div>

	<div id="infoMessage"><?php echo $message;?></div>

	<?php echo form_open(current_url());?>

            <div class="form-group">
              <label><?php echo lang('edit_group_name_label', 'group_name');?></label>
              <?php echo form_input($group_name, '', 'class="form-control l-login-input" placeholder="admin"');?>
            </div>

            <div class="form-group">
              <label><?php echo lang('edit_group_desc_label', 'description');?></label>
              <?php echo form_input($group_description, '', 'class="form-control l-login-input" placeholder="Administrator"');?>
            </div>

	      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary hidden-xs"');?></p>

	      <!-- Mobile Visibility -->
	      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary btn-block visible-xs"');?></p>

	<?php echo form_close();?>

</div>
</div>