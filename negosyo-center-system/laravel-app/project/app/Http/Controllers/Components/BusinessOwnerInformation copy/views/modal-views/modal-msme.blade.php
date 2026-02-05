<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "msme_id" value = "<?= $data ? $data->msme_id : '' ?>">
<div class="row mt-2">
  <?php 
    if ($post['action'] != 'edit') {
      echo '
        <div class="col-md-12 mt-2">
          <label for="exampleFormControlInput1" class="form-label">Upload BNR Certificate<span class="text-danger">*</span></label>
          <input type="file" class="form-control" name="bnr_certificate" required>
        </div>
      ';
    }
    ?>
</div>
<div class="row mt-2">
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Registered Business Name<span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="business_approved" value = "<?= $data ? $data->business_approved : '' ?>" id="exampleFormControlInput1" readonly required>
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
    <input type="text" class="form-control" name="product_service_line" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Year established<span class="text-danger">*</span></label>
    <input type="number" class="form-control" name="year_established" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Initial capitalization<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" name="initial_capitalization" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">BELOW P10,000</option>
      <option value="1">P10,000 - P20,000</option>
      <option value="1">P20,000 - P50,000</option>
      <option value="1">P50,000 - P100,000</option>
      <option value="1">P100,000 - P500,000</option>
      <option value="1">P100,000 - P1.5M</option>
      <option value="1">P1.5M - P3M</option>
      <option value="1">P3M - P5M</option>
      <option value="1">P5M - P10M</option>
      <option value="1">P10M - P15M</option>
      <option value="1">P15M - P100M</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">As Of Asset Classification (Please indicate year)<span class="text-danger">*</span></label>
    <input type="number" class="form-control" name="as_of_asset_classification" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Asset Classification<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">BELOW P10,000</option>
      <option value="1">P10,000 - P20,000</option>
      <option value="1">P20,000 - P50,000</option>
      <option value="1">P50,000 - P100,000</option>
      <option value="1">P100,000 - P500,000</option>
      <option value="1">P100,000 - P1.5M</option>
      <option value="1">P1.5M - P3M</option>
      <option value="1">P3M - P5M</option>
      <option value="1">P5M - P10M</option>
      <option value="1">P10M - P15M</option>
      <option value="1">P15M - P100M</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">NO. OF EMPLOYEES AS OF: (Please indicate a year)<span class="text-danger">*</span></label>
    <input type="number" class="form-control" name="no_employees" id="exampleFormControlInput1" required>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-12 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label text-center">FULL-TIME<span class="text-danger">*</span></label>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_male_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_male_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_male_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Senior Citezen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_male_sr" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_female_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_female_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_female_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Senior Citezen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="full_time_no_employees_female_sr" id="exampleFormControlInput1" required>
      </div>
    </div>
  </div>
  <div class="col-md-12 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label text-center">PART-TIME<span class="text-danger">*</span></label>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_male_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_male_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_male_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Senior Citezen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_male_sr" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Abled<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_female_abled" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female PWD<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_female_pwd" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Indigenous person<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_female_ip" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Senior Citizen<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="part_time_no_employees_female_sr" id="exampleFormControlInput1" required>
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
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" name="part_time_no_employees_female_sr" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" name="part_time_no_employees_female_sr" for="inlineRadio2">NO</label>
            </div>

          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
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
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
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
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">NO</label>
            </div>
          </div>
          <div class="col-md-6 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)<span class="text-danger">*</span></label>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
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
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Housewife/Husband</option>
      <option value="1">Professional</option>
      <option value="1">Self-employed</option>
      <option value="1">Student</option>
      <option value="1">Private Employee</option>
      <option value="1">Unemployeed</option>
      <option value="1">Out of School Youth</option>
      <option value="1">Government Employee</option>
      <option value="1">OFW</option>
      <option value="1">Military/Police</option>
      <option value="1">Retiree</option>
      <option value="1">Drug Surrenderee</option>
      <option value="1">Ex-Convict</option>
      <option value="1">Other</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">SOCIAL CLASSIFICATION<span class="text-danger">*</span></label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Abled</option>
      <option value="1">Diffently-Abled (PWD)</option>
      <option value="1">IP</option>
      <option value="1">Senior Citizen</option>
    </select>
  </div>

</div>