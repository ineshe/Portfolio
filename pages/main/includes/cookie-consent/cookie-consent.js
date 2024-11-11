function acceptCookies() {
    document.getElementById('cookie-banner').style.display = 'none';
    setCookie('cookiesAccepted', 'true', 30);
    loadGoogleAnalytics();
}

function declineCookies() {
    document.getElementById('cookie-banner').style.display = 'none';
    setCookie('cookiesAccepted', 'false', 30);
}

function loadGoogleAnalytics() {
    var script1 = document.createElement('script');
    script1.src = "https://www.googletagmanager.com/gtag/js?id=G-Y4LB5LLVVS";
    script1.async = true;

    var script2 = document.createElement('script');
    script2.innerHTML = `
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-Y4LB5LLVVS', {'anonymize_ip': true});
    `;

    document.head.prepend(script2);
    document.head.prepend(script1);
}

function setCookie(name, value, days) {
    let date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/; domain=.ines-heilmann.de; SameSite=Lax`;
}

function getCookie(name) {
    let cookieArr = document.cookie.split("; ");
    for (let cookie of cookieArr) {
        let cookiePair = cookie.split("=");
        if (name === cookiePair[0]) {
            return cookiePair[1];
        }
    }
    return null;
}

window.onload = function() {
    var consent = getCookie('cookiesAccepted');


    if (consent === 'true') {
        loadGoogleAnalytics();
    } else if (consent === null) {
        document.getElementById('cookie-banner').style.display = 'block';
    }
}; 