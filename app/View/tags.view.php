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

                <div class="container-form-search container d-flex justify-content-center">
                    
                        <form class="search-form w-75 d-flex justify-content-center" role="search">
                            <input class="search-input form-control me-2 w-50" type="search" placeholder="Search" id="searchinput">
                            <!-- <button class="btn btn-outline-warning">Search</button> -->
                        </form>
                    
                </div>
    
                <section class="section dashboard">
                <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1){?>
                    <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">add Tag</a>
                <?php } ?>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Tag</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                    <form action="http://localhost/wiki/tag/insert_tag" method="POST" >
                                            <div class="mb-3">
                                                <label for="categorie_name" class="form-label">Tag Name:</label>
                                                <input type="text" class="form-control" id="name" name="tag_name" required>
                                            </div>
                                            <button type="submit" name="submit" value="insert_tag" class="btn btn-primary">add Tag</button>
                                        </form>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <div class="container-fluid row h-50" id="searcharea">
                <?php foreach($data as $row){ ?> 
                    <div class="col-md-4 mt-4 d-flex align-items-center">
                        <div class="bg-secondary bg-gradient rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
                            <h2 class="text-light text-center mt-4 mb-4"><?= $row->tag_name ?></h2>   
                            <div class="d-flex justify-content-around mt-4 mb-4">
                                <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1){?>
                                <a href="http://localhost/wiki/tag/delete_tag/delete_id?delete_id=<?= $row->id_tag ?>" class="btn btn-outline-danger">Delete</a>
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#update<?= $row->id_tag ?>">Update</button>
                                <?php } ?>
                                <!-- MODAL -->
                                <div class="modal fade" id="update<?= $row->id_tag ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Tag</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <form action="http://localhost/wiki/tag/update_tag/update_id?update_id=<?= $row->id_tag ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label for="categorie_name" class="form-label">Tag Name:</label>
                                                            <input type="text" class="form-control" id="name" value="<?= $row->tag_name ?>" name="tag_name" required>
                                                        </div>
                                                        <button type="submit" name="submit" value="update_tag" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal final -->
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
<script>
        let searchInput = document.getElementById('searchinput');
        let searchArea =  document.getElementById('searcharea');
        searchInput.addEventListener('input', function(){
            let value = searchInput.value;
            if(value !== ""){
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "http://localhost/wiki/tag/searchTag", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4 && xhr.status == 200){
                        searchArea.innerHTML = "";
                        searchArea.innerHTML +=  xhr.responseText
                    }
                }
                xhr.send("input=" + value);
            }else{
                                searchArea.innerText = 'No Result';
                                searchArea.style.color = 'white';
                            }
        })
    </script>

</body>

</html>