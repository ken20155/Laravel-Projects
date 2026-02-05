<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "b_id" value = "<?= $data ? $data->b_id : '' ?>">
<div class="row">
  <div class="col-md-6 mt-2 d-none">
    <label for="exampleFormControlInput1" class="form-label">Type</label>
    <select class="form-select form-select-lg typeForm" id="" name="type_of_form" aria-label="Default select example" required>
      <option selected disabled value="">- Select -</option>
      <option value="New" <?= $data && $data->type_of_form == 'New' ? 'selected' : '' ?>>New</option>
      <option value="Renewal" <?= $data && $data->type_of_form == 'Renewal' ? 'selected' : '' ?>>Renewal</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Certificate No.</label>
    <input type="text" class="form-control certificateNo" name="certificate_no" id="exampleFormControlInput1" <?= $data && $data->type_of_form == 'New' ? 'readonly' : '' ?> value="<?= $data ? $data->certificate_no : '' ?>" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Date registered</label>
    <input type="date" class="form-control" name="date_registered" id="exampleFormControlInput1" value="<?= $data ? $data->date_registered : '' ?>" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">TIN (with/without)</label>
    <select class="form-select form-select-lg selectTIN" name="tin_type" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="With TIN" <?= $data && $data->tin_type == 'With TIN' ? 'selected' : '' ?>>With TIN</option>
      <option value="Without TIN" <?= $data && $data->tin_type == 'Without TIN' ? 'selected' : '' ?>>Without TIN</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">TIN No.</label>
    <input type="text" class="form-control inputTIN" name="tin_no" id="exampleFormControlInput1" <?= $data && $data->tin_type == 'Without TIN' ? 'readonly' : '' ?> value="<?= $data ? $data->tin_no : '' ?>" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">PhilSys Card Number (PCN)</label>
    <input type="text" class="form-control" name="philsys_no" id="exampleFormControlInput1" value="<?= $data ? $data->philsys_no : '' ?>" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Are you are a Refugee?</label>
    <select class="form-select form-select-lg" name="is_refugee" aria-label="Default select example" required>
      <option selected disabled value="">- Select -</option>
      <option value="Yes" <?= $data && $data->is_refugee == 'Yes' ? 'selected' : '' ?>>Yes</option>
      <option value="No" <?= $data && $data->is_refugee == 'No' ? 'selected' : '' ?>>No</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Stateless person?</label>
    <select class="form-select form-select-lg" name="is_stateless_person" aria-label="Default select example" required>
      <option selected disabled>- Select -</option>
      <option value="Yes" <?= $data && $data->is_stateless_person == 'Yes' ? 'selected' : '' ?>>Yes</option>
      <option value="No" <?= $data && $data->is_stateless_person == 'No' ? 'selected' : '' ?>>No</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">BUSINESS ADDRESS</label>
    <input type="text" class="form-control" name="business_address" value="<?= $data ? $data->business_address : '' ?>" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Business name territorial scope</label>
    <select class="form-select form-select-lg" name="business_name_territorial_scope" aria-label="Default select example" required>
      <option selected disabled>- Select -</option>
      <option value="Barangay (P200.00)" <?= $data && $data->business_name_territorial_scope == 'Barangay (P200.00)' ? 'selected' : '' ?>>Barangay (P200.00)</option>
      <option value="City/Municipality (P600.00)" <?= $data && $data->business_name_territorial_scope == 'City/Municipality (P600.00)' ? 'selected' : '' ?>>City/Municipality (P600.00)</option>
      <option value="Regional (P1,000.00)" <?= $data && $data->business_name_territorial_scope == 'Regional (P1,000.00)' ? 'selected' : '' ?>>Regional (P1,000.00)</option>
      <option value="National (P2,000.00)" <?= $data && $data->business_name_territorial_scope == 'National (P2,000.00)' ? 'selected' : '' ?>>National (P2,000.00)</option>
    </select>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-6 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label">Dominant Portion</label>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">1</span>
          <input type="text" class="form-control" name="business_name_1" value="<?= $data ? $data->business_name_1 : '' ?>" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">2</span>
          <input type="text" class="form-control" name="business_name_2" value="<?= $data ? $data->business_name_2 : '' ?>" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">3</span>
          <input type="text" class="form-control" name="business_name_3" value="<?= $data ? $data->business_name_3 : '' ?>" required>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label">Descriptor</label>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">1</span>
          <input type="text" class="form-control" name="business_desc_1" value="<?= $data ? $data->business_desc_1 : '' ?>" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">2</span>
          <input type="text" class="form-control" name="business_desc_2" value="<?= $data ? $data->business_desc_2 : '' ?>" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">3</span>
          <input type="text" class="form-control" name="business_desc_3" value="<?= $data ? $data->business_desc_3 : '' ?>" required>
        </div>
      </div>
    </div>
  </div>
</div>