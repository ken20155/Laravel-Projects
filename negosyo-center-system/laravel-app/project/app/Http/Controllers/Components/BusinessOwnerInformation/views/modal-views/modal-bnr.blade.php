<?php 
  if (isset($post['action']) && $post['action'] == 'add') {
    ?>
    <input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "add">
    <input type="hidden" class="form-control" id="validationDefault01" name = "b_id" value = "">
    <?php
  }else{
    ?>
    <input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
    <input type="hidden" class="form-control" id="validationDefault01" name = "b_id" value = "<?= $data ? $data->b_id : '' ?>">
    <?php
  }
?>


<?php if(isset($data->bnr_certificate_file) && $data->bnr_certificate_file != null && $post['action'] == 'edit'){ ?>
  <img src="<?=env('APP_URL').'public/main/uploaded/profile/'.$data->bnr_certificate_file.''?>" class="w-100" alt="" sizes="" srcset="">
<?php }else{ ?>

  <div class="row">
    <div class="col-md-6 mt-2 d-none">
      <label for="exampleFormControlInput1" class="form-label">Type</label>
      <select class="form-select form-select-lg typeForm" id="" name="type_of_form" aria-label="Default select example" required>
        <option selected disabled value="">- Select -</option>
        <option value="New" >New</option>
        <option value="Renewal" selected>Renewal</option>
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
      <label for="exampleFormControlInput1" class="form-label">Business Address</label>
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
  <div class="row mt-2">
    <h5 class="text-center">Business Details</h5>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">House/Building No. & Name</label>
      <input type="text" class="form-control businessDetails businessDetailsHouseNo" data-toclass="ownerDetailsHouseNo" name="business_details_house_no" value="<?= $data ? $data->business_details_house_no : '' ?>" id="exampleFormControlInput1" required>
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Barangay</label>
      <select name="business_details_brgy" id = "business_address_brgy" class="form-select businessDetails form-select-lg businessDetailsBrgy" data-toclass="ownerDetailsBrgy" required>
        <option value="" disabled selected>-Select-</option>
        <?php 
        $locations = [
        "BALUARTE",
        "CASINGLOT",
        "GRACIA",
        "MOHON",
        "NATUMOLAN",
        "POBLACION",
        "ROSARIO",
        "SANTA ANA",
        "SANTA CRUZ",
        "SUGBONGCOGON"
        ];
        foreach ($locations as $location) {
           if ($data && $data->business_details_brgy == $location) {
        ?>
            <option value="<?= $location ?>" selected><?= $location ?></option>
        <?php }else{ ?>
             <option value="<?= $location ?>"><?= $location ?></option>
            <?php }
        } ?>
    </select>
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Street</label>
      <input type="text" class="form-control businessDetails businessDetailsStreet" data-toclass="ownerDetailsStreet" name="business_details_street" value="<?= $data ? $data->business_details_street : '' ?>" id="exampleFormControlInput1" required>
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Phone no. (Area Code)</label>
      <input type="number" class="form-control businessDetails businessDetailsPhoneNo" data-toclass="ownerDetailsPhoneNo" name="business_details_phone_no" value="<?= $data ? $data->business_details_phone_no : '' ?>" id="exampleFormControlInput1" required>
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Mobile no.</label>
      <input type="number" class="form-control businessDetails businessMobileNo" data-toclass="ownerMobileNo" name="business_mobile_no" value="<?= $data ? $data->business_mobile_no : '' ?>" id="exampleFormControlInput1" required>
    </div>
  </div>
  <div class="row mt-2 d-none">
    <h5 class="text-center">Business Owner Details
        <br>
        <input class="form-check-inputs" type="checkbox" value="1" name="is_same" data-fromclass="businessDetails" data-toclass="" id="same_business_details_provided" checked>
        <label class="form-check-label" for="flexCheckDefault">
          Same as Business Details provided
        </label>
    </h5>
    
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">House/Building No. & Name</label>
      <input type="text" class="form-control ownerDetailsHouseNo" name="owner_details_house_no"  id="exampleFormControlInput1" value=" <?= $user_details_session->house_no ?>">
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Barangay</label>
      <input type="text" class="form-control ownerDetailsHouseNo" name="owner_details_brgy"  id="exampleFormControlInput1" value=" <?= $user_details_session->barangay ?>">
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Street</label>
      <input type="text" class="form-control ownerDetailsStreet" name="owner_details_street" id="exampleFormControlInput1" value=" <?= $user_details_session->street ?>">
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Phone no. (Area Code)</label>
      <input type="number" class="form-control ownerDetailsPhoneNo" name="owner_details_phone_no" id="exampleFormControlInput1" value=" <?= $user_details_session->phone_number ?>">
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Mobile no.</label>
      <input type="number" class="form-control ownerMobileNo" name="owner_details_mobile_no" id="exampleFormControlInput1" value=" <?= $user_details_session->phone_number ?>">
    </div>
    <div class="col-md-6 mt-2">
      <label for="exampleFormControlInput1" class="form-label">Email</label>
      <input type="text" class="form-control" name="owner_details_email" value="<?=  $user_details_session->email  ?>" id="exampleFormControlInput1">
    </div>
  </div>
<?php }?>
