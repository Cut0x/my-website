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
	$titre_fr = "Mes projets";
	$titre_en = "My projects";
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

    $text_fr = "Page indisponible pour le moment...";
    $text_en = "Page currently unavailable..."
?>

<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="shortcut icon" href="../src/img/my-logo.png" type="image/x-icon">

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
                <li><a href="../blog/?lang=<?= $lang; ?>"><i class="bi bi-chat-right-fill"></i> Blog</a></li>
                <li><a href="../projects/?lang=<?= $lang; ?>"><i class="bi bi-file-code-fill"></i> <?php if ($lang == "fr") { echo $projects_fr; } else { echo $projects_en; }; ?></a></li>
                <li><?php if (isset($_SESSION['user_login'])) { ?>
                    <a href="./?lang=<?= $lang; ?>"><i class="bi bi-person-circle"></i> <?= $row['pseudo']; ?></a>
                <?php } else { ?>
                    <a href="../auth/login/?lang=<?= $lang; ?>"><i class="bi bi-box-arrow-in-right"></i> <?php if ($lang == "fr") { echo $login_fr; } else { echo $login_en; }; ?></a></li>
                <?php }; ?>
            </ul>
        </nav>
    </header>

    <div style="margin: 20px;"></div>

    <div style="text-align: center;">
        <a href="./?lang=<?php if ($lang == "fr") { echo "en"; } else { echo "fr"; }; ?>" class="btn"><?php if ($lang == "fr") { echo $pass_fr; } else { echo $pass_en; }; ?></a>
        <a href="../auth/logout/?lang=<?= $lang; ?>" class="btn"><?php if ($lang == "fr") { echo $logout_fr; } else { echo $logout_en; }; ?></a>
    </div>
    
    <div style="margin: 200px;"></div>

    <div class="container_form">
      <div class="info" style="text-align: center;">
        <div style="font-size: 100px; color: green;"><i class="bi bi-bug"></i></div>
        <h1>
          <?php if ($lang == "fr") { echo $text_fr; } else { echo $text_en; }; ?>
        </h1>
      </div>
    </div>

    <div style="margin: 450px;"></div>

    <div class="footer">
        <?php if ($lang == "fr") { echo $foot_p1_fr; } else { echo $foot_p1_en; }; ?> <span style="color: orangered"><i class="bi bi-heart-fill"></i></span> <?php if ($lang == "fr") { echo $foot_p2_fr; } else { echo $foot_p2_en; }; ?> 
    </div>

    <script src="../../src/js/mobile-navbar.js"></script>
    <script src="../../src/js/script.js"></script>
</body>
</html>