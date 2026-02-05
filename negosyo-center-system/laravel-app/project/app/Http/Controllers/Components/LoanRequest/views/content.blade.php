<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
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



  <!-- Modal -->
  <form action="" method="post" id="submit-form">
    <div class="modal fade" id="modal-dynamic">
      <div class="modal-dialog modal-lg modal-dialog-centered">
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
<!-- Modal -->
<div class="modal fade" id="bank-info-open" >
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">BANK LIST</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item">LANK BANK</li>
                <li class="list-group-item">DBP</li>
                <li class="list-group-item">BPI</li>
                <li class="list-group-item">BDO</li>
                <li class="list-group-item">GCASH verified</li>
                <li class="list-group-item">EAST WEST</li>
                <li class="list-group-item">RCBC</li>
            </ul>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="open-attachment-1" >
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <button id="custom-file-button">Choose Image</button>
            <span id="file-name">No file chosen</span>
            <input type="file" id="specific-file-input">
            <div>
                <img class= "preview-file" id="specific-image-preview-1" src="" alt="Specific Image Preview">
            </div>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="open-attachment-2" >
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <img class= "preview-file" id="specific-image-preview-2" src="" alt="Specific Image Preview">
            </div>
        </div>
        </div>
    </div>
</div>