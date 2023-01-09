<?php
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php if ($lang == "fr") { echo "Coucou, je suis Cut0x !"; } else { echo "Hi, I'm Cut0x !"; }; ?></title>
</head>
<body>
</body>
</html>