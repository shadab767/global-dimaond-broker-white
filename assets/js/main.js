/* Maison Lumière — main.js */
(function () {

  // ===== Flip nav to dark ink while over the white hero =====
  var navEl = document.querySelector('nav.top');
  var hero  = document.querySelector('.hero');

  function updateNavMode() {
    if (!hero) return;
    var heroBottom = hero.getBoundingClientRect().bottom;
    if (heroBottom > 80) {
      navEl.classList.add('dark');
    } else {
      navEl.classList.remove('dark');
    }
  }

  window.addEventListener('scroll', updateNavMode, { passive: true });
  updateNavMode();

  // ===== Lenis smooth scroll =====
  var lenis = new Lenis({
    duration: 1.15,
    easing: function (t) { return Math.min(1, 1.001 - Math.pow(2, -10 * t)); },
    smoothWheel: true,
    smoothTouch: false,
    wheelMultiplier: 1,
    touchMultiplier: 1.4
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);

  // ===== Anchor scroll for nav links =====
  document.querySelectorAll('[data-scroll-to]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href');
      if (id && id.startsWith('#')) {
        var tgt = document.querySelector(id);
        if (tgt) {
          e.preventDefault();
          lenis.scrollTo(tgt, { offset: -40 });
        }
      }
    });
  });

  // ===== Custom parallax driven by data-scroll-speed =====
  var parallaxItems = Array.from(document.querySelectorAll('[data-scroll-speed]')).map(function (el) {
    return {
      el:    el,
      speed: parseFloat(el.dataset.scrollSpeed) || 0,
      dir:   el.dataset.scrollDirection || 'vertical'
    };
  });

  function updateParallax() {
    var vh = window.innerHeight;
    parallaxItems.forEach(function (item) {
      var r      = item.el.getBoundingClientRect();
      var offset = (r.top + r.height / 2 - vh / 2);
      var move   = -offset * (item.speed * 0.08);
      if (item.dir === 'horizontal') {
        item.el.style.transform = 'translate3d(' + move + 'px,0,0)';
      } else {
        item.el.style.transform = 'translate3d(0,' + move + 'px,0)';
      }
    });
  }

  lenis.on('scroll', updateParallax);
  window.addEventListener('resize', updateParallax);
  updateParallax();

  // ===== Reveal-on-scroll via IntersectionObserver =====
  var revealIo = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        e.target.classList.add('is-inview');
        revealIo.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.reveal-up, .reveal-fade, .stagger').forEach(function (el) {
    revealIo.observe(el);
  });

  // ===== Horizontal collection arrows =====
  var track = document.getElementById('hTrack');
  var hPrev = document.getElementById('hPrev');
  var hNext = document.getElementById('hNext');

  if (track && hPrev && hNext) {
    hPrev.addEventListener('click', function () { track.scrollBy({ left: -420, behavior: 'smooth' }); });
    hNext.addEventListener('click', function () { track.scrollBy({ left:  420, behavior: 'smooth' }); });
    // prevent Lenis from hijacking the horizontal track wheel
    track.setAttribute('data-lenis-prevent', '');
  }

})();
