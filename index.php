<?php get_header(); ?>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-bg" data-scroll data-scroll-speed="-3"></div>
    <div class="hero-grain"></div>

    <div class="hero-meta-top">
      <span>The Global Diamond Broker &middot; Est. 1983</span>
      <span class="num-mono">Private Broker Pricing &middot; GIA &middot; IGI Certified</span>
    </div>

    <div class="hero-content">
      <h1 data-scroll data-scroll-speed="1">
        The World&rsquo;s<br/>
        <span class="ind">Most <em>Beautiful</em></span><br/>
        Diamonds.
      </h1>

      <!-- HERO CALCULATOR — Step 1 only; continues on /calculator/ -->
      <div class="hc" id="heroCalc" role="region" aria-label="Diamond savings calculator">
        <div class="hc-header">
          <span class="hc-eyebrow">Private Savings Calculator &nbsp;&middot;&nbsp; 2 min &nbsp;&middot;&nbsp; No commitment</span>
          <div class="hc-dots" aria-hidden="true">
            <span class="hc-dot active"></span><span class="hc-dot"></span><span class="hc-dot"></span><span class="hc-dot"></span><span class="hc-dot"></span>
          </div>
        </div>
        <p class="hc-q">What are you looking for?</p>
        <div class="hc-tiles" id="hc1Pills">
          <button class="hc-tile" type="button" data-value="engagement" onclick="HC1.pick(this)">
            <span class="hc-tile-label">Engagement</span>
            <span class="hc-tile-desc">Proposal &amp; bridal</span>
          </button>
          <button class="hc-tile" type="button" data-value="investment" onclick="HC1.pick(this)">
            <span class="hc-tile-label">Investment</span>
            <span class="hc-tile-desc">Store-of-value stones</span>
          </button>
          <button class="hc-tile" type="button" data-value="resale" onclick="HC1.pick(this)">
            <span class="hc-tile-label">Resale</span>
            <span class="hc-tile-desc">Estate &amp; upgrade</span>
          </button>
          <button class="hc-tile" type="button" data-value="exploring" onclick="HC1.pick(this)">
            <span class="hc-tile-label">Exploring</span>
            <span class="hc-tile-desc">Just browsing options</span>
          </button>
        </div>
        <button class="hc-cta" id="hcN1"
          data-url="<?php echo esc_url(home_url('/calculator/')); ?>"
          onclick="HC1.go()">
          Show My Savings &nbsp;&rarr;
        </button>
      </div><!-- /hc -->
    </div>

    <div class="hero-foot">
      <div class="scroll-prompt"><span class="line"></span> Scroll to explore</div>
<div class="stats">
        <div><strong>43 yrs</strong>Sourcing</div>
        <div><strong>30&ndash;40%</strong>Below Retail</div>
        <div><strong>GIA &middot; IGI</strong>Certified Only</div>
      </div>
    </div>
  </section>

  <!-- MARQUEE -->
  <div class="marquee">
    <div class="marquee-track" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-4">
      <span>Argyle Pinks</span><span>Antwerp Master Cutters</span><span>GIA &middot; IGI Certified</span><span>Direct From Source</span><span>No Retail Markup</span><span>Heirloom Commissions</span>
      <span>Argyle Pinks</span><span>Antwerp Master Cutters</span><span>GIA &middot; IGI Certified</span><span>Direct From Source</span><span>No Retail Markup</span><span>Heirloom Commissions</span>
    </div>
  </div>

  <!-- STACKED HEADLINE — The House -->
  <section id="realm" class="pillar-section">
    <div class="stacked">
      <h2>
        <span class="row" data-scroll data-scroll-speed="2"><span>What It Feels Like&nbsp;</span></span>
        <span class="row" data-scroll data-scroll-speed="1"><span>to Buy <em>Differently.</em></span></span>
      </h2>
    </div>
    <div class="body" data-scroll data-scroll-speed="0.6">
      <div class="left">
        <div class="num">/01</div>
        <div class="label">The Experience</div>
      </div>
      <div>
        <p><strong>Most people buying a diamond have one experience:</strong> walking into a store, being guided toward whatever is in stock, and paying whatever the margin demands. The price is set. The selection is limited. The advice is compromised.</p>
        <p style="margin-top:24px">Working with a private broker is the opposite. We begin with your vision &mdash; the occasion, the style, the stone you&rsquo;ve always imagined. Then we source it directly from the world&rsquo;s finest cutting houses and trading floors that no retail showroom will ever show you.</p>
        <p style="margin-top:24px">You receive HD video, GIA or IGI certificates, and a completely transparent breakdown of what the same stone would cost at retail &mdash; and why it doesn&rsquo;t have to. No pressure. No inventory bias. No mystery.</p>
      </div>
    </div>
  </section>

  <!-- SCENE 1 — full bleed parallax -->
  <section class="scene scene-1">
    <div class="scene-bg" data-scroll data-scroll-speed="-3"></div>
    <div class="scene-overlay">
      <div data-scroll data-scroll-speed="1">
        <div class="tag">Featured &middot; Argyle 1718</div>
        <h3>A 1.04&#8209;carat fancy <em>vivid pink</em> from one of the last Argyle tenders ever held.</h3>
        <div class="meta">
          <div><strong>Type IIa</strong>Rarity</div>
          <div><strong>VS1</strong>Clarity</div>
          <div><strong>GIA</strong>Certified</div>
          <div><strong>Antwerp</strong>Cut &amp; polished</div>
        </div>
      </div>
    </div>
  </section>

  <!-- STACKED HEADLINE — The Difference -->
  <section class="pillar-section">
    <div class="stacked">
      <h2>
        <span class="row" data-scroll data-scroll-speed="1.6"><span>They Sell from Stock.&nbsp;</span></span>
        <span class="row" data-scroll data-scroll-speed="0.8"><span>We <em>Source</em></span></span>
        <span class="row" data-scroll data-scroll-speed="0.2"><span>for You.</span></span>
      </h2>
    </div>
    <div class="body" data-scroll data-scroll-speed="0.5">
      <div class="left">
        <div class="num">/02</div>
        <div class="label">The Difference</div>
      </div>
      <div>
        <p><strong>Retailers are limited to what they&rsquo;ve already bought</strong> &mdash; marked up through every layer of the supply chain. As brokers, we don&rsquo;t carry stock or push what&rsquo;s on hand. We represent the buyer, not the inventory.</p>
        <p style="margin-top:24px">We go out and source the most exceptional diamond on your behalf, at the true market price. No inventory bias. No hidden margin. Just the stone that is right for you, at what it actually costs &mdash; 30&ndash;40% below what any retailer will offer.</p>
      </div>
    </div>
  </section>

  <!-- HORIZONTAL COLLECTION -->
  <section id="collection" class="h-section">
    <div class="head">
      <h2 data-scroll data-scroll-speed="1">
        Recently <em>placed.</em><br/>
        Quietly extraordinary.
      </h2>
      <p class="meta" data-scroll data-scroll-speed="0.3">A small selection of stones brokered to private clients in the past twelve months. Each one chosen against a brief; each one delivered in person.</p>
    </div>

    <div class="h-track" id="hTrack">
      <article class="stone-card">
        <div class="img"><img alt="The Marais — Round Brilliant Diamond" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/sparkling-diamond-held-by-tweezers-close-up-view-2026-03-31-04-36-10-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="meta"><span>No. 01</span><span>Round Brilliant</span></div>
        <h3>The Marais</h3>
        <div class="specs"><span><strong>4.21ct</strong>Weight</span><span><strong>D / IF</strong>Grade</span><span><strong>Triple X</strong>Cut</span></div>
      </article>
      <article class="stone-card">
        <div class="img"><img alt="Argyle 1718 — Fancy Vivid Pink Diamond" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/close-up-of-shiny-gemstone-held-by-tweezers-2026-03-26-01-06-39-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="meta"><span>No. 02</span><span>Argyle Pink</span></div>
        <h3>Argyle 1718</h3>
        <div class="specs"><span><strong>1.04ct</strong>Weight</span><span><strong>FP / VS1</strong>Grade</span><span><strong>Type IIa</strong>Rarity</span></div>
      </article>
      <article class="stone-card">
        <div class="img"><img alt="Hôtel Drouot — Emerald Cut Diamond" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/elegant-diamond-ring-on-gems-2026-03-13-01-23-39-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="meta"><span>No. 03</span><span>Emerald Cut</span></div>
        <h3>H&ocirc;tel Drouot</h3>
        <div class="specs"><span><strong>7.66ct</strong>Weight</span><span><strong>E / VVS2</strong>Grade</span><span><strong>Step</strong>Facets</span></div>
      </article>
      <article class="stone-card">
        <div class="img"><img alt="Polaris — Loose Diamond D/IF" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/elegant-diamond-ring-on-shimmering-black-fabric-2026-01-06-00-29-48-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="meta"><span>No. 04</span><span>Loose Stone</span></div>
        <h3>Polaris</h3>
        <div class="specs"><span><strong>5.18ct</strong>Weight</span><span><strong>D / IF</strong>Grade</span><span><strong>Triple X</strong>Cut</span></div>
      </article>
      <article class="stone-card">
        <div class="img"><img alt="Lumière de Nuit — Pear Diamond D/FL" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/sparkling-gems-reflecting-light-in-a-soft-bokeh-2026-03-26-03-35-53-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="meta"><span>No. 05</span><span>Pear</span></div>
        <h3>Lumi&egrave;re de Nuit</h3>
        <div class="specs"><span><strong>9.02ct</strong>Weight</span><span><strong>D / FL</strong>Grade</span><span><strong>None</strong>Fluorescence</span></div>
      </article>
      <article class="stone-card">
        <div class="img"><img alt="No. VII — Loose Stone D/VVS1 Antwerp Cut" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/sparkling-diamond-on-a-bed-of-smaller-gems-2026-01-06-00-44-36-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="meta"><span>No. 06</span><span>Loose Stone</span></div>
        <h3>No. VII</h3>
        <div class="specs"><span><strong>3.30ct</strong>Weight</span><span><strong>D / VVS1</strong>Grade</span><span><strong>Antwerp</strong>Cut</span></div>
      </article>
    </div>

    <div class="h-foot">
      <span>Drag &middot; scroll &middot; click to inquire</span>
      <div class="arrows">
        <button id="hPrev" aria-label="Previous stone">&larr;</button>
        <button id="hNext" aria-label="Next stone">&rarr;</button>
      </div>
    </div>
  </section>

  <!-- DARK QUOTE SECTION -->
  <section class="quote-section">
    <div class="wrap">
      <div class="mark" data-scroll data-scroll-speed="1">&ldquo;</div>
      <blockquote data-scroll data-scroll-speed="0.5">
        There will always be bigger. There will always be smaller. But there will never be more <em>beautiful</em> than ours &mdash; and ultimately yours.
      </blockquote>
      <cite data-scroll data-scroll-speed="0.3"><strong>Colin &middot; The Global Diamond Broker</strong>Est. 1983 &middot; 43 years in trade</cite>
    </div>
  </section>

  <!-- SCENE 2 — full bleed -->
  <section class="scene scene-2">
    <div class="scene-bg" data-scroll data-scroll-speed="-3"></div>
    <div class="scene-overlay">
      <div data-scroll data-scroll-speed="1">
        <div class="tag">Independent Valuation &middot; 24&#8209;Hour Turnaround</div>
        <h3>Send any GIA or IGI certificate. We&rsquo;ll tell you what that diamond <em>really</em> costs.</h3>
        <div class="meta">
          <div><strong>Free</strong>Service</div>
          <div><strong>24h</strong>Turnaround</div>
          <div><strong>Written</strong>Valuation</div>
          <div><strong>Direct</strong>From the broker</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ATELIER (Colin) -->
  <section class="atelier">
    <div class="grid">
      <div class="img-wrap">
        <img data-scroll data-scroll-speed="-1.5" alt="Colin — The Global Diamond Broker" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/Colin.jpg' ); ?>" loading="lazy" />
      </div>
      <div class="copy">
        <span class="eyebrow"><span class="dot"></span>The Global Diamond Broker &mdash; Est. 1983</span>
        <h2 data-scroll data-scroll-speed="0.5">43 Years. <em>Every Side</em><br/>of the Industry.</h2>
        <p>With over 43 years in the diamond industry, Colin has worked every side of it &mdash; from launching a national jewellery chain to being appointed one of the first five global partners of the iconic Argyle Pink Diamond Mine, where he successfully bid on some of the rarest pink diamonds ever released.</p>
        <p>As North American Distribution Manager for Grayson&rsquo;s Diamonds of Antwerp, Colin supplied exceptional stones across North America. Trained under Edward Gryspeerdt &mdash; a former De Beers site dealer &mdash; and Eddy Elzas of the Rainbow Collection, he helps clients today skip retail myths and markups and access the most beautiful diamonds on earth, directly.</p>
        <div class="credentials" data-scroll data-scroll-speed="0.3">
          <div><div class="v">43</div><div class="l">Years in trade</div></div>
          <div><div class="v">ARGYLE</div><div class="l">1 of 5 Partners</div></div>
          <div><div class="v">DE BEERS</div><div class="l">Lineage</div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- JOURNAL -->
  <section id="journal" class="journal-section">
    <div class="head">
      <h2 data-scroll data-scroll-speed="0.7">
        Stories from <em>inside</em><br/>
        the trade.
      </h2>
      <a class="seeall" href="#">See all dispatches</a>
    </div>
    <div class="articles stagger">
      <a class="article" href="#">
        <div class="thumb"><img alt="Beyond the Four Cs" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/sparkling-diamond-held-by-tweezers-close-up-view-2026-03-31-04-36-10-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="cat">Education</div>
        <h4>Beyond the Four Cs: how master brokers actually grade a stone.</h4>
        <div class="read">7 min read &middot; April 2026</div>
      </a>
      <a class="article" href="#">
        <div class="thumb"><img alt="Argyle Pink Market" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/elegant-diamond-ring-on-gems-2026-03-13-01-23-39-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="cat">Provenance</div>
        <h4>What happens to the Argyle pink market now the mine has closed.</h4>
        <div class="read">12 min read &middot; March 2026</div>
      </a>
      <a class="article" href="#">
        <div class="thumb"><img alt="Auction Season 2026" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/images/sparkling-gems-reflecting-light-in-a-soft-bokeh-2026-03-26-03-35-53-utc.jpg' ); ?>" loading="lazy" /></div>
        <div class="cat">Investment</div>
        <h4>Auction season 2026: the colour grades quietly outperforming gold.</h4>
        <div class="read">9 min read &middot; February 2026</div>
      </a>
    </div>
  </section>

  <!-- CTA -->
  <section id="contact" class="cta">
    <div class="wrap">
      <h2 data-scroll data-scroll-speed="1">
        Looking for<br/>
        Something <em>Exceptional?</em>
      </h2>
      <p data-scroll data-scroll-speed="0.4">The more details you share, the better we can assist you. Whether you&rsquo;re looking for a specific diamond, a custom piece, or just starting your search &mdash; we reply personally within twenty&#8209;four hours.</p>
      <a class="pill" href="#contact" data-scroll data-scroll-speed="0.2">Begin a Private Consultation &rarr;</a>
    </div>
  </section>

<?php get_footer(); ?>
