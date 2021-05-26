(function() {
    controlNav();
/*     if(!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += "no-touch";
    } */
})();

const nav = document.querySelector("nav");
const hamburger = document.getElementById("hamburger");

window.addEventListener("resize", controlNav);
hamburger.addEventListener("click", toggleNav);
// use event delegation
nav.addEventListener("click", function(evt) {
    if(evt.target && evt.target.nodeName == "A") {
        toggleNav();
    }
});

function toggleNav() {
    if(!window.matchMedia("(min-width: 769px)").matches) {
        document.querySelector("nav").classList.toggle("hidden");
    }
}

function controlNav() { // control nav visibility depending on viewport size
    if(window.matchMedia("(min-width: 769px)").matches) {
        document.querySelector("nav").classList.remove("hidden");
    } else {
        document.querySelector("nav").classList.add("hidden");
    }
  }

/*   var io = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
          if(entry.isIntersecting) {
              console.log(entry.target);
          }
      })
  }, {threshold: [1]});

  var navCaps = document.querySelectorAll(".scroll-target");
  navCaps.forEach(v => io.observe(v)); */

  
  
  