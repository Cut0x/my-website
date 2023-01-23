<?php
	/*          PARAMETTRAGE LANGAGE          */
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };

    require_once './src/data/sql/data.php';
				
    session_start();

    if (isset($_SESSION['user_login'])) {
        $id = $_SESSION['user_login'];
                    
        $select_stmt = $db -> prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
        $select_stmt -> execute(
            array(
                ":uid" => $id
            )
        );
        
        $row = $select_stmt -> fetch(PDO::FETCH_ASSOC);
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
    // Btn about
    $about_fr = "À propos de moi";
    $about_en = "About me";
    // Article
    $arti_fr = "Dernier article publié";
    $arti_en = "Last article post";
    // Blog
    $go_b_fr = "Aller sur le blog";
    $go_b_en = "Go to see the blog";

    /** MON TAG DISCORD **/
    $tag = "5669";

    /* AFFICHAGE DERNIER ARTICLE */
    $prep_db = $db -> prepare("SELECT * FROM article");
    $lastId = $prep_db -> lastInsertId();
                    
    $select_stmt_article = $db -> prepare("SELECT * FROM article WHERE article_id=:uid");
    $select_stmt_article -> execute(
        array(
            ":uid" => $lastId
        )
    );
    
    $row_art = $select_stmt_article -> fetch(PDO::FETCH_ASSOC);
    
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
    <?php var_dump($lastId); ?>
    <header>
        <nav>
            <a class="logo" href="./?lang=<?= $lang; ?>">Cut0x</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>  
            </div>
            <ul class="nav-list">
                <li><a href="./contact/?lang=<?= $lang; ?>"><i class="bi bi-envelope-fill"></i> Contact</a></li>
                <li><a href="./blog/?lang=<?= $lang; ?>"><i class="bi bi-chat-right-fill"></i> Blog</a></li>
                <li><a href="./projects/?lang=<?= $lang; ?>"><i class="bi bi-file-code-fill"></i> <?php if ($lang == "fr") { echo $projects_fr; } else { echo $projects_en; }; ?></a></li>
                <li><?php if (isset($_SESSION['user_login'])) { ?>
                    <a href="./profil/?lang=<?= $lang; ?>"><i class="bi bi-person-circle"></i> <?= $row['pseudo']; ?></a>
                <?php } else { ?>
                    <a href="./auth/login/?lang=<?= $lang; ?>"><i class="bi bi-box-arrow-in-right"></i> <?php if ($lang == "fr") { echo $login_fr; } else { echo $login_en; }; ?></a></li>
                <?php }; ?>
                
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
                <span style="color: #5865F2;">Cut0x</span>#<span style="color: #5865F2;"><?= $tag; ?></span>
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

        <div class="link"><a href="https://discord.gg/aTX6FP37pK" target="_blank"><i class="bi bi-discord"></i></a></div>
    </div>
    
    <div style="margin: 18px;"></div>

    <div class="btn_div">
        <a href="./about/?lang=<?= $lang; ?>" class="btn">
            <?php if ($lang == "fr") { echo $about_fr; } else { echo $about_en; }; ?>
        </a>
    </div>

    <div style="margin: 400px;"></div>

    <div class="last_article">
        <h1><?php if ($lang == "fr") { echo $arti_fr; } else { echo $arti_en; }; ?></h1>
        <a href="./blog/?lang=<?= $lang; ?>&art=<?php echo '1'; ?>">
            <div class="article">
                <h1>
                    <?php if ($lang == "fr") { echo $row_art['title_content_fr']; } else { echo $row_art['title_content_en']; }; ?>
                </h1>

                <p>
                    <?php if ($lang == "fr") { echo $row_art['body_content_fr']; } else { echo $row_art['body_content_fr']; }; ?>
                </p>
            </div>
        </a>
    </div>
    
    <div style="margin: 18px;"></div>

    <div class="btn_div">
        <a href="./blog/?lang=<?= $lang; ?>" class="btn">
            <?php if ($lang == "fr") { echo $go_b_fr; } else { echo $go_b_en; }; ?>
        </a>
    </div>

    <div style="margin: 150px;"></div>

    <div class="footer">
        <?php if ($lang == "fr") { echo $foot_p1_fr; } else { echo $foot_p1_en; }; ?> <span style="color: orangered"><i class="bi bi-heart-fill"></i></span> <?php if ($lang == "fr") { echo $foot_p2_fr; } else { echo $foot_p2_en; }; ?> 
    </div>

    <script src="./src/js/mobile-navbar.js"></script>
    <script src="./src/js/script.js"></script>
</body>
</html>
