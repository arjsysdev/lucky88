<section id="receivingwh">
	<div class="row">
		<div class="col-md-12">	
			<a href="<?= base_url('receivingwh/option') ?>" class="btn btn-default" style="margin-bottom: 20px;">Add</a><br />
			<div class="table-responsive">
				<?php
					if($this->session->flashdata('message') != '')
					{
				?>
					<div class="alert alert-dismissible alert-<?php echo $this->session->flashdata('msgType') ?>">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <?php echo $this->session->flashdata('message') ?>
					</div>
				<?php
					}
				?>
				<table class="table" id="sales">
					<thead>
						<tr>
							<td>Reference Number</td>
							<td>Date</td>
							<td>Remarks</td>
							<td>Fetch from</td>
							<td>Items</td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($records as $record){
						?>
							<tr>
								<td><?= $record->refno ?></td>
								<td><?= date('F d,Y', strtotime($record->date)) ?></td>
								<td><?= $record->remarks ?></td>
								<td><?= $record->fetch_from ?></td>
								<td><button class="btn btn-primary" onClick="getItems('<?= $record->refno ?>')">View Item</button></td>
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
<div id="items" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Item Loaded</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Product</td>
              <td>Qty</td>
              <td>Loaded</td>
            </tr>
          </thead>
          <tbody id="trholder">
          </tbody>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#sales').DataTable({
       		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
   		});
	});

	function getItems(refno){
		$.ajax({
			url: '<?= base_url("receivingwh/getitemloaded") ?>',
			data: 'refno='+refno,
			type: 'POST',
			success: function(data){
				 $('#trholder').html(data);
			}
		});
		$('#items').modal('show');
	}

</script>