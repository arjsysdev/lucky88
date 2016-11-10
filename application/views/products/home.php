    
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo base_url('Products/additional'); ?>" class="btn btn-primary">Add</a>
      </div>
    </div>

    <?php
      echo $this->session->flashdata('message');
    ?>


    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Code</th>
            <th>Type</th>
            <th>Weigth (Grams)</th>
            <th>Dimension(L x W x H)</th>
            <th>Pcs</th>
            <th>Action</th>
          </thead>
          <tfoot>
            <td>#</td>
            <td>Code</td>
            <td>Type</td>
            <td>Weigth (Grams)</td>
            <td>Dimension(L x W x H)</td>
            <td>Pcs</td>
            <td>Action</td>
          </tfoot>
          <tbody>
            <?php
            if(!empty($raw_mat)){
            foreach ($raw_mat as $key) {
            ?>  
              <tr>
                <td><img src="<?php echo base_url('assets/raw_materials/'.$key->rm_img);?>" width="50px" height="50px"></td>
                <td><?php echo $key->rm_code; ?></td>
                <td><?php echo $key->title; ?></td>
                <td><?php echo $key->rm_weight; ?></td>
                <td><?php echo $key->rm_di_length.' x '.$key->rm_di_width.' x '.$key->rm_di_height; ?></td>
                <td><?php echo $key->rm_pcs; ?></td>
                <td>
                    <a href="<?php echo base_url('RawMaterials/additional?r='.$key->material_id); ?>" >Edit</a>
                </td>
              </tr>
            <?php
            }}
            else{
            ?>
              <tr>
                <td colspan="7" class="text-danger"> *** No Raw Materials Found ***</td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
