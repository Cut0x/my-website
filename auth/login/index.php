<?php
    /* CONFIGURATION ET RECUPE DONNEE SESSION */
    require_once '../../src/data/sql/data.php';
				
    session_start();

    if (isset($_SESSION['user_login'])) {
        header("location: ../../");
    };

	/*          PARAMETTRAGE LANGAGE          */
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };
	
	/*          DEFINITION TEXT PAR LANG          */
	// Titre
	$titre_fr = "Page de connexion";
	$titre_en = "Log In page";
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

    /* CODE DU SYSTEME DE CONNEXION */
    if(isset($_REQUEST['btn_login'])) {
	    $username = strip_tags($_REQUEST["btn_username"]);
	    $password = strip_tags($_REQUEST["btn_password"]);
    
        try {
            $select_stmt = $db -> prepare("SELECT * FROM tbl_user WHERE username=:uname");
            $select_stmt -> execute(
                array(
                    ':uname' => $username
                )
            );
            $row = $select_stmt -> fetch(PDO::FETCH_ASSOC);
        
            if ($select_stmt -> rowCount() > 0) {
                if ($username == $row["username"]) {
                    if (password_verify($password, $row["password"])) {
                        $_SESSION["user_login"] = $row["user_id"];
                    
                        $loginMsg = 'Succès de connexion !';
                        header("location: ../../");
                    } else {
                        $errorMsg[] = "Mauvais mot de passe";
                    }
                } else {
                    $errorMsg[] = "Mauvais pseudo";
                }
            } else {
                $errorMsg[] = "Aucun compte n'existe sous ce pseudo";
            }
        } catch(PDOException $e) {
            $e -> getMessage();
        };
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
	
	<link rel="stylesheet" href="../../src/css/style.css" />
</head>
<body>
<header>
        <nav>
            <a class="logo" href="../../?lang=<?= $lang; ?>">Cut0x</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>  
            </div>
            <ul class="nav-list">
                <li><a href="../../contact/?lang=<?= $lang; ?>"><i class="bi bi-envelope-fill"></i> Contact</a></li>
                <li><a href="../../blog/?lang=<?= $lang; ?>"><i class="bi bi-chat-right-fill"></i> Blog</a></li>
                <li><a href="../../projects/?lang=<?= $lang; ?>"><?php if ($lang == "fr") { echo $projects_fr; } else { echo $projects_en; }; ?></a></li>
                <li><a href="./?lang=<?= $lang; ?>"><i class="bi bi-box-arrow-in-right"></i> <?php if ($lang == "fr") { echo $login_fr; } else { echo $login_en; }; ?></a></li>
            </ul>
        </nav>
    </header>

    <div style="margin: 20px;"></div>

    <div style="text-align: center;">
        <a href="./?lang=<?php if ($lang == "fr") { echo "en"; } else { echo "fr"; }; ?>" class="btn"><?php if ($lang == "fr") { echo $pass_fr; } else { echo $pass_en; }; ?></a>
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
                <input type="text" name="btn_username" id="username" placeholder="Username"><span>*</span>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <input type="password" name="btn_password" id="password" placeholder="Password"><span>*</span>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <span>
                    * required
                </span>
            </div>

            <div style="margin: 20px;"></div>

            <div class="lab">
                <input type="submit" name="btn_login" id="" value="Log In">
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