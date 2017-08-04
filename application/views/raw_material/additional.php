<div class="lucky888user">
  <div class="row">
    <div class="col-md-12">
      <div class="mt20">
          <div class="page-header mb35 no-tmargin">
            <h1><strong class="uppercase fblue regular"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> ADD</strong> New Raw Materials</h1>
          </div>
  
      <?php
        $att = array('class'=>'form-horizontal','autocomplete'=>'off');
        echo form_open_multipart('RawMaterials/save_additional',$att);
      ?>

        <div class="form-group">
          <label for="email" class="control-label col-sm-2">Image:</label>
          <div class="col-sm-10">
            <input type="file" class="btn-default l-attach-input" name="userfile" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Raw Material Code:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control l-login-input-raw" name="rm_code" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Raw Material:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control l-login-input-raw" name="rm_name" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Raw Material Type:</label>
          <div class="col-sm-10">
            <select required="" class="form-control l-login-input-raw" name="rm_type" id="raw_type">
              <option value="">-Select-</option>
              <?php
              foreach ($raw_type as $key) {
                echo "<option value=".$key->rmt_id.">".$key->title."</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Weight:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control l-login-input-raw" name="rm_weight" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Pcs:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control l-login-input-raw" name="rm_pcs" >
          </div>
        </div>


        <div id="dimension" class="form-group hidden">
          <label class="control-label col-sm-2" for="email">Dimension:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control l-login-input-raw mb15" name="rm_dlength" placeholder="Length">
            <input type="text" class="form-control l-login-input-raw mb15" name="rm_dwidth" placeholder="Width">
            <input type="text" class="form-control l-login-input-raw" name="rm_dheight" placeholder="Height">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Prepared By:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control l-login-input-raw" disabled  value="<?php echo $u_info->first_name.' '.$u_info->last_name; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Last Edited By:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control l-login-input-raw" disabled  value="<?php echo $u_info->first_name.' '.$u_info->last_name; ?>" >
          </div>
        </div>
        
        <div class="col-md-10 col-sm-offset-2 pleft5 hidden-xs hidden-sm">
          <button class="btn chinese-green btn-lg" type="submit">
            <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
          </button>
          <button class="btn chinese-red btn-lg" type="reset">
            <i class="fa fa-times-circle" aria-hidden="true"></i> Clear
          </button>
          <a href="<?php echo base_url('RawMaterials'); ?>" class="btn btn-danger btn-lg" type="button">
            <i class="fa fa-ban" aria-hidden="true"></i> Cancel
          </a>
        </div>
        
        <div class="col-md-10 col-sm-offset-2 no-pleft visible-xs visible-sm">
          <button class="btn chinese-green" type="submit">
            <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit
          </button>
          <button class="btn chinese-red" type="reset">
            <i class="fa fa-times-circle" aria-hidden="true"></i> Clear
          </button>
          <a href="<?php echo base_url('RawMaterials'); ?>" class="btn btn-danger" type="button">
            <i class="fa fa-ban" aria-hidden="true"></i> Cancel
          </a>
        </div>

      </form>
      </div>
    </div>
  </div>
</div>

    
<script type="text/javascript">

    $(function(){



      $( "#raw_type" ).change(function() {

        var raw_type = $( "#raw_type" ).val();

        if(raw_type == 3){
          $( "#dimension" ).removeClass( "hidden" );
        }
        else{
          $( "#dimension" ).addClass( "hidden" );
        }


      }); //btnForgot


      }); // end function

  </script>
