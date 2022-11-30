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
</head>
<body>
    <div class="topnav" id="myTopnav">
        <?php if ($lang == "fr") { ?>
            <a href="./#header" class="active"><i class="bi bi-house-fill"></i> Accueil</a>

            <a href="#about"><i class="bi bi-book-fill"></i> A Propos</a>

            <a href="./contact/"><i class="bi bi-person-lines-fill"></i> Contact</a>

            <a href="#projects"><i class="bi bi-terminal-fill"></i> Projets</a>
        <?php } else { ?>
            <a href="./" class="active"><i class="bi bi-house-fill"></i> Home</a>

            <a href="#about"><i class="bi bi-book-fill"></i> About</a>

            <a href="./contact/"><i class="bi bi-person-lines-fill"></i> Contact</a>

            <a href="#projects"><i class="bi bi-terminal-fill"></i> Projects</a>
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

        <script src="./assets/js/topnav.js"></script>
    </div>


    <?php if ($lang == "fr") { ?>
        <div class="div-header" id="header">
            <h1>
                Hey !
            </h1>
            <script src="./assets/js/typing-fr.js"></script>
        </div>

        <div style="margin: 15px;"></div>

        <div class="div-about" id="about">
            <div class="about-banner">
                <div class="about-content-pdp">
                    <h1>
                        <img src="./assets/img/my-logo.png" alt="">
                        <i class="bi bi-arrow-return-right"></i> <span style="color: #5865F2;">Cut0x</span>#<span style="color: #5865F2;">0001</span> 
                    </h1>
                    <p class="desciption">
                        Bonjour, je suis Cut0x, j'ai 17ans (bientôt 18ans). Je suis un passionné de programmation depuis maintenant 10ans (j'ai commencé la programmation en 2012).
                        Ce que j'aime par dessus tout, c'est le développement web, j'utilise pour ça le HTML5, le CSS3, le PHP et le JavaScript.
                    </p>
                    <div class="social_link">
                        <a target="_blank" href="https://twitter.com/Cut0x_"><i class="bi bi-twitter"></i></a>

                        <a target="_blank" href="https://github.com/Cut0x"><i class="bi bi-github"></i></a>

                        <a target="_blank" href="https://www.twitch.tv/cut0x"><i class="bi bi-twitch"></i></a>

                        <a target="_blank" href="https://www.youtube.com/channel/UCzYSf-VLGKlqmnT6_E3hAXw"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 220px;"></div>

        <!-- MY PROJECTS -->
        <div>
            <h2 style="padding-left: 10px;" id="projects">
                Mes Projets :
            </h2>
            <div class="scrollmenu">
                <a href="./project/tranquillade-bot/?lang=<?= $lang; ?>">
                    <img src="https://cdn.discordapp.com/attachments/914271938359210045/1043653408235716690/0_3.png" style="width: 500px; border-radius: 20px;" alt="">
                </a>
            </div>
        </div>
    <?php } else { ?>
        <div class="div-header" id="header">
            <h1>
                   Hey!
            </h1>
            <script src="./assets/js/typing-en.js"></script>
        </div>

        <div style="margin: 15px;"></div>

        <div class="div-about" id="about">
            <div class="about-banner">
                <div class="about-content-pdp">
                    <h1>
                        <img src="./assets/img/my-logo.png" alt="">
                        <i class="bi bi-arrow-return-right"></i> <span style="color: #5865F2;">Cut0x</span>#<span style="color: #5865F2;">0001</span> 
                    </h1>
                    <p class="desciption">
                        Hello, I'm Cut0x, I'm 17 (soon to be 18). I have been a programming enthusiast for 10 years now (I started programming in 2012).
                        What I love above all is web development, I use for that HTML5, CSS3, PHP and JavaScript.
                    </p>
                    <div class="social_link">
                        <a target="_blank" href="https://twitter.com/Cut0x_"><i class="bi bi-twitter"></i></a>

                        <a target="_blank" href="https://github.com/Cut0x"><i class="bi bi-github"></i></a>

                        <a target="_blank" href="https://www.twitch.tv/cut0x"><i class="bi bi-twitch"></i></a>

                        <a target="_blank" href="https://www.youtube.com/channel/UCzYSf-VLGKlqmnT6_E3hAXw"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 220px;"></div>

        <!-- MY PROJECTS -->
        <div>
            <h2 style="padding-left: 10px;" id="projects">
                My Projects :
            </h2>
            <div class="scrollmenu">
                <a href="./project/tranquillade-bot/?lang=<?= $lang; ?>">
                    <img src="https://cdn.discordapp.com/attachments/914271938359210045/1043653408235716690/0_3.png" style="width: 500px; border-radius: 20px;" alt="">
                </a>
            </div>
        </div>
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