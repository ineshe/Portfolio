(function () {
  const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

  if (!revealEls.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  revealEls.forEach(el => observer.observe(el));

  // Sidebar fade-in
  const sidebar = document.getElementById('sidebar');
  if (sidebar) {
    setTimeout(() => sidebar.classList.add('visible'), 800);
  }

  // Project cards: make entire card clickable
  document.querySelectorAll('.project-card[data-href]').forEach(card => {
    card.addEventListener('click', e => {
      if (e.target.closest('a')) return;
      window.location.href = card.dataset.href;
    });
  });
})();
