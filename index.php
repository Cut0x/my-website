<?php
    $lang = $_GET['lang'];

    if (!$_GET['lang']) {
        header('location: ./?lang=en');
    };
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
	<?php if ($lang == "fr") {
		echo "Coucou, je suis Cut0x !";
	} else {
		echo "Hi, I'm Cut0x !";
	}; ?>
	</title>
	
	<link rel="stylesheet" href="./src/css/style.css"/>
</head>
<body>
	<a href="#" class="btn">Test</a>
</body>
</html>