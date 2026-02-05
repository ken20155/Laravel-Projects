<div class="content-header bg-light p-3 text-center">
    <div class="d-flex justify-content-around">
        <div class="input-group search-top">
            <input type="text" class="form-control">
            <button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
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
    <div class="align-items-center video-container" id="videoContainer">
        <div id="vid-play-pause">
            <video id="myVideo" autoplay loop >
                <source src="<?= env('APP_URL') ?>public/plugins/videos/sample1.mp4">
            </video>
            <div class="custom-controls">
                <button id="playPauseBtn" class="standard-radius-btn"><i class="bi bi-play-circle"></i></button>
            </div>
        </div>
        <div class="prev-next">
            <button class="previous-button standard-radius-btn" id="previousBtn"><i class="bi bi-arrow-left-circle"></i></button>
            <button class="next-button standard-radius-btn" id="nextBtn"><i class="bi bi-arrow-right-circle"></i></button>
        </div>
        <div class="sidebar-buttons">
            <button class="follow-button standard-radius-btn" id="followBtn"><i class="bi bi-person-plus"></i></button>
            <button class="like-button standard-radius-btn" id="likeBtn"><i class="bi bi-heart"></i></button>
            <button class="comment-button standard-radius-btn" id="commentBtn"><i class="bi bi-chat-dots"></i></button>
            <button class="share-button standard-radius-btn" id="shareBtn"><i class="bi bi-box-arrow-up-right"></i></button>
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