<form id="tblData" action="<?= base_url('salesorder/step1so') ?>" method="POST">
<section id="addsales">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Customer ID:</label>
					<select class="form-control" id="contacts" name="comp_code">
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
			<div class="col-md-8">
				<button class="btn btn-success btn-lg" style="float:right;" id="nextToPrice" type="submit">Next</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Customer PO:</label>
					<input type="text" class="form-control" id="so" name="cpoNum" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">PO Number:</label>
					<input type="text" class="form-control" name="poNum">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Date Order:</label>
					<input type="text" class="form-control datepicker" name="date_ordered">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Remarks:</label>
					<textarea class="form-control" name="remarks"></textarea>
				</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-12">

			<h5>Products</h5> 
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Select Products</label>
						<div class="input-group">
							<select class="form-control" id="products">
								<option value="">-Select-</option>
							</select>
							<span class="input-group-btn">
							  <button class="btn btn-default" type="button" id="btnProduct">Select</button>
							</span>
						</div>
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Quantity</td>
						<td>Unit</td>
						<td>Products</td>
						<td></td>
					</tr>
				</thead>
				
					<tbody id='holdTR'>
						<tr class="hidden cloneSource">
							<td>
								<input type="number" class="form-control qty" name="qty[]">
							</td>
							<td>
								<input type="text" class="form-control unit" name="unit[]">
							</td>
							<td>
								<p class="product"></p>
							</td>
							<td>
								<a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
							</td>
						</tr>
					</tbody>
				
			</table>
		</div>
	</div>
</form>
</section>
<script type="text/javascript">
	$(function(){
		$('#contacts').select2();
		$('#products').select2();
		$('.datepicker').datepicker();

		$('#contacts').change(function(){
			var code = this.value;
			$.ajax({
				url: '<?= base_url("ajax/getnumber") ?>/'+code,
				success: function(data){
					$('#so').val(data);
					console.log(data);
				}
			});
			$.ajax({
				url: '<?= base_url("salesorder/getitems") ?>/'+code,
				success: function(data){
					$('#products').html(data);
					console.log(data);
				}
			});
		});

		$('#nextToPrice').click(function(){
			
		});

		$('#btnProduct').click(function(){
			var product = $('#products').val();
			var $tr = $('.cloneSource').clone().removeClass();
			var rowCount = $('#holdTR tr').length;
			var params = 0;
			var total = params + rowCount;
			total++;
			$tr.addClass('row'+total);
			$tr.find('input').attr('id', product);
			$tr.find('td a.btn').attr('onClick', 'removePrd("row'+total+'")');
			$tr.find('p.product').html('<input type="text" name="product[]" class="form-control" readonly value="'+product+'" />');
			$('#holdTR').append($tr);
			console.log(rowCount);
		});
	});
	function removePrd(prClass){
		if(confirm('Remove this row?')){
			$('.'+prClass).fadeOut();
			$('.'+prClass).remove();
		}
	}
</script>