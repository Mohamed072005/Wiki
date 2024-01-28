<?php
session_start();
function index($input) {
    $USER_NAME = "root";
    $HOST_NAME = "localhost";
    $DB_NAME = "wiki";
    $PASSWORD = "";
    
    
    try{
        $conn = new PDO("mysql:hostname={$HOST_NAME}; dbname={$DB_NAME}", $USER_NAME, $PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
    
    
    $query = "SELECT * FROM wikis WHERE title LIKE :input AND wiki_status = 1";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':input', '%'.$input.'%', PDO::PARAM_STR);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
}
$input = $_POST['input'];
$wiki= index($input);
var_dump($wiki);
die();
        foreach($wiki as $row){ ?>

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
                        <?php } else { echo ""; } }?>
                </div>
                
            </div>
        </div>


