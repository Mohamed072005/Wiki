
<?php

$_SESSION['error_login'] = "";
$_SESSION['error_signup'] = "";

if(isset($_SESSION['role_id'])){
    if($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3){
        header('location: http://localhost/wiki/wiki/display_wiki');
    }
}else {
    header('location: http://localhost/wiki/wiki/display_wiki');
}
include "../app/View/includs/header.php";
?>
<body class="body-home">

<header class="p-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="http://localhost/wiki/" class="navbar-brand"><h4 class="text-light">Wiki</h4></a>
        </div>

        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if(isset($_SESSION['first_name'])){ echo $_SESSION['first_name'];}else {echo "actions";}?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <?php if(isset($_SESSION['role_id'])){ ?>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="http://localhost/wiki/autho/logout">Logout</a></li>
                <?php }else{ ?>
                    <li><a class="dropdown-item" href="http://localhost/wiki/autho/to_login">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 bg-dark text-light p-4 aside">

        <ul class="list-unstyled">
                        <?php if(isset($_SESSION['role_id'])){ ?>
        
        
                            <?php if($_SESSION['role_id'] == 1){ ?>
                                <li><a href="http://localhost/wiki/dashboard/display_statistique">dashboard</a></li>
                                <li><a href="http://localhost/wiki/tag/display_tag">Tags</a></li>
                                <li><a href="http://localhost/wiki/categorie/display_categorie">Categories</a></li>
                                <li><a href="http://localhost/wiki/wiki/display_user_wiki">Your Wikis</a></li>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Wikis</a></li>
                            <?php }else  if($_SESSION['role_id'] == 2){ ?>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Wikis</a></li>
                                <li><a href="http://localhost/wiki/wiki/display_user_wiki">Your Wikis</a></li>
                                <li><a href="http://localhost/wiki/tag/display_tag">Tags</a></li>
                                <li><a href="http://localhost/wiki/categorie/display_categorie">Categories</a></li>
                            <?php }else {?>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Home</a></li>
                                <li><a href="http://localhost/wiki/tag/display_tag">Tags</a></li>
                                <li><a href="http://localhost/wiki/categorie/display_categorie">Categories</a></li>
                        <?php }}else{?>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Home</a></li>
                                <li><a href="http://localhost/wiki/tag/display_tag">Tags</a></li>
                                <li><a href="http://localhost/wiki/categorie/display_categorie">Categories</a></li>
                        <?php } ?>
                    </ul>

        </aside>


            <main class="col-md-10 p-3 main-content">

            <div class="container-fluid row h-50">
                    <div class="col-md-12 mb-4 d-flex justify-content-center align-items-center">
                        <h2 class="text-light">The statistics of your website</h2>
                    </div>
                    <div class="col-md-4 mt-4 mb-4 d-flex justify-content-center align-items-center">
                        <div class="bg-secondary bg-gradient rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
                            <h2 class="text-light text-center mt-4 mb-4">Categories</h2>   
                            <div class="d-flex justify-content-around mt-4 mb-4">
                                 <h3 class="text-light"><?= $data_cate ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mb-4 d-flex justify-content-center align-items-center">
                        <div class="bg-secondary bg-gradient rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
                            <h2 class="text-light text-center mt-4 mb-4">Wikis</h2>   
                            <div class="d-flex justify-content-around mt-4 mb-4">
                                 <h3 class="text-light"><?= $data ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mb-4 d-flex justify-content-center align-items-center">
                        <div class="bg-secondary bg-gradient rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
                            <h2 class="text-light text-center mt-4 mb-4">Tags</h2>   
                            <div class="d-flex justify-content-around mt-4 mb-4">
                                 <h3 class="text-light"><?= $data_tag   ?></h3>
                            </div>
                        </div>
                    </div>
            </div>
            
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

