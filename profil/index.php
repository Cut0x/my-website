<?php
    /* CONFIGURATION ET RECUPE DONNEE SESSION */
    require_once '../src/data/sql/data.php';
    require_once '../src/data/config.php';
				
    session_start();

    if (!isset($_SESSION['user_login'])) {
        header("location: ../");
    };

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
	$titre_fr = "Envoi d'article";
	$titre_en = "Article sending";
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

    /* CODE DU SYSTEME DE CONNEXION */
    if(isset($_REQUEST['btn_send'])) {
        $title_fr = strip_tags($_REQUEST['btn_title_fr']);
        $title_en = strip_tags($_REQUEST['btn_title_en']);

        $content_fr = strip_tags($_REQUEST['btn_content_fr']);
        $content_en = strip_tags($_REQUEST['btn_content_en']);

        if ($lang == "fr") {
            if (strlen($title_fr) && strlen($title_en) < 5) $errorMsg[] = $error_title_fr;
            if (strlen($content_fr) && strlen($content_en) < 20) $errorMsg[] = $error_content_fr;
    
            try {
                $select_stmt = $db -> prepare("INSERT INTO article (title_content_fr, title_content_en, body_content_fr, body_content_en, authorId, date_publication) VALUES (?, ?, ?, ?, ?, NOW())");
                $select_stmt -> execute(
                    array(
                        $title_fr,
                        $title_en,
                        $content_fr,
                        $content_en,
                        $row['user_id']
                    )
                );

                $lastId = $db -> lastInsertId();
                
                header('location: ../blog/?lang='.$lang.'&art='.$lastId);
            } catch(PDOException $e) {
                $e -> getMessage();
            };
        } else {
            if (strlen($title_fr) && strlen($title_en) < 5) $errorMsg[] = $error_title_en;
            if (strlen($content_fr) && strlen($content_en) < 20) $errorMsg[] = $error_content_en;
    
            try {
                $select_stmt = $db -> prepare("INSERT INTO article (title_content_fr, title_content_en, body_content_fr, body_content_en, authorId, date_publication) VALUES (?, ?, ?, ?, ?, NOW())");
                $select_stmt -> execute(
                    array(
                        $title_fr,
                        $title_en,
                        $content_fr,
                        $content_en,
                        $row['user_id']
                    )
                );

                $lastId = $db -> lastInsertId();
        
                if (isset($_FILES)) {
                    var_dump($_FILES["miniature"]["tmp_name"]);
                    $chemin = 'uploads/'.$lastId.'.jpg';
        
                    move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
                } else {
                    //echo "pas yeah";
                };
                
                header('location: ../blog/?lang=fr&art='.$lastId);
            } catch(PDOException $e) {
                $e -> getMessage();
            };
        }
        
        $url = $webhookURL;

        $embedDiscord = substr($content_fr, 0, 231);
        
        $hookObject = json_encode([
            //"username" => "Nouvelle publication !",
            
            //"avatar_url" => "https://cdn.discordapp.com/attachments/914271938359210045/980928769588072478/LOGO-DEVORION-1.png",
            
            "tts" => false,
            
            "embeds" => [
                [
                    "title" => $title_fr,
                    
                    "type" => "rich",
                    
                    "description" => $embedDiscord."...",
                    
                    "url" => 'https://cutox.alwaysdata.net/blog/?lang='.$lang.'&art='.$lastId,
                    
                    "color" => hexdec('#15252c'),
                    
                    "image" => [
                        "url" => "https://cutox.alwaysdata.net/profil/uploads/".$lastid.".jpg"
                    ],

                    "author" => [
                        "name" => "Publié par ".$row['pseudo']
                    ],
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
            
        $headers = [ 'Content-Type: application/json; charset=utf-8' ];
        $POST = [ 'username' => 'Testing BOT', 'content' => 'Testing message' ];
           
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $hookObject);
        $response   = curl_exec($ch);
    };
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
        <form method="post">
            <?php if(isset($errorMsg)) { foreach($errorMsg as $error) { ?>
    	        <div class="error">
		            <strong><i class="bi bi-exclamation-circle-fill"></i></strong> <?php echo $error; ?>
		        </div>
            <?php } }; ?>
                
            <div>
                <h1>
                    <?php if ($lang == "fr") { echo $titre_fr; } else { echo $titre_en; }; ?>
                </h1>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <input type="text" name="btn_title_fr" id="" placeholder="Titre en Français"><span>*</span>
                <input type="text" name="btn_title_en" id="" placeholder="Title in English"><span>*</span>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <textarea name="btn_content_fr" id="" cols="30" rows="10" placeholder="Contenu en Français"></textarea>
                <textarea name="btn_content_en" id="" cols="30" rows="10" placeholder="Content in English"></textarea>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <input name='miniature' type='file' accept='image/jpg'>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <span>
                    * <?php if ($lang == "fr") { echo $req_fr; } else { echo $req_en; }; ?>
                </span>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <input type="submit" name="btn_send" id="" value="<?php if ($lang == "fr") { echo $send_fr; } else { echo $send_en; }; ?>">
            </div>
        </form>
    </div>

    <div style="margin: 200px;"></div>

    <div class="footer">
        <?php if ($lang == "fr") { echo $foot_p1_fr; } else { echo $foot_p1_en; }; ?> <span style="color: orangered"><i class="bi bi-heart-fill"></i></span> <?php if ($lang == "fr") { echo $foot_p2_fr; } else { echo $foot_p2_en; }; ?> 
    </div>

    <script src="../../src/js/mobile-navbar.js"></script>
    <script src="../../src/js/script.js"></script>
</body>
</html>