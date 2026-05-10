/* The Global Diamond Broker — main.js */
(function () {

  // ===== Reduced-motion preference =====
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ===== Nav: glass background on scroll + dark mode over hero =====
  var navEl = document.querySelector('nav.top');
  var hero  = document.querySelector('.hero');

  function updateNav() {
    if (!navEl) return;

    // Pages without a hero (calculator) — always show glass nav
    if (!hero) {
      navEl.classList.add('scrolled');
      return;
    }

    var scrollY = window.scrollY || window.pageYOffset;

    // Glass background appears as soon as the user starts scrolling
    navEl.classList.toggle('scrolled', scrollY > 30);

    // Dark ink text while hero is still in viewport
    var heroBottom = hero.getBoundingClientRect().bottom;
    navEl.classList.toggle('dark', heroBottom > 80);
  }

  window.addEventListener('scroll', updateNav, { passive: true });
  updateNav();

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
    if (reducedMotion) return;
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

  lenis.on('scroll', updateNav);
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
    track.setAttribute('data-lenis-prevent', '');
  }

  // ===== Slide-in nav drawer =====
  var menuBtn      = document.querySelector('.nav-cta .menu');
  var drawer       = document.getElementById('navDrawer');
  var drawerOverlay = document.getElementById('navDrawerOverlay');
  var drawerClose  = document.getElementById('navDrawerClose');

  function openDrawer() {
    if (!drawer) return;
    drawer.classList.add('open');
    drawer.setAttribute('aria-hidden', 'false');
    drawerOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    if (lenis) lenis.stop();
    drawerClose.focus();
  }

  function closeDrawer() {
    if (!drawer) return;
    drawer.classList.remove('open');
    drawer.setAttribute('aria-hidden', 'true');
    drawerOverlay.classList.remove('open');
    document.body.style.overflow = '';
    if (lenis) lenis.start();
    if (menuBtn) menuBtn.focus();
  }

  if (menuBtn && drawer) {
    menuBtn.addEventListener('click', function () {
      menuBtn.setAttribute('aria-expanded', 'true');
      openDrawer();
    });
    drawerClose.addEventListener('click', function () {
      menuBtn.setAttribute('aria-expanded', 'false');
      closeDrawer();
    });
    drawerOverlay.addEventListener('click', function () {
      menuBtn.setAttribute('aria-expanded', 'false');
      closeDrawer();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('open')) {
        menuBtn.setAttribute('aria-expanded', 'false');
        closeDrawer();
      }
    });
    // Close drawer when a nav link is clicked (single-page scroll)
    drawer.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        menuBtn.setAttribute('aria-expanded', 'false');
        closeDrawer();
      });
    });
  }

})();

/* ===== HERO — Step 1 intent picker & redirect ===== */
var HC1 = {
  intent: null,
  pick: function (el) {
    document.querySelectorAll('#hc1Pills .hc-tile').forEach(function (b) { b.classList.remove('active'); });
    el.classList.add('active');
    HC1.intent = el.dataset.value;
  },
  go: function () {
    var btn  = document.getElementById('hcN1');
    var base = (btn && btn.dataset.url) ? btn.dataset.url.replace(/\/$/, '') : '/calculator';
    window.location.href = base + '?intent=' + encodeURIComponent(HC1.intent || 'exploring');
  }
};

/* ===== CALCULATOR PAGE — Steps 2-5 ===== */
// Per-carat broker prices in CAD
var HC_PPC = {
  natural: { commercial: 5200, premium: 8800, investment: 16500 },
  lab:     { commercial: 1250, premium: 2300, investment:  4600 }
};

var HC = {
  s: { step: 2, intent: null, type: null, carat: 1.0, quality: null, currency: 'CAD' },

  pick: function (el) {
    var field = el.dataset.field;
    el.closest('.hc-tiles').querySelectorAll('.hc-tile').forEach(function (b) { b.classList.remove('active'); });
    el.classList.add('active');
    HC.s[field] = el.dataset.value;
    HC._chk();
  },

  _chk: function () {
    var s = HC.s, btn;
    if (s.step === 2) { btn = document.getElementById('hcN2'); if (btn) btn.disabled = !(s.type && s.quality); }
    if (s.step === 3) { btn = document.getElementById('hcN3'); if (btn) btn.disabled = HC._rawBudget() < 500; }
  },

  _rawBudget: function () {
    var el = document.getElementById('hcBudget');
    return parseInt(((el ? el.value : '') || '').replace(/[^0-9]/g, '')) || 0;
  },

  setCarat: function (v) {
    HC.s.carat = parseFloat(v);
    var d = document.getElementById('hcCaratVal');
    if (d) d.textContent = parseFloat(v).toFixed(1) + ' ct';
  },

  setCurr: function (code, btn) {
    HC.s.currency = code;
    document.querySelectorAll('.hc-curr-btn').forEach(function (b) { b.classList.remove('active'); });
    btn.classList.add('active');
    var sym = document.getElementById('hcSym');
    if (sym) sym.textContent = code === 'USD' ? 'US$' : 'CA$';
    HC._chk();
  },

  fmtBudget: function (inp) {
    var raw = inp.value.replace(/[^0-9]/g, '');
    inp.value = raw ? parseInt(raw, 10).toLocaleString() : '';
    HC._chk();
  },

  next: function () { HC._go(HC.s.step + 1); },

  prev: function () {
    if (HC.s.step === 2) {
      var page = document.getElementById('calcPage');
      window.location.href = (page && page.dataset.homeUrl) ? page.dataset.homeUrl : '/';
      return;
    }
    HC._go(HC.s.step - 1);
  },

  _go: function (n) {
    var curId = HC.s.step <= 5 ? 'hcStep' + HC.s.step : 'hcStepOk';
    var cur   = document.getElementById(curId);
    if (cur) cur.classList.remove('active');
    HC.s.step = n;
    var nxtId = n <= 5 ? 'hcStep' + n : 'hcStepOk';
    var nxt   = document.getElementById(nxtId);
    if (nxt) nxt.classList.add('active');
    // Progress: HC steps 2-5 map to visual steps 1-4
    var visual = Math.min(Math.max(n - 1, 1), 4);
    var fill   = document.getElementById('calcProgFill');
    var label  = document.getElementById('calcProgLabel');
    if (fill)  fill.style.width = Math.round((visual / 4) * 100) + '%';
    if (label) label.textContent = n <= 5 ? 'Step ' + visual + ' of 4' : 'Complete';
    if (n === 4) HC._calc();
    HC._chk();
  },

  _calc: function () {
    var s   = HC.s;
    var ppc = (HC_PPC[s.type || 'natural'] || HC_PPC.natural)[s.quality || 'premium'];
    var our = ppc * s.carat;
    var ret = our * 1.45;
    var sav = ret - our;
    var rate = s.currency === 'USD' ? 0.74 : 1;
    var sym  = s.currency === 'USD' ? 'US$ ' : 'CA$ ';
    HC._animateValue('hcRetail',   Math.round(ret * rate), sym);
    HC._animateValue('hcOurPrice', Math.round(our * rate), sym);
    HC._animateValue('hcSavings',  Math.round(sav * rate), sym);
  },

  _animateValue: function (id, target, sym) {
    var el = document.getElementById(id);
    if (!el) return;
    var duration = 900, startTime = null;
    function step(ts) {
      if (!startTime) startTime = ts;
      var p    = Math.min((ts - startTime) / duration, 1);
      var ease = 1 - Math.pow(1 - p, 3);
      el.textContent = sym + Math.round(target * ease).toLocaleString();
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  },

  checkLead: function () {
    var name = ((document.getElementById('hcName') || {}).value || '').trim();
    var wa   = ((document.getElementById('hcWA')   || {}).value || '').trim();
    var btn  = document.getElementById('hcSubmit');
    if (btn) btn.disabled = !(name.length > 1 && wa.length > 6);
  },

  submit: function () {
    var s   = HC.s;
    var msg = encodeURIComponent(
      'Hi Colin! I used the savings calculator.\n' +
      'Intent: '  + (s.intent  || '') + '\n' +
      'Diamond: ' + s.carat + 'ct ' + (s.type || '') + ' (' + (s.quality || '') + ' grade)\n' +
      'Budget: '  + (((document.getElementById('hcBudget') || {}).value) || '') + ' ' + s.currency + '\n' +
      'Name: '    + (((document.getElementById('hcName')   || {}).value) || '')
    );
    var wa = document.getElementById('hcWACTA');
    if (wa) wa.href = 'https://wa.me/16135550100?text=' + msg;
    HC._go(6);
  },

  init: function () {
    var page = document.getElementById('calcPage');
    if (!page) return;
    var params  = new URLSearchParams(window.location.search);
    HC.s.intent = params.get('intent') || 'exploring';
    HC.s.step   = 1;
    HC._go(2);
  }
};

document.addEventListener('DOMContentLoaded', function () { HC.init(); });
