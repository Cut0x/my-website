function NavIcon() {
    var context = document.getElementById("navbar");
    if (context.className === "topnav") {
        context.className += " responsive";
    } else {
        context.className = "topnav";
    };
};