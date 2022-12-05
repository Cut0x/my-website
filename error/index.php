<?php
    $msg = "";

    if ($_GET['n'] == "1") $msg = "La page que vous avez demandé est en développement...";
    if ($_GET['n'] == "2") $msg = "La page que vous avez demandé est indisponible...";
    if ($_GET['n'] == "3") $msg = "La page que vous avez demandé est réservé aux membres...";
    if ($_GET['n'] == "4") $msg = "La page que vous avez demandé est réservé aux admins...";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur N°<?= $_GET['n']; ?></title>
</head>
<body>
    <h1>
        <?= $msg; ?>
        <a href="../">Retourner à l'accueil</a> - <a href="../">Back to home</a>
    </h1>
</body>
</html>