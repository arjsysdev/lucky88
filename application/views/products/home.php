    
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo base_url('Products/additional'); ?>" class="btn btn-primary">Add</a>
      </div>
    </div>

    <?php
      echo $this->session->flashdata('message');
    ?>

    <br>
    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" id="priceList">
          <thead>
            <th>#</th>
            <th>Product Code</th>
            <th>Bar Code</th>
            <th>Name</th>
            <th>Type</th>
            <th>Categoty</th>
            <th>Pcs</th>
            <th>Action</th>
          </thead>
          <tbody>
           <?php
            if(!empty($products)){
              $num = 1;
            foreach ($products as $key) {
            ?>  
              <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $key->prod_code; ?></td>
                <td><?php echo $key->bar_code; ?></td>
                <td><?php echo $key->prod_name; ?></td>
                <td><?php echo $key->prod_type; ?></td>
                <td><?php echo $key->cat_title; ?></td>
                <td><?php echo $key->prod_pcs; ?></td>
                <td>
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url('Products/additional?p='.$key->prod_id); ?>" ><i class="fa fa-pencil"></i></a> | 
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url('Products/viewing/'.$key->prod_id); ?>" onclick="return popitup(this)" ><i class="fa fa-eye"></i> View Ingredients</a>
                </td>
              </tr>
            <?php
            }}
            else{
            ?>
              <tr>
                <td colspan="8" class="text-danger"> *** No Product Found ***</td>
              </tr>
            <?php
            }
            ?> 
          </tbody>
        </table>
      </div>
    </div>

<script type="text/javascript">
  function popitup(a){
    var w = window.open(a.href,
        a.target||"_blank",
        'menubar=no,toolbar=no,location=no,directories=no,status=no,scrollbars=no,resizable=no,dependent,width=800,height=620,left=0,top=0');
    return w?false:true; // allow the link to work if popup is blocked
  }
</script>