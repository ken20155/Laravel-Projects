<style>
    .scrollable-content {
    width: 100%; /* Set the desired width */
    height: 300px; /* Set the desired height */
    overflow-y: auto; /* Enables vertical scrolling */
    overflow-x: hidden; /* Hides horizontal scrolling */
    padding: 10px; /* Optional: Adds padding around content */
}
/* Scrollbar styling */
.scrollable-content::-webkit-scrollbar {
    width: 10px; /* Width of the scrollbar */
}

.scrollable-content::-webkit-scrollbar-track {
    background: #f1f1f1; /* Background of the scrollbar track */
    border-radius: 5px; /* Rounded corners for track */
}

.scrollable-content::-webkit-scrollbar-thumb {
    background-color: #888; /* Color of the scrollbar thumb */
    border-radius: 5px; /* Rounded corners for thumb */
    border: 2px solid #f1f1f1; /* Adds a border around thumb */
}

.scrollable-content::-webkit-scrollbar-thumb:hover {
    background-color: #555; /* Darker color on hover */
}

</style>
<div class="row">
<?php
if (!empty($res)) {
  $x = 1;
        foreach ($res as $key => $R) {
    ?>
     <div class="col-md-6">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title"><?= $R['title'] ?></h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <div id="carouselExampleAutoplaying<?= $x ?>" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" style="height:100%">
                          <?php 
                            $y = 1;
                          foreach ($R['files'] as $key => $F) {
                            //uploaded/'.$R->module_name.'/'.$R->folder.'/'.$R->file_name
                            ?>
                            <div class="carousel-item <?= $y == 1 ? 'active' : '' ?>">
                              <img src="<?= env('APP_URL') ?>public/main/uploaded/<?= $F['module_name'].'/'.$F['folder'].'/'.$F['file_name'] ?>" class="d-block" style="width:100%;" alt="...">
                            </div>
                            <?php
                            $y++;
                          }  
                          ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying<?= $x ?>" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying<?= $x ?>" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </p>
                <p class="card-text">DATE POSTED: <span class="badge bg-primary"><?= date(LONGDATETIME,strtotime($R['added_date'])) ?></span></p>
                <p class="card-text scrollable-content"><?= $R['remarks'] ?></p>
            </div>
        </div>    
    </div>
       
    <?php 
      $x++;
    } ?>
<?php }else{ ?>
</div>
    <h3 class="text-center mt-3">NO ANNOUNCEMENT FOUND</h3>
<?php } ?>