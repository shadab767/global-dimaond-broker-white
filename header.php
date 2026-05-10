<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">Skip to main content</a>

<nav class="top">
  <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
      <path d="M12 2 L22 9 L12 22 L2 9 Z"/><path d="M2 9 L22 9"/><path d="M7 9 L12 2 L17 9 L12 22 Z"/>
    </svg>
    <span>The Global Diamond Broker</span>
  </a>
  <div class="nav-links">
    <a href="#realm" data-scroll-to>Atelier</a>
    <a href="#collection" data-scroll-to>Collection</a>
    <a href="#journal" data-scroll-to>Journal</a>
    <a href="#contact" data-scroll-to>Inquire</a>
  </div>
  <div class="nav-cta">
    <span>EST. 1983</span>
    <button class="menu" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="navDrawer">Menu <span style="display:inline-block;width:18px;height:1px;background:currentColor" aria-hidden="true"></span></button>
  </div>
</nav>

<!-- NAV DRAWER -->
<div class="nav-drawer" id="navDrawer" aria-hidden="true" role="dialog" aria-label="Navigation menu">
  <div class="nav-drawer-inner">
    <div class="nav-drawer-head">
      <span class="nav-drawer-brand">The Global Diamond Broker</span>
      <button class="nav-drawer-close" id="navDrawerClose" aria-label="Close menu" type="button">&times;</button>
    </div>
    <nav class="nav-drawer-links">
      <a href="#realm">Atelier</a>
      <a href="#collection">Collection</a>
      <a href="#journal">Journal</a>
      <a href="#contact">Inquire</a>
    </nav>
    <div class="nav-drawer-foot">Est. 1983 &middot; Antwerp &middot; New York &middot; Sydney</div>
  </div>
</div>
<div class="nav-drawer-overlay" id="navDrawerOverlay" aria-hidden="true"></div>

<div class="page" id="main-content">
