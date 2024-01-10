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
                    <li><a href="http://localhost/Wiki/tag/display_tag">Tags</a></li>
                    <li><a href="http://localhost/Wiki/categorie/display_categorie">Categories</a></li>
                <?php } ?>
                    <li><a href="http://localhost/Wiki/wiki/display_wiki">Wikis</a></li>
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Wki</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="http://localhost/Wiki/wiki/insert_wiki" method="POST">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Title:</label>
                                                <input type="text" class="form-control" id="name" name="title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contactNumber" class="form-label d-block">The Content:</label>
                                                <textarea type="text" id="contactNumber" class="form-control"
                                                       name="content" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contactNumber" class="form-label d-block">The Categories:</label>
                                                <?php foreach($data_cate as $rows){?>
                                                    <input type="checkbox" class="" autocomplete="off">
                                                    <label class="btn btn-outline-primary"><?= $rows->categorie_name ?></label>
                                                <?php } ?>
                                                
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="pays" class="form-label">Hashtag:</label>
                                                <select id ="js-example-basic-multiple" class="form-select" name="states[]" multiple="multiple">
                                                    <option value="AL">Alabama</option>
                                                    <option value="">ftftf</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </div> -->
                                            <button type="submit" name="submit" value="insert_wiki" class="btn btn-primary">add Wiki</button>
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
                        <?php if($row->wiki_status == 0){ ?>
                            <div class="bg-secondary bg-gradient h-auto rounded shadow-lg border border-2 border-warning d-flex flex-column justify-content-evenly" style="width: 350px;">
                        <?php }else{ ?>
                            <div class="bg-secondary bg-gradient h-auto rounded shadow-lg border border-2 border-success d-flex flex-column justify-content-evenly" style="width: 350px;">
                        <?php } ?>
                            
                                <h2 class="text-light text-center mb-4 mt-4"><?= $row->title?></h2>
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center">
                                        <h4 class="text-light" style="width: 250px;">Categorie: <span class="text-info"><?= $row->categorie_name ?></span class="text-info"></h4>
                                        <h4 class="text-light" style="width: 250px;">Author: <span class="text-info"><?= $row->first_name ?></span></h4>
                                        <h4 class="text-light" style="width: 250px;">Author: <span class="text-info"><?= $row->tag_name ?></span></h4>
                                    </div>
                                    <div class="d-flex justify-content-around mt-4 mb-4">
                                        <a href="http://localhost/Wiki/wiki/delete_wiki/delete_id?delete_id=<?= $row->id_wiki ?> & id_WT=<?= $row->id_WT ?>" class="btn btn-outline-danger">Delete</a>
                                        <button class="btn btn-outline-warning">Update</button>
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