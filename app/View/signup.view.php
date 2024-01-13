<?php
include "../app/View/includs/header.php";
?>
<body class="body-signup">
    <main class="d-flex flex-column align-items-center">
        <div class="d-flex flex-column align-items-center mt-5">
            <h3 class="text-light">Welcome To Wiki</h3>
            <form method ="POST" name="myForm" action="http://localhost/wiki/autho/signup" onsubmit="return validateForm()"  class="row w-50 justify-content-center g-3 mt-2">
                
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control" name="first_name" id="validationDefault01" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="last_name" id="validationDefault02" required>
                </div>
                <div class="col-md-8">
                    <label for="validationDefaultUsername" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="" class="form-control" name="email" id="" aria-describedby="inputGroupPrepend2" >
                    </div>
                </div>
                <div class="col-md-8">
                    <span id="check_email"></span>
                </div>
                
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="validationDefault03" required>
                </div>
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Confirme Password</label>
                    <input type="password" class="form-control" name="cpassword" id="validationDefault03" required>
                </div>
                <div class="col-md-8">
                    <span id="check_pass"></span>
                </div>
                
                <div class="col-12 text-center mb-4">
                    <button class="btn btn-outline-warning" name="submit" value="regester" type="submit">Sing in</button>
                </div>
                <div class="col-md-8">
                    <?php if(!empty($_SESSION['error_signup'])){ echo $_SESSION['error_signup']; }else { echo ''; } ?>
                </div>
                <div class="col-12 text-center">
                    <span class = "text-light">Already have an account? <a class="link-color" href="http://localhost/wiki/autho">log in</a></span>
                </div>
            </form>
        </div>
    </main>
</body>
<script src="http://localhost/wiki/public/assets/js/validateFormSingup.js"></script>