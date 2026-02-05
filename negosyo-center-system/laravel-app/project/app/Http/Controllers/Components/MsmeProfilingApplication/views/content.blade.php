<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                  <?php 
                    if ($session_user_role == 2) {
                     echo '<button type="button" class="btn btn-sm btn-primary" id="addNewAccount" data-action="add">Add New</button>';
                    }
                    ?>
                    

                    <button type="button" class="btn btn-sm btn-info" id="refreshBtn">Refresh</button>
                  
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="div_laravel_datatable">
                        <table class="table table-bordered" id="laravel_datatable">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
  @media (max-width: 768px) { /* For tablets and smaller screens */
  .custom-modal {
      min-width: 100%; /* Full width */
      margin: 0; /* Remove extra margin */
      border-radius: 0; /* Optional: Remove border radius for fullscreen effect */
    }
  }

  @media (min-width: 769px) {
    .custom-modal {
      min-width: 1500px; /* Retain the large width for larger screens */
    }
  }

</style>

  <!-- Modal -->
  <form action="" method="post" id="submit-form">
    <div class="modal fade" id="modal-dynamic">
      <div class="modal-dialog modal-dialog-centered custom-modal">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><?= $title ?> - <span id="action-text"></span></h5>
            <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="modal-body">
  
          </div>
          <div class="modal-footer">
            <div id="footer-custom"></div>
            <button type="button" class="btn btn-secondary btn-sm modal-close" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>