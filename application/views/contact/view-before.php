<h2><?php echo $title;?>	</h2>
<hr>
	<form class="form-horizontal">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label col-sm-3" for="comp_code">Company Code:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->comp_code?>" type="text" class="form-control" name="comp_code"  id="comp_code" placeholder="Company Code">
					</div>
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="form-group">
					<label class="control-label col-sm-3" for="contact_type">Type:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->contact_type?>"type="text" class="form-control" name="contact_type"  id="contact_type" >
					</div>
				</div>
			</div>
			
			<div class="col-sm-4" id="agent_container">
				<div class="form-group">
					<label class="control-label col-sm-3" for="agent">Agent:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->agent?>"type="text" class="form-control" name="agent"  id="agent" placeholder="Agent">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label class="control-label col-sm-2" for="comp_name">Company Name:</label>
					<div class="col-sm-10">
						<input value="<?php echo $contact->comp_name?>"type="text" class="form-control" name="comp_name"  id="comp_name" placeholder="Company Name">
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="payable_container">
			<div class="col-sm-12" >
				<div class="form-group" >
					<label class="control-label col-sm-2" for="payable_to">Payable to:</label>
					<div class="col-sm-10">
						<input value="<?php echo $contact->payable_to?>" type="text" class="form-control" name="payable_to"  id="payable_to" placeholder="Payable to">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" >
				<div class="form-group">
					<label class="control-label col-sm-2" for="address">Address:</label>
					<div class="col-sm-10">
						<textarea  class="form-control" id="address" name="address"><?php echo $contact->address?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
					<label class="control-label col-sm-3" for="area">Area:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->area?>" type="text" class="form-control" name="area"  id="area" placeholder="area">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="tin_num">Tin #:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->tin_num?>" type="text" class="form-control" name="tin_num"  id="tin_num" placeholder="Tin #:">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="cont_pers">Contact Person:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->cont_pers?>" type="text" class="form-control" name="cont_pers"  id="cont_pers" placeholder="Contact Person:">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="telephone">Telephone #:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->telephone?>" type="text" class="form-control" name="telephone"  id="telephone" placeholder="Telephone #:">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="mob_no">Mobile #:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->mob_no?>" type="text" class="form-control" name="mob_no"  id="mob_no" placeholder="Mobile #:">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="other_telephone">Other Telelephone #:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->other_telephone?>" type="text" class="form-control" name="other_telephone"  id="other_telephone" placeholder="Other Telelephone #:">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="fax_num">Fax #:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->fax_num?>" type="text" class="form-control" name="fax_num"  id="fax_num" placeholder="Fax #:">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="email">Email Address:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->email?>" type="text" class="form-control" name="email"  id="email" placeholder="Email:">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="website">Website:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->website?>"type="text" class="form-control" name="website" id="website" placeholder="Website:">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="prepared_by">Prepared by:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->prepared_by?>"readonly type="text" class="form-control" name="prepared_by" id="prepared_by" placeholder="Prepared by:" value="<?php echo $this->session->userdata('username')?>">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="prep_date">Date Created:</label>
					<div class="col-sm-9">
						<input value="<?php echo $contact->prep_date?>"readonly type="text" class="form-control" name="prep_date" id="prep_date" value="<?php echo now()?>">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="update_by">Update by:</label>
					<div class="col-sm-9">
						<input value="<?php echo (empty($contact->update_by))?$contact->prepared_by:$contact->update_by ?>" type="text" class="form-control" name="update_by"  id="update_by">
					</div>
				</div>
			</div>
			<div class="col-sm-6" >
				<div class="form-group">
				<label class="control-label col-sm-3" for="up_date">Last Update:</label>
					<div class="col-sm-9">
						<input value="<?php echo (empty($contact->up_date))?$contact->prep_date:$contact->up_date ?>" type="text" class="form-control" name="up_date"  id="up_date">
					</div>
				</div>
			</div>
		</div>
      </div>
	</form>

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