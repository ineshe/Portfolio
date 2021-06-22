var current = 0;

slides = document.getElementsByClassName("slide");
prevBtn = document.querySelector(".prev");
nextBtn = document.querySelector(".next");

prevBtn.addEventListener("click", showPrev);
nextBtn.addEventListener("click", showNext);

(function() {
    for(i = 0; i < slides.length; i++) {
        slides.item(i).style.display = "none";
    }
    slides.item(current).style.display = "block";
})();

function showPrev() {
    slides.item(current).style.display = "none";
    if(current > 0){
        current -= 1;
    } else {
        current = slides.length-1;
    }
    slides.item(current).style.display = "block";
}

function showNext() {
    slides.item(current).style.display = "none";
    if(current < slides.length-1){
        current += 1;
    } else {
        current = 0;
    }
    slides.item(current).style.display = "block";
}