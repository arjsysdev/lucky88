<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
<div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" id="priceList">
          <thead>
            <th>Name</th>
            <th>Code</th>
            <th>Type</th>
            <th>Qty</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php
              foreach($ings as $ing){

                $rawInfo = $this->Products_model->getRawInfo($ing->ing_name);
            ?>
              <tr>
                <td><?= $rawInfo->rm_name ?></td>
                <td><?= $rawInfo->rm_code ?></td>
                <td><?= $rawInfo->title ?></td>
                <td><?= $ing->ing_qty ?></td>
                <td><a href="" class="btn btn-"><i class="fa fa-eye"></i></a></td>
              </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>