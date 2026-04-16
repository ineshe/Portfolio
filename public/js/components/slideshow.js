var slideshow = document.querySelector('.slideshow');
var slides = document.querySelectorAll('.slide');
var dots = document.querySelectorAll('.dot-container');
var prevBtn = document.getElementById('prev');
var nextBtn = document.getElementById('next');
var current = 0;
var startX = 0;
var startY = 0;
var isFullscreen = false;


(function() {

    // adds event listerers to buttons, if they exist
    if(prevBtn !== null && nextBtn !== null) {
        prevBtn.addEventListener("click", function() {
            showPreviousSlide();
        });
        nextBtn.addEventListener("click", function(){
            showNextSlide();
        });
    }

    initTouchControl();

    // initializes slideshow
    for(i = 0; i < slides.length; i++) {
/*         slides.item(i).classList.remove('active');
        if(dots.length > 0) {
            dots.item(i).classList.remove('active');
        } */
        deactivate(i, slides, dots);
    }

    activate(current, slides, dots);

    slides.forEach(slide => {
        slide.addEventListener('click', function(event) {
            event.preventDefault();
            toggleFullscreen();
        });
    });
})();

function showSlide(index) {
    deactivate(current, slides, dots);

    current = Number(index);

    activate(current, slides, dots);
}

function deactivate(index, ...args) {
    args.forEach(argument => {
        if(argument instanceof NodeList && argument.length > 0) {
            argument.item(index).classList.remove('active');
        }
    });
}

function activate(index, ...args) {
    args.forEach(argument => {
        if(argument instanceof NodeList && argument.length > 0) {
            argument.item(index).classList.add('active');
        }
    });
}

function showPreviousSlide() {
    deactivate(current, slides, dots);

    current = (current - 1 + slides.length) % slides.length;

    activate(current, slides, dots);
}

function showNextSlide() {
    deactivate(current, slides, dots);

    current = (current + 1) % slides.length;

    activate(current, slides, dots);
}

function isMobileDevice() {
    return window.matchMedia("(any-pointer: coarse)").matches;
}

function toggleFullscreen() {
    if (isMobileDevice()) {
        // enables full screen mode for mobile devices
        if (!isFullscreen) {
            if (slideshow.requestFullscreen) {
                slideshow.requestFullscreen();
            } else if (image.mozRequestFullScreen) {
                slideshow.mozRequestFullScreen();
            } else if (image.webkitRequestFullscreen) {
                slideshow.webkitRequestFullscreen();
            } else if (image.msRequestFullscreen) {
                slideshow.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }
}

function handleFullscreenChange() {
    isFullscreen =  !!document.fullscreenElement ||
                    !!document.mozFullScreenElement ||
                    !!document.webkitFullscreenElement ||
                    !!document.msFullscreenElement;

    // disables other event listeners when full screen mode is enabled
/*     if (isFullscreen) {
        slideshow.removeEventListener('touchstart', handleTouchStart);
        slideshow.removeEventListener('touchend', handleTouchEnd);
    } else {
        slideshow.addEventListener('touchstart', handleTouchStart);
        slideshow.addEventListener('touchend', handleTouchEnd);
    } */
}

function handleTouchStart(event) {
    if(!isFullscreen) {
        startX = event.touches[0].clientX;
        startY = event.touches[0].clientY;
    }
}

function handleTouchEnd(event) {
    if(!isFullscreen) {
        var endX = event.changedTouches[0].clientX;
        var endY = event.changedTouches[0].clientY;
      
        var deltaX = startX - endX;
        var deltaY = startY - endY;

        if (Math.abs(deltaX) > Math.abs(deltaY)) {
            if (deltaX > 0) {
              showNextSlide();
            } else {
              showPreviousSlide();
            }
        }
    }
}

function initTouchControl() {
    slideshow.addEventListener('touchstart', handleTouchStart);
    slideshow.addEventListener('touchend', handleTouchEnd);

    // document.addEventListener('fullscreenchange', handleFullscreenChange);
    // document.addEventListener('mozfullscreenchange', handleFullscreenChange);
    // document.addEventListener('webkitfullscreenchange', handleFullscreenChange);
    // document.addEventListener('msfullscreenchange', handleFullscreenChange);
      
    dots.forEach(dot => {
        dot.addEventListener('touchstart', function(event) {
            showSlide(dot.id.substring(4));
        });
    });
}