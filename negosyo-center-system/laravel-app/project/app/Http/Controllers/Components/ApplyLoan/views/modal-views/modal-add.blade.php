<style>
    /* Hide the original file input */
    .specific-file-input {
        display: none;
    }
 
</style>
<?php 
$file_num1 = 1;
$file_num2 = 2;
$file_num3 = 3;
$file_num4 = 4;
$file_num5 = 5;
$file_num6 = 6;
$required = $data ? '' : 'required';
$view_class = $action == 'Add New' ? 'd-none' : '';
$status = $data ? $data->status : 'PENDING';
$remarks = $data ? $data->remarks : '';
$reason_declined = $data ? $data->reason_declined : '';

$attachement = $data ? json_decode($data->attachments,true) : false;
$attachement1 = $attachement ? attachment($attachement,1) : 'Required';
$attachement2 = $attachement ? attachment($attachement,2) : 'Required';
$attachement3 = $attachement ? attachment($attachement,3) : 'Required';
$attachement4 = $attachement ? attachment($attachement,4) : 'Required';
$attachement5 = $attachement ? attachment($attachement,5) : 'Required';
$attachement6 = $attachement ? attachment($attachement,6) : 'Required';



function attachment($data,$num,$field='file'){
    if ($data) {
       return $data['attactment'.$num][$field];
    }
    return '';
}

?>
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "loan_id" value = "<?= $data ? $data->loan_id : '' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "folder" value = "<?= $data ? attachment($attachement,1,'folder') : '' ?>">

<div class="row">

    <div class="col-md-12 <?= $view_class ?>">
        <label for="validationCustom01" class="form-label">Status</label>
        <input type="text" value="<?= $status ?>" name = "status" class="form-control" id="validationCustom01" readonly>
    </div>

    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Remarks</label>
        <input type="text" value="<?= $remarks ?>" name = "remarks" class="form-control" id="validationCustom01" required>
    </div>
    <div class="col-md-12 <?= $status == 'DECLINED' ? '' : 'd-none' ?> ">
        <label for="validationCustom01" class="form-label">Reason For Declined</label>
        <textarea class="form-control" cols="30" rows="3"><?= $reason_declined ?></textarea>
    </div>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Attachment (<i>Requirements</i>)</label>


        <div class="mb-3 row">

            <label for="inputPassword" class="col-4 col-form-label">VALID IN GOVERNMENT ISSUED</label>
            <div class="col-8">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name = "attachment_filename<?=$file_num1?>" value = "<?= $attachement1 ?>" id ="file-name-<?= $file_num1 ?>" class="form-control" readonly>
                    <input <?= $required ?> type="file" name="attactment<?= $file_num1 ?>" class="specific-file-input" id="attachment-<?= $file_num1 ?>">
                    <button class="btn btn-outline-secondary" type="button" id="upload-attachment" data-num="<?= $file_num1 ?>">Upload File</button>
                    <button class="btn btn-outline-secondary <?= $view_class ?>" type="button" id="download-attachment" data-link="<?= env('APP_URL').'public/main/uploaded/apply-loan/'.attachment($attachement,1,'folder').'/'.attachment($attachement,1,'file') ?>" data-num="<?= $file_num1 ?>">Download</button>
                </div>
            </div>
            <label for="inputPassword" class="col-4 col-form-label">SIGNAGE (<i>PICTURE</i>)</label>
             <div class="col-8">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name = "attachment_filename<?=$file_num2?>" value = "<?= $attachement2 ?>" id ="file-name-<?= $file_num2 ?>" class="form-control" readonly>
                    <input <?= $required ?> type="file" name="attactment<?= $file_num2 ?>" class="specific-file-input" id="attachment-<?= $file_num2 ?>">
                    <button class="btn btn-outline-secondary" type="button" id="upload-attachment" data-num="<?= $file_num2 ?>">Upload File</button>
                    <button class="btn btn-outline-secondary <?= $view_class ?>" type="button" id="download-attachment" data-link="<?= env('APP_URL').'public/main/uploaded/apply-loan/'.attachment($attachement,2,'folder').'/'.attachment($attachement,2,'file') ?>" data-num="<?= $file_num2 ?>">Download</button>
                </div>
            </div>
            <label for="inputPassword" class="col-4 col-form-label">DTI and BUSINESS PERMIT</label>
             <div class="col-8">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name = "attachment_filename<?=$file_num3?>" value = "<?= $attachement3 ?>" id ="file-name-<?= $file_num3 ?>" class="form-control" readonly>
                    <input <?= $required ?> type="file" name="attactment<?= $file_num3 ?>" class="specific-file-input" id="attachment-<?= $file_num3 ?>">
                    <button class="btn btn-outline-secondary" type="button" id="upload-attachment" data-num="<?= $file_num3 ?>">Upload File</button>
                    <button class="btn btn-outline-secondary <?= $view_class ?>" type="button" id="download-attachment" data-link="<?= env('APP_URL').'public/main/uploaded/apply-loan/'.attachment($attachement,3,'folder').'/'.attachment($attachement,3,'file') ?>" data-num="<?= $file_num3 ?>">Download</button>
                </div>
            </div>
            <label for="inputPassword" class="col-4 col-form-label">INVENTORY (<i>PICTURE</i>)</label>
             <div class="col-8">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name = "attachment_filename<?=$file_num4?>" value = "<?= $attachement4 ?>" id ="file-name-<?= $file_num4 ?>" class="form-control" readonly>
                    <input <?= $required ?> type="file" name="attactment<?= $file_num4 ?>" class="specific-file-input" id="attachment-<?= $file_num4 ?>">
                    <button class="btn btn-outline-secondary" type="button" id="upload-attachment" data-num="<?= $file_num4 ?>">Upload File</button>
                    <button class="btn btn-outline-secondary <?= $view_class ?>" type="button" id="download-attachment" data-link="<?= env('APP_URL').'public/main/uploaded/apply-loan/'.attachment($attachement,4,'folder').'/'.attachment($attachement,4,'file') ?>" data-num="<?= $file_num4 ?>">Download</button>
                </div>
            </div>
            <label for="inputPassword" class="col-4 col-form-label">FIX ASSET (<i>PICTURE</i>)</label>
             <div class="col-8">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name = "attachment_filename<?=$file_num5?>" value = "<?= $attachement5 ?>" id ="file-name-<?= $file_num5 ?>" class="form-control" readonly>
                    <input <?= $required ?> type="file" name="attactment<?= $file_num5 ?>" class="specific-file-input" id="attachment-<?= $file_num5 ?>">
                    <button class="btn btn-outline-secondary" type="button" id="upload-attachment" data-num="<?= $file_num5 ?>">Upload File</button>
                    <button class="btn btn-outline-secondary <?= $view_class ?>" type="button" id="download-attachment" data-link="<?= env('APP_URL').'public/main/uploaded/apply-loan/'.attachment($attachement,5,'folder').'/'.attachment($attachement,5,'file') ?>" data-num="<?= $file_num5 ?>">Download</button>
                </div>
            </div>
            <label for="inputPassword" class="col-4 col-form-label">BANK ACCOUNT (<i>INFO <a href="#" id="bank-info-view"><i class="fas fa-info-circle"></i></a></i>)</label>
            <div class="col-3">
                <div class="input-group input-group-sm mb-3">
                    <select class="form-select" name="label" required>
                        <option selected disabled value="">-Select BANK-</option>
                        <?php
                        $options = [
                            "LAND BANK",
                            "DBP",
                            "BPI",
                            "BDO",
                            "GCASH verified",
                            "EAST WEST",
                            "RCBC"
                        ];
                        $selected_option = attachment($attachement,6,'label');
                        foreach ($options as $option) {
                            $selected = ($option === $selected_option) ? 'selected' : '';
                            echo "<option value=\"$option\" $selected>$option</option>\n";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="col-5">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name = "attachment_filename<?=$file_num6?>" value = "<?= $attachement6 ?>" id ="file-name-<?= $file_num6 ?>" class="form-control" readonly>
                    <input <?= $required ?> type="file" name="attactment<?= $file_num6 ?>" class="specific-file-input" id="attachment-<?= $file_num6 ?>">
                    <button class="btn btn-outline-secondary" type="button" id="upload-attachment" data-num="<?= $file_num6 ?>">Upload File</button>
                    <button class="btn btn-outline-secondary <?= $view_class ?>" type="button" id="download-attachment" data-link="<?= env('APP_URL').'public/main/uploaded/apply-loan/'.attachment($attachement,6,'folder').'/'.attachment($attachement,6,'file') ?>" data-num="<?= $file_num6 ?>">Download</button>
                </div>
            </div>
            
        </div>

    </div>
</div>

