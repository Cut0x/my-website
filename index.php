<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cut0x Website</title>

  <!-- STYLE WEBSITE -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <link rel="shortcut icon" href="./assets/img/my-logo.png" type="image/x-icon">
</head>
<body>
    <div class="topnav" id="myTopnav">
        <a href="./" class="active"><i class="bi bi-house-fill"></i> Home</a>

        <a href="./about/"><i class="bi bi-book-fill"></i> About</a>

        <a href="./contact/"><i class="bi bi-person-lines-fill"></i> Contact</a>

        <!--<div class="dropdown">
            <button class="dropbtn">
                </i><i class="bi bi-person-circle"></i> d <i class="bi bi-caret-down-fill"></i>
            </button>
            <div class="dropdown-content">
                <a href="./dashboard/"><i class="bi bi-speedometer"></i> Dashboard</a>
                <a href="./my-profil/"><i class="bi bi-person-badge"></i> My profil</a>
                <a href="./auth/logout/"><i class="bi bi-box-arrow-in-right"></i> Log Out</a>
            </div>
        </div>-->

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="ResponvieNav()">&#9776;</a>

        <script src="./assets/js/topnav.js"></script>
    </div>

    <div style="margin: 25px;"></div>

    <div class="flex-container">
        <div class="flex-item-left">1</div>
        <div class="flex-item-right">2</div>
    </div>

    <div style="margin: 25px;"></div>

    <footer>
        <div>
            <h1>
                Hello <span style="color: yellow;"><i class="bi bi-emoji-smile-fill"></i></span>
            </h1>
            <p>
                Designed and developed with <span style="color: red;"><i class="bi bi-suit-heart-fill"></i></span> by <a href="https://twitter.com/Cut0x_" target="_blank">Cut0x</a>.
            </p>
        </div>

        <div>
            <ul>Useful
                <li>
                    <i class="bi bi-arrow-right"></i> <a href="">Docs</a><br>
                    <i class="bi bi-arrow-right"></i> <a href="../faq/">FAQ</a><br>
                    <i class="bi bi-arrow-right"></i> <a href="./">Dashboard</a><br>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>