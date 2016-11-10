<div class="row">
	<div class="col-md-12">
		<form class="form-inline">
			<div class="form-group">
				<label for="email">Customers:</label>
				<select class="form-control" id="customer">
					<?php
						foreach($customers as $customer){
					?>
						<option value="<?= $customer->contact_id ?>"><?= $customer->comp_code ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<button type="button" id="submitCustomer" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div id="loadContainer">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
			          <label class="control-label col-sm-4" for="">Company Code:</label>
			          <div class="col-sm-8">
			            <input type="text" class="form-control" name="" required="" readonly>
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Category:</label>
			          <div class="col-sm-8">
			            <select class="form-control">
			            	<option value="special">Special</option>
			            	<option value="">0-5000</option>
			            	<option value="">5000-50000</option>
			            	<option value="">50000-100000</option>
			            	<option value="">100000-above</option>
			            </select>
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Category:</label>
			          <div class="col-sm-8">
			            <select class="form-control">
			            	<option value="special">Consignment</option>
			            	<option value="">COD</option>
			            	<option value="">Cash Advance</option>
			            	<option value="">Credit</option>
			            </select>
			          </div>
			        </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
			          <label class="control-label col-sm-4" for="">Company Name:</label>
			          <div class="col-sm-8">
			            <input type="text" class="form-control" name="" required="" readonly>
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Limit:</label>
			          <div class="col-sm-8">
			            <!-- container for limit -->
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Category:</label>
			          <div class="col-sm-8">
			           <!-- container for category -->
			          </div>
			        </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered table-striped dataTable" id="priceList">
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
								</tr>
							</thead>
							<tbody>

							</tbody>	
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
  $("#priceList").DataTable();
});
</script>