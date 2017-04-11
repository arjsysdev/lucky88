
  <div class="row">
    <div class="col-md-12">
    
    
      <?php
        $att = array('class'=>'form-horizontal','autocomplete'=>'off');
        echo form_open_multipart('Products/update_additional?p='.$products->prod_id,$att);
      ?>


        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Code:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="prod_code" required="" value="<?php echo $products->prod_code; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">BarCode:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="bar_code" required=""  value="<?php echo $products->bar_code; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Type:</label>
          <div class="col-sm-10">
            <select name="prod_type" class="form-control">
              <?php
                if($products->prod_type == "S"){
              ?>
                <option value="N">Normal</option>
                <option selected="" value="S">Special</option>
              <?php
                }
                else{
              ?>
                <option selected="" value="N">Normal</option>
                <option  value="S">Special</option>
              <?php
                }
              ?>
              
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="prod_name" required=""  value="<?php echo $products->prod_name; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Brand Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="brand_name" required=""  value="<?php echo $products->brand_name; ?>"  >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Catergory:</label>
          <div class="col-sm-10">
            <select required="" class="form-control" name="prod_cat" id="">
              <option value="">-Select-</option>
              <?php
              $selected = "";
              foreach ($prod_cat as $key) {
                
                if($products->prod_cat == $key->cat_id){
                  $selected = "selected";
                }

                echo "<option ".$selected." value=".$key->cat_id.">".$key->cat_title."</option>";
              }
              ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-2" for="">Weight:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="prod_weight"  value="<?php echo $products->prod_weight; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Pcs:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="prod_pcs"  value="<?php echo $products->prod_pcs; ?>" >
          </div>
        </div>



        <table class="table">
           <caption>Ingredients <button type="button" id="addIngredient">Add Ingredients</button> || 
		   <button type="button" id="removeIngredient">Remove Ingredients</button></caption>
          <thead>
			<th><input type="checkbox" id="check_all"></th>
			<th>Start Date</th>
            <th>End Date</th>
            <th>Name</th>
            <th>QTY</th>
            <th>Unit</th>
            <th>Material Used</th>
          </thead>
          <tbody id="table_holder">

          <?php
          $ctr = 1;
          if(!empty($prod_ing)){
			  // debug($prod_ing,1);
            foreach ($prod_ing as $ing) {
          ?>

            <tr id="row<?php echo $ctr; ?>" >
			  <td><input type="checkbox" class="check_item" name="check_row[]" value="<?php echo $ing->ing_id ?>"></td>
              <td><input hidden name="ing_id[]" class="ing_id" value="<?php echo $ing->ing_id ?>" /><input required type="text" name="ing_startDate[]" value="<?php echo (!empty($ing->ing_startDate))?date_format(new DateTime($ing->ing_startDate),"m/d/Y"):""; ?>" class="form-control datepicker"/></td>
              <td><input required type="text" name="ing_endDate[]" value="<?php echo (!empty($ing->ing_endDate))? date_format(new DateTime($ing->ing_endDate),"m/d/Y"):""; ?>" class="form-control datepicker"/></td>
			  <td>
                <select required="" class="form-control" name="ing_name[]">
                  <option value="">-Select-</option> 
                  <?php 

                    foreach ($raw_type as $key) {  ?> 
                     <option <?php echo ($ing->ing_name == $key->rmt_id)?"selected ":"";?> value="<?php echo $key->rmt_id?>"><?php echo $key->title?><option>
                  <?php } 
                  ?> 
                </select>
              </td>
              <td>
                <input type="number" class="form-control" name="ing_qty[]" value="<?php echo $ing->ing_qty; ?>" >
              </td>
              <td>
                <select required="" class="form-control" name="ing_unit[]" id="">
                  <option value="" disabled>Nothing is selected</option>
                <?php 
                  foreach ($prod_unit as $key):
				  
                ?>
					<option <?php echo ($ing->ing_unit == $key->unit_id)?"selected ":""; ?> value="<?php echo $key->unit_id ?>"><?php echo $key->unit ?></option>
				<?php
					endforeach;
                     // if($ing->ing_unit == $key->unit_id){
                        // $sel2 = "selected";
                      // } 
                      // echo "<option ".$sel2." value=".$key->unit_id.">".$key->unit."</option>"; 
                  // } 
                ?> 
                </select> 
              </td> 
              <td> 
                <input required="" class="form-control" name="ing_mat[]" value="<?php echo $ing->ing_material; ?>">
              </td>
            </tr>
          <?php
            }
          }

          ?>

          </tbody>
        </table>

       


        <div class="form-group">
          <label class="control-label col-sm-2" for="">Prepared By:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control " disabled  value="<?php echo $u_info->first_name.' '.$u_info->last_name; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Last Edited By:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control " disabled  value="<?php echo $u_info->first_name.' '.$u_info->last_name; ?>" >
          </div>
        </div>

        <button class="btn btn-success" type="submit">Submit</button>
        <button class="btn btn-danger" type="reset">Clear</button>
        <a href="<?php echo base_url('Products'); ?>" class="btn btn-primary" type="button">Cancel</a>



      </form>
    </div>
  </div>

<!-- Modal -->
<div id="delete_confirmation" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	<form action="<?php echo base_url("products/delete_each/$p")?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Confirmation.</h4>
      </div>
	  
      <div class="modal-body">
		<div class="to_be_deleted">
		</div>
      </div>
      
	  <div class="modal-footer">
		<button type="submit" class="btn btn-default">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
	  
    </div>

  </div>
</div>
    
<script type="text/javascript">

    $(function(){
		
		$("input:checkbox").prop("checked", false);
		$("#check_all").change(function(){
			if(this.checked){
				$(".check_item").each(function(){
					this.checked=true;
				})              
			}else{
				$(".check_item").each(function(){
					this.checked=false;
				})              
			}
		});

		$(".check_item").click(function () {
			if ($(this).is(":checked")){
			var isAllChecked = 0;
			$(".check_item").each(function(){
				if(!this.checked)
			   isAllChecked = 1;
			})              
			if(isAllChecked == 0){ $("#check_all").prop("checked", true); }     
			}else{
				$("#check_all").prop("checked", false);
			}
		});
		
		$('.datepicker').datepicker({
			format: 'mm/dd/yyyy',
			todayHighlight: true,
			autoclose: true,
			startDate: '+0d'
		});	


      $( "#addIngredient" ).click(function() {

          var cr = $("#table_holder tr").length;

          var count = cr + 1;

          var row = '<tr id="row'+count+'"><td><input type="checkbox" class="check_item" name="check_row[]"></td><td><input type="text" required name="ing_startDate[]" class="form-control datepicker" /></td><td><input type="text" required name="ing_endDate[]" class="form-control datepicker" /></td><td><select required="" class="form-control" name="ing_name[]" "><option value="">-Select-</option> <?php foreach ($raw_type as $key) { echo "<option value=".$key->rmt_id.">".$key->title."</option>"; } ?> </select></td><td><input type="number" class="form-control" name="ing_qty[]" ></td><td><select required="" class="form-control" name="ing_unit[]" id=""><option value="">-Select-</option><?php foreach ($prod_unit as $key) { echo "<option value=".$key->unit_id.">".$key->unit."</option>"; } ?> </select> </td> <td> <select required="" class="form-control" name="ing_mat[]" "><option value="">-Select-</option> <?php foreach ($raw_materials as $key) { echo "<option value=".$key->rm_name.">".$key->rm_name."</option>"; } ?> </select> </td></tr>';
          
			$('#table_holder').append(row);
		  
		  
			$('.datepicker').datepicker({
				format: 'mm/dd/yyyy',
				todayHighlight: true,
				autoclose: true,
				startDate: '+0d'
			});	
      }); //addIngredient

        $( "#removeIngredient" ).click(function() {
			var selector = $("input[name='check_row[]']:checked").length;
			if (selector <= 0){
				alert("Please check atleast one ingredient to delete");
			}else{
				if(selector > 1){
					$('.modal-body').text("Are you sure you want to delete these ingredients? This operation cannot be undone.");
					$("input[name='check_row[]']:checked").each(function(){
						console.log($(this).val());
						$('.modal-body').append("<input type='text' name='delete[]' value="+$(this).val()+">");
					});
				}else{
					$('.modal-body').html("<p>Are you sure you want to delete this ingredient? This operation cannot be undone.</p>");
					$("input[name='check_row[]']:checked").each(function(){
						console.log($(this).val());
						$('.modal-body').append("<input type='hidden' name='delete[]' value="+$(this).val()+">");
					});
				}
				$('#delete_confirmation').modal('show');
			}
			
          // var count = $("#table_holder tr").length;
          // $( "#row"+count ).remove();
		  
		}); //addIngredient
      //var trc = $("#table_holder tr").length;

        // $( '#raw_type').change(function() {
        //   var raw_type = $( "#raw_type" ).val();
         
        //   $.ajax({
        //     url: '<?php echo base_url('Products/get_materials'); ?>/'+raw_type, //controller function
        //     dataType: "json",
        //     success: function(data){

        //       $('#prod_mat option').remove();
        //       var limit = data[0].length;

        //       var row = '<option value="">-Select-</option>';
              
        //       if(limit != 0 ){
        //         var ctr = 0;
                
        //         while(ctr <= (limit-1)){
        //           row = row+'<option>'+data[2][ctr]+'</option>';

        //           ctr++;
        //         }
        //       }
        //       $('#prod_mat'+ctr).html(row);
        //     }
        //   });
        // }); //change
     



      }); // end function

    function material_used(raw_type){
      
    }

  </script>
