
<h1 class="text-center">Event</h1>
<?php 
$date = $data ? $data->date : '';
$purpose = $data ? $data->purpose : '';
$location = $data ? $data->location : '';
$event_category = $data ? $data->event_category : '';
$reason_cancel = $data ? $data->reason_cancel : '';
?>
<div class="row">
    <label for="staticEmail" class="col-2">Date:</label>
    <div class="col-4">
        <?= date(LONGDATE,strtotime($date)) ?>
    </div>
    <label for="staticEmail" class="col-2">Category:</label>
    <div class="col-4">
        <?= $event_category ?>
    </div>
    <label for="staticEmail" class="col-2">Time</label>
    <div class="col-4">
        <?= $start ?> - <?= $end ?>
    </div>
    <label for="staticEmail" class="col-2">Purpose:</label>
    <div class="col-4">
        <?= $purpose ?>
    </div>
    <label for="staticEmail" class="col-2">Location:</label>
    <div class="col-10">
        <?= $location ?>
    </div>
</div>
<label for="validationCustom01" class="form-label mt-3">Participants</label>
<table class="table table-bordered">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full name</th>
          <th scope="col">Status</th>
          <th scope="col">Attendance</th>
          <th scope="col">Reason cancellation</th>
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
                    <td><?= $R->status ?></td>
                    <td><?= $R->attendance ?></td>
                    <td>
                        <?= $R->reason_cancel ?>
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
