
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">

<div class="card">
    <div class="card-header">
      DATE GENERATOR
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">FROM</label>
                <input type="date" name = "start_date" class="form-control form-control-sm" id="validationCustom01" min="<?= date(SQLDATE) ?>" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">TO</label>
                <input type="date" name = "end_date" class="form-control form-control-sm" id="validationCustom01" min="<?= date(SQLDATE) ?>" required>
            </div>
            
        </div>
    </div>
  </div>