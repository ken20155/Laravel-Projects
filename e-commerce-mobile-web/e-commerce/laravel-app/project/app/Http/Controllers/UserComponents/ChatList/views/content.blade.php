<div class="content-header bg-light p-3 text-center">
    <div class="d-flex justify-content-around">
        <div class="input-group search-top">
           <h3 class=""><a href="profile"><i class="bi bi-arrow-left-circle"></i></a> Chat List</h3>
        </div>

    </div>
</div>

<!-- Product Start -->
<div class="container-custom">

    <ul class="nav nav-pills nav-justified mt-3" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Chat</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Find People</button>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="bi bi-person-circle" style="padding-right:10px !important"></i> Juan Dela Cruz (Online)
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="btn-group" style="width: 100%;" role="group" aria-label="Basic outlined example">
                            <a href="" class="btn btn-outline-primary">Profile</a>
                            <a href="chat-room" class="btn btn-outline-primary">Chat Now</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="bi bi-person-circle" style="padding-right:10px !important"></i> User 1 (Online)
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="btn-group" style="width: 100%;" role="group" aria-label="Basic outlined example">
                            <a href="" class="btn btn-outline-primary">Profile</a>
                            <a href="chat-room" class="btn btn-outline-primary">Chat Now</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="bi bi-person-circle" style="padding-right:10px !important"></i> User 2 (Offline)
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="btn-group" style="width: 100%;" role="group" aria-label="Basic outlined example">
                            <a href="" class="btn btn-outline-primary">Profile</a>
                            <a href="chat-room" class="btn btn-outline-primary">Chat Now</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
            </div>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="chat-room">User 1</a></li>
                    <li class="list-group-item"><a href="chat-room">User 2</a></li>
                    <li class="list-group-item"><a href="chat-room">User 3</a></li>
                </ul>
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