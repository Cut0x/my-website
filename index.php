<?php
    require_once './src/data/config.php';

    if (!isset($_GET['page'])) {
        header('location: ./?page=home');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cut0x's Website</title>

    <meta name="description" content="Welcome to the website of Loïc, alias Cut0x !">

    <link rel="shortcut icon" href="./src/assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <!-- IMPORT HEADER -->
    <?php include('./src/includes/header.php'); ?>
    <!-- ------------- -->

    <?php if ($_GET['page'] == "home") { ?>
    <?php } else if ($_GET['page'] == "about") { ?>
    <?php } else if ($_GET['page'] == "projects") { ?>
    <?php } else if ($_GET['page'] == "contact") { ?>
    <?php } else if ($_GET['page'] == "auth") { ?>
    <?php } else if ($_GET['page'] == "error") { ?>
        <!-- IMPORT ERROR PAGE -->
        <?php include('./src/includes/page/error.php'); ?>
        <!-- ------------------ -->
    <?php } else if ($_GET['page'] == "succes") { ?>
        <!-- IMPORT SUCCES PAGE -->
        <?php include('./src/includes/page/succes.php'); ?>
        <!-- ------------------ -->
    <?php } else { ?>
        <!-- IMPORT NO PAGE LINKED -->
        <?php include('./src/includes/page/no-page.php'); ?>
        <!-- --------------------- -->
    <?php }; ?>

    <!-- IMPORT FOOTER -->
    <?php include('./src/includes/footer.php'); ?>
    <!-- ------------- -->

    <script src="./src/js/script.js"></script>
</body>
</html>