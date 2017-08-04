
<section id="addsales">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<a href="javascript:popItUp('<?= base_url('purchaseorder/printReceipt/'.$id); ?>', 800, 1000)" class="btn btn-success">Print <i class="fa fa-print"></i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Supplier PO:</label>
					<input type="text" class="form-control" id="so" name="cpoNum" readonly value="<?= $order->cpoNum ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">PO Number:</label>
					<input type="text" class="form-control" name="poNum" readonly value="<?= $order->poNum ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Date Order:</label>
					<input type="text" class="form-control datepicker" name="date_ordered" readonly value="<?= $order->date_ordered ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Date Deliver:</label>
					<input type="text" class="form-control datepicker" name="date_deliver" readonly value="<?= $order->date_deliver ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Remarks:</label>
					<textarea class="form-control" name="remarks" readonly><?= $order->remarks ?></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Gross Total:</label>
					<input type="text" class="form-control" name="grosstotal" readonly value="<?= $order->grosstotal ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Less 1:</label>
					<input type="text" class="form-control" name="dis1less" readonly value="<?= $order->dis1less ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Less 2:</label>
					<input type="text" class="form-control" name="dis2less" readonly value="<?= $order->dis2less ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Less 3:</label>
					<input type="text" class="form-control" name="dis3less" readonly value="<?= $order->dis3less ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Net Sales:</label>
					<input type="text" class="form-control" name="netSales" readonly value="<?= $order->netSales ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Less 12% VAT:</label>
					<input type="text" class="form-control" name="lessVAT12" readonly value="<?= $order->lessVAT12 ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">NET Amount:</label>
					<input type="text" class="form-control" name="amountNetVAT" readonly value="<?= $order->amountNetVAT ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">PWD/SC Discount:</label>
					<input type="text" class="form-control" name="pwdDis" readonly value="<?= $order->pwdDis ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Total Amount Due:</label>
					<input type="text" class="form-control" name="totalAmountDue" readonly value="<?= $order->totalAmountDue ?>">
				</div>
			</div>

		</div>	
	</div>
	<div class="row">
		<div class="col-md-12">

			<h5>Order Items</h5> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Products</td>
						<td>Unit</td>
						<td>Quantity</td>
						<td>Price</td>
						<td>Less1 %</td>
						<td>Less2 %</td>
						<td>Less3 %</td>
						<td>Amount</td>
					</tr>
				</thead>
				
					<tbody id='holdTR'>
						<?php
							foreach($items as $item){
						?>
							<tr>
								<td><?= $item->product_code ?></td>
								<td><?= $item->unit ?></td>
								<td><?= $item->qty ?></td>
								<td><?= $item->price ?></td>
								<td><?= $item->less1 ?></td>
								<td><?= $item->less2 ?></td>
								<td><?= $item->less3 ?></td>
								<td><?= $item->amount ?></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Prepared By:</label>
					<input type="text" class="form-control" name="dis1less" readonly value="<?= getFullNameUserByID($order->preparedby) ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Last Edit By:</label>
					i<input type="text" class="form-control" name="dis1less" readonly value="<?= getFullNameUserByID($order->lasteditby) ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Date Submitted:</label>
					<input type="text" class="form-control" name="dis1less" readonly value="<?= $order->date_submitted ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Last Edited:</label>
					<input type="text" class="form-control" name="dis1less" readonly value="<?= $order->date_modified ?>">
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
function popItUp(url, height, width) {
	newwindow=window.open(url, 'name=Print Preview' ,'height= ' + height + ',width=' + width);
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>