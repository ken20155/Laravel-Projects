{{-- <div class="row">
  <div class="col-12"><p style="text-align:left"><button type="button" class = "btn btn-sm btn-primary noPrint" id="printNow">Print Dashboard</button>
  </p></div>
</div> --}}
<div id="print-content">
  <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-primary bubble-shadow-small"
                >
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Users</p>
                  <h4 class="card-title"><?= number_format($getTotalUsers) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-info bubble-shadow-small"
                >
                  <i class="fas fa-file-invoice-dollar"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total BNR</p>
                  <h4 class="card-title"><?= number_format($getTotaBnr) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-success bubble-shadow-small"
                >
                  <i class="fas fa-money-check-alt"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total MSME</p>
                  <h4 class="card-title"><?= number_format($getTotaMsme) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-secondary bubble-shadow-small"
                >
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Applied Loan</p>
                  <h4 class="card-title"><?=  number_format($getTotaLoan) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12 registredMsme">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Total of MSME Registered</div>
            </div>
            <div class="row">
              <div class="col-12"><button type="button" class = "btn btn-sm btn-primary noPrint" id="printNow1">Print</button></div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <label for="">Year</label>
                <input type="number" class="form-control form-control-sm data-filter" name="year" id="year_filter" value = "2024" required>
              </div>
              <div class="col-6">
                <label for="">Category</label>
                <select name="category_filter" id="category_filter" class="form-select form-select-sm data-filter" required>
                    <option value="" selected>-All-</option>
                    <option value="MICRO">Micro</option>
                    <option value="SMALL">Small</option>
                    <option value="MEDIUM">Medium</option>
                </select>
              </div>
            </div>
      
            <div class="chart-container" style="min-height: 375px">
              <canvas id="statisticsChart2"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 annoucementPrint">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Total of Events</div>
            </div>
            <div class="row">
              <div class="col-12"><button type="button" class = "btn btn-sm btn-primary noPrint" id="printNow0">Print</button></div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <label for="">Year</label>
                <input type="number" class="form-control form-control-sm data-filter" name="year_a" id="year_filter2" value = "2024" required>
              </div>
              <div class="col-6">
                <label for="">Yearly Total</label>
                <input type="number" class="form-control form-control-sm data-filter" value = "8" id="totalYearAnnouncement" readonly>
              </div>
            </div>
      
            <div class="chart-container" style="min-height: 375px">
              <canvas id="statisticsChart2Annoucement"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 TotalClassificationMsme">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Total of MSME with Classification</div>
      
            </div>
            <div class="row">
              <div class="col-12"><button type="button" class = "btn btn-sm btn-primary noPrint" id="printNow2">Print</button></div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Barangay List</th>
                    <th scope="col" class="text-center">Micro</th>
                    <th scope="col" class="text-center">Small</th>
                    <th scope="col" class="text-center">Medium</th>
                    <th scope="col" class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($getTotalMsmeClassification as $R) {
                  ?>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-secondary btn-sm me-2"
                      >
                        <i class="bi bi-bank"></i>
                      </button>
                      <?= $R['brgy'] ?>
                    </th>
                    <td class="text-center"><?= $R['MICRO'] ?></td>
                    <td class="text-center"><?= $R['SMALL'] ?></td>
                    <td class="text-center"><?= $R['MEDIUM'] ?></td>
                    <td class="text-center"><?= $R['TOTAL'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 TotalMsmePerBrgy">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Total of MSME per Barangay</div>
      
            </div>
            <div class="row">
              <div class="col-12"><button type="button" class = "btn btn-sm btn-primary noPrint" id="printNow3">Print</button></div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Barangay List</th>
                    <th scope="col" class="text-end">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($getTotalMsmeClassification as $R) {
                  ?>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-secondary btn-sm me-2"
                      >
                        <i class="bi bi-bank"></i>
                      </button>
                      <?= $R['brgy'] ?>
                    </th>
                    <td class="text-end"><?= $R['TOTAL'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 TotalBnrPerBrgy">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row card-tools-still-right">
              <div class="card-title">Total of Bussiness per Barangay</div>
      
            </div>
            <div class="row">
              <div class="col-12"><button type="button" class = "btn btn-sm btn-primary noPrint" id="printNow4">Print</button></div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Barangay List</th>
                    <th scope="col" class="text-center">Pending</th>
                    <th scope="col" class="text-center">Approved</th>
                    <th scope="col" class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  foreach ($getTotalBnr as $R) {
                  ?>
                  <tr>
                    <th scope="row">
                      <button
                        class="btn btn-icon btn-round btn-secondary btn-sm me-2"
                      >
                        <i class="bi bi-bank"></i>
                      </button>
                      <?= $R['brgy'] ?>
                    </th>
                    <td class="text-center"><?= $R['PENDING'] ?></td>
                    <td class="text-center"><?= $R['APPROVED'] ?></td>
                    <td class="text-center"><?= $R['TOTAL'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>