<section id="purchase">
	<div class="row">
		<div class="col-md-12">	
			<a href="<?= base_url('purchaseorder/formadd') ?>" class="btn btn-default" style="margin-bottom: 20px;">Add</a><br />
			<div class="table-responsive">
				<table class="table" id="sales">
					<thead>
						<tr>
							<td>SO Number</td>
							<td>PO Number</td>
							<td>Customer ID</td>
							<td>Date Order</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($orders as $order){
						?>
							<tr>
								<td><?= $order->cpoNum ?></td>
								<td><?= $order->poNum ?></td>
								<td><?= $order->comp_code ?></td>
								<td><?= date('F d,Y', strtotime($order->date_ordered)) ?></td>
								<td><a href="<?= base_url('purchaseorder/view/'.$order->id) ?>" class="btn btn-primary">View</a></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
	
</section>
<script type="text/javascript">
	$(function(){
		$('#sales').DataTable({
       		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
   		});
	});

</script>