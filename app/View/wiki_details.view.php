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
            <a href="http://localhost/Wiki/" class="navbar-brand"><h4 class="text-light">Wiki</h4></a>
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
                <li><a class="dropdown-item" href="http://localhost/Wiki/autho/logout">Logout</a></li>
                <?php }else{ ?>
                    <li><a class="dropdown-item" href="http://localhost/Wiki/autho/to_login">Login</a></li>
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
                        <li><a href="http://localhost/Wiki/dashboard/display_statistique">dashboard</a></li>
                        <li><a href="http://localhost/Wiki/tag/display_tag">Tags</a></li>
                        <li><a href="http://localhost/Wiki/categorie/display_categorie">Categories</a></li>
                    <?php } ?>
                    <?php  if($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 1 ){ ?>
                        <li><a href="http://localhost/Wiki/wiki/display_wiki">Wikis</a></li>
                    <?php }?>
                    
                <?php }else {?>
                    <li><a href="http://localhost/Wiki/wiki/display_wiki">About</a></li>
                <?php } ?>
            </ul>

        </aside>


            <main class="col-md-10 p-3 main-content">
                <div class="row">
                    <div class="col-md-12 bg-danger d-flex justify-content-center mt-5 mb-4">
                        <h2 class="text-light"><?= $data->title ?></h2>
                    </div>
                    <div class="col-md-12 mt-4 mb-5">
                        <h4 class="text-light"><?= $data->content ?></h4>
                    </div>
                    <div class="col-6">
                        <h3 class="text-light">The Categorie</h3>
                        <ul>
                            <li class="h4 text-light"><?= $data->categorie_name ?></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h3 class="text-light">The Tags</h3>
                        <ul>
                            <?php foreach($data_tag as $rows){ ?>
                            <li class="h4 text-light"><?= $rows->tag_name ?></li>
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