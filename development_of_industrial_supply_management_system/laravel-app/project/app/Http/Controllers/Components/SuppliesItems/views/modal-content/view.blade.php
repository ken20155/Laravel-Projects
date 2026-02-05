<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "primary_id" value = "<?= $data ? $data->supplier_id : '' ?>">

<div class="row">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Supplier</label>
    <select class="form-control" id="exampleFormControlSelect1" name = "supplier_id" required>
      <option value="" disabled selected>-Select-</option>
      <?php 
      if ($suppliers) {
        foreach ($suppliers as $key => $R) {
          if ($data && $data->supplier_id == $R->supplier_id) {
            echo '<option value="'.$R->supplier_id.'" selected>'.$R->company.'</option>';
          }else{
            echo '<option value="'.$R->supplier_id.'">'.$R->company.'</option>';
          }
          
        } 
      }
      ?>
    
    </select>
  </div>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Item Description</label>
    <input type="text" class="form-control" id="validationDefault01" name = "item_desc" value = "<?= $data ? $data->item_desc : '' ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Item Unit</label>
    <input type="text" class="form-control" id="validationDefault02" name = "item_unit" value = "<?= $data ? $data->item_unit : '' ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">QTY</label>
    <input type="number" class="form-control" id="validationDefault02" name = "qty" value = "<?= $data ? $data->qty : '' ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Unit Cost</label>
    <input type="text" class="form-control" id="validationDefault02" name = "unit_cost" value = "<?= $data ? $data->unit_cost : '' ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Stocks</label>
    <input type="number" class="form-control" id="validationDefault02" name = "stock_no" value = "<?= $data ? $data->stock_no : '' ?>" required>
  </div>
</div>
