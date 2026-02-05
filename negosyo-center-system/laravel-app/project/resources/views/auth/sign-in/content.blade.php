<div class="main">

    <div class="container">
        <div class="signup-content">
            <div class="signup-img">
                <img src="<?= env('APP_URL') ?>public/main/image/login.png" alt="">
                <div class="signup-img-content">
                    {{-- <h2>NEGOSYO CENTER</h2>
                    <h2>LOGIN IN</h2> --}}
                </div>
            </div>
            <div class="signup-form">
                <form method="POST" class="register-form" id="login-form">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-input">
                                <label for="first_name" class="required">Username</label>
                                <input type="text" name="username" id="your_name" />
                            </div>
                            <div class="form-input">
                                <label for="last_name" class="required">Password</label>
                                <input type="password" name="password" id="your_pass" />
                                <label style="color:black !important">New User? <a href="sign-up"> Create Account</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit">
                        <button  type="submit" class="submit" id="submit" type="button">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>