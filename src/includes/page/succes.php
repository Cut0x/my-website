<?php
    if (!isset($_GET['id'])) {
        header('location: ./?page=error&id=3');
    } else if ($_GET['id'] == "1") { // Not have permission
        $succesMsg = "Your email has been sent !";
    } else if ($_GET['id'] == "2") { // Unavailable at the moment
        $succesMsg = "Page unavailable at the moment !";
    }
?>

<div id="main">
    <div id="container-succes">
        <h1>
            <i class="bi bi-check-circle-fill"></i> Succes !
        </h1>

        <p>
            <?= $succesMsg; ?>
        </p>

        <center>
            <a href="./?page=home">
                Go home
            </a>
        </center>
    </div>
</div>