
	<!-- scripts -->
	<script type="text/javascript">
		$(function() {
			// http://bootstrap-datepicker.readthedocs.io/en/stable/options.html
			$('.datepicker').datepicker({
				format: 'mm/dd/yyyy',
				todayHighlight: true,
				autoclose: true,
			});
		});
		
		$(document).ready(function() {
			last_id();
			// http://markusslima.github.io/bootstrap-filestyle/
			$("#image-upload").filestyle({
				buttonName: "btn-primary",
				badge: false,
				iconName: "glyphicon glyphicon-user",
				buttonBefore: true
			});
		  $.uploadPreview({
			input_field: "#image-upload",   // Default: .image-upload
			preview_box: "#image-preview",  // Default: .image-preview
			label_field: "#image-label",    // Default: .image-label
			label_default: "",   // Default: Choose File
			label_selected: "",  // Default: Change File
			no_label: false                 // Default: false
		  });
		});
		
		//Node.js
		// window.setInterval(function(){
		// last_id()
		// }, 1000);

		function last_id(){
			$.ajax({
				url:  '<?php echo base_url('employee/last_id'); ?>',
				type: 'GET',
				dataType: 'JSON',
				success: function(result){
					console.log(result);
					$("#employee_id").val("<?php echo date("Y-md-")?>"+result);
				}
			});
		}
	</script>
	<div class="col-sm-12">
		<?php echo $this->session->flashdata('message');?>
		<form class="form-horizontal" method="post" action="<?php echo base_url("employee")?>" enctype="multipart/form-data">
		<div class="col-sm-4">
			<div id="image-preview" style="min-height: 450px; background-color: #fff;">
			</div>
			<label for="image-upload" id="image-label"></label>
			<input type="file" name="file" id="image-upload" accept="image/jpg,image/png,image/jpeg,image/gif" required/>
		</div>
		<div class="col-sm-8">
			<div class="form-group">
				<label class="control-label col-sm-2" for="employee_id">Employee ID:</label>
				<div class="col-sm-10">
					<input type="text" readonly class="form-control" id="employee_id" name="employee_id">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="lname">Last Name:</label>
							<input type="text" class="form-control" name="lname" id="lname">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="fname">First Name:</label>
							<input type="text" class="form-control" name="fname" id="fname">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="mname">Middle name:</label>
							<input type="text" class="form-control" name="mname" id="mname">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<label for="address">Address:</label>
					<textarea class="form-control" rows="5" name="address" id="address"></textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="birthdate">Birthdate: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control datepicker" id="birthdate" name="birthdate">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-2" for="agency">Agency: </label>
						<div class="col-sm-10">
							<select class="form-control" id="agency" name="agency">
								<option value="N/A">N/A</option>
								<!-- insert Foreach here!-->
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="contact_no">Contact No: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="contact_no" name="contact_no">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="designation">Designation: </label>
						<div class="col-sm-9">
							<select class="form-control" id="designation" name="designation">
								<option value="" disabled selected>Nothing is selected</option>
								<option value="Driver" >Driver</option>
								<option value="Helper" >Helper</option>
								<option value="Merchandiser" >Merchandiser</option>
								<option value="Repacker" >Repacker</option>
								<option value="Sales Officer - Domestic" >Sales Officer - Domestic</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="hired_date">Hired Date:</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" value="<?php echo date("m/d/Y")?>" id="hired_date" name="hired_date">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="sss">SSS: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="sss" name="sss">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="termination">Termination: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control datepicker" id="termination" name="termination">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="philhealth">Philhealth No: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="philhealth" name="philhealth">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="pagibig">PAGIBIG No: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="pagibig" name="pagibig">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label class="control-label col-sm-2" for="company">Company: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="company" name="company">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
			 <button type="submit" name="Submit" value="Save" class="btn btn-primary">Save</button>
			</div>
		</div>
		</form>
	</div>