<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "b_id" value = "<?= $primary_id ? $primary_id : '' ?>">


<div class="row">
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Type</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">New</option>
      <option value="2">Renewal</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Certificate No.</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Date registered</label>
    <input type="date" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">TIN (with/without)</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">With TIN</option>
      <option value="2">Without TIN</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">TIN No.</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">PhilSys Card Number (PCN)</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Are you are a Refugee?</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Yes</option>
      <option value="2">No</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Stateless person?</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Yes</option>
      <option value="2">No</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Business name territorial scope</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Barangay (P200.00)</option>
      <option value="1">City/Municipality (P600.00)</option>
      <option value="1">Regional (P1,000.00)</option>
      <option value="1">National (P2,000.00)</option>
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
          <input type="text" class="form-control" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">2</span>
          <input type="text" class="form-control" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">3</span>
          <input type="text" class="form-control" required>
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
          <input type="text" class="form-control" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">2</span>
          <input type="text" class="form-control" required>
        </div>
      </div>
      <div class="col-md-12 mt-2">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">3</span>
          <input type="text" class="form-control" required>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">ID No.</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" value = "2024-1" readonly required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Major Business Activity</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Manufacturing</option>
      <option value="1">Processing</option>
      <option value="1">Agri-production</option>
      <option value="1">Wholesaling</option>
      <option value="1">Retailing</option>
      <option value="1">Consolidation</option>
      <option value="1">Contracting</option>
      <option value="1">Sub-contracting</option>
      <option value="1">Distributorship</option>
      <option value="1">Exporting</option>
      <option value="1">Importing</option>
      <option value="1">Service Provider</option>
    </select>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Product/Service line</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Year established</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Initial capitalization</label>
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
    <label for="exampleFormControlInput1" class="form-label">As Of Asset Classification (Please indicate year)</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">Asset Classification</label>
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
    <label for="exampleFormControlInput1" class="form-label">NO. OF EMPLOYEES AS OF: (Please indicate a year)</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" required>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-12 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label text-center">FULL-TIME</label>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Abled</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male PWD</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Indigenous person</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Senior Citezen</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Abled</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female PWD</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Indigenous person</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Senior Citezen</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
    </div>
  </div>
  <div class="col-md-12 mt-2">
    <div class="row">
      <label for="exampleFormControlInput1" class="form-label text-center">PART-TIME</label>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Abled</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male PWD</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Indigenous person</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Male Senior Citezen</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Abled</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female PWD</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Indigenous person</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
      </div>
      <div class="col-md-3 mt-2">
        <label for="exampleFormControlInput1" class="form-label">Female Senior Citizen</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" required>
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
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
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
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
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
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">NON-FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">FOOD & NON-FOOD</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA OWNED (Indicate area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">AREA RENTED (Indicate area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="col-md-4 mt-2">
            <label for="exampleFormControlInput1" class="form-label">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" required>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</div>
<div class="row mt-2">
  <div class="col-md-6 mt-2">
    <label for="exampleFormControlInput1" class="form-label">CATEGORY OF ENTREPRENEUR</label>
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
    <label for="exampleFormControlInput1" class="form-label">SOCIAL CLASSIFICATION</label>
    <select class="form-select form-select-lg" aria-label="Default select example" required>
      <option selected>- Select -</option>
      <option value="1">Abled</option>
      <option value="1">Diffently-Abled (PWD)</option>
      <option value="1">IP</option>
      <option value="1">Senior Citizen</option>
    </select>
  </div>

</div>



