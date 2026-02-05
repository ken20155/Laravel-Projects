<style>
    /* Hide the original file input */
    .specific-file-input {
        display: none;
    }
 
</style>
<?php 

$required = 'required';
$view_class = $action == 'Add New' ? 'd-none' : '';
$title = $data ? $data->title : '';
$remarks = $data ? $data->remarks : '';



?>
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "annoucement_id" value = "<?= $data ? $data->annoucement_id : '' ?>">

<div class="row">

    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Title</label>
        <input type="text" value="<?= $title ?>" name = "title" class="form-control form-control-sm" id="validationCustom01" required>
    </div>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Remarks</label>
        <textarea  class="form-control form-control-sm" name="remarks" id="" cols="30" rows="10" required><?= $remarks ?></textarea>
    </div>
    <div class="col-12 mt-3">
        <input id="file-upload" name="file_upload[]" data-allow="jpeg,jpg,gif,png" type="file" multiple class="file" data-theme="fas"  data-isrequired="1"
         accept="image/*">
    </div>
</div>

