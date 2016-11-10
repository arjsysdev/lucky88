<div class="col-sm-12">
		<form class="form-horizontal">
		<div class="col-sm-4">
			<div style="min-height: 450px; background-color: #fff;">
				<img src="<?php echo base_url('assets/employee_id').'/'.$emp->picture?>" alt="<?php echo $emp->fname?>" height="450" width="340">
			</div>
		</div>
		<div class="col-sm-8">
			<div class="form-group">
				<label class="control-label col-sm-2" for="employee_id">Employee ID:</label>
				<div class="col-sm-10">
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
							<input type="text" readonly class="form-control datepicker" id="birthdate" name="birthdate" value="<?php echo $emp->birthdate?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-2" for="agency">Agency: </label>
						<div class="col-sm-10">
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
							<input type="text" readonly class="form-control" id="designation" name="designation" value="<?php echo $emp->designation?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label col-sm-3" for="hired_date">Hired Date:</label>
						<div class="col-sm-9">
							<input type="text" readonly type="text" class="form-control" value="<?php echo $emp->hired_date?>" id="hired_date" name="hired_date">
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
							<input type="text" readonly class="form-control datepicker" id="termination" name="termination" value="<?php echo $emp->termination?>">
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
					<div class="form-group">
						<label class="control-label col-sm-2" for="company">Company: </label>
						<div class="col-sm-10">
							<input type="text" readonly class="form-control" id="company" name="company" value="<?php echo $emp->company?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>