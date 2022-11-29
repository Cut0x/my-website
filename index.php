<?php
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=fr');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if ($_GET['lang'] == "en") { echo 'Cut0x Website'; } else { echo 'Site de Cut0x'; }; ?></title>

  <!-- STYLE WEBSITE -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link rel="shortcut icon" href="./assets/img/my-logo.png" type="image/x-icon">

  <style>
    .cards {
        display: grid;
        grid-template-colunms: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
  </style>
</head>
<body>
    <div class="topnav" id="myTopnav">
        <a href="./" class="active"><i class="bi bi-house-fill"></i> Home</a>

        <a href="./about/"><i class="bi bi-book-fill"></i> About</a>

        <a href="./contact/"><i class="bi bi-person-lines-fill"></i> Contact</a>

        <div class="dropdown">
            <button class="dropbtn">
                <?php if ($_GET['lang'] == "en") { echo '<i class="bi bi-globe-americas"></i> English'; } else { echo '<i class="bi bi-globe-central-south-asia"></i> Français'; }; ?>
            </button>
            <div class="dropdown-content">
                <a href="./?lang=<?php if ($_GET['lang'] == "en") { echo 'fr'; } else { echo 'en'; }; ?>"><?php if ($_GET['lang'] == "en") { echo '<i class="bi bi-globe-central-south-asia"></i> Français'; } else { echo '<i class="bi bi-globe-americas"></i> English'; }; ?></a>
            </div>
        </div>

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="ResponvieNav()">&#9776;</a>

        <script src="./assets/js/topnav.js"></script>
    </div>

    <div style="margin: 25px;"></div>

    <?php if ($lang == "fr") { ?>
    <?php } else { ?>
    <?php }; ?>

    <div style="margin: 25px;"></div>

    <footer>
        <?php if ($lang == "fr") { ?>
            <div>
                <h1>
                    Site de <span style="color: yellow;">Cut0x</span> !
                </h1>
                <p>
                    Designé et développé avec <span style="color: red;"><i class="bi bi-suit-heart-fill"></i></span> par <a href="https://twitter.com/Cut0x_" target="_blank">Cut0x</a>.
                </p>
            </div>

            <div>
                <ul>Utile
                    <li>
                        <i class="bi bi-arrow-right"></i> <a href="">A Propos</a><br>
                        <i class="bi bi-arrow-right"></i> <a href="../faq/">Contact</a><br>
                        <i class="bi bi-arrow-right"></i> <a href="./?lang=en">I'm English</a><br>
                    </li>
                </ul>
            </div>
        <?php } else { ?>
            <div>
                <h1>
                    <span style="color: yellow;">Cut0x</span> website !
                </h1>
                <p>
                    Designed and developed with <span style="color: red;"><i class="bi bi-suit-heart-fill"></i></span> by <a href="https://twitter.com/Cut0x_" target="_blank">Cut0x</a>.
                </p>
            </div>

            <div>
                <ul>Useful
                    <li>
                        <i class="bi bi-arrow-right"></i> <a href="">About</a><br>
                        <i class="bi bi-arrow-right"></i> <a href="../faq/">Contact</a><br>
                        <i class="bi bi-arrow-right"></i> <a href="./?lang=fr">Je suis français</a><br>
                    </li>
                </ul>
            </div>
        <?php }; ?>
    </footer>
</body>
</html>