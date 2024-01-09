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
                    <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">add Wiki</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Hotel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="" method="post" >
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name:</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contactNumber" class="form-label">Contact Number:</label>
                                                <input type="tel" class="form-control" id="contactNumber"
                                                       name="contactNumber" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amenities" class="form-label">Amenities:</label>
                                                <input type="text" class="form-control" id="amenities" name="amenities"
                                                       required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pays" class="form-label">Pays:</label>
                                                <input type="text" class="form-control" id="pays" name="pays" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ville" class="form-label">Ville:</label>
                                                <input type="text" class="form-control" id="ville" name="ville" required>
                                            </div>
                                            <button type="submit" name="inserthotel" class="btn btn-primary">add hotel</button>
                                        </form>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>