const GA_MEASUREMENT_ID = "G-Y4LB5LLVVS";
const CONSENT_COOKIE = "cookiesAccepted";

let analyticsLoaded = false;
let lastFocusedElement = null;

function acceptCookies() {
  setCookie(CONSENT_COOKIE, "true", 30);
  hideCookieBanner();
  loadGoogleAnalytics();
}

function declineCookies() {
  setCookie(CONSENT_COOKIE, "false", 30);
  hideCookieBanner();
  disableGoogleAnalytics();
}

function openCookieSettings() {
  showCookieBanner(true);
}

function showCookieBanner(moveFocus) {
  var banner = document.getElementById("cookie-banner");
  if (!banner) {
    return;
  }

  lastFocusedElement = moveFocus ? document.activeElement : null;
  updateConsentStatus();
  banner.style.display = "block";
  document.addEventListener("keydown", handleBannerKeydown);

  if (moveFocus) {
    var focusTarget = banner.querySelector(".cookie-consent__btn");
    if (focusTarget) {
      focusTarget.focus();
    }
  }
}

function hideCookieBanner() {
  var banner = document.getElementById("cookie-banner");
  if (banner) {
    banner.style.display = "none";
  }

  document.removeEventListener("keydown", handleBannerKeydown);

  if (lastFocusedElement && lastFocusedElement !== document.body) {
    lastFocusedElement.focus();
  }
  lastFocusedElement = null;
}

// Escape schließt den Banner nur, wenn bereits eine Auswahl vorliegt –
// beim Erstbesuch muss aktiv entschieden werden.
function handleBannerKeydown(event) {
  if (event.key !== "Escape" || getCookie(CONSENT_COOKIE) === null) {
    return;
  }
  hideCookieBanner();
}

function updateConsentStatus() {
  var status = document.getElementById("cookie-consent-status");
  if (!status) {
    return;
  }

  var consent = getCookie(CONSENT_COOKIE);
  if (consent === null) {
    status.hidden = true;
    status.textContent = "";
    return;
  }

  status.textContent =
    consent === "true"
      ? "Ihre aktuelle Auswahl: Zustimmen"
      : "Ihre aktuelle Auswahl: Ablehnen";
  status.hidden = false;
}

function loadGoogleAnalytics() {
  window[`ga-disable-${GA_MEASUREMENT_ID}`] = false;

  if (analyticsLoaded) {
    return;
  }
  analyticsLoaded = true;

  var script1 = document.createElement("script");
  script1.src = `https://www.googletagmanager.com/gtag/js?id=${GA_MEASUREMENT_ID}`;
  script1.async = true;

  var script2 = document.createElement("script");
  script2.innerHTML = `
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '${GA_MEASUREMENT_ID}', {'anonymize_ip': true});
    `;

  document.head.prepend(script2);
  document.head.prepend(script1);
}

// Greift auch dann, wenn Analytics in dieser Sitzung bereits geladen wurde:
// gtag sendet danach nichts mehr, die gesetzten Cookies werden entfernt.
function disableGoogleAnalytics() {
  window[`ga-disable-${GA_MEASUREMENT_ID}`] = true;
  deleteCookie("_ga");
  deleteCookie(`_ga_${GA_MEASUREMENT_ID.replace("G-", "")}`);
}

function setCookie(name, value, days) {
  let date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/; domain=.ines-heilmann.de; SameSite=Lax`;
}

function deleteCookie(name) {
  let expired = "Thu, 01 Jan 1970 00:00:00 GMT";
  document.cookie = `${name}=; expires=${expired}; path=/; domain=.ines-heilmann.de; SameSite=Lax`;
  document.cookie = `${name}=; expires=${expired}; path=/; SameSite=Lax`;
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

window.onload = function () {
  var consent = getCookie(CONSENT_COOKIE);

  if (consent === "true") {
    loadGoogleAnalytics();
  } else if (consent === null) {
    showCookieBanner(false);
  }
};
