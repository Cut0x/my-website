<?php
    /* CONFIGURATION ET RECUPE DONNEE SESSION */
    require_once '../src/data/sql/data.php';
    require_once '../src/data/config.php';
				
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

	/*          PARAMETTRAGE LANGAGE          */
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };
	
	/*          DEFINITION TEXT PAR LANG          */
	// Titre
	$titre_fr = "Blog";
	$titre_en = "Blog";
	// NavBar
	$projects_fr = "Projets";
	$projects_en = "Projects";
	$login_fr = "Connexion";
	$login_en = "Log In";
	// Bouton
	$pass_fr = "Switch to English";
	$pass_en = "Passer en Français";
    // Footer
    $foot_p1_fr = "Développé avec";
    $foot_p1_en = "Developed with";
    $foot_p2_fr = "par <span style='color: #5865F2;'>Cut0x</span>";
    $foot_p2_en = "by <span style='color: #5865F2;'>Cut0x</span>";
    // Require
    $req_fr = "Requis";
    $req_en = "Required";
    // Send
    $send_fr = "Envoyer";
    $send_en = "Send";
    // Log Out
	$logout_fr = "Déconnexion";
	$logout_en = "Log Out";
    // Message error title
    $error_title_fr = "Erreur 1";
    $error_title_en = "Error 1";
    // Message error content
    $error_content_fr = "Erreur 2";
    $error_content_en = "Error 2";

    /* CODE POUR RECUPERER L'ARTICLE */
    if (isset($_GET['art'])) {
        $id_art = $_GET['art'];
                    
        $select_stmt_t = $db -> prepare("SELECT * FROM article WHERE article_id=:uid");
        $select_stmt_t -> execute(
            array(
                ":uid" => $id_art
            )
        );
        
        $row_art = $select_stmt_t -> fetch(PDO::FETCH_ASSOC);


        $author_id = $row_art['authorId'];
                    
        $select_stmt_a = $db -> prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
        $select_stmt_a -> execute(
            array(
                ":uid" => $author_id
            )
        );
        
        $row_author = $select_stmt_a -> fetch(PDO::FETCH_ASSOC);
    };

    $articles = $db->query('SELECT * FROM article ORDER BY date_publication DESC');
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
	
	<link rel="stylesheet" href="../src/css/style.css" />
</head>
<body>
<header>
        <nav>
            <a class="logo" href="../?lang=<?= $lang; ?>">Cut0x</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>  
            </div>
            <ul class="nav-list">
                <li><a href="../contact/?lang=<?= $lang; ?>"><i class="bi bi-envelope-fill"></i> Contact</a></li>
                <li><a href="./?lang=<?= $lang; ?>"><i class="bi bi-chat-right-fill"></i> Blog</a></li>
                <li><a href="../projects/?lang=<?= $lang; ?>"><i class="bi bi-file-code-fill"></i> <?php if ($lang == "fr") { echo $projects_fr; } else { echo $projects_en; }; ?></a></li>
                <li><?php if (isset($_SESSION['user_login'])) { ?>
                    <a href="../profil/?lang=<?= $lang; ?>"><i class="bi bi-person-circle"></i> <?= $row['pseudo']; ?></a>
                <?php } else { ?>
                    <a href="../auth/login/?lang=<?= $lang; ?>"><i class="bi bi-box-arrow-in-right"></i> <?php if ($lang == "fr") { echo $login_fr; } else { echo $login_en; }; ?></a></li>
                <?php }; ?>
            </ul>
        </nav>
    </header>

    <div style="margin: 20px;"></div>

    <div style="text-align: center;">
        <?php if (isset($_GET['art'])) { ?>
            <a href="./?lang=<?php if ($lang == "fr") { echo "en"; } else { echo "fr"; }; ?>&art=<?= $_GET['art']; ?>" class="btn"><?php if ($lang == "fr") { echo $pass_fr; } else { echo $pass_en; }; ?></a>
        <?php } else { ?>
            <a href="./?lang=<?php if ($lang == "fr") { echo "en"; } else { echo "fr"; }; ?>" class="btn"><?php if ($lang == "fr") { echo $pass_fr; } else { echo $pass_en; }; ?></a>
        <?php }; ?>
        <?php if (isset($_REQUEST['user_login'])) { ?>
            <a href="../auth/logout/?lang=<?= $lang; ?>" class="btn"><?php if ($lang == "fr") { echo $logout_fr; } else { echo $logout_en; }; ?></a>
        <?php }; ?>
        <?php if (isset($_GET['art'])) { ?>
            <a href="./?lang=<?= $lang; ?>" class="btn"><i class="bi bi-arrow-return-left"></i></a>
        <?php }; ?>
    </div>
    
    <div style="margin: 90px;"></div>

    <?php if (isset($_GET['art'])) { ?>
        <?php if ($lang == "fr") { ?> 
            <div class="container_art">
                <div class="author">
                    <h1>Auteur</h1>
                    <h3><?= $row_author['pseudo']; ?> <?php if ($row_author['certif'] == 1) { echo '<span style="color: darkgreen;"><i class="bi bi-patch-check-fill"></i></span>'; }; ?> </h3>
                </div>

                <div style="margin: 20px;"></div>

                <div class="content">
                    <div class="div_img" style="background-image: url(<?= $row_art['url_image']; ?>);"></div>
                    <h1><?= $row_art['title_content_fr']; ?></h1>

                    <p>
                        <?= nl2br($row_art['body_content_fr']); ?>
                    </p>
                </div>
            </div>
        <?php } else { ?>
            <div class="container_art">
                <div class="author">
                    <h1>Author</h1>
                    <h3><?= $row_author['pseudo']; ?> <?php if ($row_author['certif'] == 1) { echo '<span style="color: darkgreen;"><i class="bi bi-patch-check-fill"></i></span>'; }; ?> </h3>
                </div>

                <div style="margin: 20px;"></div>

                <div class="content">
                    <div class="div_img" style="background-image: url(<?= $row_art['url_image']; ?>);"></div>
                    <h1><?= $row_art['title_content_en']; ?></h1>

                    <p>
                        <?= nl2br($row_art['body_content_en']); ?>
                    </p>
                </div>
            </div>
        <?php }; ?>
    <?php } else { ?>
        <?php while($a = $articles -> fetch()) { ?>
            <div class="last_article">
                <a href="./?lang=<?= $lang; ?>&art=<?= $a['article_id']; ?>">
                    <div class="article">
                        <h1>
                            <?php if ($lang == "fr") { echo $a['title_content_fr']; } else { echo $a['title_content_en']; }; ?>
                        </h1>

                        <p>
                            <?php if ($lang == "fr") { echo $a['body_content_fr']; } else { echo $a['body_content_fr']; }; ?>
                        </p>
                    </div>
                </a>
            </div>

            <div style="margin: 35px;"></div>
        <?php }; ?>
    <?php }; ?>
    <div class="container_form">
    </div>

    <div style="margin: 200px;"></div>

    <div class="footer">
        <?php if ($lang == "fr") { echo $foot_p1_fr; } else { echo $foot_p1_en; }; ?> <span style="color: orangered"><i class="bi bi-heart-fill"></i></span> <?php if ($lang == "fr") { echo $foot_p2_fr; } else { echo $foot_p2_en; }; ?> 
    </div>

    <script src="../../src/js/mobile-navbar.js"></script>
    <script src="../../src/js/script.js"></script>
</body>
</html>