<style>
    /* Hide the original file input */
    .specific-file-input {
        display: none;
    }
 
</style>
<?php 

$required = 'required';
$view_class = $action == 'Add New' ? 'd-none' : '';
$status = $data ? $data->status : 'PENDING';
$date = $data ? $data->date : '';
$start = $data ? $data->start_time : '';
$end = $data ? $data->end_time : '';
$purpose = $data ? $data->purpose : '';
$location = $data ? $data->location : '';
$reason_cancel = $data ? $data->reason_cancel : '';


?>
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "event_id" value = "<?= $data ? $data->event_id : '' ?>">

<div class="row">
    <?php  if ($data) { ?>
    <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Date</label>
        <input type="date" value="<?= $date ?>" name = "date" class="form-control form-control-sm" id="validationCustom01" min="<?= date(SQLDATE) ?>" required>
    </div>
    <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Time (Start - End)</label>
        <div class="input-group input-group-sm">
            <input type="time" name="start" value="<?= $start ?>" class="form-control" required>
            <input type="time" name="end" value="<?= $end ?>" class="form-control" required>
          </div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Purpose</label>
        <textarea  class="form-control form-control-sm" name="purpose" id="" cols="30" rows="3" required><?= $purpose ?></textarea>
    </div>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Location</label>
        <textarea  class="form-control form-control-sm" name="location" id="" cols="30" rows="3" required><?= $location ?></textarea>
    </div>
    <div class="col-md-12 <?= $status == 'CANCELLED' ? '' : 'd-none' ?>">
        <label for="validationCustom01" class="form-label">Reason for cancellation</label>
        <textarea  class="form-control form-control-sm" cols="30" rows="3" readonly><?= $reason_cancel ?></textarea>
    </div>

    <?php } ?>

    <div class="col-12">
        <div id="calendar"></div>
    </div>
    <div class="col-12 mt-3">
        <input type="hidden" class="form-control form-control-sm" id="event_id" name = "selected_event_id">
    </div>


</div>

<div class="modal fade" id="modal-dynamic-2">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">SCHEDULE DETAILS</h5>
            <button type="button" class="close modal-close-2" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modal-body">

        </div>
        <div class="modal-footer">
            <div id="footer-custom"></div>
            <button type="button" class="btn btn-secondary btn-sm modal-close-2" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>