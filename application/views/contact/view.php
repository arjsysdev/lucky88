<div class="lucky888user">
<h2 class="page-header margin"><i class="fa fa-file-text-o" aria-hidden="true"> </i> <?php echo $title;?></h2>

	<div class="row">
		<section class="col-md-4">
			<div class="form-group">
				<label for="comp_code">Company Code:</label>
				<input value="<?php echo $contact->comp_code?>" type="text" class="form-control l-login-input" name="comp_code" id="comp_code">
			</div>
		</section>
		<section class="col-md-4">
			<div class="form-group">
				<label for="contact_type">Type:</label>
				<input value="<?php echo $contact->contact_type?>" type="text" class="form-control l-login-input" name="contact_type" id="contact_type">
			</div>
		</section>
		<section class="col-md-4" id="agent_container">
			<div class="form-hover">
				<div class="form-group">
					<label for="agent">Agent:</label>
					<input value="<?php echo $contact->agent?>" type="text" class="form-control l-login-input" name="agent" id="agent">
				</div>
			</div>
		</section>
	</div>

	<div class="row">
		<section class="col-md-12">
			<div class="form-group">
				<label for="comp_name">Company Name:</label>
				<input value="<?php echo $contact->comp_name?>" type="text" class="form-control l-login-input" name="comp_name" id="comp_name">
			</div>
			<div id="payable_container">
				<div class="form-group">
					<label for="payable_to">Payable to:</label>
					<input value="<?php echo $contact->payable_to?>" type="text" class="form-control l-login-input" name="payable_to" id="payable_to">
				</div>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<textarea class="form-control" name="address" id="address"><?php echo $contact->address?></textarea>
			</div>
		</section>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="area">Area:</label>
				<input value="<?php echo $contact->area?>" type="text" class="form-control l-login-input" name="agent" id="agent">
			</div>
			<div class="form-group">
				<label for="cont_pers">Contact Person:</label>
				<input value="<?php echo $contact->cont_pers?>" type="text" class="form-control l-login-input" name="cont_pers" id="cont_pers">
			</div>
			<div class="form-group">
				<label for="mob_no">Mobile #:</label>
				<input value="<?php echo $contact->mob_no?>" type="text" class="form-control l-login-input" name="mob_no" id="mob_no">
			</div>
			<div class="form-group">
				<label for="fax_num">Fax #:</label>
				<input value="<?php echo $contact->fax_num?>" type="text" class="form-control l-login-input" name="fax_num" id="fax_num">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="tin_num">TIN #:</label>
				<input value="<?php echo $contact->tin_num?>" type="text" class="form-control l-login-input" name="tin_num" id="tin_num">
			</div>
			<div class="form-group">
				<label for="telephone">Telephone #:</label>
				<input value="<?php echo $contact->telephone?>" type="text" class="form-control l-login-input" name="telephone" id="telephone">
			</div>
			<div class="form-group">
				<label for="other_telephone">Other Telephone #:</label>
				<input value="<?php echo $contact->other_telephone?>" type="text" class="form-control l-login-input" name="other_telephone" id="other_telephone">
			</div>
			<div class="form-group">
				<label for="email">Email Address:</label>
				<input value="<?php echo $contact->email?>" type="text" class="form-control l-login-input" name="email" id="email">
			</div>
		</div>
	</div>

	<div class="row">
		<section class="col-md-12">
			<div class="form-group">
				<label for="website">Website:</label>
				<input value="<?php echo $contact->website?>" type="text" class="form-control l-login-input" name="website" id="website">
			</div>
		</section>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="prepared_by">Prepared by:</label>
				<input value="<?php echo $contact->prepared_by?>" readonly type="text" class="form-control l-login-input" name="prepared_by" id="prepared_by" value="<?php echo $this->session->userdata('username')?>">
			</div>
			<div class="form-group">
				<label for="update_by">Update by:</label>
				<input value="<?php echo (empty($contact->update_by))?$contact->prepared_by:$contact->update_by ?>" type="text" class="form-control l-login-input" name="update_by" id="update_by">				
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="prep_date">Date Created:</label>
				<input value="<?php echo $contact->prep_date?>" readonly type="text" class="form-control l-login-input" name="prep_date" id="prep_date" value="<?php echo now()?>">
			</div>
			<div class="form-group">
				<label for="up_date">Last Update:</label>
				<input value="<?php echo (empty($contact->up_date))?$contact->prep_date:$contact->up_date ?>" type="text" class="form-control l-login-input" name="up_date" id="up_date">
			</div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function() {
		$( ":input" ).attr('readonly', 'readonly');
		if(!$('#payable_to').val()){
			$("#payable_container").hide();
		}
		if(!$('#agent').val()){
			$("#agent_container").hide();
		}
	});
</script>