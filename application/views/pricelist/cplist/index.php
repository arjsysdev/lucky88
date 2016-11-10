<div class="row">
	<div class="col-md-12">
		<form class="form-inline" method="GET" action="<?= base_url('pricelist/cplist') ?>">
			<div class="form-group">
				<label for="email">Customers:</label>
				<select class="form-control" name="customer">
					<option value="">-Select-</option>
					<?php
						$selected = '';
						foreach($customers as $customer){
							if(!empty($_GET['customer'])){
								if($_GET['customer'] == $customer->contact_id){
									$selected = 'selected';
								}
							}
					?>
						<option <?= $selected ?> value="<?= $customer->contact_id ?>"> <?= $customer->comp_code ?></option>
					<?php
							$selected = '';
						}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
<br>

<div class="row">
	<div class="col-md-12">
		<?php
		if(!empty($_GET['customer'])){
		?>
		<div id="loadContainer">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
			          <label class="control-label col-sm-4" for="">Company Code:</label>
			          <div class="col-sm-8">
			            <input type="text" class="form-control" name="" required="" readonly value="<?= $contact->comp_code ?>">
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Category:</label>
			          <div class="col-sm-8">
			            <select class="form-control" id="category">
			            	<option value="special">Special</option>
			            	<option value="0-5000">0-5000</option>
			            	<option value="5000-50000">5000-50000</option>
			            	<option value="50000-100000">50000-100000</option>
			            	<option value="100000-above">100000-above</option>
			            </select>
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Terms:</label>
			          <div class="col-sm-8">
			            <select class="form-control" id="terms">
			            	<option value="Consignment">Consignment</option>
			            	<option value="COD">COD</option>
			            	<option value="Cash Advance">Cash Advance</option>
			            	<option value="Credit">Credit</option>
			            </select>
			          </div>
			        </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
			          <label class="control-label col-sm-4" for="">Company Name:</label>
			          <div class="col-sm-8">
			            <input type="text" class="form-control" name="" required="" readonly value="<?= $contact->comp_name ?>">
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Limit:</label>
			          <div class="col-sm-8">
			            <input type="text" class="form-control" readonly value="No Limit" id="limit"> 
			          </div>
			        </div>
			        <br>
			        <div class="form-group" id="Days">
			          <label class="control-label col-sm-4" for="">Days:</label>
			          <div class="col-sm-2">
			           <input type="text" class="form-control">
			          </div>
			        </div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<button class="btn btn-default" onClick="addPrice()">Add Price</button>
						<table class="table table-bordered table-striped" id="List">
							<thead>
								<tr>
									<td>Start Date</td>
									<td>End Date</td>
									<td>Product</td>
									<td>Unit Price</td>
									<td>Unit</td>
									<td>Less</td>
									<td>Less</td>
									<td>Less</td>
									<td>Discount Per Bundle</td>
									<td>Remarks</td>
									<td></td>
								</tr>
							</thead>
							<tbody>

							</tbody>	
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h4>Freights</h4>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<td>Start Date</td>
									<td>End Date</td>
									<td>Freight Charges</td>
									<td>Remarks</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input class="form-control" type="date">
									</td>
									<td>
										<input class="form-control" type="date">
									</td>
									<td>
										<input class="form-control" type="text">
									</td>
									<td>
										<textarea class="form-control"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php
			}else{
		?>	
			<div class="col-md-12">
				<div class="alert alert-info">Please select contact.</div>
			</div>
		<?php
			}
		?>
	</div>
</div>
<div id="price" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Price List</h4>
		</div>
		<div class="modal-body">
			<form>
				<div class="form-group">
					<label for="">Start Date:</label>
					<input type="date" class="form-control" id="">
					<label for="">End Date:</label>
					<input type="date" class="form-control" id="">
				</div>
				<div class="form-group">
					
				</div>
				<div class="form-group">
					<label for="">Product:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Unit Price:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Unit:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Less 1:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Less 2:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Less 3:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Discount:</label>
					<input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Remarks:</label>
					<textarea class="form-control"></textarea>
				</div>

			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default">Submit</button>
		</div>
	</div>

  </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#Days').hide();
		$('#terms').change(function(){
			if($(this).val() == 'Credit'){
				$('#Days').show();	
			}
			else{
				$('#Days').hide();
			}
		});
		$('#category').change(function(){
			var thisValue = $(this).val();
			var limitValue = 'No Limit';
			switch(thisValue){
				case '0-5000':
					limitValue = '2000';
					break;
				case '5000-50000':
					limitValue = '25000';
					break;
				case '50000-100000':
					limitValue = '70000';
					break;
				case '100000-above':
					limitValue = '150000';
					break;
				default:
					limitValue = 'No Limit';
			}
			$('#limit').val(limitValue);
		});
	});
	function removePrice(line){

	}

	function addPrice(){
		$('#price').modal('show');
	}

</script>

