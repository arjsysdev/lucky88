
  <div class="row">
    <div class="col-md-12">
      
  
      <?php
        $att = array('class'=>'form-horizontal','autocomplete'=>'off');
        echo form_open_multipart('Products/save_additional',$att);
      ?>

       

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Code:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="prod_code" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">BarCode:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="bar_code" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Type:</label>
          <div class="col-sm-10">
            <select name="prod_type" class="form-control">
              <option value="N">Normal</option>
              <option value="S">Special</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="prod_name" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Brand Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="brand_name" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Catergory:</label>
          <div class="col-sm-10">
            <select required="" class="form-control" name="prod_cat" id="">
              <option value="">-Select-</option>
              <?php
              foreach ($prod_cat as $key) {
                echo "<option value=".$key->cat_id.">".$key->cat_title."</option>";
              }
              ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-2" for="">Weight:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="prod_weight" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Pcs:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="prod_pcs" >
          </div>
        </div>



        <table class="table">
          <caption>Ingredients <button type="button" id="addIngredient">Add Ingredients</button> || <button type="button" id="removeIngredient">Remove Ingredients</button></caption>
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
		
		
		$( "#addIngredient" ).click(function() {

			var count = $("#table_holder tr").length;
     
			var row = '<tr id="row'+count+'"><td><input class="check_item" name="checker[]" type="checkbox"/></td><td><input type="text" required name="ing_startDate[]" class="form-control datepicker" /></td><td><input type="text" required name="ing_endDate[]" class="form-control datepicker" /></td><td><select required="" class="form-control" name="ing_name[]" "><option value="">-Select-</option> <?php foreach ($raw_type as $key) { echo "<option value=".$key->rmt_id.">".$key->title."</option>"; } ?> </select></td><td><input type="number" class="form-control" name="ing_qty[]" ></td><td><select required="" class="form-control" name="ing_unit[]" id=""><option value="">-Select-</option><?php foreach ($prod_unit as $key) { echo "<option value=".$key->unit_id.">".$key->unit."</option>"; } ?> </select> </td> <td> <select required="" class="form-control" name="ing_mat[]" "><option value="">-Select-</option> <?php foreach ($raw_materials as $key) { echo "<option value=".$key->rm_name.">".$key->rm_name."</option>"; } ?> </select> </td></tr>';
          
			$('#table_holder').append(row);
		  
		  
			$('.datepicker').datepicker({
				format: 'mm/dd/yyyy',
				todayHighlight: true,
				autoclose: true,
				startDate: '+0d'
			});	
      }); //addIngredient

      $( "#removeIngredient" ).click(function() {
			// $("input[name='check_row[]']:checked").each(function(){
				$('tr:has(input[name="checker[]"]:checked)').remove();
		$("input:checkbox").prop("checked", false);
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
