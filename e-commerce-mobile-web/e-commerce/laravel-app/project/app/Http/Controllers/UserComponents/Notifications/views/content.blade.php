<div class="content-header bg-light p-3 text-center">
    <div class="d-flex justify-content-around">
        <div class="input-group search-top">
           <h3 class=""><i class="bi bi-bell"></i> Notifications</h3>
        </div>
        <a href="cart">
            <button class="btn-transparent-custom position-relative" type="button" id="button-addon2">
                <i class="bi bi-cart font-size-standard"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>
        </a>
    </div>
</div>

<!-- Product Start -->
<div class="container-custom">
    <div class="card">
        <div class="card-header">
            Order Update
        </div>
        <div class="card-body">
      
            <div class="card">
                <div class="row g-0">
                  <div class="col-4">
                    <img src="<?= env('APP_URL') ?>public/plugins/img/product-8.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting.br<br><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
                <div class="row g-0">
                  <div class="col-4">
                    <img src="<?= env('APP_URL') ?>public/plugins/img/product-1.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting.br<br><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>


<footer class="content-footer bg-primary p-0 text-center">
    <div class="d-flex justify-content-around">
        <a href="home">
            <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center same-size">
                <i class="bi bi-house-door"></i>
                <span class="text-footer-button">Home</span>
            </button>
        </a>
        <a href="videos">
        <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center same-size">
            <i class="bi bi-play-circle"></i>
            <span class="text-footer-button">Video</span>
        </button>
        </a>
        <a href="notifications">
        <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center same-size">
            <i class="bi bi-bell"></i>
            <span class="text-footer-button">Notification</span>
        </button>
        </a>
        <a href="profile">
        <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center same-size">
            <i class="bi bi-person-circle"></i>
            <span class="text-footer-button">Profile</span>
        </button>
        </a>
    </div>
</footer>