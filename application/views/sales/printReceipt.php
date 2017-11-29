<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lucky 88 Receipt</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/shortcodes.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<style type="text/css" media="print">
	  @page { size: landscape; }
	</style>
	<style type="text/css">
		p.desc{
			font-size: 14px;
		}
		table{
			font-size: 14px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="panel-box">
				<h4 class="tmargin15"><strong>Sales Order</strong></h4>			
				<section id="addsales">
				
					<div class="row">
						<table class="table">
							<tr>
								<td width="60%">
									<p class="desc">Customer: <?= $customer->comp_name ?><br>
									Contact No: <?= $customer->mob_no ?><br>
									Contact Person: <?= $customer->cont_pers ?><br>
									Fax Number: <?= $customer->fax_num ?></p>
								</td>
								<td>
									<p class="desc">PO Number: <?= $order->cpoNum ?><br>
									Date Order: <?= date("d-M-y", strtotime($order->date_ordered)) ?></p>
								</td>
								
							</tr>
						</table>
					</div>
					<div class="row">
						<div class="col-md-12">

							<table class="table table-striped table-bordered size12">
								<thead class="bg_green">

									<tr>
										<td>Quantity</td>
										<td>Unit</td>
										<td>Products</td>
										<td>Unit Price</td>
										<td>Amount</td>
										<td colspan="3">Discount</td>
									</tr>
								</thead>
								<tbody>
				
									<?php	
										$grosstotal = 0;
										$less1 = 0;
										$less2 = 0;
										$less3 = 0;
										//debug($items, 1);
										foreach($items as $item){

											$productInfo = $this->products->getProductByCodeRow($item->product_code);
									?>
									<tr>
										<td><?= $item->qty ?></td>
										<td><?= $item->unit ?></td>
										<td><?= $productInfo->prod_name?></td>
										<td><?= peso_format($item->price) ?>
										</td>
										<td>
										<?php
											$subtotal = $item->price * $item->qty;
											echo peso_format($subtotal);
											$grosstotal +=  $subtotal;
			
											$less1 = $item->less1; 
											$less2 = $item->less2; 
											$less3 = $item->less3; 
											
										?>

										<td><?= ($item->less1 != null) ? $item->less1 : 0 ?>%
										<td><?= ($item->less2 != null) ? $item->less2 : 0 ?>%
										<td><?= ($item->less3 != null) ? $item->less3 : 0 ?>%
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
										<td colspan="4"><?= peso_format($grosstotal) ?></td>
									</tr>
				
									<tr>
										<td colspan="4" style="text-align: right;">Discounts(<?= $less1 ?>%, <?= $less2 ?>%, <?= $less3 ?>%)</td>
										<td colspan="4"><?= peso_format($disless1) ?> | <?= peso_format($disless2) ?> | <?= peso_format($disless3) ?></td>
									</tr>
									<tr>
										<td colspan="4" style="text-align: right;">Net Sales (VAT Inclusive)</td>
										<td colspan="4"><?= peso_format($netSales) ?></td>
									</tr>
									<tr>
										<td colspan="4" style="text-align: right;">Less: VAT 12%</td>
										<td colspan="4"><?= peso_format($lessVAT12) ?></td>
									</tr>
									<tr>
										<td colspan="4" style="text-align: right;">Amount Net of VAT</td>
										<td colspan="4"><?= peso_format($amountNetVAT) ?></td>
									</tr>
									<tr>
										<td colspan="4" style="text-align: right;">Less: SC/PWD-Discount</td>
										<td colspan="4"><?= peso_format($pwdDis) ?></td>
									</tr>
									<tr>
										<td colspan="4" style="text-align: right;">Total Amount Due</td>
										<td colspan="4"><b><?= peso_format($totalAmountDue) ?></b></td>
									</tr>
									<tr>
										<td colspan="8" style="text-align: center;">***nothing follows***</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

<form name="form1" method="post" action="">
  <label>
  <input type="submit" name="Submit" value="Print" onClick=" this.parentNode.parentNode.style.display = 'None'; window.print();">
  </label>
  <label>
  <input type="button" name="Submit2" value="close" onClick="window.close();">
  </label>
</form>
</body>				
</body>
</html>
