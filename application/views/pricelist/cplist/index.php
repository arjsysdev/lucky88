
<div class="row">
	<div class="col-md-4">
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
	<div class="col-md-8">
		<button class="btn btn-success btn-lg" style="float: right;" id="savePrice">SAVE</button>
`
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
			            <input type="text" class="form-control" required="" readonly value="<?= $contact->comp_code ?>">
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Category:</label>
			          <div class="col-sm-8">
			            <select class="form-control" id="category" name="category" required>
			            <?php
			            	$categories = array('Special','0-5000','5000-50000','50000-100000','100000-above');
			            	foreach($categories as $category){
			            		$selected = '';
			            		if(!empty($pricestat)){
			            			if($pricestat->category == $category){
			            				$selected = 'selected';
			            			}
			            		}
			            		echo '<option value="'.$category.'" '.$selected.'>'.$category.'</option>';	
			            	}
			            ?>
						
			            </select>
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Terms:</label>
			          <div class="col-sm-8">
			            <select class="form-control" id="terms" name="terms" required>
							<?php
								$terms = array('Consignment','COD','Cash Advance','Credit');
								foreach($terms as $term){
			            		$selected = '';
			            		if(!empty($pricestat)){
			            			if($pricestat->terms == $term){
			            				$selected = 'selected';
			            			}
			            		}
			            		echo '<option value="'.$term.'" '.$selected.'>'.$term.'</option>';	
			            	}
							?>
			            </select>
			          </div>
			        </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
			          <label class="control-label col-sm-4" for="">Company Name:</label>
			          <div class="col-sm-8">
			            <input type="text" class="form-control" required="" readonly value="<?= $contact->comp_name ?>">
			          </div>
			        </div>
			        <br>
			        <div class="form-group">
			          <label class="control-label col-sm-4" for="">Limit:</label>
			          <div class="col-sm-8">
			          <?php
			          	$limitation = '';
			          	if(!empty($pricestat)){
			          		$limitation  = $pricestat->limitation;
			          	}
			          ?>
			            <input type="text" class="form-control" readonly value="No Limit" id="limitation" name="limitation" value="<?= $limitation ?>"> 
			          </div>
			        </div>
			        <br>
			        <div class="form-group" id="Days">
			          <label class="control-label col-sm-4" for="">Days:</label>
			          <div class="col-sm-2">
			          	<?php
			          	$days = '';
			          	if(!empty($pricestat)){
			          		$days  = $pricestat->days;
			          	}
			          ?>
			           <input type="text" class="form-control" id="days" name="days" required value="<?= $days ?>">
			          </div>
			        </div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<h4>Prices</h4>
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
								<?php
									if(!empty($dbprice)){
									foreach($dbprice as $key => $price){
								?>
									<tr>
										<td><?= $price->start_date ?></td>
										<td><?= $price->end_date ?></td>
										<td><?= $price->product_id ?></td>
										<td><?= $price->price ?></td>
										<td><?= $price->unit ?></td>
										<td><?= $price->less1 ?></td>
										<td><?= $price->less2 ?></td>
										<td><?= $price->less3 ?></td>
										<td><?= $price->disperbundle ?></td>
										<td><?= $price->remarks ?></td>
									
										<td><a href="<?= base_url('pricelist/deleteprice/'.$price->id.'/'.$_GET['customer']) ?>" onClick="return confirm('Are you Sure?')" class="btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
								<?php
										}
									}
								?>
								<?php
									if(!empty($sesprices)){
									foreach($sesprices as $key => $price){
								?>
									<tr>
										<td><?= $price['start_date'] ?></td>
										<td><?= $price['end_date'] ?></td>
										<td><?= $price['product_id'] ?></td>
										<td><?= $price['price'] ?></td>
										<td><?= $price['unit'] ?></td>
										<td><?= $price['less1'] ?></td>
										<td><?= $price['less2'] ?></td>
										<td><?= $price['less3'] ?></td>
										<td><?= $price['disperbundle'] ?></td>
										<td><?= $price['remarks'] ?></td>
									
										<td><a href="<?= base_url('pricelist/removecprice/'.$key.'/'.$_GET['customer']) ?>" onClick="return confirm('Are you Sure?')" class="btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
								<?php
										}
									}
								?>
									
							</tbody>	
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h4>Freights</h4>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#freight">Add Freight</button>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<td>Start Date</td>
									<td>End Date</td>
									<td>Freight Charges</td>
									<td>Remarks</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<?php
									if(!empty($dbfreights)){
									foreach($dbfreights as $key => $freight){
								?>
									<tr>
										<td><?= $freight->start_date ?></td>
										<td><?= $freight->end_date ?></td>
										<td><?= $freight->charge ?></td>
										<td><?= $freight->remarks ?></td>
										<td><a href="<?= base_url('pricelist/deletefreight/'.$freight->id.'/'.$_GET['customer']) ?>" onClick="return confirm('Are you Sure?')" class="btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
								<?php
										}
									}
								?>
								<?php
									if(!empty($sesfreights)){
									foreach($sesfreights as $key => $freight){
								?>
									<tr>
										<td><?= $freight['start_date'] ?></td>
										<td><?= $freight['end_date'] ?></td>
										<td><?= $freight['charge'] ?></td>
										<td><?= $freight['remarks'] ?></td>
										<td><a href="<?= base_url('pricelist/removefreight/'.$key.'/'.$_GET['customer']) ?>" onClick="return confirm('Are you Sure?')" class="btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
									</tr>
								<?php
										}
									}
								?>

								
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
			<form action="<?= base_url('pricelist/addcprice') ?>" method="POST">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Start Date:</label>
							<input type="text" class="form-control datepicker" id="start_date" name="start_date" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">End Date:</label>
							<input type="text" class="form-control datepicker" id="end_date" name="end_date">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Product:</label>
							<select class="form-control" id="selectProduct" name="product_id">
								<option value="">-SELECT</option>
								<?php
									foreach($products as $product){
								?>
									<option value="<?= $product->prod_code ?>"><?php echo $product->prod_code ?></option>
								<?php
									}
								?>
							</select>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Unit:</label>
							<input type="text" class="form-control" id="" name="unit">
						</div>	
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Unit Price:</label>
							<input type="number" class="form-control" id="" name="price">
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Less 1 (%):</label>
							<input type="number" class="form-control" id="" name="less1">
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Less 2 (%):</label>
							<input type="number" class="form-control" id="" name="less2">
						</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Less 3 (%):</label>
							<input type="number" class="form-control" id="" name="less3">
						</div>	
					</div>
				</div>

				<div class="form-group">
					<label for="">Discount:</label>
					<input type="text" class="form-control" id="" name="disperbundle">
				</div>
				<div class="form-group">
					<label for="">Remarks:</label>
					<textarea class="form-control" name="remarks"></textarea>
					<input type="hidden" name="contact_id" value="<?= $_GET['customer'] ?>">
				</div>

			
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
		</form>
	</div>

  </div>
</div>
</div>

<!-- Modal -->
<div id="freight" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Freight</h4>
      </div>
      <form action="<?= base_url('pricelist/addfreight') ?>" method="POST">
      <div class="modal-body">
	       	<div class="row">
	       		<div class="col-md-6">
					<div class="form-group">
						<label for="">Start Date:</label>
						<input type="text" class="form-control datepicker" id="start_dateFreight" name="start_date" >
					</div>
	       		</div>
	       		<div class="col-md-6">
					<div class="form-group">
						<label for="">End Date:</label>
						<input type="text" class="form-control datepicker" id="end_dateFreight" name="end_date" >
					</div>
	       		</div>
	       	</div>
	       	<div class="row">
	       		<div class="col-md-12">
	       			<div class="form-group">
						<label for="">Charge:</label>
						<input type="text" class="form-control" id="" name="charge" >
					</div>
	       		</div>
	       	</div>
	       	<div class="row">
	       		<div class="col-md-12">
	       			<div class="form-group">
						<label for="">Remarks:</label>
						<textarea class="form-control" name="remarks"></textarea>
						<input type="hidden" name="contact_id" value="<?= $_GET['customer'] ?>">
					</div>
	       		</div>
	       	</div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	
    $("#start_date").datepicker({
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#end_date').datepicker('setStartDate', minDate);
    });

    $("#end_date").datepicker()
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#start_date').datepicker('setEndDate', minDate);
        });

	$("#start_dateFreight").datepicker({
				todayBtn:  1,
				autoclose: true,
			}).on('changeDate', function (selected) {
				var minDate = new Date(selected.date.valueOf());
				$('#end_dateFreight').datepicker('setStartDate', minDate);
			});

	$("#end_dateFreight").datepicker()
		.on('changeDate', function (selected) {
			var minDate = new Date(selected.date.valueOf());
			$('#start_dateFreight').datepicker('setEndDate', minDate);
		});
				
		
		
});




	$(function(){
		$('#savePrice').click(function(){
			var category = $('#category').val();
			var limitation = $('#limitation').val();
			var terms = $('#terms').val();
			var days = $('#days').val();

			var cid = <?= $_GET['customer'] ?>;
			
			
			
			
			if(category != null && terms !=null){
				if(terms == 'Credit' && days == null){
					
					alert("Please Fill out all data");	
				}else{

					$.ajax({
						url: '<?= base_url("pricelist/savepricelist") ?>',
						data: 'category='+category+'&limitation='+limitation+'&terms='+terms+'&days='+days+'&cid='+cid,
						type: 'POST',
						beforeSend: function(){
							$.blockUI();
						},
						success: function(data){
							$.unblockUI();
							$.growlUI('Pricelist Notification!', 'Pricelist saved!');
							console.log(data);
							//window.location.reload();
						}
					});
				}
			}else{
					alert("Please Fill out all data");
			}		
						
		});


		$('#Days').hide();
		$('#selectProduct').select2();
		$('.datepicker').datepicker({
			format: 'mm/dd/yyyy',
			todayHighlight: true,
			autoclose: true,
		});
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
			$('#limitation').val(limitValue);
		});
	});
	function removePrice(line){

	}

	function addPrice(){
		$('#price').modal('show');
	}

	
	

</script>

