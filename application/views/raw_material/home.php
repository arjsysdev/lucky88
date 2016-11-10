<div class="lucky888user">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header no-tmargin">
          <h2>
            <strong class="fblue"><i class="fa fa-file-text-o" aria-hidden="true"> </i> </strong>List of Raw Materials          
            <a href="<?php echo base_url('RawMaterials/additional'); ?>" class="btn btn-blue pull-right hidden-xs"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> Add New Raw Materials</a>
            <a href="<?php echo base_url('RawMaterials/additional'); ?>" class="btn btn-blue visible-xs mt20"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> Add New Raw Materials</a>
          </h2>
        </div>
      </div>
    </div>

    <?php
      echo $this->session->flashdata('message');
    ?>


    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
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
    </div>
</div>