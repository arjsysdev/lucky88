<form id="tblData" action="<?= base_url('purchaseorder/save') ?>" method="POST">
<section id="addsales">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<a class="btn btn-lg btn-success">Back</a>
			</div>
			<div class="col-md-6">
				<input type="submit" class="btn btn-lg btn-success" style="float: right;" value="Save"/>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Supplier PO:</label>
					<input type="text" class="form-control" id="so" name="cpoNum" readonly value="<?= $purchaseorder['cpoNum'] ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Date Order:</label>
					<input type="text" class="form-control datepicker" name="date_ordered" readonly  value="<?= $purchaseorder['date_ordered'] ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Date Deliver:</label>
					<input type="text" class="form-control datepicker" name="date_deliver" readonly  value="<?= $purchaseorder['date_deliver'] ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Delivery At:</label>
					<input type="text" class="form-control datepicker" name="delivery_at" readonly  value="<?= $purchaseorder['delivery_at'] ?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Remarks:</label>
					<textarea class="form-control" name="remarks" readonly ><?= $purchaseorder['remarks'] ?></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">

			<h5>Items</h5>
			<a href="#" class="btn btn-default btn-xs" style="float: right;" data-toggle="modal" data-target="#pricelist">View Price List</a> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Quantity</td>
						<td>Unit</td>
						<td>Item</td>
						<td>Unit Price</td>
						<td>Amount</td>
						<td colspan="3">Discount</td>
					</tr>
				</thead>
				<tbody>

					<?php
						$items = $purchaseorder['items'];
						$contact = getContactByCode($purchaseorder['comp_code']);
						//$subtotal = 0;
						$grosstotal = 0;
						$less1 = 0;
						$less2 = 0;
						$less3 = 0;
					?>
					<input type="hidden" name="contact_id" value="<?= $contact->contact_id ?>">
					<input type="hidden" name="comp_code" value="<?= $purchaseorder['comp_code'] ?>">
					<?php	
						foreach($items as $item){
					?>
					<tr>
						<td><?= $item['qty'] ?><input type="hidden" name="qty[]" value="<?= $item['qty'] ?>"></td>
						<td><?= $item['unit'] ?><input type="hidden" name="unit[]" value="<?= $item['unit'] ?>"></td>
						<td><?= $item['product'] ?><input type="hidden" name="product[]" value="<?= $item['product'] ?>"></td>
						<td>
						<?php
							$dateordered = date('Y-m-d', strtotime($purchaseorder['date_ordered']));
							$price = getProductSupplierPrice($item['product'], $contact->contact_id, $dateordered, $item['qty']);	
							$priceDetails = getProductSupplierPriceDetails($item['product'], $contact->contact_id, $dateordered);	
							
							$unitprice =  peso_format($price);
							echo $unitprice;
						?>
							<input type="hidden" name="price[]" value="<?= $price ?>">		
						</td>
						<td>
						<?php
							$subtotal = $price * $item['qty'];
							echo peso_format($subtotal);
							$grosstotal +=  $subtotal;
							//debug($priceDetails);

							$less1 = $priceDetails->less1; 
							$less2 = $priceDetails->less2; 
							$less3 = $priceDetails->less3; 
							
						?>
						<input type="hidden" name="amount[]" value="<?= ($priceDetails->less1 != null) ? $priceDetails->less1 : 0 ?>">
						</td>
						<td><?= ($priceDetails->less1 != null) ? $priceDetails->less1 : 0 ?>%
						<input type="hidden" name="less1[]" value="<?= ($priceDetails->less1 != null) ? $priceDetails->less1 : 0 ?>">
						</td>
						<td><?= ($priceDetails->less2 != null) ? $priceDetails->less2 : 0 ?>%
						<input type="hidden" name="less2[]" value="<?= ($priceDetails->less2 != null) ? $priceDetails->less2 : 0 ?>">
						</td>
						<td><?= ($priceDetails->less3 != null) ? $priceDetails->less3 : 0 ?>%
						<input type="hidden" name="less3[]" value="<?= ($priceDetails->less3 != null) ? $priceDetails->less3 : 0 ?>"> 
						</td>
					</tr>
				<?php
					}
					$disless1 = $grosstotal * ($less1 * 0.01);
					$disless2 = $grosstotal * ((1- ($less1*0.01)) * ($less2 * 0.01));
					$disless3 = $grosstotal * (1- ($less1*0.01)) * (1- ($less2*0.01)) * ($less3 * 0.01);
					$netSales = $grosstotal - ($disless1 + $disless2 + $disless3);
					$lessVAT12 = ($netSales/(1.12)*0.12);
					
					$amountNetVAT = $netSales - $lessVAT12;
					$pwdDis = 0;
					$totalAmountDue = ($amountNetVAT + $lessVAT12) - $pwdDis;
				?>
					<tr>
						<td colspan="4" style="text-align: right;">Total Gross Value</td>
						<td><?= peso_format($grosstotal) ?><input type="hidden" name="grosstotal" value="<?= $grosstotal ?>">
						</td>
					</tr>

					<tr>
						<td colspan="4" style="text-align: right;">Discount 1(<?= $less1 ?>%)</td>
						<td><?= peso_format($disless1) ?><input type="hidden" name="dis1less" value="<?= $disless1 ?>"></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">Discount 2(<?= $less2 ?>%)</td>
						<td><?= peso_format($disless2) ?><input type="hidden" name="dis2less" value="<?= $disless2 ?>"></td>
					</tr>
					<tr> 
						<td colspan="4" style="text-align: right;">Discount 3(<?= $less3 ?>%)</td>
						<td><?= peso_format($disless3) ?><input type="hidden" name="dis3less" value="<?= $disless3 ?>"></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">Net Sales (VAT Inclusive)</td>
						<td><input type="text" class="form-control" style="width:100px;" id="netSale" name="netSales" value="<?= $netSales ?>" readonly />
						</td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">Less: VAT 12%</td>
						<td><input type="text" class="form-control" style="width:100px; float: left;" id="lessVAT" value="<?= $lessVAT12 ?>" readonly name="lessVAT12" /> <a onClick="changeVAT(this)" class="btn btn-default">Edit</a><a onClick="clearVAT(this)" class="btn btn-default">Clear</a></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">Amount Net of VAT</td>
						<td><input type="text" class="form-control" style="width:100px; float: left;" id="amountNet" name="amountNetVAT" value="<?= $amountNetVAT ?>" readonly />  </td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">Less: SC/PWD-Discount</td>
						<td><input type="text" class="form-control" style="width:100px; float: left;" id="sc" name="pwdDis"  value="<?= $pwdDis ?>" readonly /> <a onClick="changeSC(this)" class="btn btn-default">Edit</a></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">Total Amount Due</td>
						<td><input type="text" class="form-control" style="width:100px; float: left;" name="totalAmountDue" id="totalAmountDue"  value="<?= $totalAmountDue ?>" readonly /></td>
					</tr>
				</tbody>
	
			</table>
		</div>
	</div>
</form>
</section>


<div id="pricelist" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><?php echo $contact->comp_name ?> Price List</h4>
		</div>
		<div class="modal-body">
			<table class="table table-bordered" id="pricelistTbl">
				<thead>
					<tr>
						<td>Start</td>
						<td>End</td>
						<td>Product</td>
						<td>Unit Price</td>
						<td>Unit</td>
						<td>Less 1</td>
						<td>Less 2</td>
						<td>Less 3</td>
						<td>Discount</td>
						<td>Remarks</td>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($pricelist as $pl){
					?>					
						<tr>
							<td><?= date('m-d-y', strtotime($pl->start_date)) ?></td>
							<td><?= date('m-d-y', strtotime($pl->end_date)) ?></td>
							<td><?= $pl->product_id ?></td>
							<td><?= peso_format($pl->price) ?></td>
							<td><?= $pl->unit ?></td>
							<td><?= $pl->less1 ?>%</td>
							<td><?= $pl->less2 ?>%</td>
							<td><?= $pl->less3 ?>%</td>
							<td><?= peso_format($pl->disperbundle) ?></td>
							<td><?= $pl->remarks ?></td>
						</tr>
					<?php
						}
					?>
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
		$('#pricelistTbl').DataTable({
       		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
   		});
	});
	

	function changeVAT(elem){
		var btnAction = elem;
		if($(elem).html() == 'Edit'){
			$('#lessVAT').removeAttr('readonly');
			$(elem).html('Save');
		}
		else{
			var lessVAT = $('#lessVAT').val();
			var netSale = $('#netSale').val();
			var amountNet = 0;
			amountNet = netSale - lessVAT;
			$('#amountNet').val(amountNet);
			$('#lessVAT').attr('readonly', 'readonly');
			$(elem).html('Edit');
		}
	}

	function clearVAT(elem){
		if(confirm('Are you sure to clear VAT?')){
			var lessVAT = 0;
			var netSale = $('#netSale').val();
			var amountNet = 0;
			amountNet = netSale - lessVAT;
			$('#amountNet').val(amountNet);
			$('#lessVAT').val(0);
			$('#lessVAT').attr('readonly', 'readonly');
		}
	}

	function changeSC(elem){
		var btnAction = elem;
		if($(elem).html() == 'Edit'){
			$('#sc').removeAttr('readonly');
			$(elem).html('Save');
		}
		else{
			var sc = $('#sc').val();
			var totalAmountDue = $('#totalAmountDue').val();
			var amountNet = 0;
			amountNet = totalAmountDue - sc;
			$('#totalAmountDue').val(amountNet);
			$('#sc').attr('readonly', 'readonly');
			$(elem).html('Edit');
		}
	}
</script>