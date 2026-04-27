const topBar = document.querySelector('.top-bar');
const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('main-nav');
const menuLinks = document.querySelectorAll('.menu a');

// Scrolled state
window.addEventListener('scroll', () => {
  topBar.classList.toggle('scrolled', window.scrollY > 40);
}, { passive: true });
topBar.classList.toggle('scrolled', window.scrollY > 40);

// Hamburger toggle
if (hamburger && nav) {
  hamburger.addEventListener('click', () => {
    const open = hamburger.classList.toggle('open');
    nav.classList.toggle('open', open);
    hamburger.setAttribute('aria-expanded', open);
    document.body.style.overflow = open ? 'hidden' : '';
  });

  // Close on link click
  menuLinks.forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('open');
      nav.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    });
  });
}

// Smooth scroll with nav offset
menuLinks.forEach(link => {
  link.addEventListener('click', e => {
    const href = link.getAttribute('href');
    const hash = href.includes('#') ? '#' + href.split('#')[1] : null;
    if (!hash) return;

    const target = document.querySelector(hash);
    if (!target) return;

    e.preventDefault();
    const offset = topBar ? topBar.offsetHeight : 0;
    const top = target.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top, behavior: 'smooth' });
  });
});
