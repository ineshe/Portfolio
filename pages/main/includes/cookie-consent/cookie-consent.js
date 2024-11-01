function acceptCookies() {
    document.getElementById('cookie-banner').style.display = 'none';
    localStorage.setItem('cookiesAccepted', 'true');
    loadGoogleAnalytics();
}

function declineCookies() {
    document.getElementById('cookie-banner').style.display = 'none';
    localStorage.setItem('cookiesAccepted', 'false');
}

function loadGoogleAnalytics() {
    var script1 = document.createElement('script');
    script1.src = "https://www.googletagmanager.com/gtag/js?id=G-Y4LB5LLVVS";
    script1.async = true;
    document.head.appendChild(script1);

    script1.onload = function() {
        var script2 = document.createElement('script');
        script2.innerHTML = `
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-Y4LB5LLVVS');
        `;
        document.head.appendChild(script2);
    };
}

window.onload = function() {
    var consent = localStorage.getItem('cookiesAccepted');


    if (consent === 'true') {
        loadGoogleAnalytics();
    } else if (consent === null) {
        document.getElementById('cookie-banner').style.display = 'block';
    }
}; 