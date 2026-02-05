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
    function checkFieldIfExist($data,$field,$type = 'text'){
        if ($data) {
            if (isset($data[$field])) {
                if ($type == 'checkbox') {
                    if ($data[$field] == 1) {
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
                    return '&nbsp;';
                }
            }
        }
        return '&nbsp;';
    }
    ?>
    <input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
    <input type="hidden" class="form-control" id="validationDefault01" name = "msme_id" value = "<?= $primary_id ? $primary_id : '' ?>">
    <div class="" style="width:100%;min-width: 1000">
        <div class="row">
            <div class="col-12"><p style="text-align:center"><img width="100%" src="<?= env('APP_URL') ?>public\main\image\print-logo-msme (2).png" alt=""></p></div>
        </div>
        CLIENT/CONTACT PERSON INFORMATION
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th rowspan="4" >
                        ID NO.
                        <?= checkFieldIfExist($data,'id_no') ?>
                    </th>
                    <th colspan="2" class="text-center" style="width:70%">
                        STATUS OF MSME
                    </th>
                </tr>
                <tr>
                    <td>EXISTING MSME (Registered) <?= checkFieldIfExist($data,'msme_existing_registered','checkbox') ?></td>
                    <td>NEW MSME (Registered) <?= checkFieldIfExist($data,'msme_existing_unregistered','checkbox') ?></td>
                </tr>
                <tr>
                    <td>EXISTING MSME (Unregistered) <?= checkFieldIfExist($data,'msme_new_registered','checkbox') ?></td>
                    <td>NEW MSME (Unregistered) <?= checkFieldIfExist($data,'msme_new_unregistered','checkbox') ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th>
                        BUSINESS NAME:
                        <?= checkFieldIfExist($data,'business_name') ?>
                    </th>
                    <th>
                        EMAIL ADDRESS:
                        <?= checkFieldIfExist($data,'email_address') ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        NAME OF OWNER / PRESIDENT / CHAIRPERSON:
                        <?= checkFieldIfExist($data,'name_owner_chairperson_president') ?>
                    </th>
                    <th>
                        Social Media Account/Website:
                        <?= checkFieldIfExist($data,'social_medial_account') ?>
                    </th>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th style="border-bottom: none !important;border-right: none !important;">NAME OF CONTACT PERSON:</th>
                    <td style="border-bottom: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'name_contact_person_title') ?></td>
                    <td style="border-bottom: none !important;"><?= checkFieldIfExist($data,'name_contact_person_lastname') ?></td>
                    <td style="border-bottom: none !important;"><?= checkFieldIfExist($data,'name_contact_person_firstname') ?></td>
                    <td style="border-bottom: none !important;"><?= checkFieldIfExist($data,'name_contact_person_middlename') ?></td>
                    <td style="border-bottom: none !important;"><?= checkFieldIfExist($data,'name_contact_person_suffix') ?></td>
                </tr>
                <tr >
                    <td style="border-right: none !important;"></td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Title/Prefix</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Last Name</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">First Name</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Middle Name</td>
                    <td style="width:5%;border-left: none !important;" class="text-center">Suffix</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th style="border-bottom: none !important;border-right: none !important;width:20%">BUSINESS ADDRESS:</th>
                    <td style="border-bottom: none !important;border-left: none !important;width:16%" class="text-center"><?= checkFieldIfExist($data,'business_address_bldgno') ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= checkFieldIfExist($data,'business_address_zone') ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center">
                        <?= checkFieldIfExist($data,'business_address_brgy') ?>
                    </td>
                    <td style="border-bottom: none !important;width:16%" class="text-center">Tagoloan</td>
                    <td style="border-bottom: none !important;width:16%" class="text-center">Misamis Oriental</td>
                </tr>
                <tr >
                    <td style="border-right: none !important;"></td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">No./Bldg.</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Zone</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Barangay</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Municipality</td>
                    <td style="border-left: none !important;" class="text-center">Province</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th style="border-bottom: none !important;border-right: none !important;width:20%">HOME ADDRESS:</th>
                    <td style="border-bottom: none !important;border-left: none !important;width:16%" class="text-center"><?= $user_details_session->house_no ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= $user_details_session->street ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= $user_details_session->barangay ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= 'Tagoloan' ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= 'Misamis Oriental' ?></td>
                </tr>
                <tr >
                    <td style="border-right: none !important;"></td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">No./Bldg.</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Zone</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Barangay</td>
                    <td style="border-left: none !important;border-right: none !important;" class="text-center">Municipality</td>
                    <td style="border-left: none !important;" class="text-center">Province</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="3">CONTACT DETAILS</th>
                </tr>
                <tr>
                    <td>Contact Number #1 <br> <?= checkFieldIfExist($data,'contact_details1') ?></td>
                    <td>Contact Number #2 <br> <?= checkFieldIfExist($data,'contact_details2') ?></td>
                    <td>Contact Number #3 <br> <?= checkFieldIfExist($data,'contact_details3') ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="9" style="border-bottom: none !important;">FORM OF OWNERSHIP:

                    </th>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_partnership','checkbox') ?> Sole Proprietorship</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_corporation','checkbox') ?> Partnership</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_coorperative','checkbox') ?> Corporation</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_association','checkbox') ?> Coorperative</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_organization','checkbox') ?> Association</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_foundation','checkbox') ?> Organization</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_foundation','checkbox') ?> Foundation</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'form_of_ownership_rural_workers_org','checkbox') ?> Rural Workers Org</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6" style="border-bottom: none !important;">MAJOR BUSINESS ACTIVITY:</th>
                </tr>
                <tr>
                    <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Manufacturing','checkbox') ?> Manufacturing</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Processing','checkbox') ?> Processing</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Agriproduction','checkbox') ?> Agri-production</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Wholesaling','checkbox') ?> Wholesaling</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Retailing','checkbox') ?> Retailing</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Consolidation','checkbox') ?> Consolidation</td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Contracting','checkbox') ?> Contracting</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Subcontracting','checkbox') ?> Sub-contracting</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Distributorship','checkbox') ?> Distributorship</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Exporting','checkbox') ?> Exporting</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Importing','checkbox') ?> Importing</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'major_business_activity_ServiceProvider','checkbox') ?> Service Provider</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th style="border-bottom: none !important;">PRODUCT/SERVICE LINE:<?= checkFieldIfExist($data,'product_services_line') ?></th>
                    <th style="border-bottom: none !important;">YEAR ESTABLISHED:<?= checkFieldIfExist($data,'year_established') ?></th>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6" style="border-bottom: none !important;">INITAL CAPITALIZATION:</th>
                </tr>
                <tr>
                    <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_1','checkbox') ?> BELOW P10,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_2','checkbox') ?> P10,000 - P20,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_3','checkbox') ?> P20,000 - P50,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_4','checkbox') ?> P50,000 - P100,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_5','checkbox') ?> P100,000 - P500,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"></td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_6','checkbox') ?> P100,000 - P1.5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_7','checkbox') ?> P1.5M - P3M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_8','checkbox') ?> P3M - P5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_9','checkbox') ?> P5M - P10M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_10','checkbox') ?> P10M - P15M</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'initial_capitalization_11','checkbox') ?> P15M - P100M</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6" style="border-bottom: none !important;">ASSET CLASSIFICATION, AS OF:<input required type="text" name = "asset_classification_as_of" value = "<?= checkFieldIfExist($data,'id_no') ?>">(Please indicate year)</th>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_1','checkbox') ?> BELOW P10,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_2','checkbox') ?> 10,000 - P20,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_3','checkbox') ?> P20,000 - P50,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_4','checkbox') ?>  P50,000 - P100,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_5','checkbox') ?>  P100,000 - P500,000</td>
                    <td style="border-top: none !important;border-left: none !important;"> </td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_6','checkbox') ?>  P100,000 - P1.5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_7','checkbox') ?> P1.5M - P3M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_8','checkbox') ?> P3M - P5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_9','checkbox') ?>   P5M - P10M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asses_classification_10','checkbox') ?>  P10M - P15M</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'asses_classification_11','checkbox') ?> P15M - P100M</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="5" style="border-bottom: none !important;">NO. OF EMPLOYEES AS OF:<input required type="text" name = "no_employees_as_of" value = "<?= checkFieldIfExist($data,'no_employees_as_of') ?>">(Please indicate year)</th>
                    <th colspan="5" style="border-bottom: none !important;"></th>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-bottom: none !important;  border-right: none !important;width:10%" >FULL-TIME</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">ABLED</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">PWD</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">INDIGENOUS PERSON</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">SENIOR CITEZEN</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-right: none !important;width:10%" >PART-TIME</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">ABLED</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">PWD</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;width:10%" class="text-center">INDIGENOUS PERSON</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;width:10%" class="text-center">SENIOR CITIZEN</td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-bottom: none !important;  border-right: none !important;" >MALE</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_male_abled') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_male_pwd') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_male_indigenous_person') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_male_senior_citezen') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-right: none !important;" >MALE</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_male_abled') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_male_pwd') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_male_indigenous_person') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_male_senior_citezen') ?></td>
                </tr>
                <tr>
                    <td style="border-top: none !important;  border-right: none !important;" >FEMALE</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_female_abled') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_female_pwd') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_female_indigenous_person') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_female_senior_citezen') ?></td>
                    <td style="border-top: none !important;border-right: none !important;" >FEMALE</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_female_abled') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_female_pwd') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_female_indigenous_person') ?></td>
                    <td style="border-top: none !important;border-left: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_male_senior_citezen') ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="7" class="text-center">MICRO ENTERPRISES (Please Check)</th>
                </tr>
                <tr>
                    <th style="width:20%">STORE</th>
                    <th style="width:10%">FOOD</th>
                    <th style="width:10%">NON-FOOD</th>
                    <th style="width:10%">FOOD & NON-FOOD</th>
                    <th style="width:20%">AREA OWNED (Indicate area in sqm)</th>
                    <th style="width:20%">AREA RENTED (Indicate area in sqm)</th>
                    <th style="width:20%">GOVERNMENT SUPERVISED (Indicate stall no. & area in sqm)</th>
                </tr>
                <tr>
                    <th>PHYSICAL STORE/STALLS</th>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_stall_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_stall_non_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_stall_food_and_non_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_stall_area_owned') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_stall_area_rented') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_stall_govt_supervised') ?></td>
                </tr>
                <tr>
                    <th>ONLINE STORE</th>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_non_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_food_and_non_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_area_owned') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_area_rented') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_govt_supervised') ?></td>
                </tr>
                <tr>
                    <th>AMBULANT VENDING</th>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_non_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_food_and_non_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_area_owned') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_area_rented') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_govt_supervised') ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="3" class="text-center">CATEGORY OF ENTREPRENEUR (Please Check)</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_1','checkbox') ?>Housewife/Husband</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_2','checkbox') ?>Professional</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_3','checkbox') ?>Self-employed</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_4','checkbox') ?>Student</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_5','checkbox') ?>Private Employee</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_6','checkbox') ?>Unemployeed</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_7','checkbox') ?>Out of School Youth</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_8','checkbox') ?>Government Employee</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_9','checkbox') ?>OFW</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_10','checkbox') ?>Military/Police</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_11','checkbox') ?>Retiree</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_12','checkbox') ?>Drug Surrenderee</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_13','checkbox') ?>Ex-Convict</th>
                    <th><?= checkFieldIfExist($data,'category_of_entrepreneur_14','checkbox') ?>Other</th>
                    <th></th>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">

            <tbody>
                <tr>
                    <th>SEX</th>
                    <th>CIVIL STATUS</th>
                    <th>SOCIAL CLASSIFICATION</th>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-12"><?= checkFieldIfExist($data,'sex_status_male','checkbox') ?> Male</div>
                            <div class="col-12"><?= checkFieldIfExist($data,'sex_status_female','checkbox') ?> Female</div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_Single','checkbox') ?>Single</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_Married','checkbox') ?>Married</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_Widowed','checkbox') ?>Widowed</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_LegallySeparated','checkbox') ?>Legally Separated</div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_Abled','checkbox') ?> Abled</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_DiffentlyAbled','checkbox') ?>Diffently-Abled (PWD)</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_IP','checkbox') ?>IP</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'civil_status_SeniorCitizen','checkbox') ?>Senior Citizen</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6">DTI/Negosyo Center-Sponsored Business Learning Session Attended: (Please use next page if lacking space)</th>
                </tr>
                <tr>
                    <td>No.</td>
                    <td>Date</td>
                    <td>Title of Seminar</td>
                    <td>No.</td>
                    <td>Date</td>
                    <td>Title of Seminar</td>
                </tr>
                <tr>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_no1') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_date1') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_title1') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_no12') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_date12') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_title12') ?></td>
                </tr>
                <tr>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_no11') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_date11') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_title11') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_no122') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_date122') ?></td>
                    <td><?= checkFieldIfExist($data,'negosyo_sponsored_title122') ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th>Are you willing to attend future DTI/Negosyo Center's Business Learning Session? If YES, what do you prefer? 
                        <?= checkFieldIfExist($data,'negosyo_sponsored_learnings_physical','checkbox') ?> PHYSICAL 
                        <?= checkFieldIfExist($data,'negosyo_sponsored_learnings_virtual','checkbox') ?> VIRTUAL
                        <?= checkFieldIfExist($data,'negosyo_sponsored_learnings_both','checkbox') ?> BOTH</th>
                </tr>
                <tr>
                    <th>Are you a beneficiary of any govenrnment aids/grants? If YES, please state. (Ex. 4Ps): <?= checkFieldIfExist($data,'govt_beneficiary') ?></th>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr style="height:50px">
                    <td style="border-top: none !important;border-bottom: none !important;border-right: none !important;" class="text-center"></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;;border-right: none !important;" class="text-center"></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;" class="text-center"></td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"class="text-center"></td>
                    <td style="width:300px;border-left: none !important;border-right: none !important;" class="text-center">Signature</td>
                    <td style="border-top: none !important;border-left: none !important;"class="text-center"></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="2" class="text-center">TO BE ACCOMPLISHED BY NC TAGOLOAN</th>
                </tr>
                <tr>
                    <th>UNIQUE REFERENCE NO.</th>
                    <th>INDUSTRY CLUSTER:</th>
                </tr>
                <tr>
                    <th>REGISTERED BUSINESS NAME:</th>
                    <th>BUSINESS NAME REGISTRATION NO.:</th>
                </tr>
                <tr>
                    <th>BUSINESS PERMIT LGU REGISTRATION NO.:</th>
                    <th>DATE REGISTERED:</th>
                </tr>
                <tr>
                    <th>PSIC:</th>
                    <th></th>
                </tr>
                <tr style="height:50px">
                    <th colspan="2">REMARKS:</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>