<div class="col-md-12">
    <form class="well form-horizontal" action="<?= base_url('receivables/form') ?>" method="GET">
    <fieldset>
    
      
    <div class="form-group">
      <label class="col-md-4 control-label">DR/SI:</label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <input  name="code" placeholder="DR or SI Code" class="form-control"  type="text" value="" required>
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
        <br>
        <?php
          if($error != null){
        ?>
        <div class="form-group">
          <div class="col-md-12">
              <div class="alert alert-dismissible alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <p><?= $error ?></p>
              </div>
          </div>
        </div>
        <?php
          }
        ?>

      </div>

    </div>
    </fieldset>
</form>
</div>

<?php
  if($this->input->get('code') != "" ){
?>
  <div class="col-md-12">
      <form class="well form-horizontal" action="<?= base_url('receivables/form') ?>" method="GET">
        <fieldset>
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Customer:</label>
                <input type="text" class="form-control" name="" value="">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Date:</label>
                <input type="date" class="form-control" name="" value="">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Ref No:</label>
                <input type="text" class="form-control" name="" value="" placeholder="Reference No">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Bank:</label>
                <input type="text" class="form-control" name="" value="" placeholder="Bank">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Branch Code:</label>
                <input type="text" class="form-control" name="" value="" placeholder="Branch Code">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">CR No:</label>
                <input type="text" class="form-control" name="" value="" placeholder="CR No">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-4">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Paid In:</label>
                <select class="form-control">
                  <option value="Cash">Cash</option>
                  <option value="Check">Check</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Check Date:</label>
                <input type="date" class="form-control" name="" value="">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="col-md-10">
              <div class="form-group">
                <label for="">Check No:</label>
                <input type="text" class="form-control" name="" value="" placeholder="Check No">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-6">
            <table class="table table-bordered">
              <tr>
                <td>Gross Amount Due:</td>
                <td>123</td>
              </tr>
              <tr>
                <td>Less: Trade Discounts:</td>
                <td>123</td>
              </tr>
              <tr>
                <td>Delivery Charges:</td>
                <td>123</td>
              </tr>
              <tr>
                <td>Account Receivable Due</td>
                <td>123</td>
              </tr>
              <tr>
                <td>Credited Returns</td>
                <td><input type="text" class="form-control" value="123" readonly></td>
              </tr>
              <tr>
                <td>EWT/WHT</td>
                <td><input type="text" class="form-control"></td>
              </tr>

            </table>
          </div>
        </div>
        </fieldset>
      </form>
  </div>
<?php
  }
?> 


<script type="text/javascript">
  $(function(){
  
  });

</script>