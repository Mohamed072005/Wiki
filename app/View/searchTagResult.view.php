
<?php if(isset($data)){foreach($data as $row){ ?>
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
<?php }} ?>