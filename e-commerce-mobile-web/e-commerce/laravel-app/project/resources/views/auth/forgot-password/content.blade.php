<div class="container-custom">
    <div class="card card-custom">
        <img src="<?= env('APP_URL') ?>public/plugins/img/bg1.jpg" class="card-img card-img-custom" alt="..." style="object-fit: cover; height: 100vh;">
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <div style="width:100%">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control signinup" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
               
                <div class="mt-4">
                    <a href="sign-in"><button class="btn btn-primary signinup" style="width: 100%;" type="submit">Get Code</button></a>
                </div>
                <div class="row mt-2">
                    <div class="col-8 text-light"><span style="background-color: #0000009e;border-radius: 15px;">Already Have a Account?</span></div>
                    <div class="col-4" style="text-align: right;"><a href="sign-in"><button type="button" class="btn btn-info btn-sm signinup">LOGIN</button></a></div>
                </div>
              </div>
        </div>
      </div>
</div>