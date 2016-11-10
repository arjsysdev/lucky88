<section id="salesorder">
	<div class="row">
		<div class="col-md-12">	
			<a href="<?= base_url('salesorder/formadd') ?>" class="btn btn-default" style="margin-bottom: 20px;">Add</a><br />
			<div class="table-responsive">
				<table class="table" id="sales">
					<thead>
						<tr>
							<td>SO Number</td>
							<td>PO Number</td>
							<td>Customer ID</td>
							<td>Date Order</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

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