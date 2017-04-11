<style>
.modal-lg {
    width: 90%; /* respsonsive width */
    
}

.form-control{
	padding: 1.5px 3px;
}
.modal-body { 
    max-height:500px; 
    overflow-y:auto;
}
</style>
<div class="col-sm-12">
		<form class="form-horizontal" id="update_form" method="post" action="<?php echo base_url("Employee/update_employee")?>">
		<div class="col-sm-3">
			<div style="height: 300px; width: 300px;">
				<img src="<?php echo base_url('assets/employee_id').'/'.$emp->picture?>" alt="<?php echo $emp->fname?>" height="300px" width="300px">
			</div>
		</div>
		<div class="col-sm-9">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-12">
					<!--Update switch-->
						<button type="button" id="cancel_button" class="btn btn-danger pull-right"  onclick="cancel_mode();" >Cancel</button>
						<button type="button" id="edit_button" class="btn btn-info pull-right" onclick="edit_mode();" >Edit Employee</button>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-12">
						<button type="button" class="btn btn-info pull-right" onclick="open_benefits('<?php echo $emp->employee_id?>');" style="margin-left: 5% !important;">Open Employee Benefits</button>
						<button type="button" class="btn btn-info pull-right" onclick="open_compensation('<?php echo $emp->employee_id?>');" >Open Compensation</button>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-1" for="employee_id">Employee ID:</label>
				<div class="col-sm-11">
					<input type="text" type="text" readonly class="form-control" id="employee_id" name="employee_id" value="<?php echo $emp->employee_id?>">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="lname">Last Name:</label>
							<input type="text" readonly class="form-control" name="lname" id="lname" value="<?php echo $emp->lname?>">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="fname">First Name:</label>
							<input type="text" readonly class="form-control" name="fname" id="fname" value="<?php echo $emp->fname?>">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="mname">Middle name:</label>
							<input type="text" readonly class="form-control" name="mname" id="mname" value="<?php echo $emp->mname?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<label for="address">Address:</label>
					<textarea class="form-control" readonly rows="5" name="address" id="address"><?php echo $emp->address?></textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="birthdate">Birthdate: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" id="birthdate" name="birthdate" value="<?php echo date_format( date_create($emp->birthdate), "m/d/Y")?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="agency">Agency: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" id="agency" name="agency" value="<?php echo $emp->agency?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="contact_no">Contact No: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" id="contact_no" name="contact_no" value="<?php echo $emp->contact_no?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="designation">Designation: </label>
						<div class="col-sm-9">
							<select readonly class="form-control selector" id="designation" name="designation">
								<option value=""  >Nothing is selected</option>
								<option <?php echo ($emp->designation == "Driver")?"selected":"" ?>  value="Driver" >Driver</option>
								<option <?php echo ($emp->designation == "Helper")?"selected":"" ?>  value="Helper" >Helper</option>
								<option <?php echo ($emp->designation == "Merchandiser")?"selected":"" ?>  value="Merchandiser" >Merchandiser</option>
								<option <?php echo ($emp->designation == "Repacker")?"selected":"" ?>  value="Repacker" >Repacker</option>
								<option <?php echo ($emp->designation == "Sales Officer - Domestic")?"selected":"" ?>  value="Sales Officer - Domestic" >Sales Officer - Domestic</option>
							</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="hired_date">Hired Date:</label>
						<div class="col-sm-9">
							<input type="text" readonly type="text" class="form-control datepicker" value="<?php echo date_format( date_create($emp->hired_date), "m/d/Y")?>" id="hired_date" name="hired_date">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="sss">SSS: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" id="sss" name="sss" value="<?php echo $emp->sss?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="termination">Termination: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control datepicker" id="termination" name="termination" value="<?php echo date_format( date_create($emp->termination), "m/d/Y")?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="philhealth">Philhealth No: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" id="philhealth" name="philhealth" value="<?php echo $emp->philhealth?>">
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
								<option <?php echo ($emp->company == "Wilper Marketing & Repacking")?"selected":"" ?> value="Wilper Marketing & Repacking">Wilper Marketing & Repacking</option>
								<option <?php echo ($emp->company == "Lucky 888 Food International, Inc. - Main")?"selected":"" ?> value="Lucky 888 Food International, Inc. - Main">Lucky 888 Food International, Inc. - Main</option>
								<option <?php echo ($emp->company == "Lucky 888 Food International, Inc. - Branch")?"selected":"" ?> value="Lucky 888 Food International, Inc. - Branch">Lucky 888 Food International, Inc. - Branch</option>
								<option <?php echo ($emp->company == "Lucky 228 Subic Trading")?"selected":"" ?> value="Lucky 228 Subic Trading">Lucky 228 Subic Trading</option>
								<option <?php echo ($emp->company == "Royal Freights & Services")?"selected":"" ?> value="Royal Freights & Services">Royal Freights & Services</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="pagibig">PAGIBIG No: </label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control" id="pagibig" name="pagibig" value="<?php echo $emp->pagibig?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" name="Submit" value="Save" id="save_button" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
		</form>
	</div>
	
	<!-- Compensation -->
	<div class="modal fade" id="compensation" data-backdrop="static" data-keyboard="false" role="dialog">
		<div class="modal-dialog modal-lg">
		<form action="<?php echo base_url("employee/add_compensation")?>" method="POST">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title"><?php echo $emp->compensation; ?></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<a class="btn btn-info pull-right" data-dismiss="modal" data-toggle="modal" href="#edit_compe"> Edit </a>
					</div>
				</div>
				<br>
				<div class="row">
					<input hidden type="text" name="employee_id"  value="<?php echo $emp->employee_id?>">
					
					<div class="col-sm-12">
						<?php if($emp->compensation == "Manager's Rate"){ ?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Rate per Month</th>
									<th>SSS</th>
									<th>SSS Loan</th>
									<th>Philhealth</th>
									<th>Pag-ibig</th>
									<th>EC</th>
									<th>Insurance</th>
								</tr>
							</thead>
							<tbody id="compe">
							</tbody>
						</table>
						<?php }elseif($emp->compensation == "Daily Wage Rate"){ ?> 
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Rate per day</th>
									<th>SSS per day</th>
									<th>SSS Loan per day</th>
									<th>Philhealth per day</th>
									<th>Pag-ibig per day</th>
									<th>EC per day</th>
									<th>Insurance per day</th>
								</tr>
							</thead>
							<tbody id="compe">
							</tbody>
						</table>
						<?php }else{ ?>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Product ID</th>
										<th>Compensation</th>
										<th>Quota</th>
									</tr>
								</thead>
								<tbody id="compe">
								</tbody>
							</table>						
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="modal-footer" id="compe_footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal" id="comp_close">Close</button>
			</div>
		</div>
		</form>
		</div>
	</div>
	
	<!-- Compensation-Edit -->
	<div class="modal fade" id="edit_compe" data-backdrop="static" data-keyboard="false" role="dialog">
		<div class="modal-dialog modal-lg">
		<?php if($emp->compensation == "Piece Rate"){?>
			<form action="<?php echo base_url("employee/add_piece_rate")?>" method="POST">
		<?php }else{?>
			<form action="<?php echo base_url("employee/add_compensation")?>" method="POST">
		<?php }?>
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  data-target="#compensation">&times;</button>
				<h4 class="modal-title">Edit Compensation</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<button type="button" class="btn btn-primary pull-right" onclick="add_compensation()";>Add Record</button>
						
					</div>
				</div>
				<br>
				<div class="row">
					<input hidden type="text" name="employee_id"  value="<?php echo $emp->employee_id?>">
					<div class="col-sm-12">
					<table class="table table-bordered">
							<thead>
								<tr>
								<?php if($emp->compensation == "Piece Rate"){?>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Product ID</th>
									<th>Compensation</th>
									<th>Quota</th>
								<?php }elseif($emp->compensation == "Daily Wage Rate"){?>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Rate per day</th>
									<th>SSS per day</th>
									<th>SSS Loan per day</th>
									<th>Philhealth per day</th>
									<th>Pag-ibig per day</th>
									<th>EC per day</th>
									<th>Insurance per day</th>
								<?php }else{?>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Rate per Month</th>
									<th>SSS</th>
									<th>SSS Loan</th>
									<th>Philhealth</th>
									<th>Pag-ibig</th>
									<th>EC</th>
									<th>Insurance</th>
								<?php }?>
								</tr>
								</thead>
								<tbody id="compensation_list">
								</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer" id="compe_footer">
				<button type="Submit" class="btn btn-primary" >Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal" id="comp_close" data-target="#compensation" >Cancel</button>
			</div>
		</div>
		</form>
		</div>
	</div>
	
	
	<!-- http://stackoverflow.com/questions/19528173/bootstrap-open-another-modal-in-modal -->
	<!-- Employee Benefits -->
	<div class="modal fade" id="emp_bene" data-backdrop="static" data-keyboard="false" role="dialog"role="dialog">
		<div class="modal-dialog modal-lg">
    
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Employee Benefits</h4>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer" >
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
      
		</div>
	</div>
	
<script>
	$(function() {
		$('#cancel_button').hide();
		$('#save_button').hide();
		$(".selector").prop("disabled", true);
		$('#edit_compe').on('hidden.bs.modal', function () {
			$("#compensation_list").empty();
			$("#compensation").modal().show();
		})
	});

	$('#edit_compe').on('shown.bs.modal', function () {
		var id = "<?php echo $emp->employee_id?>";
		<?php if($emp->compensation == "Piece Rate"){?>
			$.ajax({
				url : "<?php echo base_url('employee/piece_rate')?>",
				type: "GET",
				data: 'employee_id='+id,
				dataType: "JSON",
				success: function(result){
					$("#compensation_list").empty();
					$.each(result, function() {
						$.each(this, function(k, v) {
							$("#compensation_list")
								.append('<tr id="row'+v.piece_rate_id+'">')
								.append('<td><input type="text" hidden id="piece_rate_id" name="piece_rate_id[]" value="'+v.piece_rate_id+'" /><input type="text" class="form-control datepicker" id="c_start_date" name="c_start_date[]" value="'+v.c_start_date+'" /></td>')
								.append('<td><input type="text" class="form-control datepicker" id="c_end_date" name="c_end_date[]" value="'+v.c_end_date+'" /></td>')
								.append('<td><input type="text" class="form-control" id="PR_Product_id" name="PR_Product_id[]" value="'+v.PR_Product_id+'" /></td>')
								.append('<td><input type="text" class="form-control" id="PR_Compensation" name="PR_Compensation[]" value="'+number_format(v.PR_Compensation,2)+'" /></td>')
								.append('<td><input type="text" class="form-control" id="PR_Quota" name="PR_Quota[]" value="'+number_format(v.PR_Quota,2)+'" /></td>')
								.append("</tr>");
						});
					});
					
					$('.datepicker').datepicker({
						format: 'mm/dd/yyyy',
						todayHighlight: true,
						autoclose: true,
					});
					
					$('.form-control').keypress(function(event) {
						if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
							event.preventDefault();
						}
					});
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
		<?php }else{?>
			$.ajax({
				url : "<?php echo base_url('employee/compensation_emp')?>",
				type: "GET",
				data: 'employee_id='+id,
				dataType: "JSON",
				success: function(result){
					$("#compensation_list").empty();
					$.each(result, function() {
						$.each(this, function(k, v) {
							$("#compensation_list")
								.append('<tr id="row'+v.compensation_id+'">')
								.append('<td><input type="text" hidden id="compensation_id" name="compensation_id[]" value="'+v.compensation_id+'" /><input type="text" class="form-control datepicker" id="c_start_date" name="c_start_date[]" value="'+v.c_start_date+'" /></td>')
								.append('<td><input type="text" class="form-control datepicker" id="c_end_date" name="c_end_date[]" value="'+v.c_end_date+'" /></td>')
								.append('<td><input type="text" class="form-control" id="c_rate_per_month" name="c_rate_per_month[]" value="'+number_format(v.c_rate_per_month,2)+'" /></td>')
								.append('<td><input type="text" class="form-control" id="c_sss" name="c_sss[]" value="'+number_format(v.c_sss,2)+'" /></td>')
								.append('<td><input type="text" class="form-control" id="c_sssloan" name="c_sssloan[]" value="'+number_format(v.c_sssloan,2)+'" /></td>')
								.append('<td><input type="text" class="form-control" id="c_philhealth" name="c_philhealth[]" value="'+number_format(v.c_philhealth,2)+'" /></td>')
								.append('<td><input type="text" class="form-control" id="c_pag_ibig" name="c_pag_ibig[]" value="'+number_format(v.c_pag_ibig,2)+'"/></td>')
								.append('<td><input type="text" class="form-control" id="c_ec" name="c_ec[]" value="'+number_format(v.c_ec,2)+'" /></td>')
								.append('<td><input type="text" class="form-control" id="c_insurance" name="c_insurance[]" value="'+number_format(v.c_insurance,2)+'" /></td>')	
								.append("</tr>");
						});
					});
					
					$('.datepicker').datepicker({
						format: 'mm/dd/yyyy',
						todayHighlight: true,
						autoclose: true,
					});
					
					$('.form-control').keypress(function(event) {
						if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
							event.preventDefault();
						}
					});
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
		<?php }?>
	})
	$('#compensation').on('shown.bs.modal', function() {
	})
	
	function edit_mode(){
		$('#save_button').show();
		$('#cancel_button').show();
		$('#edit_button').hide();
		$(".selector").prop("disabled", false);
		$('#birthdate').datepicker({
			format: 'mm/dd/yyyy',
			todayHighlight: true,
			autoclose: true,
		});
		
		$('.datepicker').datepicker({
			format: 'mm/dd/yyyy',
			todayHighlight: true,
			autoclose: true,
		});
		
		$("form#update_form :input:not(#employee_id)").each(function(){
			$(this).attr("readonly", false); 
		});
	}
	
	function cancel_mode(){
		$('#edit_button').show();
		$('#save_button').hide();
		$('#cancel_button').hide();
		$("form#update_form :input").each(function(){
			$(this).attr("readonly", true); 
		});
		$(".selector").prop("disabled", true);
	}
	
	function open_benefits(id){
		// console.log(id);
		$('#emp_bene').modal('show');
	}
	function add_compensation(){
		<?php if($emp->compensation == "Piece Rate"){?>
		$("#compensation_list")
			.prepend("<tr>")
			.prepend('<td><input type="text" class="money form-control" id="PR_Quota" name="PR_Quota[]"></td>')
			.prepend('<td><input type="text" class="money form-control" id="PR_Compensation" name="PR_Compensation[]"></td>')
			.prepend('<td><input type="text" class="form-control" id="PR_Product_id" name="PR_Product_id[]"></td>')
			.prepend('<td><input type="text" class="money form-control datepicker" id="c_end_date" name="c_end_date[]"></td>')
			.prepend('<td><input type="text" hidden id="piece_rate_id" name="piece_rate_id[]" /><input type="text" class="money form-control datepicker" id="c_start_date" name="c_start_date[]"/></td>')	
			.prepend("</tr>");
		<?php }else{?>
		$("#compensation_list")
			.prepend("<tr>")
			.prepend('<td><input type="text" class="money form-control" id="c_insurance" name="c_insurance[]"></td>')	
			.prepend('<td><input type="text" class="money form-control" id="c_ec" name="c_ec[]"></td>')
			.prepend('<td><input type="text" class="money form-control" id="c_pag_ibig" name="c_pag_ibig[]"></td>')
			.prepend('<td><input type="text" class="money form-control" id="c_philhealth" name="c_philhealth[]"></td>')
			.prepend('<td><input type="text" class="money form-control" id="c_sssloan" name="c_sssloan[]"></td>')
			.prepend('<td><input type="text" class="money form-control" id="c_sss" name="c_sss[]"></td>')
			.prepend('<td><input type="text" class="money form-control" id="c_rate_per_month" name="c_rate_per_month[]"></td>')
			.prepend('<td><input type="text" class="money form-control datepicker" id="c_end_date" name="c_end_date[]"></td>')
			.prepend('<td><input type="text" hidden id="compensation_id" name="compensation_id[]" /><input type="text" class="money form-control datepicker" id="c_start_date" name="c_start_date[]"/></td>')	
			.prepend("</tr>");
		<?php }?>
		
		$('.money').keypress(function(event) {
			if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
				event.preventDefault();
			}
		});
		
		$('.datepicker').datepicker({
			format: 'mm/dd/yyyy',
			todayHighlight: true,
			autoclose: true,
			startDate: '+0d'
		});
	}
	
	function open_compensation(id){
		<?php if($emp->compensation == "Piece Rate"){?>
		$.ajax({
			url : "<?php echo base_url('employee/emp_details2')?>",
			type: "GET",
			data: 'employee_id='+id,
			dataType: "JSON",
			success: function(result){
				$("#compe").empty();
				$.each(result, function() {
					$.each(this, function(k, v) {
						$("#compe")
							.append('<tr id="row'+v.piece_rate_id+'">')
							.append('<td>'+v.c_start_date+'</td>')
							.append('<td>'+v.c_end_date+'</td>')
						    .append('<td>'+v.PR_Product_id+'</td>')
						    .append('<td>'+number_format(v.PR_Compensation,2)+'</td>')
						    .append('<td>'+number_format(v.PR_Quota,2)+'</td>')
							.append("</tr>");
					});
				});
				$("#comp_close").html('Close');
				$('#compensation').modal('show');
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
		<?php }else{?>
		$.ajax({
			url : "<?php echo base_url('employee/emp_details')?>",
			type: "GET",
			data: 'employee_id='+id,
			dataType: "JSON",
			success: function(result){
				$("#compe").empty();
				$.each(result, function() {
					$.each(this, function(k, v) {
						$("#compe")
							.append('<tr id="row'+v.compensation_id+'">')
							.append('<td>'+v.c_start_date+'</td>')
							.append('<td>'+v.c_end_date+'</td>')
						    .append('<td>'+number_format(v.c_rate_per_month,2)+'</td>')
						    .append('<td>'+number_format(v.c_sss,2)+'</td>')
						    .append('<td>'+number_format(v.c_sssloan,2)+'</td>')
						    .append('<td>'+number_format(v.c_philhealth,2)+'</td>')
						    .append('<td>'+number_format(v.c_pag_ibig,2)+'</td>')
						    .append('<td>'+number_format(v.c_ec,2)+'</td>')
						    .append('<td>'+number_format(v.c_insurance,2)+'</td>')	
							.append("</tr>");
					});
				});
				$("#comp_close").html('Close');
				$('#compensation').modal('show');
			},
			error: function (jqXHR, textStatus, errorThrown){
				alert('Error get data from ajax');
			}
		});
		<?php }?>
	}
</script>