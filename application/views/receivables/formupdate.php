<div class="col-md-12">
   <div class="well">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td><a href="<?php echo base_url('receivables/form') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a></td>
        </tr>
        <tr>
          <td>Ref No</td>
          <td>Customer</td>
          <td>Date</td>
          <td>DR/SI</td>
          <td>Total Account Balance</td>
          <td>Action</td>
        </tr>
      </thead>

    </table>
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