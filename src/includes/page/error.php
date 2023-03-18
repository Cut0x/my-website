<?php
    if (!isset($_GET['id'])) {
        $errorMsg = "No error code was found !";
    } else if ($_GET['id'] == "1") { // Not have permission
        $errorMsg = "You do not have permission to access this page !";
    } else if ($_GET['id'] == "2") { // Unavailable at the moment
        $errorMsg = "Page unavailable at the moment !";
    } else if ($_GET['id'] == "3") { // Success code not found
        $errorMsg = "No success code was found !";
    }
?>

<div id="main">
    <div id="container-no-page">
        <h1>
            <i class="bi bi-backspace-reverse-fill"></i> An error has been detected !
        </h1>

        <p>
            <?= $errorMsg; ?>
        </p>

        <center>
            <a href="./?page=home">
                Go home
            </a>
        </center>
    </div>
</div>