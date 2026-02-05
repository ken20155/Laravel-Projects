<?php 
if ($result) {
  foreach ($result as $key => $R) {
    ?>
      <tr>
        <th scope="row" class="text-center">2</th>
        <td>ID-2024-<?=$R->b_id?></td>
        <td></td>
        <?php
          if ($R->status_bnr == 'PENDING') {
            ?>
              <td>
                <button type="button" class="btn btn-danger openFormBnrMsme" data-action="edit" data-id="<?=$R->b_id?>" data-status="<?=$R->status_bnr?>" data-form="bnr" data-isupload="<?=$R->bnr_certificate_file != null ? 1 : 0 ?>" style="width:100%"><i class="fas fa-file-alt"></i> VIEW</button>
              </td>
            <?php
          }else{
            ?>
              <td>
                <button type="button" class="btn btn-success openFormBnrMsme" data-action="edit" data-id="<?=$R->b_id?>" data-status="<?=$R->status_bnr?>" data-form="bnrprinted" data-isupload="<?=$R->bnr_certificate_file != null ? 1 : 0 ?>" style="width:100%"><i class="fas fa-file-alt"></i> VIEW</button>
              </td>
            <?php
          }
        ?>

        <?php 
          if ($R->majority_business_activity == null) {
            $cant_proceed = $R->status_bnr == 'PENDING' ? 'openValidation' : 'openFormBnrMsme';
        ?>
            <td>
              <button type="button" class="btn btn-danger <?=$cant_proceed?>" data-action="edit" data-id="<?=$R->msme_id?>" data-status="<?=$R->status_msme?>" data-form="msme" style="width:100%"><i class="fas fa-file-alt"></i> ADD</button>
            </td>
        <?php
        }else{
          if ($R->status_msme == 'PENDING') {
            ?>
                <td>
                  <button type="button" class="btn btn-danger openFormBnrMsme" data-action="edit" data-id="<?=$R->msme_id?>" data-status="<?=$R->status_msme?>" data-form="msme" style="width:100%"><i class="fas fa-file-alt"></i> VIEW</button>
                </td>
            <?php
          }else{
            ?>
                <td>
                  <button type="button" class="btn btn-success oepnPrintedFormat" data-action="edit" data-id="<?=$R->msme_id?>" data-status="<?=$R->status_msme?>" data-form="msme" style="width:100%"><i class="fas fa-file-alt"></i> VIEW</button>
                </td>
            <?php
          }
        }
        ?>
      </tr>
    <?php
  }
}else{
  echo '
    <tr>
      <td colspan="5" class="text-center">NO BUSINESS INFORMATION FOUND</td>
    </tr>
  ';
}
?>  


  