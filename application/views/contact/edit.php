
<style>
.modal-body {;
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}
</style>
<div class="lucky888user">
<h2 class="page-header margin">
	<i class="fa fa-file-text-o" aria-hidden="true"> </i> Edit <?php echo $title;?>
</h2>

<div class="row">
	<div class="col-sm-12">
		<?php echo $this->session->flashdata('message');?>
	</div>
</div>
	<form action="<?php echo base_url("contact/editcon")?>" method="POST">
		<input hidden type="text" value="<?php echo $contact_id?>" name="contact_id">
		<div class="row">
			<section class="col-md-4">
				<div class="form-hover">
					<div class="form-group">
						<label for="comp_code">Company Code:</label>
						<input value="<?php echo $contact->comp_code?>" type="text" class="form-control l-login-input" name="comp_code" id="comp_code" placeholder="Company Code">
					</div>
				</div>
			</section>
			<section class="col-md-4">
				<div class="form-hover">
					<div class="form-group">
						<label for="contact_type">Type:</label>
						<select type="text" class="form-control l-login-input" name="contact_type"  id="contact_type" >
							<option value="Agency" <?php echo ($contact->contact_type=="Agency")?"Selected":""?>>Agency</option>
							<option value="Customer" <?php echo ($contact->contact_type=="Customer")?"Selected":""?>>Customer</option>
							<option value="Supplier" <?php echo ($contact->contact_type=="Supplier")?"Selected":""?>>Supplier</option>
							<option value="Both" <?php echo ($contact->contact_type=="Both")?"Selected":""?>>Both</option>
						</select>
					</div>
				</div>
			</section>
			<section class="col-md-4" id="agent_container">
				<div class="form-hover">
					<div class="form-group">
						<label for="agent">Agent:</label>
						<input value="<?php echo $contact->agent?>" type="text" class="form-control l-login-input" name="agent" id="agent" placeholder="Agent">
					</div>
				</div>
			</section>
		</div>
		<div class="row">
			<section class="col-md-12">
				<div class="form-hover">
					<div class="form-group">
						<label for="comp_name">Company Name:</label>
						<input value="<?php echo $contact->comp_name?>" type="text" class="form-control l-login-input" name="comp_name" id="comp_name" placeholder="Company Name">
					</div>
				</div>
				<div id="payable_container">
					<div class="form-hover">
						<div class="form-group">
							<label for="payable_to">Payable to:</label>
							<input value="<?php echo $contact->payable_to?>" type="text" class="form-control l-login-input" name="payable_to" id="payable_to" placeholder="Payable to">
						</div>
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea class="form-control" rows="5" id="address" name="address"><?php echo $contact->address?></textarea>
					</div>
				</div>
			</section>
		</div>
		<div class="row">
			<div class="col-md-6" >
				<div class="form-hover">
					<div class="form-group">
						<label for="area">Area:</label>
						<select type="text" class="form-control l-login-input" name="area"  id="area" >
							<option value="Area1" <?php echo ($contact->area=="Area1")?"Selected":""?>>Area1</option>
							<option value="Area2" <?php echo ($contact->area=="Area2")?"Selected":""?>>Area2</option>
							<option value="Area3" <?php echo ($contact->area=="Area3")?"Selected":""?>>Area3</option>
							<option value="Area4" <?php echo ($contact->area=="Area4")?"Selected":""?>>Area4</option>
						</select>
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="cont_pers">Contact Person:</label>
						<input value="<?php echo $contact->cont_pers?>" type="text" class="form-control l-login-input" name="cont_pers" id="cont_pers" placeholder="Contact Person">
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="mob_no">Mobile #:</label>
						<input value="<?php echo $contact->mob_no?>" type="text" class="form-control l-login-input" name="mob_no" id="mob_no" placeholder="Mobile #">
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="fax_num">Fax #:</label>
						<input value="<?php echo $contact->fax_num?>" type="text" class="form-control l-login-input" name="fax_num" id="fax_num" placeholder="Fax #">
					</div>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="form-hover">
					<div class="form-group">
						<label for="tin_num">TIN #:</label>
						<input value="<?php echo $contact->tin_num?>" type="text" class="form-control l-login-input" name="tin_num" id="tin_num" placeholder="TIN #">
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="telephone">Telephone #:</label>
						<input value="<?php echo $contact->telephone?>" type="text" class="form-control l-login-input" name="telephone" id="telephone" placeholder="Telephone #">
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="other_telephone">Other Telephone #:</label>
						<input value="<?php echo $contact->other_telephone?>" type="text" class="form-control l-login-input" name="other_telephone" id="other_telephone" placeholder="Other Telephone #">
					</div>
				</div>
				<div class="form-hover">
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input value="<?php echo $contact->email?>" type="text" class="form-control l-login-input" name="email" id="email" placeholder="Email">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<section class="col-md-12">
				<div class="form-hover">
					<div class="form-group">
						<label for="website">Website:</label>
						<input value="<?php echo $contact->website?>" type="text" class="form-control l-login-input" name="website" id="website" placeholder="www.yourdomain.com">
					</div>
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
					<input value="<?php echo (empty($contact->update_by))?$contact->prepared_by:$contact->update_by ?>" readonly type="text" class="form-control l-login-input" name="update_by" id="update_by">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="prep_date">Date Created:</label>
					<input value="<?php echo $contact->prep_date?>" readonly type="text" class="form-control l-login-input" name="prep_date" id="prep_date" value="<?php echo now()?>">
				</div>
				<div class="form-group">
					<label for="up_date">Last Update:</label>
					<input value="<?php echo (empty($contact->up_date))?$contact->prep_date:$contact->up_date ?>" readonly type="text" class="form-control l-login-input" name="up_date" id="up_date">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button type="Submit" name="Submit" class="btn btn-primary btn-lg hidden-xs" value="Update">Update</button>
				<button type="Submit" name="Submit" class="btn btn-primary btn-lg btn-block visible-xs" value="Update">Update</button>
			</div>
		</div>
	</form>

</div>
</div>
<script>
	$(document).ready(function() {
		if(!$('#payable_to').val()){
			$("#payable_container").hide();
		}
		if(!$('#agent').val()){
			$("#agent_container").hide();
		}
		$("#contact_type").change(function() {
			var ct = $(this).val();
			if(ct == "Supplier" || ct == "Both"){
				$("#payable_container").show();
				$("#agent").val('');
				$("#agent_container").hide();
			}else if(ct=="Customer"){
				$("#agent_container").show();
				$("#payable_to").val('');
				$("#payable_container").hide();
			}else{
				$("#payable_to").val('');
				$("#payable_container").hide();
				$("#agent").val('');
				$("#agent_container").hide();
			}
		});
	});
</script>