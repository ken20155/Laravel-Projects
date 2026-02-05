<style>
  .no-horizontal-scroll {
      overflow-x: hidden; /* Hides horizontal scrollbar */
  }
    /* Style for the specific div */
  .custom-scrollbar {
    overflow-y: scroll; /* Enable vertical scroll */
    scrollbar-width: thin; /* For Firefox */
    scrollbar-color: #888 #f0f0f0; /* For Firefox */
  }

  /* For WebKit browsers (Chrome, Safari, Edge) */
  .custom-scrollbar::-webkit-scrollbar {
    width: 8px; /* Scrollbar width */
  }

  .custom-scrollbar::-webkit-scrollbar-track {
    background: #f0f0f0; /* Track color */
    border-radius: 4px; /* Rounded corners */
  }

  .custom-scrollbar::-webkit-scrollbar-thumb {
    background: #888; /* Thumb color */
    border-radius: 4px; /* Rounded corners */
  }

  .custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #555; /* Thumb hover color */
  }

</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
           
            <div class="card-body">
              <h3>List of Business</h3>
              {{-- <button type="button" class="btn btn-sm btn-primary mt-2 openFormBnrMsme" data-action="edit" data-status="approved" data-form="msme">Add Existing MSME (Registered) MSME</button>
              <button type="button" class="btn btn-sm btn-secondary mt-2 openFormBnrMsme" data-action="edit" data-status="pending" data-form="bnr">Add Existing MSME (Unregistered) BNR</button> --}}
              <button type="button" class="btn btn-sm btn-primary mt-2 openFormBnrMsme" data-action="add" data-id="" data-status="new" data-form="msme">ADD MSME PROFILING</button>
              <button type="button" class="btn btn-sm btn-secondary mt-2 openFormBnrMsme" data-action="add" data-id="" data-status="new" data-form="bnr">ADD BUSINESS NAME REGISTRATION</button>
              <div class="table-responsive">
                <table class="table table-hover table-bordered mt-3">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">#</th>
                      <th scope="col">ID NO</th>
                      <th scope="col">Business name</th>
                      <th scope="col" class="text-center">BNR</th>
                      <th scope="col" class="text-center">MSME</th>
                    </tr>
                  </thead>
                  <tbody id="listOfBusiness">

                  </tbody>
                </table>
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
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-lg custom-modal">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"></h5>
            <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body no-horizontal-scroll custom-scrollbar" id="">
  
          </div>
          <div class="modal-footer">
            <div id="footer-custom"></div>
            <button type="button" class="btn btn-secondary btn-sm modal-close" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>