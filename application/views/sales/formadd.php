<section id="addsales">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Customer ID:</label>
					<select class="form-control" id="contacts">
						<option value="">-Select-</option>
						<?php
							foreach($contacts as $contact){
						?>
							<option value="<?= $contact->comp_code ?>"><?= $contact->comp_code ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Customer PO:</label>
					<input type="text" class="form-control" id="so" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">PO Number:</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Date Order:</label>
					<input type="date" class="form-control">
				</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-12">
			<h5>Products</h5> 
			<table class="table">
				<thead>
					<tr>
						<td>Quantity</td>
						<td>Unit</td>
						<td>Products</td>
						<td></td>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function(){
		$('#contacts').select2();

		$('#contacts').change(function(){
			var code = this.value;
			$.ajax({
				url: '<?= base_url("ajax/getnumber") ?>/'+code,
				success: function(data){
					$('#so').val(data);
				}
			});
		});
	});
</script>