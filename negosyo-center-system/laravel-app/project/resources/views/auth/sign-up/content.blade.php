<div class="main">

    <div class="container">
        <div class="signup-content">
            {{-- <div class="signup-img">
                <img src="<?= env('APP_URL') ?>public/main/signin-signup/images/form-img.jpg" alt="">
                <div class="signup-img-content">
                    <h2>Register now </h2>
                </div>
            </div> --}}
            <div class="signup-form">
                <form method="POST" class="register-form" id="register-form">
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-input">
                                <label for="first_name" class="required">First name</label>
                                <input type="text" name="first_name" id="first_name" />
                            </div>
                            <div class="form-input">
                                <label for="middle_name" class="">Middle name </label>
                                <input type="text" name="middle_name" id="middle_name" />
                            </div>
                            <div class="form-input">
                                <label for="last_name" class="required">Last name</label>
                                <input type="text" name="last_name" id="last_name" />
                            </div>
                            <div class="form-input">
                                <label for="suffix" class="">Suffix (e.g. jr., Sr., I, II)</label>
                                <input type="text" name="suffix" id="suffix" />
                            </div>
                            <div class="form-input">
                                <label for="bday" class="required">Date of Birth</label>
                                <input type="date" name="bday" id="bday" />
                            </div>
                            <div class="form-select">
                                <div class="label-flex">
                                    <label for="civil_status">Civil Status</label>
                                    <a href="#" class="form-link"></a>
                                </div>
                                <div class="select-list">
                                    <select name="civil_status" id="civil_status">
                                        <option value="Legally separated">Legally separated</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <div class="form-input">
                                <label for="phone_number" class="required">Phone no.</label>
                                <input type="text" name="phone_number" id="phone_number" />
                            </div>

                            <div class="form-input">
                                <label for="email" class="required">Email</label>
                                <input type="text" name="email" id="email" />
                            </div>
                            <div class="form-select">
                                <div class="label-flex">
                                    <label for="barangay" >Barangay</label>
                                    <a href="#" class="form-link"></a>
                                </div>
                                <div class="select-list">
                                    <select name="barangay" id="barangay">
                                        <option value="BALUARTE">BALUARTE</option>
                                        <?php 
                                        $locations = [
                                        "BALUARTE",
                                        "CASINGLOT",
                                        "GRACIA",
                                        "MOHON",
                                        "NATUMOLAN",
                                        "POBLACION",
                                        "ROSARIO",
                                        "SANTA ANA",
                                        "SANTA CRUZ",
                                        "SUGBONGCOGON"
                                        ];
                                        foreach ($locations as $location) {  ?>
                                            <option value="<?= $location ?>"><?= $location ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-radio">
                                <div class="label-flex">
                                    <label for="payment">Sex</label>
                                </div>
                                <div class="form-radio-group">            
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" value = "Male" id="cash" checked>
                                        <label for="cash">Male</label>
                                        <span class="check"></span>
                                    </div>
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" value = "Female" id="cheque">
                                        <label for="cheque">Female</label>
                                        <span class="check"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-input">
                                <label for="citizenship" class="required">Citizenship</label>
                                <input type="text" name="citizenship" id="citizenship" />
                            </div>
                            
                            <div class="form-input">
                                <label for="house_no" class="required">House/Building No. & Name</label>
                                <input type="text" name="house_no" id="house_no" />
                            </div>
                            

                        </div>
                        <div class="form-group">
                            <div class="form-input">
                                <label for="street" class="required">Street</label>
                                <input type="text" name="street" id="street" />
                            </div>
                            
                            <div class="form-select">
                                <div class="label-flex">
                                    <label for="form_ownership">Form of Ownership</label>
                                    <a href="#" class="form-link"></a>
                                </div>
                                <div class="select-list">
                                    <select name="form_ownership" id="form_ownership">
                                        
                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                        <?php 
                                        $locations2 = [
                                        "Sole Proprietorship",
                                        "Partnership",
                                        "Corporation",
                                        "Association",
                                        "Organization",
                                        "Foundation",
                                        "Rural Workers Org.",
                                        ];
                                        foreach ($locations2 as $location) {  ?>
                                            <option value="<?= $location ?>"><?= $location ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-select">
                                <div class="label-flex">
                                    <label for="category_entrepreneur">Category of Entrepreneur</label>
                                    <a href="#" class="form-link"></a>
                                </div>
                                <div class="select-list">
                                    <select name="category_entrepreneur" id="category_entrepreneur">
                                        
                                        <option value="Housewife/Husband">Housewife/Husband</option>
                                        <?php 
                                        $locations3 = [
                                        "Housewife/Husband",
                                        "Student",
                                        "Out of School Youth",
                                        "Military/Police",
                                        "Ex-convict",
                                        "Professional",
                                        "Private Employee",
                                        "Government Employee",
                                        "Retire",
                                        "Self-employed",
                                        "Unemployed",
                                        "OFW",
                                        "Drug Surrender",
                                        "Other",
                                        ];
                                        foreach ($locations3 as $location) {  ?>
                                            <option value="<?= $location ?>"><?= $location ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
   
                            <div class="form-input">
                                <label for="username" class="required">Username</label>
                                <input type="text" name="username" id="username" />
                            </div>
                            <div class="form-input">
                                <label for="password" class="required">Password</label>
                                <input type="password" name="password" id="password" />
                                <label style="color:black !important">Already have account? <a href="sign-in"> Login</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Register Now" class="submit" id="submit" name="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
{{-- First name

Last name

Birthday

Contact number

Address

Gender

Email

User name

Password --}}