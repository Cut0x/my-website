<?php
	/*          PARAMETTRAGE LANGAGE          */
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };
	
	/*          DEFINITION TEXT PAR LANG          */
	// Titre
	$titre_fr = "Coucou, je suis Cut0x !";
	$titre_en = "Hi, I'm Cut0x !";
	// NavBar
	$projects_fr = "Projets";
	$projects_en = "Projects";
	$login_fr = "Connexion";
	$login_en = "Log In";
	// Bouton
	$pass_fr = "Switch to English";
	$pass_en = "Passer en Français";
    // Description
    $desc_fr = "Bonjour, je suis Cut0x, j'ai 17ans (bientôt 18ans). Je suis un passionné de programmation depuis maintenant 10ans (j'ai commencé la programmation en 2012). Ce que j'aime par dessus tout, c'est le développement web, j'utilise pour ça le HTML5, le CSS3, le PHP et le JavaScript.";
    $desc_en = "Hello, I'm Cut0x, I'm 17 (soon to be 18). I have been a programming enthusiast for 10 years now (I started programming in 2012). What I love above all is web development, I use for that HTML5, CSS3, PHP and JavaScript.";
    // Footer
    $foot_p1_fr = "Développé avec";
    $foot_p1_en = "Developed with";
    $foot_p2_fr = "par <span style='color: #5865F2;'>Cut0x</span>";
    $foot_p2_en = "by <span style='color: #5865F2;'>Cut0x</span>";
?>

<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>
	<?php if ($lang == "fr") {
		echo $titre_fr;
	} else {
		echo $titre_en;
	}; ?>
	</title>
	
	<link rel="stylesheet" href="./src/css/style.css" />
</head>
<body>
<header>
        <nav>
            <a class="logo" href="./">Cut0x</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>  
            </div>
            <ul class="nav-list">
                <li><a href="#">Contact</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#"><?php if ($lang == "fr") { echo $projects_fr; } else { echo $projects_en; }; ?></a></li>
                <li><a href="./auth/login/?lang=<?= $lang; ?>"><?php if ($lang == "fr") { echo $login_fr; } else { echo $login_en; }; ?></a></li>
            </ul>
        </nav>
    </header>

    <div style="margin: 20px;"></div>

    <div style="text-align: center;">
        <a href="./?lang=<?php if ($lang == "fr") { echo "en"; } else { echo "fr"; }; ?>" class="btn"><?php if ($lang == "fr") { echo $pass_fr; } else { echo $pass_en; }; ?></a>
    </div>
    
    <div style="margin: 20px;"></div>

    <div class="container">
        <div class="obj">
            <img src="./src/img/my-logo.png" alt="Logo Cut0x">
        </div>

        <div class="obj">
            <h1>
                <span style="color: #5865F2;">Cut0x</span>#<span style="color: #5865F2;">0001</span>
            </h1>

            <p>
            <?php if ($lang == "fr") { echo $desc_fr; } else { echo $desc_en; }; ?>
            </p>
        </div>
    </div>

    <div class="social_links">
        <div class="link"><a href="https://twitter.com/Cut0x_" target="_blank"><i class="bi bi-twitter"></i></a></div>

        <div class="link"><a href="https://github.com/Cut0x" target="_blank"><i class="bi bi-github"></i></a></div>

        <div class="link"><a href="https://www.twitch.tv/cut0x" target="_blank"><i class="bi bi-twitch"></i></a></div>
    </div>

    <div style="margin: 65px;"></div>

    <div id="article"></div>

    <div style="margin: 400px;"></div>

    <div class="last_article">
        <h1> <a href="#article"><i class="bi bi-arrow-down-circle-fill"></i></a> Dernier article publié</h1>
        <a href="#">
            <div class="article">
                <h1>
                    Comment faire du montage ?
                </h1>

                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, velit reiciendis placeat voluptatum voluptatibus quam maiores recusandae, sit aliquid, hic ullam. Fugiat quasi ratione, corrupti exercitationem nam illo vel facere.
                </p>
            </div>
        </a>
    </div>

    <div style="margin: 600px;"></div>

    <div class="footer">
        <?php if ($lang == "fr") { echo $foot_p1_fr; } else { echo $foot_p1_en; }; ?> <span style="color: orangered"><i class="bi bi-heart-fill"></i></span> <?php if ($lang == "fr") { echo $foot_p2_fr; } else { echo $foot_p2_en; }; ?> 
    </div>

    <script src="./src/js/mobile-navbar.js"></script>
    <script src="./src/js/script.js"></script>
</body>
</html>