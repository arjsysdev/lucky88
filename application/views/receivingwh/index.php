<form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Supplier:</label>
    <div class="col-sm-4"> 
      <select class="form-control" id="supplier" name="supplier" onChange="calibrate()">
        <?php
          foreach($suppliers as $supplier){
        ?>
          <option value="<?= $supplier->comp_code ?>"><?= $supplier->comp_code ?></option>
        <?php
          }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">TR/DR/SI:</label>
    <div class="col-sm-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">
          <select id="type" name="type">
            <option>TR</option>
            <option>DR</option>
            <option>SI</option>
          </select>
        </span>
        <input type="text" class="form-control" id="code" onKeyup="calibrate()" />
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Reference No:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" readonly id="refno" name="refno">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Date:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control datepicker" name="date">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Load Purchase Order</label>
    <div class="col-sm-4">

      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." id="po">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button" id="addpo">Add</button>
        </span>
      </div>

    </div>
  </div>
</form>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Quantity</td>
              <td>Unit</td>
              <td>Weight</td>
              <td>Product</td>
              <td>PO #</td>
              <td>Loaded</td>
            </tr>
          </thead>
          <tbody id="trholder">
          </tbody>

        </table>
    </div>
  </div>
</div>


<script type="text/javascript">

      $('#addpo').click(function(){
          var po = $('#po').val();

          if(po == ''){
            alert('Please input PO Number!');
          }
          else{
              $.ajax({
                url: 'receivingwh/getpo',
                type: 'GET',
                data: 'po='+po,
                success: function(data){
                  $('#trholder').html(data);
                }
              });
          }
      })

      function calibrate(){
          var code = $('#code').val();
          var supplier = $('#supplier').val();

          var refno = supplier + '-' +code;
          $('#refno').val(refno);
      }

</script>