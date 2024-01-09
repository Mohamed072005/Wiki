<?php
include "../app/View/includs/header.php";
?>
<body class="body-hello" style="background-color:blueviolet;">
    <main class=" d-flex align-items-center justify-content-center h-75">
        <div class=" d-flex flex-column justify-content-evenly h-75 mt-5">
            <div>
                <h1 class="text-light">Hello, <?= $_SESSION['first_name'], " ", $_SESSION['last_name'] ?></h1>
            </div>
            <div>
                <img src="" alt="">
            </div>
            <div class="text-center">
                <a class="btn btn-outline-warning" href="http://localhost/Wiki/">Enter</a>
            </div>
        </div>
    </main>
</body>