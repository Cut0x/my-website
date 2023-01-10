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
<html lang="<?php echo $lang; ?>">
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
	<a href="#" class="btn">Test</a>
</body>
</html>