<style>
    .table-custom thead th, 
    .table-custom tbody th,
    .table-custom tbody td
    {
        border: 1px solid black;
        border-collapse: collapse;
        font-size:20px;
    }
</style>
<div id="modal-content-1">
    <style>
        .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        }
        .borderless-table td {
            border: none;
        }
        .center-text-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <?php 
    $main_colspan = 4;
    // $data['test'] = '';
    function checkFieldIfExist($data,$field,$type = 'text',$option=''){
        if ($data) {
            if (isset($data[$field])) {
                if ($type == 'checkbox') {
                    if ($data[$field] == $option) {
                    //if (in_array($data[$field],$option)) {
                        return '<span style="font-size:20px !important">🗹</span>';
                    }else{
                        return '<span style="font-size:20px !important">◻</span>';
                    }
                }else{
                    return $data[$field];
                }
            }else{
                if ($type == 'checkbox') {
                    return '<span style="color:black;font-size:20px !important">◻</span>';
                }else{
                    return null;
                }
            }
        }
        return null;
    }

    ?>



    <div class="" style="width:100%;min-width: 1000">
        <div class="row">
            <div class="col-8"><p style="text-align:right"><img width="90%" src="<?= env('APP_URL') ?>public\main\image\print-logo-bnr (2).png" alt=""></p></div>
            <div class="col-4 center-text-container">
                <p style="text-align:right;width:100%">
                <table class="table-custom" style="width:100%"class="table-custom" style="width:100%">
                    <thead>
                        <tr>
                            <th rowspan="3" style="width:70px; text-align:center; vertical-align:middle; transform: rotate(-90deg);">
                                    FORM
                            </th>
                            <th>Code:</th>
                            <th>FM-BN-01</th>
                        </tr>
                        <tr>
                            <th>Rev:</th>
                            <th>1</th>
                        </tr>
                        <tr>
                            <th>Date:</th>
                            <th>27-Feb-23</th>
                        </tr>
                    </thead>
                </table>
                </p>
            </div>
        </div>
        <p class="text-center" style="text-decoration: underline;">PLEASE READ THE GENERAL INSTRUCTIONS ON THE LAST PAGE BEFORE FILLING UP THIS APPLICATION FORM</p>

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
                        <div class="row">
                            <div class="col-6">
                                <span>1.</span> 
                                <?= '<span style="font-size:20px !important">🗹</span>' ?>
                                <label >
                                    NEW
                                </label>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6">

                                <span class="text-light">1.</span>
                                <?= checkFieldIfExist($data,'renewal_registration','checkbox') ?>
                                <label >
                                    RENEWWAL
                                </label>
                                → Certificate No.:
                                <?= checkFieldIfExist($data,'certificate_no') ?>
                        
                            </div>
                            <div class="col-6">
                                Date registered:
                                <?= date(LONGDATE,strtotime(checkFieldIfExist($data,'date_registered'))) ?>
                            </div>
                        
                        
                        </div>
                        
                        
                    </td>
                </tr>
                
        
            </tbody>
        </table>
        <table class="table-custom" style="width:100%">
            <thead>
                <tr>
                    <th style="width:50%">B. TAX IDENTIFICATION NO. (TIN) <i class="fas fa-check-square"></i> </th>
                    <th >C. Philipinne Identification (PhilID)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <div class="row">
                        <div class="col-4">
                            2.
                            <?php 
                            $option1 = [
                                'With TIN',
                                'Without TIN ',
                            ];
                            ?>
                            <?= checkFieldIfExist($data,'tin_type','checkbox',$option1[0])  ?> With TIN: 
                        </div>
                        <div class="col-5"><?= checkFieldIfExist($data,'tin_no') ?></div>
                        <div class="col-3">
                            <?= checkFieldIfExist($data,'tin_type','checkbox',$option1[1]) ?>
                            <label >
                            Without TIN 
                            </label>
                        </div>
                    </div>
                </td>
                <td>
                    
                    <div class="row">
                        <div class="col-6">3. PhilSys Card Number (PCN): </div>
                        <div class="col-6"><?= checkFieldIfExist($data,'philsys_no') ?></div>
                    </div>
                    </td>
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
                        <?= $user_details_session->first_name ?>
                    </td>
                    <td>
                        5. Middle Name
                        <br>
                    <?= $user_details_session->middle_name == null ? '&nbsp;&nbsp;' :  $user_details_session->middle_name ?>
                    </td>
                    <td>
                        6. Last name
                        <br>
                        <?= $user_details_session->last_name ?>
                    </td>
                    <td>
                        7. Suffix (e.g Jr. Sr. I, II)
                        <br>
                        <?= $user_details_session->suffix == null ? '&nbsp;&nbsp;' :  $user_details_session->middle_name ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="3" class="text-center" style="width:30%">
                        8. Date of Birth
                    </th>
                    <th >
                        9. Civil Status
                    </th>
                    <th >
                        10. Gender
                    </th>
                    <td rowspan="5">
                        
                        <div class="row center-text-container">
                            <div class="col-1">11.</div>
                            <div class="col-5">Are you are a recognized Refugee?</div>
                            <div class="col-3"><?= checkFieldIfExist($data,'is_refugee','checkbox','Yes') ?><label>Yes</label></div>
                            <div class="col-3"><?= checkFieldIfExist($data,'is_refugee','checkbox','No') ?><label>No</label></div>
                            
                        </div>
                        <div class="row center-text-container">
                            <div class="col-1"></div>
                            <div class="col-5">Stateless person?</div>
                            <div class="col-3"><?= checkFieldIfExist($data,'is_stateless_person','checkbox','Yes') ?><label>Yes</label></div>
                            <div class="col-3"><?= checkFieldIfExist($data,'is_stateless_person','checkbox','No') ?><label>No</label></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">12. Citizenship:</div>
                            <div class="col-8"><?= $user_details_session->citizenship ?></div>
                        </div>
                        
                    </td>
                </tr>
                <tr >
                    <td class="text-center">Year
                        <br>
                        <?= $bday_user['year']; ?>
                    </td>
                    <td class="text-center">Month
                        <br>
                        <?= $bday_user['month']; ?>
                    </td>
                    <td class="text-center">Day
                        <br>
                        <?= $bday_user['day']; ?>
                    </td>
                    <td>
                        <?= $user_details_session->civil_status == 'Legally separated' ?  '🗹' : '◻' ?>
                        <label >Legally separated</label>
                        <br>
                        <?= $user_details_session->civil_status == 'Single' ?  '🗹' : '◻' ?>
                        <label >Single</label>
                        <br>
                        <?= $user_details_session->civil_status == 'Married' ?  '🗹' : '◻' ?>
                        <label >Married</label>
                        <br>
                        <?= $user_details_session->civil_status == 'Widowed' ?  '🗹' : '◻' ?>
                        <label >Widowed</label>
                        
                    </td>
                    <td>
                        <?= $user_details_session->gender == 'Male' ?  '🗹' : '◻' ?>
                        <label >Male</label>
                        <br>
                        <?= $user_details_session->gender == 'Female' ?  '🗹' : '◻' ?>
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
                            <div class="col-3">
                                13
                                <?= checkFieldIfExist($data,'business_name_territorial_scope','checkbox','Barangay (P200.00)') ?>
                                <label >Barangay (P200.00) </label>
                            </div>
                            <div class="col-3">
                                <?= checkFieldIfExist($data,'business_name_territorial_scope','checkbox','City/Municipality (P600.00)') ?>
                                <label >City/Municipality (P600.00) </label>
                            </div>
                            <div class="col-3">
                            <?= checkFieldIfExist($data,'business_name_territorial_scope','checkbox','Regional (P1,000.00)') ?>
                                <label >Regional (P1,000.00) </label>
                            </div>
                            <div class="col-3">
                                <?= checkFieldIfExist($data,'business_name_territorial_scope','checkbox','National (P2,000.00)') ?>
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
                    <td style="width:50%">Dominant Portion</td>
                    <td style="width:50%">Descriptor</td>
                </tr>
                <tr>
                    <td>14. 
                        <?= checkFieldIfExist($data,'business_name_1') ?>
                    </td>
                    <td><?= checkFieldIfExist($data,'business_desc_1') ?></td>
                </tr>
                <tr>
                    <td>15. 
                        <?= checkFieldIfExist($data,'business_name_2') ?>
                    </td>
                    <td><?= checkFieldIfExist($data,'business_desc_2') ?></td>
                </tr>
                <tr>
                    <td>16. 
                    <?= checkFieldIfExist($data,'business_name_3') ?>
                    </td>
                    <td><?= checkFieldIfExist($data,'business_desc_3') ?></td>
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
                    <td style="width:50%">17. House/Building No. & Name:<br>
                        <?= checkFieldIfExist($data,'business_details_house_no') ?>
                    </td>
                    <td  style="width:50%"colspan="2">18. Street:<br>
                        <?= checkFieldIfExist($data,'business_details_Street') ?>
                    </td>
                </tr>
                <tr>
                    <td>19. Barangay:<br>
                        <?= checkFieldIfExist($data,'business_details_Barangay') ?>
                    </td>
                    <td>20. City/Municipality:<br>
                    Tagoloan, Misamis Oriental
                    </td>
                    <td>21. Province:<br>
                        Misamis Oriental
                    </td>
                </tr>
                <tr>
                    <td>22. Region:<br>
                        Region X
                    </td>
                    <td>23. Phone no. (Area Code)<br>
                        <?= checkFieldIfExist($data,'business_details_Phone_no') ?>
                    </td>
                    <td>24. Mobile no.<br>
                        <?= checkFieldIfExist($data,'business_details_Mobile_no') ?>
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
                        <?= checkFieldIfExist($data,'same_no34','checkbox') ?>
                        <label >Same as Business Details provided in box Nos. 17 to 24. Proceed to no. 33 </label>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <td style="width:40%">25. House/Building No. Name:<br>
                        <?= checkFieldIfExist($data,'owner_details_house_no') ?>
                    </td>
                    <td style="width:30%">26. Street:<br>
                        <?= checkFieldIfExist($data,'owner_details_Street') ?>
                    </td>
                    <td style="width:30%">27. Barangay:<br>
                        <?= checkFieldIfExist($data,'owner_details_Barangay') ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>28. City/Municipality:<br>
                        <?= checkFieldIfExist($data,'owner_details_City') ?>
                    </td>
                    <td>29. Provinc:e<br>
                        <?= checkFieldIfExist($data,'owner_details_Province') ?>
                    </td>
                    <td>30. Region:<br>
                        <?= checkFieldIfExist($data,'owner_details_Region') ?>
                    </td>
                </tr>
                <tr>
                    <td>31. Phone no.: (Area Code):<br>
                        <?= checkFieldIfExist($data,'owner_details_Region') ?>
                    </td>
                    <td>32. Mobile no.:<br>
                        <?= checkFieldIfExist($data,'owner_details_Mobile_no') ?>
                    </td>
                    <td>33. Email Address:<br>
                        <?= checkFieldIfExist($data,'owner_details_Email') ?>
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
            </tbody>
        </table>
    </div>
</div>