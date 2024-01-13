<?php

include "../app/View/includs/header.php";

// var_dump($data);
// var_dump($data_tag);
// die();
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
                            <?php } ?>
                            <?php  if($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 1 ){ ?>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Wikis</a></li>
                                <li><a href="http://localhost/wiki/wiki/display_user_wiki">Your Wikis</a></li>
                            <?php }else {?>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Home</a></li>
                        <?php }}else{?>
                                <li><a href="http://localhost/wiki/wiki/display_wiki">Home</a></li>
                        <?php } ?>
                    </ul>

        </aside>


            <main class="col-md-10 p-3 main-content ">
                <div class="row  border border-3 border-light rounded " style="width: 90%;">
                    <div class="col-md-12 text-center mt-3 mb-2">
                        <h2 class="text-light"><?= $data->title ?></h2>
                    </div>
                    <div class="col-md-12 ">
                        <p class="text-light mb-4"><?= $data->content ?></p>
                    </div>
                    <div class="col-6">
                        <h4 class="text-light">The Categorie</h4>
                        <ul>
                            <li class="h6 text-light"><?= $data->categorie_name ?></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h4 class="text-light">The Tags</h4>
                        <ul>
                            <?php foreach($data_tag as $rows){ ?>
                            <li class="h6 text-light"><?= $rows->tag_name ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>