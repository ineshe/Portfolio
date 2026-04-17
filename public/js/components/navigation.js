const topBar = document.querySelector('.top-bar');
const topBarContent = document.querySelector('.top-bar .content');
const topBarTitle = document.querySelector('.top-bar .title');
const subtitle = document.querySelector('.title > *');
const menu = document.querySelector('.menu');
const menuLinks = document.querySelectorAll('.menu a');
const hamburger = document.getElementById('hamburger');
const sections = document.querySelectorAll('.section');

var lastScrollPosition = 0;
var lastDocumentHeight = document.documentElement.scrollHeight;
var requiredNavWidth;

(function() {
    window.addEventListener('scroll', handleScroll)

    document.addEventListener('DOMContentLoaded', function(event) {
        let anchor = window.location.hash;
        if(anchor) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'instant'
            });
            scrollToAnchor(anchor);
        }
    });

    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            let anchor = event.target.hash;
            if(anchor){
                event.preventDefault();
                window.location.href = this.href;
                scrollToAnchor(anchor);
            } 
        });
    });

    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('open');
    });

    hamburger.addEventListener('click', function() {
        menu.classList.toggle('active');
    });

    checkNavigationLayout();
    window.addEventListener('resize', checkNavigationLayout);
})();

function checkNavigationLayout(entries) {
    const topBarContentStyle = getComputedStyle(topBarContent);

    const availableNavWidth = parseFloat(topBarContentStyle.width) 
        - document.querySelector('.title').offsetWidth
        - hamburger.offsetWidth;

    if (!requiredNavWidth) {
        requiredNavWidth = Array.from(menu.children).reduce(
            (acc, e) => e.offsetWidth + acc, 0
        );
    }
    const isOverflowing = requiredNavWidth > availableNavWidth;

    if (isOverflowing && !topBar.classList.contains('vertical')) {
        requestAnimationFrame(() => {
            topBar.classList.add('vertical');
        });
    } else if (!isOverflowing && topBar.classList.contains('vertical')) {
        requestAnimationFrame(() => {
            topBar.classList.remove('vertical');
        });
    }
}

function handleScroll () {
    var currentScrollPosition = window.scrollY;
    var currentDocumentHeight = document.documentElement.scrollHeight;

    // when document height is the same
    if (currentDocumentHeight === lastDocumentHeight) {
        
        // if user scrolls down
        if(currentScrollPosition > lastScrollPosition &&
            currentScrollPosition > subtitle.offsetHeight) {
            topBar.classList.add('minimized');
            topBar.classList.add('hidden');
        } else {
            topBar.classList.remove('hidden');
        }
    }

    // shows full menu on top
    if(currentScrollPosition === 0) {
        topBar.classList.remove('minimized');
        topBar.classList.remove('hidden');
    }

    lastScrollPosition = currentScrollPosition;
    lastDocumentHeight = currentDocumentHeight;

    // highlights active menu point
    sections.forEach((section, index) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;

        // if the current scroll position is within a section
        if (currentScrollPosition >= sectionTop && currentScrollPosition < sectionTop + sectionHeight) {
            menuLinks.forEach(link => link.classList.remove('active'));
            menuLinks[index].classList.add('active');
            }    
    });
}

function scrollToAnchor(anchor) {
    // computed height of the minimized topBar
    const miniTopBarHeight = 
        topBarTitle.offsetHeight - 
        subtitle.offsetHeight + 
        parseInt(getComputedStyle(topBarContent)
        .getPropertyValue('padding-top')) + 
        parseInt(getComputedStyle(topBarContent)
        .getPropertyValue('padding-bottom'));

    const targetId = anchor.substring(1);
    const target = document.getElementById(targetId);

    var currentScrollPosition = window.scrollY;

    if (target) {
        const targetScrollPosition = target.getBoundingClientRect().top + window.scrollY;

        if(currentScrollPosition === 0) {
            // adjusts the scroll position to the minimized TopBar
            var adjustedScrollPosition = targetScrollPosition - topBar.offsetHeight + miniTopBarHeight;
        }
        else if(targetScrollPosition > currentScrollPosition) {
            // adjusts the scroll position to the hidden TopBar
            var adjustedScrollPosition = targetScrollPosition;
        } else {
            // adjusts the scroll position to the minimized TopBar
            var adjustedScrollPosition = targetScrollPosition - topBar.offsetHeight;
        }

        lastScrollPosition = currentScrollPosition;
        
        // actual scrolling
        window.scrollTo({
            top: adjustedScrollPosition,
            behavior: 'smooth'
        });
    }
}

/* function handleScrollMargin() {


    var target = document.querySelector('#' + this.getAttribute('href').split('#')[1]);
    
    var scrollPosition = target.getBoundingClientRect().top + window.scrollY;

    if(window.scrollY == 0) {
        target.style.scrollMarginTop = document.querySelector('.title > *').offsetHeight + 'px';
    }

    // Überprüfe, ob nach oben gescrollt wird
    if (scrollPosition < window.scrollY) {
        target.style.scrollMarginTop = topBar.offsetHeight + 'px';
    } else if (window.scrollY == 0) {
        target.style.scrollMarginTop = document.querySelector('.title > *').offsetHeight + 'px';
    } else {
        target.style.scrollMarginTop = '0px';
    }

    // console.log(target);
    // console.log(scrollPosition);
    // console.log(window.scrollY);

} */

/* function scrollToAnchor() {
    const target =  document.querySelector('#' + this.getAttribute('href').split('#')[1]);
    console.log(target);
    if (target !== null) {
        const targetScrollPosition = target.getBoundingClientRect().top + window.scrollY;

        // Optionales Anpassen der Scroll-Position (z. B. um Platz für die Hidey Bar zu schaffen)
        const adjustedScrollPosition = targetScrollPosition - topBar.offsetHeight;

        // Setze den Anker in der URL
        window.location.hash = this.getAttribute('href').split('#')[1];

        // Scrollen zur Zielposition nach einem kleinen Timeout
        setTimeout(() => {
            window.scrollTo({
                top: adjustedScrollPosition,
                behavior: 'smooth'
            });
        }, 100);
    }
} */

/* function scrollToAnchor(event) {
    event.preventDefault();
    // window.removeEventListener('scroll', handleScroll );    

    window.location.href = this.href;

    console.log('scrollToAnchor');

    
    var target = document.querySelector('#' + this.getAttribute('href').split('#')[1]);
    console.log('#' + this.getAttribute('href').split('#')[1]);
    console.log(target);
    sections.forEach(section => {
        console.log(section);
    });

    if(target !== null) {
        var targetScrollPosition = target.getBoundingClientRect().top + window.scrollY;


        // nach unten gescrollt
        if(targetScrollPosition > window.scrollY) {
            console.log('down');

            topBar.classList.add('minimized');
            topBar.style.transform = 'translateY(-100%)';

        } else {
            console.log('up');


        }

    }
} */
  