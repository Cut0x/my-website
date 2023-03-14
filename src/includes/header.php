<div class="header">
    <div class="obj logo">
        <img src="./src/assets/logo.png" alt="">
    </div>
    <div class="obj content">
        <h1>Hi and welcome !</h1>
    </div>
</div>

<div class="topnav" id="navbar">
    <a href="./?page=home" <?php if ($_GET['page'] == "home") { echo 'class="active"'; }; ?>><i class="bi bi-house-door-fill"></i> Home</a>

    <a href="./?page=about" <?php if ($_GET['page'] == "about") { echo 'class="active"'; }; ?>><i class="bi bi-person-fill"></i> About</a>

    <a href="./?page=projects" <?php if ($_GET['page'] == "projects") { echo 'class="active"'; }; ?>><i class="bi bi-terminal-fill"></i> Projects</a>

    <a href="./?page=contact" <?php if ($_GET['page'] == "contact") { echo 'class="active"'; }; ?>><i class="bi bi-envelope-fill"></i> Contact</a>

    <a href="./?page=soon" class="a2 <?php if ($_GET['page'] == "soon") { echo 'active'; }; ?>"><i class="bi bi-box-arrow-in-right"></i> Connexion</a>
        
    <a href="javascript:void(0);" class="icon" onclick="NavIcon()">
        <i class="bi bi-text-indent-right"></i>
    </a>
</div>