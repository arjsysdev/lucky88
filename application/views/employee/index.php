	<!-- scripts -->
	<script type="text/javascript">
		$(function() {
			// http://bootstrap-datepicker.readthedocs.io/en/stable/options.html
			$('#birthdate').datepicker({
				format: 'mm/dd/yyyy',
				todayHighlight: true,
				autoclose: true,
			});
			
			$('.datepicker').datepicker({
				format: 'mm/dd/yyyy',
				todayHighlight: true,
				autoclose: true,
				startDate: '+0d'
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
			var check = 
			// $('#c_end_date, #c_rate_per_month, #c_sss, #c_start_date, #c_sssloan, #c_philhealth, #c_pag-ibig, #c_ec, #c_insurance').blur(function()
			// {
				
			// });
			
			$('[name="c_end_date[]"]').blur(function()
			{
				if($('[name="c_end_date[]"]').val() != ""){
					console.log("not empty");
				}else{
					console.log("empty");
				}
			});
		});
		$(function() {
			$("#termination").change(function(){
				$("#c_end_date").val($("#termination").val());
			});			
			
			$(".selector").select2();

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
					$("#employee_id").val("<?php echo date("Y-md-")?>"+result);
				}
			});
		}
	</script>
	<div class="col-sm-12">
		<?php echo $this->session->flashdata('message');?>
		<form class="form-horizontal" method="post" action="<?php echo base_url("employee")?>" enctype="multipart/form-data">
		<div class="col-sm-3">
			<div id="image-preview" style="height: 300px; width: 300px; background-color: #fff;" >
			</div>
			<label for="image-upload" id="image-label"></label>
			<input type="file" name="file" id="image-upload" accept="image/jpg,image/png,image/jpeg,image/gif" required/>
		</div>
		<div class="col-sm-9">
			<div class="form-group">
				<label class="control-label col-sm-1" for="employee_id">Employee ID:</label>
				<div class="col-sm-11">
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
						<label class="control-label col-sm-3" for="agency">Agency: </label>
						<div class="col-sm-9">
							<select class="form-control selector" id="agency" name="agency">
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
							<select class="form-control selector" id="designation" name="designation">
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
					<div class="form-group">
						<label class="control-label col-sm-3" for="company">Company: </label>
						<div class="col-sm-9">
							<select class="form-control selector" id="company" name="company">
								<option value="" disabled selected>Nothing is selected</option>
								<option value="Wilper Marketing & Repacking">Wilper Marketing & Repacking</option>
								<option value="Lucky 888 Food International, Inc. - Main">Lucky 888 Food International, Inc. - Main</option>
								<option value="Lucky 888 Food International, Inc. - Branch">Lucky 888 Food International, Inc. - Branch</option>
								<option value="Lucky 228 Subic Trading">Lucky 228 Subic Trading</option>
								<option value="Royal Freights & Services">Royal Freights & Services</option>
							</select>
						</div>
					</div>
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
			<!--
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
			-->
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="compensation">Compensation: </label>
						<div class="col-sm-9">
							<select class="form-control selector" id="compensation" name="compensation">
								<option value="" disabled selected>Nothing is selected</option>
								<option value="Manager's Rate">Manager's Rate</option>
								<option value="Daily Wage Rate">Daily Wage Rate</option>
								<option value="Piece Rate">Piece Rate</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-12">
					<table id="comp_table" class="table table-bordered">
						
					</table>
				</div>
			</div>
		<div class="row">
			<div class="col-sm-12">
			 <button type="submit" name="Submit" value="Save" class="btn btn-primary">Save</button>
			</div>
		</div>
		</form>
	</div>
	
	<script>
	$("#compensation").change(function() {
		if($(this).val()=="Manager's Rate"){
			$('#comp_table').html("<thead><tr><th>Start Date</th><th>End Date</th><th>Rate per Month</th><th>SSS</th><th>SSS Loan</th><th>Philhealth</th><th>Pag-ibig</th><th>EC</th><th>Insurance</th></tr></thead><tbody><tr><td><input type='text' class='form-control' id='c_start_date' value='<?php echo date('m/d/Y')?>' readonly name='c_start_date'></td><td><input type='text' class='form-control' readonly id='c_end_date' name='c_end_date'></td><td><input type='text' class='form-control' id='c_rate_per_month' name='c_rate_per_month'></td><td><input type='text' class='form-control' id='c_sss' name='c_sss'></td><td><input type='text' class='form-control' id='c_sssloan' name='c_sssloan'></td><td><input type='text' class='form-control' id='c_philhealth' name='c_philhealth'></td><td><input type='text' class='form-control' id='c_pag_ibig' name='c_pag_ibig'></td><td><input type='text' class='form-control' id='c_ec' name='c_ec'></td><td><input type='text' class='form-control' id='c_insurance' name='c_insurance'></td></tr></tbody>");
			$("#c_end_date").val($("#termination").val());
		}else if($(this).val()=="Daily Wage Rate"){
			$("#comp_table").html("<thead><tr><th>Start Date</th><th>End Date</th><th>Rate per day</th><th>SSS per day</th><th>SSS Loan per day</th><th>Philhealth per day</th><th>Pag-ibig per day</th><th>EC per day</th><th>Insurance per day</th></tr></thead><tbody><tr><td><input type='text' class='form-control' id='c_start_date' value='<?php echo date('m/d/Y')?>' readonly name='c_start_date'></td><td><input type='text' class='form-control' readonly id='c_end_date' name='c_end_date'></td><td><input type='text' class='form-control' id='c_rate_per_month' name='c_rate_per_month'></td><td><input type='text' class='form-control' id='c_sss' name='c_sss'></td><td><input type='text' class='form-control' id='c_sssloan' name='c_sssloan'></td><td><input type='text' class='form-control' id='c_philhealth' name='c_philhealth'></td><td><input type='text' class='form-control' id='c_pag_ibig' name='c_pag_ibig'></td><td><input type='text' class='form-control' id='c_ec' name='c_ec'></td><td><input type='text' class='form-control' id='c_insurance' name='c_insurance'></td></tr></tbody>");
			$("#c_end_date").val($("#termination").val());
		}else{
			$("#comp_table").html("<thead><tr><th>Start Date</th><th>End Date</th><th>Product ID</th><th>Compensation</th><th>Quota</th></tr></thead><tbody><tr><td><input type='text' class='form-control' id='c_start_date' value='<?php echo date('m/d/Y')?>' readonly name='c_start_date'></td><td><input type='text' class='form-control' readonly id='c_end_date' name='c_end_date'></td><td><input type='text' class='form-control' id='PR_Product_id' name='PR_Product_id'></td><td><input type='text' class='form-control' id='PR_Compensation' name='PR_Compensation'></td><td><input type='text' class='form-control' id='PR_Quota' name='PR_Quota'></td></tr></tbody>");
			$("#c_end_date").val($("#termination").val());
		}
	});

	</script>