<?php
/**
 * Template Name: Diamond Calculator
 *
 * Assign this template to a WordPress page with the slug "calculator".
 * The hero step-1 CTA redirects here with ?intent=<value>.
 */

add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'calc-page-body';
	return $classes;
} );

get_header();

$valid  = array( 'engagement', 'investment', 'resale', 'exploring' );
$intent = isset( $_GET['intent'] ) ? sanitize_text_field( $_GET['intent'] ) : '';
if ( ! in_array( $intent, $valid, true ) ) {
	$intent = 'exploring';
}

$img_url  = esc_url( get_stylesheet_directory_uri() . '/assets/js/images/shining-diamond-on-white-reflective-surface-2026-03-18-06-51-27-utc.jpeg' );
$home_url = esc_url( home_url( '/' ) );
?>

<main class="calc-page" id="calcPage"
  data-intent="<?php echo esc_attr( $intent ); ?>"
  data-home-url="<?php echo $home_url; ?>">

  <!-- ═══ LEFT — steps 2-5 ═══ -->
  <div class="calc-left">
    <div class="calc-left-inner">

      <a class="calc-back-link" href="<?php echo $home_url; ?>">&#8592; The Global Diamond Broker</a>

      <h1 class="calc-title">Your Private<br><em>Savings Breakdown.</em></h1>
      <p class="calc-sub">We&rsquo;ll show you exactly what you&rsquo;re overpaying at retail &mdash; and what you can source directly at broker pricing.</p>

      <div class="calc-prog-wrap">
        <div class="calc-prog-bar">
          <div class="calc-prog-fill" id="calcProgFill"></div>
        </div>
        <span class="calc-prog-label" id="calcProgLabel">Step 1 of 4</span>
      </div>

      <div class="hc hc-page" id="calcMain">

        <!-- Step 1 — Intent (shown when arriving without ?intent param) -->
        <div class="hc-step" id="hcStep1">
          <p class="hc-q">What are you looking for?</p>
          <div class="hc-tiles">
            <button class="hc-tile" data-field="intent" data-value="engagement" onclick="HC.pick(this)">
              <span class="hc-tile-label">Engagement</span>
              <span class="hc-tile-desc">Proposal &amp; bridal</span>
            </button>
            <button class="hc-tile" data-field="intent" data-value="investment" onclick="HC.pick(this)">
              <span class="hc-tile-label">Investment</span>
              <span class="hc-tile-desc">Store-of-value stones</span>
            </button>
            <button class="hc-tile" data-field="intent" data-value="resale" onclick="HC.pick(this)">
              <span class="hc-tile-label">Resale</span>
              <span class="hc-tile-desc">Estate &amp; upgrade</span>
            </button>
            <button class="hc-tile" data-field="intent" data-value="exploring" onclick="HC.pick(this)">
              <span class="hc-tile-label">Exploring</span>
              <span class="hc-tile-desc">Just browsing options</span>
            </button>
          </div>
          <p class="hc-field-hint" id="hcHintIntent">Select one to continue</p>
          <div class="hc-nav">
            <button class="hc-back" type="button" onclick="HC.prev()">&#8592; Back to home</button>
            <button class="hc-cta" type="button" id="hcN1Calc" disabled onclick="HC.next()">Continue &rarr;</button>
          </div>
          <p class="hc-step-hint" id="hcHint1Calc">Choose what you&rsquo;re looking for above to continue.</p>
        </div>

        <!-- Step 2 — Type + Carat + Quality -->
        <div class="hc-step" id="hcStep2">
          <p class="hc-q">Diamond type</p>
          <div class="hc-tiles">
            <button class="hc-tile" data-field="type" data-value="natural" onclick="HC.pick(this)">
              <span class="hc-tile-label">Natural</span>
              <span class="hc-tile-desc">Earth-mined, certified</span>
            </button>
            <button class="hc-tile" data-field="type" data-value="lab" onclick="HC.pick(this)">
              <span class="hc-tile-label">Lab-Grown</span>
              <span class="hc-tile-desc">Identical, lower cost</span>
            </button>
          </div>
          <p class="hc-field-hint" id="hcHintType">Select one to continue</p>
          <div class="hc-slider">
            <div class="hc-slider-top">
              <span class="hc-q" style="margin:0;font-size:16px">Carat size</span>
              <strong class="hc-carat-val" id="hcCaratVal">1.0 ct</strong>
            </div>
            <input class="hc-range" type="range" id="hcCaratR" min="0.3" max="5" step="0.1" value="1.0" oninput="HC.setCarat(this.value)" aria-label="Carat size">
            <div class="hc-range-ticks" aria-hidden="true"><span>0.3</span><span>1 ct</span><span>2 ct</span><span>3 ct</span><span>5 ct</span></div>
          </div>
          <p class="hc-q" style="margin-top:18px">Quality preference</p>
          <div class="hc-tiles" style="grid-template-columns:repeat(3,1fr)">
            <button class="hc-tile" data-field="quality" data-value="commercial" onclick="HC.pick(this)">
              <span class="hc-tile-label">Commercial</span>
              <span class="hc-tile-desc">Excellent value</span>
            </button>
            <button class="hc-tile" data-field="quality" data-value="premium" onclick="HC.pick(this)">
              <span class="hc-tile-label">Premium</span>
              <span class="hc-tile-desc">Most popular</span>
            </button>
            <button class="hc-tile" data-field="quality" data-value="investment" onclick="HC.pick(this)">
              <span class="hc-tile-label">Investment</span>
              <span class="hc-tile-desc">Top 5% of stones</span>
            </button>
          </div>
          <p class="hc-field-hint" id="hcHintQuality">Select one to continue</p>
          <div class="hc-nav">
            <button class="hc-back" type="button" onclick="HC.prev()">&#8592; Back</button>
            <button class="hc-cta" type="button" id="hcN2" disabled onclick="HC.next()">Continue &rarr;</button>
          </div>
          <p class="hc-step-hint" id="hcHint2">Choose a diamond type and quality above to continue.</p>
        </div>

        <!-- Step 3 — Budget -->
        <div class="hc-step" id="hcStep3">
          <p class="hc-q">What&rsquo;s your budget?</p>
          <div class="hc-curr-row">
            <button class="hc-curr-btn active" type="button" onclick="HC.setCurr('CAD',this)">CAD (CA$)</button>
            <button class="hc-curr-btn" type="button" onclick="HC.setCurr('USD',this)">USD (US$)</button>
          </div>
          <div class="hc-input-wrap">
            <span class="hc-sym" id="hcSym">CA$</span>
            <input class="hc-input" type="text" id="hcBudget" placeholder="e.g. 10,000" oninput="HC.fmtBudget(this)" inputmode="numeric" aria-label="Budget amount">
          </div>
          <div class="hc-nav">
            <button class="hc-back" type="button" onclick="HC.prev()">&#8592; Back</button>
            <button class="hc-cta" type="button" id="hcN3" disabled onclick="HC.next()">See My Savings &rarr;</button>
          </div>
          <p class="hc-step-hint" id="hcHint3">Enter a budget of at least $500 to continue.</p>
        </div>

        <!-- Step 4 — Results -->
        <div class="hc-step" id="hcStep4">

          <p class="hc-res-eyebrow">Your Private Savings Estimate</p>

          <!-- Hero savings card -->
          <div class="hc-res-hero">
            <span class="hc-res-save-label">You save</span>
            <div class="hc-res-save-amount" id="hcSavings">—</div>
            <div class="hc-res-pct-wrap">
              <span class="hc-res-pct" id="hcSavingsPct">calculating&hellip;</span>
            </div>
            <p class="hc-res-vs">vs. any certified retailer in North America</p>
          </div>

          <!-- Price comparison with animated bars -->
          <div class="hc-res-compare">
            <div class="hc-res-crow hc-res-crow-retail">
              <div class="hc-res-crow-top">
                <span class="hc-res-crow-label">Retail estimate</span>
                <span class="hc-res-crow-val" id="hcRetail">—</span>
              </div>
              <div class="hc-res-bar-wrap">
                <div class="hc-res-bar-fill hc-res-bar-retail" id="hcBarRetail"></div>
              </div>
            </div>
            <div class="hc-res-crow hc-res-crow-ours">
              <div class="hc-res-crow-top">
                <span class="hc-res-crow-label">Broker direct price</span>
                <span class="hc-res-crow-val" id="hcOurPrice">—</span>
              </div>
              <div class="hc-res-bar-wrap">
                <div class="hc-res-bar-fill hc-res-bar-ours" id="hcBarOurs"></div>
              </div>
            </div>
          </div>

          <!-- Trust signals -->
          <div class="hc-res-trust">
            <span class="hc-res-pill">GIA &amp; IGI Certified</span>
            <span class="hc-res-pill">HD Video Included</span>
            <span class="hc-res-pill">Same-Day Response</span>
          </div>

          <p class="hc-res-note">&ldquo;These prices are not advertised. They are exclusive to private clients only.&rdquo;</p>

          <div class="hc-nav">
            <button class="hc-back" type="button" onclick="HC.prev()">&#8592; Adjust</button>
            <button class="hc-cta hc-cta-book" type="button" onclick="HC.next()">Book My Private Consultation &rarr;</button>
          </div>
        </div>

        <!-- Step 5 — Lead capture -->
        <div class="hc-step" id="hcStep5">
          <div class="hc-lead-intro">
            <p class="hc-res-eyebrow">One Last Step</p>
            <p class="hc-q" style="margin-bottom:6px">Claim your broker pricing</p>
            <p class="hc-lead-sub">Colin will personally reach out with certified options, HD video &amp; your exact private price &mdash; usually within 2 hours.</p>
          </div>
          <input class="hc-input hc-input-bare" type="text" id="hcName" placeholder="Your name" oninput="HC.checkLead()" autocomplete="name" aria-label="Your name">
          <input class="hc-input hc-input-bare" type="tel"  id="hcWA"   placeholder="+1 (416) 555-0123" oninput="HC.checkLead()" autocomplete="tel" aria-label="WhatsApp number">
          <p class="hc-trust">Private &amp; confidential &mdash; no spam, no obligation, ever.</p>
          <div class="hc-nav">
            <button class="hc-back" type="button" onclick="HC.prev()">&#8592; Back</button>
            <button class="hc-cta" type="button" id="hcSubmit" disabled onclick="HC.submit()">Book My Consultation &rarr;</button>
          </div>
        </div>

        <!-- Success -->
        <div class="hc-step" id="hcStepOk">
          <div class="hc-success">
            <div class="hc-tick" aria-hidden="true">&#10003;</div>
            <p class="hc-q" style="text-align:center">Consultation Booked.</p>
            <p class="hc-trust" style="text-align:center;margin-top:10px">Colin will reach out personally within 2 hours with certified options, HD video &amp; your private broker price. Keep an eye on WhatsApp.</p>
            <a class="hc-cta" id="hcWACTA" href="#" target="_blank" rel="noopener noreferrer"
               style="display:block;margin-top:22px;text-align:center;text-decoration:none">
              Open WhatsApp Now &rarr;
            </a>
          </div>
        </div>

      </div><!-- /hc hc-page -->

    </div><!-- /calc-left-inner -->
  </div><!-- /calc-left -->

  <!-- ═══ RIGHT — diamond photo ═══ -->
  <div class="calc-right" aria-hidden="true">
    <div class="calc-right-bg" style="background-image:url('<?php echo $img_url; ?>')"></div>
    <div class="calc-right-overlay">
      <blockquote class="calc-quote">
        &ldquo;There will always be bigger. There will always be smaller. But there will never be more beautiful than ours &mdash; and ultimately yours.&rdquo;
      </blockquote>
      <cite class="calc-cite">Colin &middot; The Global Diamond Broker &middot; Est. 1983</cite>
    </div>
  </div>

</main>

<?php get_footer(); ?>
