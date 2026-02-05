<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "primary_id" value = "<?= $data ? $data->supplier_id : '' ?>">

<div class="row">
  <div class="col-md-6">
    <label for="validationDefault01" class="form-label">Client</label>

    <select class="form-control" id="exampleFormControlSelect1" name = "supplier_id" required>
      <option value="" disabled selected>-Select-</option>
      <?php 
      if ($clients) {
        foreach ($clients as $key => $R) {
          if ($data && $data->supplier_id == $R->supplier_id) {
            echo '<option value="'.$R->client_id.'" selected>'.$R->company_name.'</option>';
          }else{
            echo '<option value="'.$R->client_id.'">'.$R->company_name.'</option>';
          }
          
        } 
      }
      ?>
    
    </select>
  </div>
  <div class="col-md-6">
    <label for="validationDefault01" class="form-label">Supplier</label>

    <select class="form-control" id="supplierItems" name = "supplier_id" required>
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
</div>

<div class="row mt-3">
  <div class="col-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Supply ID</th>
          <th scope="col">Description</th>
          <th scope="col">Unit</th>
          <th scope="col">Unit Cost</th>
          <th scope="col">Stocks</th>
          <th scope="col">QTY</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="bodyTable">
      </tbody>
    </table>
  </div>
</div>
