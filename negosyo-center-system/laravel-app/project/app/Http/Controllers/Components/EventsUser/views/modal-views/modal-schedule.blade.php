<?php 
$required = 'required';
$status = $data ? $data->status : 'PENDING';
$date = $data ? $data->date : '';
$start = $data ? $data->start_time : '';
$end = $data ? $data->end_time : '';
$purpose = $data ? $data->purpose : '';
$location = $data ? $data->location : 'Tagoloan Negosyo Center - MEEDO Office';
$reason_cancel = $data ? $data->reason_cancel : '';
?>
<div class="row">
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Status</label>
        <input type="text" value="<?= $status == null ? 'AVAILABLE' : $status ?>" name = "date" class="form-control form-control-sm" id="validationCustom01" readonly>
    </div>
    <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Date</label>
        <input type="date" value="<?= $date ?>" name = "date" class="form-control form-control-sm" id="validationCustom01" min="<?= date(SQLDATE) ?>" readonly>
    </div>
    <div class="col-md-6">
        <label for="validationCustom01" class="form-label">Time (Start - End)</label>
        <div class="input-group input-group-sm">
            <input type="time" name="start" value="<?= $start ?>" class="form-control" readonly>
            <input type="time" name="end" value="<?= $end ?>" class="form-control" readonly>
          </div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Purpose</label>
        <textarea  class="form-control form-control-sm" name="purpose" id="" cols="30" rows="3" readonly><?= $purpose ?></textarea>
    </div>
    <div class="col-md-12">
        <label for="validationCustom01" class="form-label">Location</label>
        <textarea  class="form-control form-control-sm" name="location" id="" cols="30" rows="3" readonly><?= $location ?></textarea>
    </div>
    <div class="col-md-12 <?= $status == 'CANCELLED' ? '' : 'd-none' ?>">
        <label for="validationCustom01" class="form-label">Reason for cancellation</label>
        <textarea  class="form-control form-control-sm" cols="30" rows="3" readonly><?= $reason_cancel ?></textarea>
    </div>
</div>