<?php
    require_once './src/data/config.php';

    session_start();

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

    <?php
    if ($_GET['page'] == "home") {
        /* IMPORT HOME PAGE */
        /* **************** */
    } else if ($_GET['page'] == "about") {
        /* IMPORT ABOUT PAGE */
        header('location: ./?page=error&id=2');
        /* ***************** */
    } else if ($_GET['page'] == "projects") {
        /* IMPORT PROJECTS PAGE */
        header('location: ./?page=error&id=2');
        /* ******************** */
    } else if ($_GET['page'] == "contact") {
        /* IMPORT CONTACT PAGE */
        include('./src/includes/page/contact.php');
        /* ******************* */
    } else if ($_GET['page'] == "auth") {
        /* IMPORT AUTH PAGE */
        header('location: ./?page=error&id=2');
        /* **************** */
    } else if ($_GET['page'] == "error") {
        /* IMPORT ERROR PAGE */
        include('./src/includes/page/error.php');
        /* ***************** */
    } else if ($_GET['page'] == "succes") {
        /* IMPORT SUCCES PAGE -*/
        include('./src/includes/page/succes.php');
        /* ******************* */
    } else {
        /* IMPORT NO PAGE LINKED */
        include('./src/includes/page/no-page.php');
        /* ********************* */
    };
    ?>

    <!-- IMPORT FOOTER -->
    <?php include('./src/includes/footer.php'); ?>
    <!-- ------------- -->

    <!-- SCRIPT JAVASCRIPT -->
    <script src="./src/js/script.js"></script>
    <!-- ----------------- -->
</body>
</html>