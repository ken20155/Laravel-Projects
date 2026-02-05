
    <!-- Product Start -->
    <form method="POST" class="register-form" id="register-form">

        <div class="container-custom">
            <div class="card card-custom">
                <img src="<?= env('APP_URL') ?>public/plugins/img/bg1.jpg" class="card-img card-img-custom" alt="..." style="object-fit: cover; height: 100vh;">
                <div class="card-img-overlay d-flex justify-content-center align-items-center">
                    <div style="width:100%">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control signinup" id="floatingInput" placeholder="test" name="username" required>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control signinup" id="floatingInput" placeholder="test" name="contact_no" required>
                            <label for="floatingInput">Contact Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control signinup" id="floatingInput" placeholder="test" name="email" required>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control signinup" id="floatingPassword" placeholder="test" name="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control signinup" id="floatingPassword" placeholder="test" name="confirm_password" required>
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                    
                        <div class="mt-4">
                            <button class="btn btn-primary signinup" id= "submit" style="width: 100%;" type="submit">SIGNUP</button>
                        </div>
                        <div class="row mt-2">
                            <div class="col-8 text-light"><span style="background-color: #0000009e;border-radius: 15px;">Already Have a Account?</span></div>
                            <div class="col-4" style="text-align: right;"><a href="sign-in"><button type="button" class="btn btn-info btn-sm signinup">LOGIN</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
