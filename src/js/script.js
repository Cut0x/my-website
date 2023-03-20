function NavIcon() {
    var context = document.getElementById("navbar");
    if (context.className === "topnav") {
        context.className += " responsive";
    } else {
        context.className = "topnav";
    };
};

console.log('Hey !')

setTimeout(() => {
    console.log('How are u ? Contact me on the contact page !');
}, 3000);