<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

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
    <span class="menu">Menu <span style="display:inline-block;width:18px;height:1px;background:currentColor"></span></span>
  </div>
</nav>

<div class="page">
