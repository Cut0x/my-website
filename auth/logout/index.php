<?php
    $lang = $_GET['lang'];
    session_start();

    header("location: ../../?lang=".$lang);

    session_destroy();
?>