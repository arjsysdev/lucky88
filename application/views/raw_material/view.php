<div class="lucky888user">

  <div class="row">
    <div class="col-md-12">

      <div class="mt20">
        <div class="page-header mb35 no-tmargin">
          <h1>
            <strong class="uppercase regular">
              <i class="fa fa-list fa-lg"></i>
              &nbsp;Details of Raw Material
            </strong>
          </h1>
        </div>
        <div class="row" style="font-family: arial sans-serif;">
          <div class="col-md-2" style="background-color: red;">
            <img src="<?php echo base_url('assets/raw_materials/'.$material->rm_img);?>" width="100%" height="100%">
          </div>

          <div class="col-md-10 form-horizontal">
            <div class="row">
              <div class="col-md-6 ">
                
                <div class="form-group">
                  <label for="" class="col-md-5 control-label">Raw Material Name:</label>
                  <div class="col-md-7">
                    <?php echo $material->rm_name; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-md-5 control-label">Raw Material Type:</label>
                  <div class="col-md-7">
                    <?php echo $material->rm_type; ?>
                  </div>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label for="" class="col-md-5 control-label">Raw Material Code:</label>
                  <div class="col-md-7">
                   <?php echo $material->rm_code; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-md-5 control-label">Pcs:</label>
                  <div class="col-md-7">
                   <?php echo $material->rm_pcs; ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

