<?php
	// PARAMETTRAGE LANGAGE
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };
	
	// DEFINITION TEXT PAR LANG
	// Titre
	$titre_fr = "Coucou, je suis Cut0x !";
	$titre_en = "Hi, I'm Cut0x !";
	// NavBar
	$home_fr = "Acceuil";
	$home_en = "Home";
	$projects_fr = "Projets";
	$projects_en = "Projects";
	$_fr = "";
	$_en = "";
	// Bouton
	$pass_fr = "Passer en Anglais";
	$pass_en = "Switch to French";
?>

<!DOCTYPE html>
<html lang="<?= $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <a class="logo" href="/">Cut0x</a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>  
            </div>
            <ul class="nav-list">
                <li><a href="#">Contact</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Projets</a></li>
                <li><a href="./auth/login/">Login</a></li>
            </ul>
        </nav>
    </header>

    <div style="margin: 20px;"></div>
    
    <div style="text-align: center;">
        <a href="./?lang=<?php if ($lang == "fr") { echo "en"; } else { echo "fr"; }; ?>" class="btn"><?php if ($lang == "fr") { echo $pass_fr; } else { echo $pass_en; }; ?></a>
    </div>
    
    <div style="margin: 20px;"></div>

    <main>
    </main>
    <script src="./src/js/mobile-navbar.js"></script>
</body>
</html>