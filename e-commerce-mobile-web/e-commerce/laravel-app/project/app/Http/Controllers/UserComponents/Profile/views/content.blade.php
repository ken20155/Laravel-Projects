<div class="content-header bg-light p-3 text-center">
    <div class="d-flex justify-content-around">
        <div class="input-group search-top">
           <h3 class=""><i class="bi bi-person-circle"></i> My Profile</h3>
        </div>
        <button class="btn-transparent-custom position-relative" type="button" id="button-addon2">
            <a href="settings"><i class="bi bi-gear font-size-standard"></i></a>
        </button>
        <a href="chat-list">
            <button class="btn-transparent-custom position-relative" type="button" id="button-addon2">
                <i class="bi bi-chat-dots font-size-standard"></i>
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
            Information
        </div>
        <div class="card-body">

            <div class="bg-primary text-center">
                <div class="scrollable-category d-flex justify-content-around">
                    <button class="btn btn-transparent">
                        <i class="bi bi-shop-window"></i>
                        <span class="text-footer-button">My Shop</span>
                    </button>
                </div>
            </div>
            <label for="" class="mt-3">My Purchases</label>
            <ul class="nav nav-pills nav-justified mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Purchases</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">History</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="bg-primary text-center mt-3">
                        <div class="scrollable-category d-flex justify-content-around">
                            <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center">
                                <i class="bi bi-credit-card"></i>
                                <span class="text-footer-button">TO PAY</span>
                            </button>
                            <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center">
                                <i class="bi bi-box-seam"></i>
                                <span class="text-footer-button">TO SHIP</span>
                            </button>
                            <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center">
                                <i class="bi bi-truck"></i>
                                <span class="text-footer-button">TO RECEIVED</span>
                            </button>
                            <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center">
                                <i class="bi bi-star"></i>
                                <span class="text-footer-button">TO RATE</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
              </div>
              <label for="" class="mt-3">More Activities</label>
              <div class="bg-primary text-center mt-3">
                <div class="scrollable-category d-flex justify-content-around">
                    <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center">
                        <i class="bi bi-heart"></i>
                        <span class="text-footer-button">My Likes</span>
                    </button>
                    <button class="btn btn-transparent flex-fill mx-1 d-flex flex-column align-items-center">
                        <i class="bi bi-handbag"></i>
                        <span class="text-footer-button">Buy Again</span>
                    </button>
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