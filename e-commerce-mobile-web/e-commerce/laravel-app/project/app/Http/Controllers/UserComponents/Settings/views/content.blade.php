<div class="content-header bg-light p-3 text-center">
    <div class="d-flex justify-content-around">
        <div class="input-group search-top">
           <h3 class=""><a href="profile"><i class="bi bi-arrow-left-circle"></i></a> Settings</h3>
        </div>
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
            My Account
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#"><i class="bi bi-shield-lock-fill"></i> Account & Security</a></li>
            <li class="list-group-item"><a href="#"><i class="bi bi-geo-alt-fill"></i> My Address</a></li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            Settings
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#"> Chat Settings</a></li>
            <li class="list-group-item"><a href="#"> Notification Settings</a></li>
            <li class="list-group-item"><a href="#"> Privacy Settings</a></li>
            <li class="list-group-item"><a href="#"> Block User</a></li>
            <li class="list-group-item"><a href="#"> Language (English)</a></li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            Account Management
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="#"><i class="bi bi-arrow-repeat"></i> Switch Account</a></li>
            <li class="list-group-item text-danger"><a href="<?= env('APP_URL') ?>auth/run/logout" style="color:#b81515 !important"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
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