<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        {{-- <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://www.themekita.com">
                        ThemeKita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Help
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
        </div>	 --}}
        <div>
            Created by
            <a target="_blank" href="#"><?= env('PROJECTCREDIT') ?></a>.
        </div>			
    </div>
</footer>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">About Us</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="font-size:25px">
            The Negosyo Center Program is responsible for promoting ease of doing business and facilitating access to services for Micro, Small, and Medium Enterprises (MSMEs). Republic Act No. 10644 otherwise known as the “Go Negosyo Act,” seeks to strengthen MSMEs to create more job opportunities in the country.
            <br>
            <br>
            The Program started in 2014, with 5 Centers established in the islands of Luzon, Visayas, and Mindanao. Since then, more Centers have been set up nationwide bringing ease of doing business closer to MSMEs in all regions. Negosyo Centers help stimulate entrepreneurship development as MSMEs contribute substantially in driving the Philippine economy.
            <br>
            <br>
            Negosyo Centers are found in strategic areas convenient for the existing and would-be entrepreneurs, such as DTI offices, Local Government Units (LGU), academe, Non-Government Organizations (NGOs), and malls.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>