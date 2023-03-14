<div class="header">
    <div class="obj logo">
        <img src="./src/assets/logo.png" alt="">
    </div>
    <div class="obj content">
        <h1>Hi and welcome !</h1>
    </div>
</div>

<div class="topnav" id="navbar">
    <a href="" <?php if ($_GET['page'] == "home") { echo 'class="active"'; }; ?>><i class="bi bi-house-door-fill"></i> Home</a>

    <a href="" <?php if ($_GET['page'] == "") { echo 'class="active"'; }; ?>><i class="bi bi-hand-thumbs-up-fill"></i> Projets</a>

    <a href="" <?php if ($_GET['page'] == "") { echo 'class="active"'; }; ?>><i class="bi bi-chat-dots-fill"></i> Forum</a>

    <a href="" <?php if ($_GET['page'] == "") { echo 'class="active"'; }; ?>><i class="bi bi-person-lines-fill"></i> Contact</a>

    <a href="" class="a2 <?php if ($_GET['page'] == "") { echo 'active'; }; ?>"><i class="bi bi-box-arrow-in-right"></i> Connexion</a>
        
    <a href="javascript:void(0);" class="icon" onclick="NavIcon()">
        <i class="bi bi-text-indent-right"></i>
    </a>
</div>