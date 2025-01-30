window.addEventListener('scroll', reveal);

function reveal(){
    var reveals= document.querySelectorAll('.reveal');

    for(var i =0; i< reveals.length; i++){
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 100;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }
    }
}




const toTop = document.querySelector(".to-top");

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

window.addEventListener("scroll", () => {
    if (window.scrollY > 500) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
});

toTop.addEventListener("click", scrollToTop);

// Listen for touch events on mobile devices
toTop.addEventListener("touchstart", (event) => {
    event.preventDefault(); // Prevent default touch behavior
    scrollToTop();
});
