
  <div class="row">
    <div class="col-md-12">
      
  
      <?php
        $att = array('class'=>'form-horizontal','autocomplete'=>'off');
        echo form_open_multipart('Products/save_additional',$att);
      ?>

       

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Code:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">BarCode:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Type:</label>
          <div class="col-sm-10">
            <select name="" class="form-control">
              <option value="N">Normal</option>
              <option value="S">Special</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Brand Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="" required="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Product Catergory:</label>
          <div class="col-sm-10">
            <select required="" class="form-control" name="" id="">
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
            <input type="text" class="form-control" name="" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Pcs:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="" >
          </div>
        </div>



        <table class="table">
          <caption>Ingridients <button type="button" id="addIngredient">Add Ingredients</button></caption>
          <thead>
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
        <button class="btn btn-primary" type="button">Cancel</button>



      </form>
    </div>
  </div>


    
<script type="text/javascript">

    $(function(){


      var ctr = 0;
      $( "#addIngredient" ).click(function() {

          var count = $("#table_holder tr").length;

          var rt = count + 1;
     
          var row = '<tr><td><select required="" class="form-control" name="" id="raw_type'+rt+'" onChange="getMatUsed(this, '+rt+')"><option value="">-Select-</option> <?php foreach ($raw_type as $key) { echo "<option value=".$key->rmt_id.">".$key->title."</option>"; } ?> </select></td><td><input type="number" class="form-control" name="" ></td><td><select required="" class="form-control" name="" id=""><option value="">-Select-</option><?php foreach ($prod_unit as $key) { echo "<option value=".$key->unit_id.">".$key->unit."</option>"; } ?> </select> </td> <td> <select required="" class="form-control" name="" id="prod_mat'+rt+'"> </select></td></tr>';
          
          $('#table_holder').append(row);
      }); //addIngredient


          
        
     


      }); // end function

      function getMatUsed(raw_type, row){
        var id = raw_type.value;

        $.ajax({
          url: '<?= base_url("Products/get_materials") ?>/'+id,
          success: function(data){
            console.log(data);
            $('#prod_mat'+row+' option').remove();
            $('#prod_mat'+row).html(data);
          }

        });

      }

  </script>
