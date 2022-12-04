<?php
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=fr');
    };

    $advencement = 15;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if ($_GET['lang'] == "en") { echo 'Cut0x Website'; } else { echo 'Site de Cut0x'; }; ?></title>

  <!-- STYLE WEBSITE -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link rel="shortcut icon" href="../../assets/img/my-logo.png" type="image/x-icon">
</head>
<body>
    <div class="topnav" id="myTopnav">
        <?php if ($lang == "fr") { ?>
            <a href="../../"><i class="bi bi-house-fill"></i> Accueil</a>

            <a href="../../#about"><i class="bi bi-book-fill"></i> A Propos</a>

            <a href="../../#contact"><i class="bi bi-person-lines-fill"></i> Contact</a>

            <a href="./" class="active"><i class="bi bi-terminal-fill"></i> Projets</a>
        <?php } else { ?>
            <a href="../../"><i class="bi bi-house-fill"></i> Home</a>

            <a href="../../#about"><i class="bi bi-book-fill"></i> About</a>

            <a href="../../#contact"><i class="bi bi-person-lines-fill"></i> Contact</a>

            <a href="./" class="active"><i class="bi bi-terminal-fill"></i> Projects</a>
        <?php }; ?>
        <div class="dropdown">
            <button class="dropbtn">
                <i class="bi bi-caret-down-fill"></i> <?php if ($_GET['lang'] == "en") { echo 'English'; } else { echo 'Français'; }; ?>
            </button>
            <div class="dropdown-content">
                <a href="./?lang=<?php if ($_GET['lang'] == "en") { echo 'fr'; } else { echo 'en'; }; ?>"><?php if ($_GET['lang'] == "en") { echo 'Français'; } else { echo 'English'; }; ?></a>
            </div>
        </div>

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="ResponvieNav()">&#9776;</a>

        <script src="../../assets/js/topnav.js"></script>
    </div>

    <?php if ($lang == "fr") { ?>
        <!-- PROJECT PROGRESS BAR -->
        <div class="my-prg-b">
            <h1>
                Avancement
            </h1>
            <div style="margin: 15px;"></div>
            <div class="progress">
                <div class="progress-done" data-done="<?= $advencement; ?>">
                    <?= $advencement; ?>%
                </div>
            </div>
        </div>
        <script src="../../assets/js/progress-bar.js"></script>

        <div style="margin: 15px;"></div>
    
        <div class="project">
            <img src="../../assets/img/projects/logo/trklade-bot.png" height="180" style="border-radius: 90px" alt="">
            <div class="t">
                <h1>
                    Tranquillade
                </h1>
            </div>
        </div>

        <div style="margin: 240px;"></div>
    <?php } else { ?>
        <!-- PROJECT PROGRESS BAR -->
        <div class="my-prg-b">
            <h1>
                Advancement
            </h1>
            <div style="margin: 15px;"></div>
            <div class="progress">
                <div class="progress-done" data-done="<?= $advencement; ?>">
                    <?= $advencement; ?>%
                </div>
            </div>
        </div>
        <script src="../../assets/js/progress-bar.js"></script>

        <div style="margin: 40px;"></div>

        <div class="div-contact" id="contact">
            <h1>
                Contact me?
            </h1>
            <div class="div-contact-flex">
                <div class="div-contact-items">
                    <a href="../../contact/mail/" class="btn_mail_contact">
                        <i class="bi bi-envelope-fill"></i> Send me a mail here !
                    </a>
                </div>
                <div class="div-contact-items">
                    <a href="https://twitter.com/Cut0x_" target="_blank" class="btn_contact"><i class="bi bi-twitter"></i></a>

                    <a href="https://discord.com/invite/aTX6FP37pK" target="_blank" class="btn_contact"><i class="bi bi-discord"></i></a>
                </div>
            </div>
        </div>
    <?php }; ?>

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