<style>
    .table-custom thead th, 
    .table-custom tbody th,
    .table-custom tbody td
    {
        border: 1px solid black;
        border-collapse: collapse;
        font-size:20px;
    }

    .grid-container {
    display: grid;
    grid-template-columns: auto auto;
    }
    .borderless-table td {
        border: none;
    }
</style>
<?php 
$main_colspan = 4;
function checkFieldIfExist($data,$field,$type = 'text'){
    if ($data) {
        if (isset($data[$field])) {
            if ($data[$field] == 1 && $type == 'checkbox') {
                return 'checked';
            }
            return $data[$field];
        }else{
            return null;
        }
    }
    return null;
}
?>
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "b_id" value = "<?= $primary_id ? $primary_id : '' ?>">

<div class="" style="width:100%;min-width: 1000">
    <table class="table-custom" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">PLEASE READ THE GENERAL INSTRUCTIONS ON THE LAST PAGE BEFORE FILLING UP THIS APPLICATION FORM</th>
            </tr>
        </thead>
    </table>

    <table class="table-custom" style="width:100%">
        <thead>
            <tr>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="<?= $main_colspan ?>">A. TYPE OF DTI RIGISTRATION <i class="fas fa-check-square"></i> </th>
            </tr>
            <tr>
                <td colspan="4">
                    {{-- <select name="" id="">
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select> --}}
                    <span >1.</span> 
                    <input <?= checkFieldIfExist($data,'new_registration','checkbox') ?> type="checkbox" value="1" name = "new_registration">
                    <label >
                        NEW
                    </label>
                    <br>
                    <span class="text-light">1.</span>
                    <input <?= checkFieldIfExist($data,'renewal_registration','checkbox') ?> type="checkbox" value="1" name = "renewal_registration">
                    <label >
                        RENEWWAL
                    </label>
                    → Certificate No.
                    <input value = "<?= checkFieldIfExist($data,'certificate_no') ?>" type="text" name = "certificate_no" style="width:500px">
                    Date registered
                    <input value = "<?= checkFieldIfExist($data,'date_registred') ?>" type="date" name = "date_registred" style="width:500px">
                </td>
            </tr>
            
     
        </tbody>
    </table>
    <table class="table-custom" style="width:100%">
        <thead>
            <tr>
                <th >B. TAX IDENTIFICATION NO. (TIN) <i class="fas fa-check-square"></i> </th>
                <th >C. Philipinne Identification (PhilID)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <td>
                <div class="row">
                    <div class="col-6">
                        
                        <label >
                            2. <input <?= checkFieldIfExist($data,'with_tin','checkbox') ?> type="checkbox" value="1" name = "with_tin"> With TIN:  <input value = "<?= checkFieldIfExist($data,'tin_text') ?>" type="text" name = "tin_text" > 
                        </label>
                    </div>
                    <div class="col-6">
                        <input <?= checkFieldIfExist($data,'without_tin','checkbox') ?> type="checkbox" value="1" name = "without_tin">
                        <label >
                        Without TIN 
                        </label>
                    </div>
                </div>
               </td>
               <td>3. PhilSys Card Number (PCN): <input value = "<?= checkFieldIfExist($data,'PhilSysCardNumber') ?>" type="text" name = "PhilSysCardNumber" style="width:100%"> </td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom" style="width:100%">
        <thead>
            <tr>
                <th colspan="4">D. OWNER INFORMATION <i class="fas fa-check-square"></i></th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>
                    4. First Name
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'owner_info_first_name') ?>" type="text" name = "owner_info_first_name" style="width:100%">
                </td>
                <td>
                    5. Middle Name
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'owner_info_middle_name') ?>" type="text" name = "owner_info_middle_name" style="width:100%">
                </td>
                <td>
                    6. Last name
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'owner_info_last_name') ?>" type="text" name = "owner_info_last_name" style="width:100%">
                </td>
                <td>
                    7. Suffix (e.g Jr. Sr. I, II)
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'owner_info_suffix_name') ?>" type="text" name = "owner_info_suffix_name" style="width:100%">
                </td>
            </tr>
        </tbody>
    </table>




    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="3" class="text-center">
                    8. Date of Birth
                </th>
                <th >
                    9. Civil Status
                </th>
                <th >
                    10. Gender
                </th>
                <td rowspan="5">
                    11. Are you are a Refugee?
                    <input <?= checkFieldIfExist($data,'refugee_yes','checkbox') ?> type="checkbox" value="1" name = "refugee_yes">
                    <label >Yes</label>
                    <input <?= checkFieldIfExist($data,'refugee_no','checkbox') ?> type="checkbox" value="1" name = "refugee_no">
                    <label >No</label>
                    <br>
                    Stateless person?
                    <input <?= checkFieldIfExist($data,'stateles_person_yes','checkbox') ?> type="checkbox" value="1" name = "stateles_person_yes">
                    <label >Yes</label>
                    <input <?= checkFieldIfExist($data,'stateles_person_no','checkbox') ?> type="checkbox" value="1" name = "stateles_person_no">
                    <label >No</label>
                    <br>
                    <hr>
                    12. Citizenship
                    <br>
                    <input <?= checkFieldIfExist($data,'filipino_person','checkbox') ?> type="checkbox" value="1" name = "filipino_person">
                    <label >Filipino</label>
                    <br>
                    <input <?= checkFieldIfExist($data,'other_person','checkbox') ?> type="checkbox" value="1" name = "other_person">
                    <label >Others</label>
                    <input value = "<?= checkFieldIfExist($data,'other_person_input') ?>" type="text" name = "other_person_input" >
                </td>
            </tr>
            <tr >
                <td class="text-center">Year
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'birthdate_year') ?>" type="text" name = "birthdate_year"> 
                </td>
                <td class="text-center">Month
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'birthdate_month') ?>" type="text" name = "birthdate_month"> 
                </td>
                <td class="text-center">Day
                    <br>
                    <input value = "<?= checkFieldIfExist($data,'birthdate_day') ?>" type="text" name = "birthdate_day"> 
                </td>
                <td>
                    <input <?= checkFieldIfExist($data,'civl_status1','checkbox') ?> type="checkbox" value="1" name = "civl_status1">
                    <label >Legally separated</label>
                    <br>
                    <input <?= checkFieldIfExist($data,'civl_status2','checkbox') ?> type="checkbox" value="1" name = "civl_status2">
                    <label >Single</label>
                    <br>
                    <input <?= checkFieldIfExist($data,'civl_status3','checkbox') ?> type="checkbox" value="1" name = "civl_status3">
                    <label >Married</label>
                    <br>
                    <input <?= checkFieldIfExist($data,'civl_status4','checkbox') ?> type="checkbox" value="1" name = "civl_status4">
                    <label >Widowed</label>
                    
                </td>
                <td>
                    <input <?= checkFieldIfExist($data,'gender1','checkbox') ?> type="checkbox" value="1" name = "gender1">
                    <label >Male</label>
                    <br>
                    <input <?= checkFieldIfExist($data,'gender2','checkbox') ?> type="checkbox" value="1" name = "gender2">
                    <label >Female</label>
                </td>
            </tr>
        </tbody>
    </table>

   
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th>
                    E. BUSINESS NAME TERRITORIAL SCOPE <i class="fas fa-check-square"></i> - Please choose ONLY ONE
                </th>
            </tr>
            <tr>
                <td class="">
                    <div class="row">
                        <div class="col-md-3">
                            13
                            <input <?= checkFieldIfExist($data,'business_scope1','checkbox') ?> type="checkbox" value="1" name = "business_scope1">
                            <label >Barangay (P200.00) </label>
                        </div>
                        <div class="col-md-3">
                            <input <?= checkFieldIfExist($data,'business_scope2','checkbox') ?> type="checkbox" value="1" name = "business_scope2">
                            <label >City/Municipality (P600.00) </label>
                        </div>
                        <div class="col-md-3">
                            <input <?= checkFieldIfExist($data,'business_scope3','checkbox') ?> type="checkbox" value="1" name = "business_scope3">
                            <label >Regional (P1,000.00) </label>
                        </div>
                        <div class="col-md-3">
                            <input <?= checkFieldIfExist($data,'business_scope4','checkbox') ?> type="checkbox" value="1" name = "business_scope4">
                            <label >National (P2,000.00) </label>
                        </div>
                    </div>
                    <div class="row">
                        <span class="text-center">Payment of P30 Documentary Stamp Tax is Required</span>
                        <br>
                        <span class="text-center">Surcharge for RENEWAL: Additional 50% of the registration fee if filed within 91 days to 190 days after expiration.</span>
                    </div>

                </td>
            </tr>
          
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="2">
                    F. PROPOSED BUSINESS NAME <i class="fas fa-check-square"></i> - Please provide at least three (3) proposed Business Name options.
                </th>
            </tr>
            <tr>
                <td>Dominant Portion</td>
                <td>Descriptor</td>
            </tr>
            <tr>
                <td>14
                    <input value = "<?= checkFieldIfExist($data,'propose_business_dominant_portion1') ?>" type="text" name = "propose_business_dominant_portion1" style="width:100%">
                </td>
                <td>14<input value = "<?= checkFieldIfExist($data,'propose_business_descriptor1') ?>" type="text" name = "propose_business_descriptor1" style="width:100%"></td>
            </tr>
            <tr>
                <td>15
                    <input value = "<?= checkFieldIfExist($data,'propose_business_dominant_portion2') ?>" type="text" name = "propose_business_dominant_portion2" style="width:100%">
                </td>
                <td>15<input value = "<?= checkFieldIfExist($data,'propose_business_descriptor2') ?>" type="text" name = "propose_business_descriptor2" style="width:100%"></td>
            </tr>
            <tr>
                <td>16
                    <input value = "<?= checkFieldIfExist($data,'propose_business_dominant_portion3') ?>" type="text" name = "propose_business_dominant_portion3" style="width:100%">
                </td>
                <td>16<input value = "<?= checkFieldIfExist($data,'propose_business_descriptor3') ?>" type="text" name = "propose_business_descriptor3" style="width:100%"></td>
            </tr>

        </tbody>
    </table>

    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="3">
                    G. BUSINESS DETAILS <i class="fas fa-check-square"></i>
                </th>
            </tr>
            <tr>
                <td>17. House/Building No. & Name:
                    <input value = "<?= checkFieldIfExist($data,'business_details_house_no') ?>" type="text" name = "business_details_house_no" style="width:100%">
                </td>
                <td colspan="2">18. Street:
                    <input value = "<?= checkFieldIfExist($data,'business_details_Street') ?>" type="text" name = "business_details_Street" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>19. Barangay
                    <input value = "<?= checkFieldIfExist($data,'business_details_Barangay') ?>" type="text" name = "business_details_Barangay" style="width:100%">
                </td>
                <td>20. City/Municipality
                    <input value = "<?= checkFieldIfExist($data,'business_details_City') ?>" type="text" name = "business_details_City" style="width:100%">
                </td>
                <td>21. Province
                    <input value = "<?= checkFieldIfExist($data,'business_details_Province') ?>" type="text" name = "business_details_Province" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>22. Region:
                    <input value = "<?= checkFieldIfExist($data,'business_details_Region') ?>" type="text" name = "business_details_Region" style="width:100%">
                </td>
                <td>23. Phone no. (Area Code)
                    <input value = "<?= checkFieldIfExist($data,'business_details_Phone_no') ?>" type="text" name = "business_details_Phone_no" style="width:100%">
                </td>
                <td>24. Mobile no.
                    <input value = "<?= checkFieldIfExist($data,'business_details_Mobile_no') ?>" type="text" name = "business_details_Mobile_no" style="width:100%">
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="2">
                    H. OWNER DETAILS <i class="fas fa-check-square">
                </th>
            </tr>
            <tr>
                <td>
                    <input <?= checkFieldIfExist($data,'same_no34','checkbox') ?> type="checkbox" value="1" name = "same_no34">
                    <label >Same as Business Details provided in box Nos. 16 to 23. Proceed to no. 34 </label>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <td>25. House/Building No. Name:
                    <input value = "<?= checkFieldIfExist($data,'owner_details_house_no') ?>" type="text" name = "owner_details_house_no" style="width:100%">
                </td>
                <td>26. Street
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Street') ?>" type="text" name = "owner_details_Street" style="width:100%">
                </td>
                <td>27. Barangay
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Barangay') ?>" type="text" name = "owner_details_Barangay" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>28. City/Municipality:
                    <input value = "<?= checkFieldIfExist($data,'owner_details_City') ?>" type="text" name = "owner_details_City" style="width:100%">
                </td>
                <td>29. Province
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Province') ?>" type="text" name = "owner_details_Province" style="width:100%">
                </td>
                <td>30. Region
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Region') ?>" type="text" name = "owner_details_Region" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>31. Phone no. (Area Code)
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Region') ?>" type="text" name = "owner_details_Region" style="width:100%">
                </td>
                <td>32. Mobile no.
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Mobile_no') ?>" type="text" name = "owner_details_Mobile_no" style="width:100%">
                </td>
                <td>33. Email Address:
                    <input value = "<?= checkFieldIfExist($data,'owner_details_Email') ?>" type="text" name = "owner_details_Email" style="width:100%">
                </td>
            </tr>
        </tbody>
    </table>

   
    <table class="table-custom inline-table" style="width:100%">
        <thead>
            <tr>
                <th class="text-center" colspan="4">For DTI Use Only</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="4">Registration Details:</th>
            </tr>
            <tr>
                <td colspan="2">Approved Business Name:</td>
                <td>Business Name No.:</td>
                <td>Date Registered:</td>
            </tr>
            <tr>
                <td colspan="2">Territotial Scope:</td>
                <td colspan="2">Reference Code:</td>
            </tr>
            <tr>
                <th colspan="2">Payment Details:</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6">Fee:<i class="far fa-square"></i></div>
                        <div class="col-6">+ P30 DST</div>
                    </div>
                </td>
                <td>OR Number:</td>
                <td>Date Paid:</td>
                <td>Received By:</td>
            </tr>
            <tr>
                <th colspan="4">Monitoring Details:</th>
            </tr>
            <tr>
                <td>Issue Office:</td>
                <td>Process by:</td>
                <td colspan="2"></td>
            </tr>
            {{-- <tr>
                <td>28. City/Municipality:
                    <input value = "<?= checkFieldIfExist($data,'id_no') ?>" type="text" name = "test_input" style="width:100%">
                </td>
                <td>29. Province
                    <input value = "<?= checkFieldIfExist($data,'id_no') ?>" type="text" name = "test_input" style="width:100%">
                </td>
                <td>30. Region
                    <input value = "<?= checkFieldIfExist($data,'id_no') ?>" type="text" name = "test_input" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>31. Phone no. (Area Code)
                    <input value = "<?= checkFieldIfExist($data,'id_no') ?>" type="text" name = "test_input" style="width:100%">
                </td>
                <td>32. Mobile no.
                    <input value = "<?= checkFieldIfExist($data,'id_no') ?>" type="text" name = "test_input" style="width:100%">
                </td>
                <td>33. Email Address:
                    <input value = "<?= checkFieldIfExist($data,'id_no') ?>" type="text" name = "test_input" style="width:100%">
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>