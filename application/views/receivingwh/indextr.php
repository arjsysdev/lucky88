<form class="form-horizontal" action="<?= base_url('receivingwh/process') ?>" method="POST">

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Load TR Number</label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." id="po" name="po">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button" id="addpo">Add</button>
        </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Reference No:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly id="refno" name="refno">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Date:</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="date">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Remarks:</label>
    <div class="col-sm-5">
      <textarea class="form-control" name="remarks" placeholder="Remarks or Notes"></textarea>
    </div>
  </div>

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
<div class="col-md-12">
  <div class="row">
    <button type="submit" class="btn btn-success btn-lg" style="float: right;">Save</button>
  </div>
</div>
</form>

<script type="text/javascript">
      $(window).bind('beforeunload', function(){
      return 'Are you sure you want to leave?';
    });
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
                  if(data == ''){
                    alert('No Purchase Order found!');
                  }
                  else{

                  $('#trholder').html(data);
                  }
                }
              });
          }
      })

      function calibrate()
      {
          var code = $('#code').val();
          var supplier = $('#supplier').val();

          var refno = supplier + '-' +code;
          $('#refno').val(refno);
      }

</script>