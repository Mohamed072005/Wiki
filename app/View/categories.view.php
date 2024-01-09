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
                <?=$_SESSION['first_name']?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="http://localhost/Wiki/autho">Logout</a></li>
            </ul>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 bg-dark text-light p-4 aside">

            <ul class="list-unstyled">
                <?php if($_SESSION['role_id'] == 1){ ?>
                    <li><a href="http://localhost/Wiki/home">dashboard</a></li>
                    <li><a href="http://localhost/Wiki/home/to_wikis">Wikis</a></li>
                    <li><a href="http://localhost/Wiki/home/to_tags">Tags</a></li>
                    <li><a href="http://localhost/Wiki/categorie/display_categorie">Categories</a></li>
                <?php } ?>
                    
                    <li><a href="">authors</a></li>
                    
            </ul>

        </aside>


            <main class="col-md-10 p-3 main-content">

                <div class="container-form-search container d-flex justify-content-center">
                    
                        <form class="search-form w-75 d-flex justify-content-center" role="search">
                            <input class="search-input form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-warning">Search</button>
                        </form>
                    
                </div>
    
                <section class="section dashboard">
                    <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">add Categorie</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Categorie</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="http://localhost/Wiki/categorie/insert_categorie" method="POST" >
                                            <div class="mb-3">
                                                <label for="categorie_name" class="form-label">Categorie Name:</label>
                                                <input type="text" class="form-control" id="name" name="categorie_name" required>
                                            </div>
                                            <button type="submit" name="submit" value="create_categorie" class="btn btn-primary">add Categorie</button>
                                        </form>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <div class="container-fluid row h-50">
                <?php foreach($data as $row){ ?> 
                    <div class="col-md-4 mt-4 d-flex align-items-center">
                        <div class="bg-secondary bg-gradient h-75 w-75 rounded shadow-lg border border-warning d-flex flex-column justify-content-evenly" >
                            <h2 class="text-light text-center"><?= $row->categorie_name ?></h2>   
                            <div class="d-flex justify-content-around">
                                <a href="http://localhost/Wiki/categorie/delete_categorie/delete_id?delete_id=<?= $row->id ?>" class="btn btn-outline-danger">Delete</a>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#update<?= $row->id ?>">Update</button>

                                <div class="modal fade" id="update<?= $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Categorie</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <form action="http://localhost/Wiki/categorie/update_categorie/update_id?update_id=<?= $row->id ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label for="categorie_name" class="form-label">Categorie Name:</label>
                                                            <input type="text" class="form-control" id="name" value="<?= $row->categorie_name ?>" name="categorie_name" required>
                                                        </div>
                                                        <button type="submit" name="submit" value="update_categorie" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>