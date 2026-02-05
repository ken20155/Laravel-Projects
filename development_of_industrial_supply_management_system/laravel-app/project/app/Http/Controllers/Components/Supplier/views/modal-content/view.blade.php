<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "primary_id" value = "<?= $data ? $data->supplier_id : '' ?>">

<div class="row">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Company name</label>
    <input type="text" class="form-control" id="validationDefault01" name = "company" value = "<?= $data ? $data->company : '' ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Contact Person</label>
    <input type="text" class="form-control" id="validationDefault02" name = "contact_person" value = "<?= $data ? $data->contact_person : '' ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Contact No.</label>
    <input type="text" class="form-control" id="validationDefault02" name = "contact_no" value = "<?= $data ? $data->contact_no : '' ?>" required>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Email</label>
    <input type="email" class="form-control" id="validationDefault01" name = "email" value = "<?= $data ? $data->email : '' ?>" required>
  </div>
  <div class="col-md-8">
    <label for="validationDefault02" class="form-label">TIN</label>
    <input type="text" class="form-control" id="validationDefault02" name = "tin" value = "<?= $data ? $data->tin : '' ?>" required>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <label for="validationDefault02" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationDefault02" name = "address" value = "<?= $data ? $data->address : '' ?>" required>
  </div>
</div>
