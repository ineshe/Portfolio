const topBar = document.querySelector(".top-bar");
const hamburger = document.getElementById("hamburger");
const nav = document.getElementById("main-nav");
const menuLinks = document.querySelectorAll(".menu__link");

// Scrolled state
window.addEventListener(
  "scroll",
  () => {
    topBar.classList.toggle("scrolled", window.scrollY > 40);
  },
  { passive: true }
);
topBar.classList.toggle("scrolled", window.scrollY > 40);

// Hamburger toggle
if (hamburger && nav) {
  const setMenuOpen = (open) => {
    hamburger.classList.toggle("open", open);
    nav.classList.toggle("open", open);
    hamburger.setAttribute("aria-expanded", open);
    hamburger.setAttribute("aria-label", open ? "Navigation schließen" : "Navigation öffnen");
    document.body.style.overflow = open ? "hidden" : "";
  };

  hamburger.addEventListener("click", () => {
    setMenuOpen(!nav.classList.contains("open"));
  });

  // Close on link click
  menuLinks.forEach((link) => {
    link.addEventListener("click", () => setMenuOpen(false));
  });

  // The open menu covers the page: Escape closes it, Tab cycles through the menu only
  document.addEventListener("keydown", (e) => {
    if (!nav.classList.contains("open")) return;

    if (e.key === "Escape") {
      setMenuOpen(false);
      hamburger.focus();
      return;
    }

    if (e.key !== "Tab") return;
    const first = hamburger;
    const last = menuLinks[menuLinks.length - 1];
    if (e.shiftKey && document.activeElement === first) {
      e.preventDefault();
      last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault();
      first.focus();
    }
  });

  // Growing past the mobile breakpoint hides the hamburger; don't leave the page scroll-locked
  window.matchMedia("(min-width: 768px)").addEventListener("change", (e) => {
    if (e.matches) setMenuOpen(false);
  });
}

// Smooth scroll with nav offset
menuLinks.forEach((link) => {
  link.addEventListener("click", (e) => {
    const href = link.getAttribute("href");
    const hash = href.includes("#") ? "#" + href.split("#")[1] : null;
    if (!hash) return;

    const target = document.querySelector(hash);
    if (!target) return;

    e.preventDefault();
    const offset = topBar ? topBar.offsetHeight : 0;
    const top = target.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top, behavior: "smooth" });
  });
});
