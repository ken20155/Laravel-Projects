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
$location = $data ? $data->location : 'Tagoloan Negosyo Center - MEEDO Office';
$reason_cancel = $data ? $data->reason_cancel : '';



?>
<input type="hidden" class="form-control" id="validationDefault01" name = "action" value = "<?= $data ? 'edit' : 'add' ?>">
<input type="hidden" class="form-control" id="validationDefault01" name = "event_id" value = "<?= $data ? $data->event_id : '' ?>">

<div class="row">

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
        <textarea  class="form-control form-control-sm" name="location" id="" cols="30" rows="3" readonly><?= $location ?></textarea>
    </div>
    <div class="col-md-12 <?= $status == 'CANCELLED' ? '' : 'd-none' ?>">
        <label for="validationCustom01" class="form-label">Reason for cancellation</label>
        <textarea  class="form-control form-control-sm" cols="30" rows="3" readonly><?= $reason_cancel ?></textarea>
    </div>

    <div class="col-md-12 <?= $view_class ?>">
        <label for="validationCustom01" class="form-label">Participants</label>
        <div class="" id="participants">
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Full name</th>
                      <th scope="col">Status</th>
                      <th scope="col">Attendance</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if ($participants) {
                        $x = 1;
                        foreach ($participants as $key => $R) {
                            ?>
                            <tr>
                                <th scope="row"><?= $x++ ?></th>
                                <td><?= $R->first_name ?> <?= $R->middle_name ?> <?= $R->last_name ?></td>
                                <?php 
                                if ($status != 'CANCELLED') {
                                    ?>
                                              <td><?= $R->status ?></td>
                                    <?php
                                }else{
                                    ?>
                                      <td><?= 'CANCELLED' ?></td>
                                    <?php
                                }
                                 ?>
                              

                                <td><?= $R->attendance ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                       <?php 
                                       if ($status != 'CANCELLED') {
                                            if ($R->status == 'PENDING') {
                                            ?>
                                                    <button type="button" class="btn btn-sm btn-success acceptAppointment" data-id="<?= $R->participant_id ?>" data-eventid="<?= $R->event_id ?>" data-status="Approved">Approved</button>
                                                    <button type="button" class="btn btn-sm btn-danger acceptAppointment" data-id="<?= $R->participant_id ?>" data-eventid="<?= $R->event_id ?>" data-status="Declined">Declined</button>
                                            <?php
                                            }else if($R->status == 'APPROVED' && $R->attendance == null){ ?>
                                                            <button type="button" class="btn btn-sm btn-success acceptAppointment" data-id="<?= $R->participant_id ?>" data-eventid="<?= $R->event_id ?>" data-status="Present">Present</button>
                                            <?php 
                                            }else{
                                                echo '';
                                            }
                                        }
                                        ?>
                        
                                   

                                    </div>
                                </td>
                            </tr>
                            <?php
                        }    
                    }else{
                        ?>
                            <tr>
                                <th colspan="5" class="text-center">NO DATA FOUND</th>
                            </tr>
                        <?php
                    }
                    ?>
                    
                  </tbody>
            </table>
        </div>
    </div>


</div>

