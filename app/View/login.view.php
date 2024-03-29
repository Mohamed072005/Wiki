<?php
include "../app/View/includs/header.php";
?>
<body class="body-login">
    <main class="d-flex flex-column align-items-center">
        <div class="d-flex flex-column align-items-center mt-5">
            <h3 class="text-light">Welcome To Wiki</h3>
            <form method ="POST" action="http://localhost/wiki/autho/login"  class="row w-75 justify-content-center g-3 mt-2">
                <div class="col-md-8">
                    <label for="validationDefaultUsername" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="email" class="form-control" name="email" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="validationDefault03" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="validationDefault03" required>
                </div>
                <div class="col-12 text-center mb-4">
                    <button class="btn btn-outline-warning" name="submit" value="login" type="submit">Log in</button>
                </div>
                <div class="col-12 text-center mb-4">
                    <?php if(!empty($_SESSION['error_login'])){ echo $_SESSION['error_login']; }else { echo ''; } ?>
                </div>
                <div class="col-12 text-center">
                    <span class="text-light">Need an account? <a class="link-color" href="http://localhost/wiki/autho/to_signup">sing in</a></span>
                </div>
            </form>
        </div>
    </main>
</body>

