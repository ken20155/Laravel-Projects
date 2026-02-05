

<?php 
  if (isset($post['action']) && $post['action'] == 'add') {
    ?>
    <input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "add">
    <input type="hidden" class="form-control" id="validationDefault01" name = "msme_id" value = "0">
    <?php
  }else{
    ?>>
  <input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
  <input type="hidden" class="form-control" id="validationDefault01" name = "msme_id" value = "<?= $data ? $data->msme_id : '' ?>">
    <?php
  }
?>
 <input type="hidden" class="form-control" id="validationDefault01" name = "form" data-value = "">
<div class="row mt-2">
  <?php 
    if ($post['action'] != 'edit') {
      echo '
        <div class="col-md-12 mt-2">
          <label for="exampleFormControlInput1" class="form-label">Upload BNR Certificate<span class="text-danger">*</span></label>
          <input type="file" accept="image/*" class="form-control" name="bnr_certificate_file" required>
        </div>
      ';
    }
    ?>
</div>
<div class="row mt-2">
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Registered Business Name<span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="business_approved" value = "<?= $data ? $data->business_approved : '' ?>" id="exampleFormControlInput1" <?=$post['action'] != 'edit' ? '' : 'readonly'?> required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Major Business Activity<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" name="majority_business_activity" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <?php
      $options = [
          "Manufacturing",
          "Processing",
          "Agri-production",
          "Wholesaling",
          "Retailing",
          "Consolidation",
          "Contracting",
          "Sub-contracting",
          "Distributorship",
          "Exporting",
          "Importing",
          "Service Provider",
      ];
      ?>
    <?php foreach ($options as $option): 
      if ($data && $data->majority_business_activity == $option) {
        $selected = 'selected';
      }else{
        $selected = '';
      }
    ?>
      <option value="<?= $option; ?>" <?=$selected?>><?= $option; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Product/Service line<span class="text-danger">*</span></label>
    <input type="text" class="form-control" value = "<?= $data ? $data->product_service_line : '' ?>" name="product_service_line" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Year established<span class="text-danger">*</span></label>
    <input type="number" class="form-control" value = "<?= $data ? $data->year_established : '' ?>" name="year_established" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Initial capitalization<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" name="initial_capitalization" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <?php
      // Define the array with values and descriptions
      $options1 = [
          "BELOW P10,000" => "BELOW P10,000",
          "P10,000 - P20,000" => "P10,000 - P20,000",
          "P20,000 - P50,000" => "P20,000 - P50,000",
          "P50,000 - P100,000" => "P50,000 - P100,000",
          "P100,000 - P500,000" => "P100,000 - P500,000",
          "P100,000 - P1.5M" => "P100,000 - P1.5M",
          "P1.5M - P3M" => "P1.5M - P3M",
          "P3M - P5M" => "P3M - P5M",
          "P5M - P10M" => "P5M - P10M",
          "P10M - P15M" => "P10M - P15M",
          "P15M - P100M" => "P15M - P100M"
      ];
      
      // Loop through the array and generate the options
      foreach ($options1 as $value => $desc) {
        if ($data && $data->initial_capitalization == $desc) {
          $selected = 'selected';
        }else{
          $selected = '';
        }
          echo "<option value=\"$value\" $selected>$desc</option>\n";
      }
      ?>
      
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">As Of Asset Classification (Please indicate year)<span class="text-danger">*</span></label>
    <input type="number" class="form-control" value = "<?= $data ? $data->as_of_asset_classification : '' ?>" name="as_of_asset_classification" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Asset Classification<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" name="asset_classification" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <?php
      // Define the array with values and descriptions
      $options1 = [
          "BELOW P10,000" => "BELOW P10,000",
          "P10,000 - P20,000" => "P10,000 - P20,000",
          "P20,000 - P50,000" => "P20,000 - P50,000",
          "P50,000 - P100,000" => "P50,000 - P100,000",
          "P100,000 - P500,000" => "P100,000 - P500,000",
          "P100,000 - P1.5M" => "P100,000 - P1.5M",
          "P1.5M - P3M" => "P1.5M - P3M",
          "P3M - P5M" => "P3M - P5M",
          "P5M - P10M" => "P5M - P10M",
          "P10M - P15M" => "P10M - P15M",
          "P15M - P100M" => "P15M - P100M"
      ];
      
      // Loop through the array and generate the options
      foreach ($options1 as $value => $desc) {
        if ($data && $data->asset_classification == $desc) {
          $selected = 'selected';
        }else{
          $selected = '';
        }
          echo "<option value=\"$value\" $selected>$desc</option>\n";
      }
      ?>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">NO. OF EMPLOYEES AS OF: (Please indicate a year)<span class="text-danger">*</span></label>
    <input type="number" class="form-control" value = "<?= $data ? $data->no_employees : '' ?>" name="no_employees" id="exampleFormControlInput1" required>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-12 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label text-center">FULL-TIME<span class="text-danger">*</span></label>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_male_abled : '' ?>" name="full_time_no_employees_male_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_male_pwd : '' ?>" name="full_time_no_employees_male_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_male_ip : '' ?>" name="full_time_no_employees_male_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Senior Citezen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_male_sr : '' ?>" name="full_time_no_employees_male_sr" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_female_abled : '' ?>" name="full_time_no_employees_female_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_female_pwd : '' ?>" name="full_time_no_employees_female_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_female_ip : '' ?>" name="full_time_no_employees_female_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Senior Citezen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->full_time_no_employees_female_sr : '' ?>" name="full_time_no_employees_female_sr" id="exampleFormControlInput1" required>
      </div>
    </div>
  </div>
  <div class="col-md-12 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label text-center">PART-TIME<span class="text-danger">*</span></label>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_male_abled : '' ?>" name="part_time_no_employees_male_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_male_pwd : '' ?>" name="part_time_no_employees_male_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_male_ip : '' ?>" name="part_time_no_employees_male_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Senior Citezen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_male_sr : '' ?>" name="part_time_no_employees_male_sr" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_female_abled : '' ?>" name="part_time_no_employees_female_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_female_pwd : '' ?>" name="part_time_no_employees_female_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_female_ip : '' ?>" name="part_time_no_employees_female_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Senior Citizen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value = "<?= $data ? $data->part_time_no_employees_female_sr : '' ?>" name="part_time_no_employees_female_sr" id="exampleFormControlInput1" required>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2">
  <h4 class="text-center">MICRO ENTERPRISES</h4>
  <div class="cards" >
    <div class="card-body">
      <h5 class="text-center">PHYSICAL STORE/STALLS</h5>
      <div class="col-md-12 mt-2">
        <div class="row">
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_food" id="inlineRadio1" value="Yes" <?= $data && $data->physical_store_food == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_food" id="inlineRadio2" value="No" <?= $data && $data->physical_store_food == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>

          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_nonfood" id="inlineRadio1" value="Yes" <?= $data && $data->physical_store_food == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_nonfood" id="inlineRadio2" value="No" <?= $data && $data->physical_store_food == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_food_nonfood" id="inlineRadio1" value="Yes" <?= $data && $data->physical_store_food_nonfood == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_food_nonfood" id="inlineRadio2" value="No" <?= $data && $data->physical_store_food_nonfood == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_area_owner" id="inlineRadio1" value="Yes" <?= $data && $data->physical_store_area_owner == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="physical_store_area_owner_indicate" class="physical_store_area_owner_indicate" id="inlineRadio1"  value = "<?= $data ? $data->physical_store_area_owner_indicate : '' ?>" >

            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_area_owner" id="inlineRadio2" value="No" <?= $data && $data->physical_store_area_owner == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_area_rented" id="inlineRadio1" value="Yes" <?= $data && $data->physical_store_area_rented == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="physical_store_area_rented_indicate" class="physical_store_area_rented_indicate" id="inlineRadio1"  value = "<?= $data ? $data->physical_store_area_rented_indicate : '' ?>" >

            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_area_rented" id="inlineRadio2" value="No" <?= $data && $data->physical_store_area_rented == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_govn_supervised" id="inlineRadio1" value="Yes" <?= $data && $data->physical_store_govn_supervised == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="physical_store_govn_supervised" id="inlineRadio2" value="No" <?= $data && $data->physical_store_govn_supervised == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="cards" >
    <div class="card-body">
      <h5 class="text-center">AMBULANT VENDING</h5>
      <div class="col-md-12 mt-2">
        <div class="row">
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_food" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_food == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_food" id="inlineRadio2" value="No" <?= $data && $data->ambulant_vending_food == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_nonfood" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_nonfood == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_nonfood" id="inlineRadio2" value="No" <?= $data && $data->ambulant_vending_nonfood == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_food_nonfood" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_food_nonfood == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_food_nonfood" id="inlineRadio2" value="No" <?= $data && $data->ambulant_vending_food_nonfood == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_area_owner" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_area_owner == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="ambulant_vending_area_owner_indicate" class="ambulant_vending_area_owner_indicate" id="inlineRadio1"  value = "<?= $data ? $data->ambulant_vending_area_owner_indicate : '' ?>" >
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_area_owner" id="inlineRadio2" value="No" <?= $data && $data->ambulant_vending_area_owner == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_area_rented" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_area_rented == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="ambulant_vending_area_rented_indicate" class="ambulant_vending_area_rented_indicate" id="inlineRadio1"  value = "<?= $data ? $data->ambulant_vending_area_rented_indicate : '' ?>" >

            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_area_rented" id="inlineRadio2" value="No" <?= $data && $data->ambulant_vending_area_rented == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_govn_supervised" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_govn_supervised == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="ambulant_vending_govn_supervised" id="inlineRadio2" value="No" <?= $data && $data->ambulant_vending_govn_supervised == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="cards" >
    <div class="card-body">
      <h5 class="text-center">ONLINE STORE</h5>
      <div class="col-md-12 mt-2">
        <div class="row">
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_food" id="inlineRadio1" value="Yes" <?= $data && $data->ambulant_vending_govn_supervised == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_food" id="inlineRadio2" value="No" <?= $data && $data->online_store_food == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_nonfood" id="inlineRadio1" value="Yes" <?= $data && $data->online_store_nonfood == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_nonfood" id="inlineRadio2" value="No" <?= $data && $data->online_store_nonfood == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_food_nonfood" id="inlineRadio1" value="Yes" <?= $data && $data->online_store_food_nonfood == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_food_nonfood" id="inlineRadio2" value="No" <?= $data && $data->online_store_food_nonfood == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_area_owner" id="inlineRadio1" value="Yes" <?= $data && $data->online_store_area_owner == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="online_store_area_owner_indicate" class="online_store_area_owner_indicate" id="inlineRadio1"  value = "<?= $data ? $data->online_store_area_owner_indicate : '' ?>" >

            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_area_owner" id="inlineRadio2" value="No" <?= $data && $data->online_store_area_owner == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_area_rented" id="inlineRadio1" value="Yes" <?= $data && $data->online_store_area_rented == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="online_store_area_rented_indicate" class="online_store_area_rented_indicate" id="inlineRadio1"  value = "<?= $data ? $data->online_store_area_rented_indicate : '' ?>" >

            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_area_rented" id="inlineRadio2" value="No" <?= $data && $data->online_store_area_rented == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_govn_supervised" id="inlineRadio1" value="Yes" <?= $data && $data->online_store_govn_supervised == 'Yes' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio1">YES</label>
              <input type="text" name="online_store_govn_supervised_indicate" class="online_store_govn_supervised_indicate" id="inlineRadio1"  value = "<?= $data ? $data->online_store_govn_supervised_indicate : '' ?>" >
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="online_store_govn_supervised" id="inlineRadio2" value="No" <?= $data && $data->online_store_govn_supervised == 'No' ? 'checked' : '' ?>>
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</div>
<div class="row mt-2">
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">CATEGORY OF ENTREPRENEUR<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" name="category_entrepreneur" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <?php
      // Define the array with values and descriptions (both same)
      $options = [
          "Housewife/Husband",
          "Professional",
          "Self-employed",
          "Student",
          "Private Employee",
          "Unemployed",
          "Out of School Youth",
          "Government Employee",
          "OFW",
          "Military/Police",
          "Retiree",
          "Drug Surrenderee",
          "Ex-Convict",
          "Other"
      ];
      
      // Loop through the array and generate the options
      foreach ($options as $value) {
          if ($data && $data->category_entrepreneur == $value) {
            $selected = 'selected';
          }else{
            $selected = '';
          }
          echo "<option value=\"$value\" $selected>$value</option>\n";
      }
      ?>
      
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">SOCIAL CLASSIFICATION<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" name="social_classification" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <?php
      // Define the array with values and descriptions (both same)
      $options = [
          "Abled",
          "Diffently-Abled (PWD)",
          "IP",
          "Senior Citizen"
      ];
      
      // Loop through the array and generate the options
      foreach ($options as $value) {
        if ($data && $data->social_classification == $value) {
            $selected = 'selected';
          }else{
            $selected = '';
          }
          echo "<option value=\"$value\" $selected>$value</option>\n";
      }
      ?>
    </select>
  </div>

</div>