<?php
include "../app/View/includs/header.php";
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
                        <li><a href="http://localhost/Wiki/home">dashboard</a></li>
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

            


            
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>