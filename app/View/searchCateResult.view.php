<?php if(isset($data)){foreach($data as $row){ ?>
    <div class="col-md-4 mt-4 d-flex align-items-center">
        <div class="bg-secondary bg-gradient rounded shadow-lg d-flex flex-column justify-content-evenly" style="width: 350px;">
            <h2 class="text-light text-center mb-4 mt-4"><?= $row->categorie_name ?></h2>   
            
                <?php if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1){?>
                <div class="d-flex justify-content-around mb-4 mt-4">
                <a href="http://localhost/wiki/categorie/delete_categorie/delete_id?delete_id=<?= $row->id_categorie ?>" class="btn btn-outline-danger">Delete</a>
                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#update<?= $row->id_categorie ?>">Update</button>
                <?php } ?>
                 <!-- MODAL -->
                <div class="modal fade" id="update<?= $row->id_categorie ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <form action="http://localhost/wiki/categorie/update_categorie/update_id?update_id=<?= $row->id_categorie ?>" method="POST">
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
<?php }} ?>