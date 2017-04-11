<div class="col-md-12">
    <form class="well form-horizontal" action="<?= base_url('receipts') ?>" method="GET">
    <fieldset>
    
      
    <div class="form-group">
      <label class="col-md-4 control-label">Purchase Order Number: <?= $this->session->flashdata('message') ?></label>  
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <input  name="po" placeholder="Sales Order Number" class="form-control"  type="text" value="<?= ($this->input->get('po')) ? $this->input->get('po') : '' ?>" required>
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
  if(!empty($info)){
    ?>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Customer PO:</label>
              <input type="text" class="form-control" id="so" name="cpoNum" readonly value="<?= $info->cpoNum ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">PO Number:</label>
              <input type="text" class="form-control" name="poNum" readonly value="<?= $info->poNum ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Date Order:</label>
              <input type="text" class="form-control datepicker" name="date_ordered" readonly value="<?= $info->date_ordered ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Gross Total:</label>
              <input type="text" class="form-control" name="grosstotal" readonly value="<?= $info->grosstotal ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Net Sales:</label>
              <input type="text" class="form-control" name="netSales" readonly value="<?= $info->netSales ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Less 12% VAT:</label>
              <input type="text" class="form-control" name="lessVAT12" readonly value="<?= $info->lessVAT12 ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">NET Amount:</label>
              <input type="text" class="form-control" name="amountNetVAT" readonly value="<?= $info->amountNetVAT ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Total Amount Due:</label>
              <input type="text" class="form-control" name="totalAmountDue" readonly value="<?= $info->totalAmountDue ?>">
            </div>
          </div>

        </div>  
      </div>
    </div>
    <div class="col-md-12">
      <h4>Receipts</h4>
      <button class="btn btn-primary" data-toggle="modal" data-target="#form" <?= ($enable != true) ? 'disabled' : ''; ?> >New <?= ($enable != true) ? '<span class="badge">Order Fulfilled!</span>' : ''; ?></button>
     
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>Delivery #</td>
            <td>Sales Invoice #</td>
            <td>DR #</td>
            <td>Small #</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <?php
            if(count($receipts) > 0){
              foreach($receipts as $receipt){
          ?>
              <tr>
                  <td><?= $receipt->dlvnum ?></td>
                  <td><?= $receipt->sinum ?></td>
                  <td><?= $receipt->drnum ?></td>
                  <td><?= $receipt->smallnum ?></td>
                  <td><button class="btn btn-default" onClick="viewReceipt(<?= $receipt->id ?>)">View</button></td>
              </tr>
          <?php
              }
            }else{
          ?>
            <tr>
              <td colspan="5">No Record found</td>
            </tr>
          <?php
            }
          ?>
        </tbody>
      </table>  
    </div>
    

<?php
  }
?>


<!-- Modal -->
<div id="form" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Receipt</h4>
      </div>
        <form action="<?= base_url('receipts/addnew') ?>" method="POST">
      <div class="modal-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Delivery #:</label>
              <?php
                $total++;
                $padded = sprintf('%04d', $total);
              ?>
              <input type="text" class="form-control" id="so" name="dlvnum" required value="<?= date('y').'-'.$padded ?>" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Sales Invoice #:</label>
              <input type="text" class="form-control" name="sinum" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Delivery Receipt #:</label>
              <input type="text" class="form-control" name="drnum" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Small #:</label>
              <input type="text" class="form-control" name="smallnum" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Notes:</label>
              <textarea class="form-control" name="notes" required></textarea>
            </div>
          </div>
          <input type="hidden" name="ponum" value="<?= $this->input->get('po') ?>">
          <table class="table table-bordered">
            <thead>
                <tr>
                  <td>Product</td>
                  <td>Unit</td>
                  <td>Qty</td>
                  <td>Loaded</td>
                </tr>
            </thead>
            <tbody>
            <?php
              if(count($items) > 0){
                  foreach($items as $item){
            ?>
                <tr>
                    <td><?= $item->product_code ?></td>
                    <td><?= $item->unit ?></td>
                    <td><?= $item->qty ?></td>
                    <td><input type="text" class="form-control" style="width: 100px;" name="items[<?= $item->id ?>]"/></td>
                </tr>
            <?php
                }
              }else{
            ?>
              <tr>
                <td colspan="5">No Record found</td>
              </tr>
            <?php
              }
            ?>
          </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Save</button>
      </div>
      </form>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="formContent" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Receipt Information</h4>
      </div>
        <form action="<?= base_url('receipts/addnew') ?>" method="POST">
      <div class="modal-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Delivery #:</label>
              <input type="text" class="form-control" id="dlvnum" name="dlvnum" readonly >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Sales Invoice #:</label>
              <input type="text" class="form-control" id="sinum" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Delivery Receipt #:</label>
              <input type="text" class="form-control" id="drnum" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Small #:</label>
              <input type="text" class="form-control" id="smallnum" readonly >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Notes:</label>
              <textarea class="form-control" id="notes" readonly></textarea>
            </div>
          </div>
          <input type="hidden" name="ponum" value="<?= $this->input->get('po') ?>">
          <table class="table table-bordered">
            <thead>
                <tr>
                  <td>Product</td>
                  <td>Unit</td>
                  <td>Qty</td>
                  <td>Loaded</td>
                </tr>
            </thead>
            <tbody id="trHolder">

           </tbody>
          </table>
      </div>
      <div class="modal-footer">
      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(function(){
  
  });

  function viewReceipt(id){
    $.ajax({
      url: '<?= base_url("receipts/getitems") ?>/'+id,
      dataType: 'JSON',
      success: function(data){
        $('#dlvnum').val(data.info.dlvnum);
        $('#sinum').val(data.info.sinum);
        $('#drnum').val(data.info.drnum);
        $('#smallnum').val(data.info.smallnum);
        $('#notes').val(data.info.notes);

        $('#trHolder').html(data.html);
      }
    });
    $("#formContent").modal('show');
  }
</script>