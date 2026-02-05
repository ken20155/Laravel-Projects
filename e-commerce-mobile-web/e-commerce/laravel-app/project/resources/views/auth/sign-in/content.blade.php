<form method="POST" class="login-form" id="login-form">
    <div class="container-custom">
        <div class="card card-custom">
            <img src="<?= env('APP_URL') ?>public/plugins/img/bg1.jpg" class="card-img card-img-custom" alt="..." style="object-fit: cover; height: 100vh;">
            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <div style="width:100%">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control signinup" id="floatingInput" placeholder="test" name = "username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control signinup" id="floatingPassword" placeholder="test" name = "password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                            <label class="form-check-label" for="invalidCheck">
                                <span class="text-light " style="background-color: #0000009e; border-radius: 15px;">Remember Password</span>
                            </label>
                    </div>
                   
                    <div class="mt-4">
                        <<button class="btn btn-primary signinup" style="width: 100%;" type="submit">LOGIN</button>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4"><a href="sign-up"><button type="button" class="btn btn-info btn-sm signinup">SIGNUP</button></a></div>
                        <div class="col-8" style="text-align: right;"><a href="forgot-password"><button type="button" class="btn btn-info btn-sm signinup">FORGOT PASSWORD</button></a></div>
                    </div>
                  </div>
            </div>
          </div>
      </div>
</form>

