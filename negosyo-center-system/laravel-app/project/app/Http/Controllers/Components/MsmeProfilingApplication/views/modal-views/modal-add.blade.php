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
<input type="hidden" class="form-control" id="validationDefault01" name = "msme_id" value = "<?= $primary_id ? $primary_id : '' ?>">
<div class="" style="width:100%;min-width: 1000">





    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th rowspan="4" style="width:50%">
                    ID NO.
                    <input required type="text" name = "id_no" value = "<?= checkFieldIfExist($data,'id_no') ?>" style="width:100%">
                </th>
                <th colspan="2" class="text-center">
                    STATUS OF MSME
                </th>
            </tr>
            <tr>
                <td>EXISTING MSME (Registered) <input class="statusMsme" <?= checkFieldIfExist($data,'msme_existing_registered','checkbox') ?> type="checkbox" name = "msme_existing_registered" value = "<?= 1 ?>"></td>
                <td>NEW MSME (Registered) <input class="statusMsme" <?= checkFieldIfExist($data,'msme_existing_unregistered','checkbox') ?> type="checkbox" name = "msme_existing_unregistered" value = "<?= 1 ?>"></td>
            </tr>
            <tr>
                <td>EXISTING MSME (Unregistered) <input class="statusMsme" <?= checkFieldIfExist($data,'msme_new_registered','checkbox') ?> type="checkbox" name = "msme_new_registered" value = "<?= 1 ?>"></td>
                <td>NEW MSME (Unregistered) <input class="statusMsme" <?= checkFieldIfExist($data,'msme_new_unregistered','checkbox') ?> type="checkbox" name = "msme_new_unregistered" value = "<?= 1 ?>"></td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th>
                    BUSINESS NAME:
                    <input required type="text" style="width:100%" name = "business_name" value = "<?= checkFieldIfExist($data,'business_name') ?>">
                </th>
                <th>
                    EMAIL ADDRESS:
                    <input required type="text" style="width:100%" name = "email_address" value = "<?= checkFieldIfExist($data,'email_address') ?>">
                </th>
            </tr>
            <tr>
                <th>
                    NAME OF OWNER / PRESIDENT / CHAIRPERSON:
                    <input required type="text" style="width:100%" name = "name_owner_chairperson_president" value = "<?= checkFieldIfExist($data,'name_owner_chairperson_president') ?>">
                </th>
                <th>
                    Social Media Account/Website:
                    <input required type="text" style="width:100%" name = "social_medial_account" value = "<?= checkFieldIfExist($data,'social_medial_account') ?>">
                </th>
            </tr>
            {{-- <tr>
                <th colspan="2">
                    <div class="row">
                        <div class="col-md-2">NAME OF CONTACT PERSON:</div>
                        <div class="col-md-10"><input required type="text" style="width:100%"></div>
                    </div>
                    
                    
                </th>
            </tr> --}}
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th style="border-bottom: none !important;border-right: none !important;">NAME OF CONTACT PERSON:</th>
                <td style="border-bottom: none !important;border-left: none !important;"><input required type="text" style="width:100%" name = "name_contact_person_title" value = "<?= checkFieldIfExist($data,'name_contact_person_title') ?>"></td>
                <td style="border-bottom: none !important;"><input required type="text" style="width:100%" name = "name_contact_person_lastname" value = "<?= checkFieldIfExist($data,'name_contact_person_lastname') ?>"></td>
                <td style="border-bottom: none !important;"><input required type="text" style="width:100%" name = "name_contact_person_firstname" value = "<?= checkFieldIfExist($data,'name_contact_person_firstname') ?>"></td>
                <td style="border-bottom: none !important;"><input required type="text" style="width:100%" name = "name_contact_person_middlename" value = "<?= checkFieldIfExist($data,'name_contact_person_middlename') ?>"></td>
                <td style="border-bottom: none !important;"><input required type="text" style="width:100%" name = "name_contact_person_suffix" value = "<?= checkFieldIfExist($data,'name_contact_person_suffix') ?>"></td>
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
                <td style="border-bottom: none !important;border-left: none !important;width:16%"><input required type="text" style="width:100%" name = "business_address_bldgno" value = "<?= checkFieldIfExist($data,'business_address_bldgno') ?>"></td>
                <td style="border-bottom: none !important;width:16%"><input required type="text" style="width:100%" name = "business_address_zone" value = "<?= checkFieldIfExist($data,'business_address_zone') ?>"></td>
                <td style="border-bottom: none !important;width:16%">
                    <select name="business_address_brgy" id = "business_address_brgy" class="form-select form-select-sm" required>
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
                           if (checkFieldIfExist($data,'business_address_brgy') == $location) {
                        ?>
                            <option value="<?= $location ?>" selected><?= $location ?></option>
                        <?php }else{ ?>
                             <option value="<?= $location ?>"><?= $location ?></option>
                            <?php }
                        } ?>
                    </select>
                </td>
                <td style="border-bottom: none !important;width:16%"><input required type="text" style="width:100%" name = "business_address_municipality" value = "Tagoloan" readonly></td>
                <td style="border-bottom: none !important;width:16%"><input required type="text" style="width:100%" name = "business_address_province" value = "Misamis Oriental" readonly></td>
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
                <td>Contact Number #1<input required type="text" style="width:100%" name = "contact_details1" value = "<?= checkFieldIfExist($data,'contact_details1') ?>"></td>
                <td>Contact Number #2<input required type="text" style="width:100%" name = "contact_details2" value = "<?= checkFieldIfExist($data,'contact_details2') ?>"></td>
                <td>Contact Number #3<input required type="text" style="width:100%" name = "contact_details3" value = "<?= checkFieldIfExist($data,'contact_details3') ?>"></td>
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
                <td style="border-top: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_sale_partnership','checkbox') ?> type="checkbox" name = "form_of_ownership_sale_partnership" value = "<?= 1 ?>" id="flexCheckDefault"> Sole Proprietorship</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_partnership','checkbox') ?> type="checkbox" name = "form_of_ownership_partnership" value = "<?= 1 ?>" id="flexCheckDefault"> Partnership</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_corporation','checkbox') ?> type="checkbox" name = "form_of_ownership_corporation" value = "<?= 1 ?>" id="flexCheckDefault"> Corporation</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_coorperative','checkbox') ?> type="checkbox" name = "form_of_ownership_coorperative" value = "<?= 1 ?>" id="flexCheckDefault"> Coorperative</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_association','checkbox') ?> type="checkbox" name = "form_of_ownership_association" value = "<?= 1 ?>" id="flexCheckDefault"> Association</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_organization','checkbox') ?> type="checkbox" name = "form_of_ownership_organization" value = "<?= 1 ?>" id="flexCheckDefault"> Organization</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_foundation','checkbox') ?> type="checkbox" name = "form_of_ownership_foundation" value = "<?= 1 ?>" id="flexCheckDefault"> Foundation</td>
                <td style="border-top: none !important;border-left: none !important;"><input class= "form_of_ownership" <?= checkFieldIfExist($data,'form_of_ownership_rural_workers_org','checkbox') ?> type="checkbox" name = "form_of_ownership_rural_workers_org" value = "<?= 1 ?>" id="flexCheckDefault"> Rural Workers Org</td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="6" style="border-bottom: none !important;">MAJOR BUSINESS ACTIVITY:</th>
            </tr>
            <tr>
                <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Manufacturing','checkbox') ?> type="checkbox" name = "major_business_activity_Manufacturing" value = "<?= 1 ?>"> Manufacturing</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Processing','checkbox') ?> type="checkbox" name = "major_business_activity_Processing" value = "<?= 1 ?>"> Processing</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Agriproduction','checkbox') ?> type="checkbox" name = "major_business_activity_Agriproduction" value = "<?= 1 ?>"> Agri-production</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Wholesaling','checkbox') ?> type="checkbox" name = "major_business_activity_Wholesaling" value = "<?= 1 ?>"> Wholesaling</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Retailing','checkbox') ?> type="checkbox" name = "major_business_activity_Retailing" value = "<?= 1 ?>"> Retailing</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Consolidation','checkbox') ?> type="checkbox" name = "major_business_activity_Consolidation" value = "<?= 1 ?>"> Consolidation</td>
            </tr>
            <tr>
                <td style="border-top: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Contracting','checkbox') ?> type="checkbox" name = "major_business_activity_Contracting" value = "<?= 1 ?>"> Contracting</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Subcontracting','checkbox') ?> type="checkbox" name = "major_business_activity_Subcontracting" value = "<?= 1 ?>"> Sub-contracting</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Distributorship','checkbox') ?> type="checkbox" name = "major_business_activity_Distributorship" value = "<?= 1 ?>"> Distributorship</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Exporting','checkbox') ?> type="checkbox" name = "major_business_activity_Exporting" value = "<?= 1 ?>"> Exporting</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_Importing','checkbox') ?> type="checkbox" name = "major_business_activity_Importing" value = "<?= 1 ?>"> Importing</td>
                <td style="border-top: none !important;border-left: none !important;"><input class="major_business_activity" <?= checkFieldIfExist($data,'major_business_activity_ServiceProvider','checkbox') ?> type="checkbox" name = "major_business_activity_ServiceProvider" value = "<?= 1 ?>"> Service Provider</td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th style="border-bottom: none !important;">PRODUCT/SERVICE LINE:<input required type="text" style="width:100%" name = "product_services_line" value = "<?= checkFieldIfExist($data,'product_services_line') ?>"></th>
                <th style="border-bottom: none !important;">YEAR ESTABLISHED:<input required type="text" style="width:100%" name = "year_established" value = "<?= checkFieldIfExist($data,'year_established') ?>"></th>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="6" style="border-bottom: none !important;">INITAL CAPITALIZATION:</th>
            </tr>
            <tr>
                <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_1','checkbox') ?> type="checkbox" name = "initial_capitalization_1" value = "<?= 1 ?>"> BELOW P10,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_2','checkbox') ?> type="checkbox" name = "initial_capitalization_2" value = "<?= 1 ?>"> P10,000 - P20,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_3','checkbox') ?> type="checkbox" name = "initial_capitalization_3" value = "<?= 1 ?>"> P20,000 - P50,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_4','checkbox') ?> type="checkbox" name = "initial_capitalization_4" value = "<?= 1 ?>"> P50,000 - P100,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_5','checkbox') ?> type="checkbox" name = "initial_capitalization_5" value = "<?= 1 ?>"> P100,000 - P500,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"></td>
            </tr>
            <tr>
                <td style="border-top: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_6','checkbox') ?> type="checkbox" name = "initial_capitalization_6" value = "<?= 1 ?>"> P100,000 - P1.5M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_7','checkbox') ?> type="checkbox" name = "initial_capitalization_7" value = "<?= 1 ?>"> P1.5M - P3M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_8','checkbox') ?> type="checkbox" name = "initial_capitalization_8" value = "<?= 1 ?>"> P3M - P5M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_9','checkbox') ?> type="checkbox" name = "initial_capitalization_9" value = "<?= 1 ?>"> P5M - P10M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_10','checkbox') ?> type="checkbox" name = "initial_capitalization_10" value = "<?= 1 ?>"> P10M - P15M</td>
                <td style="border-top: none !important;border-left: none !important;"><input class="initial_capitalization" <?= checkFieldIfExist($data,'initial_capitalization_11','checkbox') ?> type="checkbox" name = "initial_capitalization_11" value = "<?= 1 ?>"> P15M - P100M</td>
            </tr>
        </tbody>
    </table>

    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="6" style="border-bottom: none !important;">ASSET CLASSIFICATION, AS OF:<input required type="text" name = "asset_classification_as_of" value = "<?= checkFieldIfExist($data,'id_no') ?>">(Please indicate year)</th>
            </tr>
            <tr>
                <td style="border-top: none !important; border-bottom: none !important; border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_1','checkbox') ?> type="checkbox" name = "asses_classification_1" value = "<?= 1 ?>"> BELOW P10,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_2','checkbox') ?> type="checkbox" name = "asses_classification_2" value = "<?= 1 ?>"> P10,000 - P20,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_3','checkbox') ?> type="checkbox" name = "asses_classification_3" value = "<?= 1 ?>"> P20,000 - P50,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_4','checkbox') ?> type="checkbox" name = "asses_classification_4" value = "<?= 1 ?>"> P50,000 - P100,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_5','checkbox') ?> type="checkbox" name = "asses_classification_5" value = "<?= 1 ?>"> P100,000 - P500,000</td>
                <td style="border-top: none !important; border-bottom: none !important; border-left: none !important;"></td>
            </tr>
            <tr>
                <td style="border-top: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_6','checkbox') ?> type="checkbox" name = "asses_classification_6" value = "<?= 1 ?>"> P100,000 - P1.5M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_7','checkbox') ?> type="checkbox" name = "asses_classification_7" value = "<?= 1 ?>"> P1.5M - P3M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_8','checkbox') ?> type="checkbox" name = "asses_classification_8" value = "<?= 1 ?>"> P3M - P5M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_9','checkbox') ?> type="checkbox" name = "asses_classification_9" value = "<?= 1 ?>"> P5M - P10M</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_10','checkbox') ?> type="checkbox" name = "asses_classification_10" value = "<?= 1 ?>"> P10M - P15M</td>
                <td style="border-top: none !important;border-left: none !important;"><input class="asses_classification" <?= checkFieldIfExist($data,'asses_classification_11','checkbox') ?> type="checkbox" name = "asses_classification_11" value = "<?= 1 ?>"> P15M - P100M</td>
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
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_male_abled" value = "<?= checkFieldIfExist($data,'full_time_male_abled') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_male_pwd" value = "<?= checkFieldIfExist($data,'full_time_male_pwd') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_male_indigenous_person" value = "<?= checkFieldIfExist($data,'full_time_male_indigenous_person') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_male_senior_citezen" value = "<?= checkFieldIfExist($data,'full_time_male_senior_citezen') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-right: none !important;" >MALE</td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "part_time_male_abled" value = "<?= checkFieldIfExist($data,'part_time_male_abled') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "part_time_male_pwd" value = "<?= checkFieldIfExist($data,'part_time_male_pwd') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "part_time_male_indigenous_person" value = "<?= checkFieldIfExist($data,'part_time_male_indigenous_person') ?>"></td>
                <td style="border-top: none !important;border-bottom: none !important;border-left: none !important;"><input required type="text" style="width:100%" name = "part_time_male_senior_citezen" value = "<?= checkFieldIfExist($data,'part_time_male_senior_citezen') ?>"></td>
            </tr>
            <tr>
                <td style="border-top: none !important;  border-right: none !important;" >FEMALE</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_female_abled" value = "<?= checkFieldIfExist($data,'full_time_female_abled') ?>"></td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_female_pwd" value = "<?= checkFieldIfExist($data,'full_time_female_pwd') ?>"></td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_female_indigenous_person" value = "<?= checkFieldIfExist($data,'full_time_female_indigenous_person') ?>"></td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "full_time_female_senior_citezen" value = "<?= checkFieldIfExist($data,'full_time_female_senior_citezen') ?>"></td>
                <td style="border-top: none !important;border-right: none !important;" >FEMALE</td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "part_time_female_abled" value = "<?= checkFieldIfExist($data,'part_time_female_abled') ?>"></td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "part_time_female_pwd" value = "<?= checkFieldIfExist($data,'part_time_female_pwd') ?>"></td>
                <td style="border-top: none !important;border-left: none !important;border-right: none !important;"><input required type="text" style="width:100%" name = "part_time_female_indigenous_person" value = "<?= checkFieldIfExist($data,'part_time_female_indigenous_person') ?>"></td>
                <td style="border-top: none !important;border-left: none !important;"><input required type="text" style="width:100%" name = "part_time_female_senior_citezen" value = "<?= checkFieldIfExist($data,'part_time_female_senior_citezen') ?>"></td>
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
                <td><input required type="text" style="width:100%" name = "physical_store_stall_food" value = "<?= checkFieldIfExist($data,'physical_store_stall_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "physical_store_stall_non_food" value = "<?= checkFieldIfExist($data,'physical_store_stall_non_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "physical_store_stall_food_and_non_food" value = "<?= checkFieldIfExist($data,'physical_store_stall_food_and_non_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "physical_store_stall_area_owned" value = "<?= checkFieldIfExist($data,'physical_store_stall_area_owned') ?>"></td>
                <td><input required type="text" style="width:100%" name = "physical_store_stall_area_rented" value = "<?= checkFieldIfExist($data,'physical_store_stall_area_rented') ?>"></td>
                <td><input required type="text" style="width:100%" name = "physical_store_stall_govt_supervised" value = "<?= checkFieldIfExist($data,'physical_store_stall_govt_supervised') ?>"></td>
            </tr>
            <tr>
                <th>ONLINE STORE</th>
                <td><input required type="text" style="width:100%" name = "online_store_food" value = "<?= checkFieldIfExist($data,'online_store_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "online_store_non_food" value = "<?= checkFieldIfExist($data,'online_store_non_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "online_store_food_and_non_food" value = "<?= checkFieldIfExist($data,'online_store_food_and_non_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "online_store_area_owned" value = "<?= checkFieldIfExist($data,'online_store_area_owned') ?>"></td>
                <td><input required type="text" style="width:100%" name = "online_store_area_rented" value = "<?= checkFieldIfExist($data,'online_store_area_rented') ?>"></td>
                <td><input required type="text" style="width:100%" name = "online_store_govt_supervised" value = "<?= checkFieldIfExist($data,'online_store_govt_supervised') ?>"></td>
            </tr>
            <tr>
                <th>AMBULANT VENDING</th>
                <td><input required type="text" style="width:100%" name = "ambulant_vending_food" value = "<?= checkFieldIfExist($data,'ambulant_vending_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "ambulant_vending_non_food" value = "<?= checkFieldIfExist($data,'ambulant_vending_non_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "ambulant_vending_food_and_non_food" value = "<?= checkFieldIfExist($data,'ambulant_vending_food_and_non_food') ?>"></td>
                <td><input required type="text" style="width:100%" name = "ambulant_vending_area_owned" value = "<?= checkFieldIfExist($data,'ambulant_vending_area_owned') ?>"></td>
                <td><input required type="text" style="width:100%" name = "ambulant_vending_area_rented" value = "<?= checkFieldIfExist($data,'ambulant_vending_area_rented') ?>"></td>
                <td><input required type="text" style="width:100%" name = "ambulant_vending_govt_supervised" value = "<?= checkFieldIfExist($data,'ambulant_vending_govt_supervised') ?>"></td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th colspan="3" class="text-center">CATEGORY OF ENTREPRENEUR (Please Check)</th>
            </tr>
            <tr>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_1','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_1" value = "<?= 1 ?>"> Housewife/Husband</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_2','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_2" value = "<?= 1 ?>"> Professional</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_3','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_3" value = "<?= 1 ?>"> Self-employed</th>
            </tr>
            <tr>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_4','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_4" value = "<?= 1 ?>"> Student</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_5','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_5" value = "<?= 1 ?>"> Private Employee</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_6','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_6" value = "<?= 1 ?>"> Unemployeed</th>
            </tr>
            <tr>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_7','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_7" value = "<?= 1 ?>"> Out of School Youth</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_8','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_8" value = "<?= 1 ?>"> Government Employee</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_9','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_9" value = "<?= 1 ?>"> OFW</th>
            </tr>
            <tr>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_10','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_10" value = "<?= 1 ?>"> Military/Police</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_11','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_11" value = "<?= 1 ?>"> Retiree</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_12','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_12" value = "<?= 1 ?>"> Drug Surrenderee</th>
            </tr>
            <tr>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_13','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_13" value = "<?= 1 ?>"> Ex-Convict</th>
                <th><input class="category_of_entrepreneur" <?= checkFieldIfExist($data,'category_of_entrepreneur_14','checkbox') ?> type="checkbox" name = "category_of_entrepreneur_14" value = "<?= 1 ?>"> Other</th>
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
                        <div class="col-12"><input class="sex_status" <?= checkFieldIfExist($data,'sex_status_male','checkbox') ?> type="checkbox" name = "sex_status_male" value = "<?= 1 ?>"> Male</div>
                        <div class="col-12"><input class="sex_status" <?= checkFieldIfExist($data,'sex_status_female','checkbox') ?> type="checkbox" name = "sex_status_female" value = "<?= 1 ?>"> Female</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6"><input class="civil_status" <?= checkFieldIfExist($data,'civil_status_Single','checkbox') ?> type="checkbox" name = "civil_status_Single" value = "<?= 1 ?>"> Single</div>
                        <div class="col-6"><input class="civil_status" <?= checkFieldIfExist($data,'civil_status_Married','checkbox') ?> type="checkbox" name = "civil_status_Married" value = "<?= 1 ?>"> Married</div>
                        <div class="col-6"><input class="civil_status" <?= checkFieldIfExist($data,'civil_status_Widowed','checkbox') ?> type="checkbox" name = "civil_status_Widowed" value = "<?= 1 ?>"> Widowed</div>
                        <div class="col-6"><input class="civil_status" <?= checkFieldIfExist($data,'civil_status_LegallySeparated','checkbox') ?> type="checkbox" name = "civil_status_LegallySeparated" value = "<?= 1 ?>"> Legally Separated</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6"><input class="social_classification" <?= checkFieldIfExist($data,'civil_status_Abled','checkbox') ?> type="checkbox" name = "civil_status_Abled" value = "<?= 1 ?>"> Abled</div>
                        <div class="col-6"><input class="social_classification" <?= checkFieldIfExist($data,'civil_status_DiffentlyAbled','checkbox') ?> type="checkbox" name = "civil_status_DiffentlyAbled" value = "<?= 1 ?>"> Diffently-Abled (PWD)</div>
                        <div class="col-6"><input class="social_classification" <?= checkFieldIfExist($data,'civil_status_IP','checkbox') ?> type="checkbox" name = "civil_status_IP" value = "<?= 1 ?>"> IP</div>
                        <div class="col-6"><input class="social_classification" <?= checkFieldIfExist($data,'civil_status_SeniorCitizen','checkbox') ?> type="checkbox" name = "civil_status_SeniorCitizen" value = "<?= 1 ?>"> Senior Citizen</div>
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
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_no1" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_no1') ?>"></td>
                <td><input style="width:100%" required type="date" name = "negosyo_sponsored_date1" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_date1') ?>"></td>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_title1" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_title1') ?>"></td>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_no12" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_no12') ?>"></td>
                <td><input style="width:100%" required type="date" name = "negosyo_sponsored_date12" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_date12') ?>"></td>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_title12" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_title12') ?>"></td>
            </tr>
            <tr>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_no11" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_no11') ?>"></td>
                <td><input style="width:100%" required type="date" name = "negosyo_sponsored_date11" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_date11') ?>"></td>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_title11" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_title11') ?>"></td>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_no122" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_no122') ?>"></td>
                <td><input style="width:100%" required type="date" name = "negosyo_sponsored_date122" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_date122') ?>"></td>
                <td><input style="width:100%" required type="text" name = "negosyo_sponsored_title122" value = "<?= checkFieldIfExist($data,'negosyo_sponsored_title122') ?>"></td>
            </tr>
        </tbody>
    </table>
    <table class="table-custom inline-table" style="width:100%">
        <tbody>
            <tr>
                <th>Are you willing to attend future DTI/Negosyo Center's Business Learning Session? If YES, what do you prefer? 
                    <input class="learning_session" <?= checkFieldIfExist($data,'negosyo_sponsored_learnings_physical','checkbox') ?> type="checkbox" name = "negosyo_sponsored_learnings_physical" value = "<?= 1 ?>"> PHYSICAL 
                    <input class="learning_session" <?= checkFieldIfExist($data,'negosyo_sponsored_learnings_virtual','checkbox') ?> type="checkbox" name = "negosyo_sponsored_learnings_virtual" value = "<?= 1 ?>"> VIRTUAL
                    <input class="learning_session" <?= checkFieldIfExist($data,'negosyo_sponsored_learnings_both','checkbox') ?> type="checkbox" name = "negosyo_sponsored_learnings_both" value = "<?= 1 ?>"> BOTH</th>
            </tr>
            <tr>
                <th>Are you a beneficiary of any govenrnment aids/grants? If YES, please state. (Ex. 4Ps) <input type="text" name = "govt_beneficiary" value = "<?= checkFieldIfExist($data,'govt_beneficiary') ?>" style="width:500px"></th>
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