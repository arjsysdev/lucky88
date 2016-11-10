<div class="lucky888user">
	<h2 class="page-header margin">
		<i class="fa fa-file-text-o" aria-hidden="true"> </i> <?php echo $title;?> list
		<a href="<?php echo base_url('Contact/add'); ?>" class="btn btn-primary pull-right">Add</a>
	</h2>

	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped no-bmargin">
			<thead class="thead-blue">
				<tr>
					<th>Company Name</th>
					<th>Address</th>
					<th>Payable to</th>
					<th>Contact type</th>
					<th>Agent</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($contacts as $con):?>
				<tr>
					<td><?php echo $con->comp_name?></td>
					<td><?php echo $con->address?></td>
					<td><?php echo $con->payable_to?></td>
					<td><?php echo $con->contact_type?></td>
					<td><?php echo $con->agent?></td>
					<td class="text-center">
						<a title="View Contact" href="<?php echo base_url("contact/view").'/'.$con->contact_id;?>" ><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
						<span class="color-trans"> | </span>
						<a title="Edit Contact" href="<?php echo base_url("contact/edit").'/'.$con->contact_id;?>" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>