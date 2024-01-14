<?php

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
        
        
                    <main class="col-md-10 p-3 main-content">
        
                        <div class="container-form-search container d-flex justify-content-center">
                            
                                <form class="search-form w-75 d-flex justify-content-center" role="search">
                                    <input id="search" class="search-input form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search">
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
                                                <form action="http://localhost/wiki/wiki/insert_wiki" method="POST">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Title:</label>
                                                        <input type="text" class="form-control" id="name" name="title" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="contactNumber" class="form-label d-block">The Content:</label>
                                                        <textarea type="text" id="contactNumber" class="form-control"
                                                               name="content" required></textarea>
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="contactNumber" class="form-label d-block">The Categories:</label>
                                                        <div class="row">
                                                            <?php foreach($data_cate as $rows){?>
                                                                <div class="col-4">
                                                                    <div class="form-radio">
                                                                        <input type="radio" class="form-radio-input" id="<?= $rows->id_categorie ?>" name="categorie" value="<?= $rows->id_categorie ?>">
                                                                        <label class="form-radio-label" for="<?= $rows->id_categorie ?>"><?= $rows->categorie_name ?></label>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            </div>
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="contactNumber" class="form-label d-block">The Tags:</label>
                                                        <div class="row">
                                                            <?php foreach($data_tag as $rows){?>
                                                                <div class="col-4">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" id="<?= $rows->id_tag ?>" name="tag[]" value="<?= $rows->id_tag ?>">
                                                                        <label class="form-check-label" for="<?= $rows->id_tag ?>"><?= $rows->tag_name ?></label>
                                                                    </div>
                                                                </div>
                                                                
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit" value="insert_wiki" class="btn btn-primary">add Wiki</button>
                                                </form>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div id="search_result">
                        </div>
        
        
                        <div class="container-fluid row h-50">
        
                        <?php if(isset($_SESSION['role_id'])){ 
        
                                if($_SESSION['role_id'] == 1){
        
                                    foreach($data as $row){ ?>
        
                            <div class="col-md-4 mt-4 d-flex align-items-center">
                               
        
                                    <?php if($row->wiki_status == 0){ ?>
        
                                        <div class="bg-secondary bg-gradient h-auto rounded shadow-lg border border-3 border-warning d-flex flex-column justify-content-evenly" style="width: 350px;">
        
                                    <?php }else{ ?>
        
                                        <div class="bg-secondary bg-gradient h-auto rounded shadow-lg border border-3 border-info d-flex flex-column justify-content-evenly" style="width: 350px;">
        
                                    <?php } ?>
                                        <a href="http://localhost/wiki/wiki/wiki_details/wiki_id?wiki_id=<?= $row->id_wiki ?>" class="navbar-brand"><h2 class="text-light text-center mt-4"><?= $row->title?></h2>
                                        <div class="card-body mt-4 mb-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <h4 class="text-light" style="width: 250px;">Categorie: <span class="text-info"><?= $row->categorie_name ?></span class="text-info"></h4>
                                                <h4 class="text-light" style="width: 250px;">Author: <span class="text-info"><?= $row->first_name ?></span></h4>
                                            </div></a>
                                            
                                            <div class="d-flex justify-content-around mt-4">
                                                <?php 
                                                    if($row->wiki_status == 0){ ?>
                                                    <a href="http://localhost/wiki/wiki/update_wiki_status/update_id?update_id=<?= $row->id_wiki ?>" class="btn btn-outline-info">To Publish</a>
                                                    <?php } else { echo ""; } ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php }}else if($_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 3){

                                        foreach($data as $row){ 
                                        
                                        if($row->wiki_status == 1){ ?>
        
                                        <div class="col-md-4 mt-4 d-flex align-items-center">
                                            <div class="bg-secondary bg-gradient h-auto rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
                                                <a href="http://localhost/wiki/wiki/wiki_details/wiki_id?wiki_id=<?= $row->id_wiki ?>" class="navbar-brand"><h2 class="text-light text-center mt-4"><?= $row->title?></h2>
                                                <div class="card-body mt-4 mb-4">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <h4 class="text-light" style="width: 250px;">Categorie: <span class="text-info"><?= $row->categorie_name ?></span class="text-info"></h4>
                                                        <h4 class="text-light" style="width: 250px;">Author: <span class="text-info"><?= $row->first_name ?></span></h4>
                                                    </div></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }}}}else{ 
                                
                                foreach($data as $row){ 
                                    if($row->wiki_status == 1){?>
                                    <div class="col-md-4 mt-4 d-flex align-items-center">
                                        <div class="bg-secondary bg-gradient h-auto rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
                                            <a href="http://localhost/wiki/wiki/wiki_details/wiki_id?wiki_id=<?= $row->id_wiki ?>" class="navbar-brand"><h2 class="text-light text-center mt-4"><?= $row->title?></h2>
                                            <div class="card-body mt-4">
                                                <div class="d-flex flex-column align-items-center mb-4">
                                                    <h4 class="text-light" style="width: 250px;">Categorie: <span class="text-info"><?= $row->categorie_name ?></span class="text-info"></h4>
                                                    <h4 class="text-light" style="width: 250px;">Author: <span class="text-info"><?= $row->first_name ?></span></h4>
                                                </div></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }}}?>
                                </div>
                    </main>
                </div>
            </div>
        
        
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        </body>

</html>