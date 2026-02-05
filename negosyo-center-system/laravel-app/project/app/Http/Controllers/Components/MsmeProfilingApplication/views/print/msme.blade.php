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
    // function checkFieldIfExist($data,$field,$type = 'text'){
    //     if ($data) {
    //         if (isset($data[$field])) {
    //             if ($type == 'checkbox') {
    //                 if ($data[$field] == 1) {
    //                     return '<span style="font-size:20px !important">🗹</span>';
    //                 }else{
    //                     return '<span style="font-size:20px !important">◻</span>';
    //                 }
    //             }else{
    //                 return $data[$field];
    //             }
    //         }else{
    //             if ($type == 'checkbox') {
    //                 return '<span style="color:black;font-size:20px !important">◻</span>';
    //             }else{
    //                 return '&nbsp;';
    //             }
    //         }
    //     }
    //     return '&nbsp;';
    // }
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
                    return '&nbsp;';
                }
            }
        }
        return '&nbsp;';
    }
    ?>

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
                        ID-2024-<?= $data['b_id'] ?>

                    </th>
                    <th colspan="2" class="text-center" style="width:70%">
                        STATUS OF MSME
                    </th>
                </tr>
                <tr>
                    <td>EXISTING MSME (Registered) <?= checkFieldIfExist($data,'msme_existing_registered','checkbox') ?></td>
                    <td>NEW MSME (Registered) <?= '<span style="font-size:20px !important">🗹</span>' ?></td>
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
                        <?= checkFieldIfExist($data,'business_approved') ?>
                    </th>
                    <th>
                        EMAIL ADDRESS:
                        <?= checkFieldIfExist($data,'email') ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        NAME OF OWNER / PRESIDENT / CHAIRPERSON:
                        <?= checkFieldIfExist($data,'full_name') ?>
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
                    <td style="border-bottom: none !important;border-left: none !important;text-align:center"><?= 'Business Owner' ?></td>
                    <td style="border-bottom: none !important;text-align:center"><?= checkFieldIfExist($data,'last_name') ?></td>
                    <td style="border-bottom: none !important;text-align:center"><?= checkFieldIfExist($data,'first_name') ?></td>
                    <td style="border-bottom: none !important;text-align:center"><?= checkFieldIfExist($data,'middle_name') ?></td>
                    <td style="border-bottom: none !important;text-align:center"><?= checkFieldIfExist($data,'suffix') ?></td>
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
                    <td style="border-bottom: none !important;border-left: none !important;width:16%" class="text-center"><?= checkFieldIfExist($data,'business_details_house_no') ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= checkFieldIfExist($data,'business_details_street') ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center">
                        <?= checkFieldIfExist($data,'business_details_brgy') ?>
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
                    <td style="border-bottom: none !important;border-left: none !important;width:16%" class="text-center"><?= checkFieldIfExist($data,'owner_details_house_no') ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?=checkFieldIfExist($data,'owner_details_street') ?></td>
                    <td style="border-bottom: none !important;width:16%" class="text-center"><?= checkFieldIfExist($data,'owner_details_brgy') ?></td>
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
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Sole Proprietorship') ?> Sole Proprietorship</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Partnership') ?> Partnership</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Corporation') ?> Corporation</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Coorperative') ?> Coorperative</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Association') ?> Association</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Organization') ?> Organization</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Foundation') ?> Foundation</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'form_ownership','checkbox','Rural Workers Org') ?> Rural Workers Org</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6" style="border-bottom: none !important;">MAJOR BUSINESS ACTIVITY:</th>
                </tr>
                <tr>
                    <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><?= checkFieldIfExist($data,'majority_business_activity','checkbox','Manufacturing') ?> Manufacturing</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'majority_business_activity','checkbox','Processing') ?> Processing</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'majority_business_activity','checkbox','Agri-production') ?> Agri-production</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'majority_business_activity','checkbox','Wholesaling') ?> Wholesaling</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'majority_business_activity','checkbox','Retailing') ?> Retailing</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"><?= checkFieldIfExist($data,'majority_business_activity','checkbox','Consolidation') ?> Consolidation</td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Contracting','checkbox','Contracting') ?> Contracting</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Subcontracting','checkbox','Sub-contracting') ?> Sub-contracting</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Distributorship','checkbox','Distributorship') ?> Distributorship</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Exporting','checkbox','Exporting') ?> Exporting</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'major_business_activity_Importing','checkbox','Importing') ?> Importing</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'major_business_activity_ServiceProvider','checkbox','Service Provider') ?> Service Provider</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th style="border-bottom: none !important;">PRODUCT/SERVICE LINE:<?= checkFieldIfExist($data,'product_service_line') ?></th>
                    <th style="border-bottom: none !important;">YEAR ESTABLISHED:<?= checkFieldIfExist($data,'year_established') ?></th>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6" style="border-bottom: none !important;">INITAL CAPITALIZATION:</th>
                </tr>
                <?php 
                      $option2 = [
                        "BELOW P10,000",
                        "P10,000 - P20,000",
                        "P20,000 - P50,000",
                        "P50,000 - P100,000",
                        "P100,000 - P500,000",
                        "P100,000 - P1.5M",
                        "P1.5M - P3M",
                        "P3M - P5M",
                        "P5M - P10M",
                        "P10M - P15M",
                        "P15M - P100M",
                    ];
                ?>
                <tr>
                    <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[0]) ?> BELOW P10,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[1]) ?> P10,000 - P20,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[2]) ?> P20,000 - P50,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[3]) ?> P50,000 - P100,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[4]) ?> P100,000 - P500,000</td>
                    <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"></td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[5]) ?> P100,000 - P1.5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[6]) ?> P1.5M - P3M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[7]) ?> P3M - P5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[8]) ?> P5M - P10M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[9]) ?> P10M - P15M</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'initial_capitalization','checkbox',$option2[10]) ?> P15M - P100M</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="6" style="border-bottom: none !important;">ASSET CLASSIFICATION, AS OF:<?= checkFieldIfExist($data,'as_of_asset_classification') ?> (Please indicate year)</th>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[0]) ?> BELOW P10,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[1]) ?> 10,000 - P20,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[2]) ?> P20,000 - P50,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[3]) ?>  P50,000 - P100,000</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[4]) ?>  P100,000 - P500,000</td>
                    <td style="border-top: none !important;border-left: none !important;"> </td>
                </tr>
                <tr>
                    <td style="border-top: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[5]) ?>  P100,000 - P1.5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[6]) ?> P1.5M - P3M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[7]) ?> P3M - P5M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[8]) ?>   P5M - P10M</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[9]) ?>  P10M - P15M</td>
                    <td style="border-top: none !important;border-left: none !important;"><?= checkFieldIfExist($data,'asset_classification','checkbox',$option2[10]) ?> P15M - P100M</td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="5" style="border-bottom: none !important;">NO. OF EMPLOYEES AS OF:<?= checkFieldIfExist($data,'no_employees') ?> (Please indicate year)</th>
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
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_male_abled') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_male_pwd') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_male_ip') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_male_sr') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-right: none !important;" >MALE</td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_male_abled') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_male_pwd') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_male_ip') ?></td>
                    <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_male_sr') ?></td>
                </tr>
                <tr>
                    <td style="border-top: none !important;  border-right: none !important;" >FEMALE</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_female_abled') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_female_pwd') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_female_ip') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'full_time_no_employees_female_sr') ?></td>
                    <td style="border-top: none !important;border-right: none !important;" >FEMALE</td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_female_abled') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_female_pwd') ?></td>
                    <td style="border-top: none !important;border-left: none !important;border-right: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_female_ip') ?></td>
                    <td style="border-top: none !important;border-left: none !important; text-decoration:underline" class="text-center"><?= checkFieldIfExist($data,'part_time_no_employees_male_sr') ?></td>
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
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_nonfood') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_food_nonfood') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_area_owner') ?> - <?=checkFieldIfExist($data,'physical_store_area_owner_indicate')?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_area_rented') ?> - <?=checkFieldIfExist($data,'physical_store_area_rented_indicate')?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'physical_store_govn_supervised') ?> - <?=checkFieldIfExist($data,'physical_store_govn_supervised_indicate')?></td>
                </tr>
                <tr>
                    <th>ONLINE STORE</th>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_nonfood') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_food_nonfood') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_area_owner') ?> - <?=checkFieldIfExist($data,'online_store_area_owner_indicate')?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_area_rented') ?> - <?=checkFieldIfExist($data,'online_store_area_rented_indicate')?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'online_store_govn_supervised') ?> - <?=checkFieldIfExist($data,'online_store_govn_supervised_indicate')?></td>
                </tr>
                <tr>
                    <th>AMBULANT VENDING</th>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_food') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_nonfood') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_food_nonfood') ?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_area_owner') ?> - <?=checkFieldIfExist($data,'ambulant_vending_area_owner_indicate')?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_area_rented') ?> - <?=checkFieldIfExist($data,'ambulant_vending_area_rented_indicate')?></td>
                    <td class="text-center"><?= checkFieldIfExist($data,'ambulant_vending_govn_supervised') ?> - <?=checkFieldIfExist($data,'ambulant_vending_govn_supervised_indicate')?></td>
                </tr>
            </tbody>
        </table>
        <table class="table-custom inline-table" style="width:100%">
            <tbody>
                <tr>
                    <th colspan="3" class="text-center">CATEGORY OF ENTREPRENEUR (Please Check)</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Housewife/Husband') ?>Housewife/Husband</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Professional') ?>Professional</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Self-employed') ?>Self-employed</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Student') ?>Student</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Private Employee') ?>Private Employee</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Unemployed') ?>Unemployeed</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Out of School Youth') ?>Out of School Youth</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Government Employe') ?>Government Employee</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','OFW') ?>OFW</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Military/Police') ?>Military/Police</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Retiree') ?>Retiree</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Drug Surrenderee') ?>Drug Surrenderee</th>
                </tr>
                <tr>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Ex-Convict') ?>Ex-Convict</th>
                    <th><?= checkFieldIfExist($data,'category_entrepreneur','checkbox','Other') ?>Other</th>
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
                            <div class="col-12"><?= $user_details_session->gender == 'Male' ?  '🗹' : '◻' ?> Male</div>
                            <div class="col-12"><?= $user_details_session->gender == 'Female' ?  '🗹' : '◻' ?> Female</div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-6"><?= $user_details_session->civil_status == 'Single' ?  '🗹' : '◻' ?> Single</div>
                            <div class="col-6"> <?= $user_details_session->civil_status == 'Married' ?  '🗹' : '◻' ?> Married</div>
                            <div class="col-6"><?= $user_details_session->civil_status == 'Widowed' ?  '🗹' : '◻' ?> Widowed</div>
                            <div class="col-6"><?= $user_details_session->civil_status == 'Legally Separated' ?  '🗹' : '◻' ?> Legally Separated</div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-6"><?= checkFieldIfExist($data,'social_classification','checkbox','Abled') ?> Abled</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'social_classification','checkbox','Diffently-Abled (PWD') ?>Diffently-Abled (PWD)</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'social_classification','checkbox','IP') ?>IP</div>
                            <div class="col-6"><?= checkFieldIfExist($data,'social_classification','checkbox','Senior Citizen') ?>Senior Citizen</div>
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
        {{-- <table class="table-custom inline-table" style="width:100%">
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
        </table> --}}
    </div>
</div>