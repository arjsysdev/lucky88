    
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
                    <a href="<?php echo base_url('Products/additional?p='.$key->prod_id); ?>" >Edit</a>
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
