<table class="table table-bordered table-striped table-hover table-condensed text-center data-table">
	<a class="btn btn-primary pull-right" href="<?php echo base_url("Employee");?>">Add Employee</a>
	<thead>
		<th>Employee ID</th>
		<th>Image</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php foreach($employees as $emp):?>
		<tr>
			<td><?php echo $emp->employee_id?></td>
			<td><img src="<?php echo base_url('assets/employee_id').'/'.$emp->picture?>" alt="<?php echo $emp->fname?>" height="250" width="250"></td>
			<td><?php echo $emp->fname?></td>
			<td><?php echo $emp->lname?></td>
			<td><a title="View Contact" href="<?php echo base_url("employee/view").'/'.$emp->employee_id;?>" ><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i></a></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>