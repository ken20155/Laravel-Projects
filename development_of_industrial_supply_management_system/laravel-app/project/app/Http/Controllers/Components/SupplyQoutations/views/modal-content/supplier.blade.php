<?php 
if ($data) {
  foreach ($data as $key => $R) {
   ?>
        <tr>
            <td class="text-dark"><?= $R->supply_id ?></td>
            <td class="text-dark"><?= $R->item_desc ?></td>
            <td class="text-dark"><?= $R->item_unit ?></td>
            <td class="text-dark"><?= $R->unit_cost ?></td>
            <td class="text-dark"><?= $R->stock_no ?></td>
            <td class="text-dark"><input type="number" class="form-control"></td>
            <td class="text-dark">100</td>
            <td class="text-dark"><button type="button" class="btn btn-sm btn-danger"><span class="fe fe-24 fe-minus-circle"></span></button></td>
          </tr>
   <?php
    
  } 
}else{

}
?>

<tr>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
    <td class="text-dark"><input type="text" class="form-control"></td>
  </tr>