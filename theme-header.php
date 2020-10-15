<header class="c-siteHeader">
  <div class="c-siteHeader__logo">
    <a href="/"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/images/solera-logo-white.svg" alt="Solera Logo"></a>
  </div>
  <div class="c-siteHeader__secondary">
    <nav class="c-auxMenu" aria-labelledby="secondary-navigation">
      <h1 id="secondary-navigation" class="u-hidden-visually">Secondary Navigation</h1>
      <ul class="c-auxMenu__list">
        <?php
        $secondary_desktop_nav_args = [
          'theme_location'  => 'secondary-menu',
          'container' =>  '',
          'items_wrap' => '%3$s'
        ];
        wp_nav_menu($secondary_desktop_nav_args);
        ?>
      </ul>
      <?php get_template_part('template-parts/actions'); ?>
    </nav>
  </div>
  <div class="c-siteHeader__primary">
    <nav class="c-primaryMenu" aria-labelledby="main-navigation">
      <h1 id="main-navigation" class="u-hidden-visually">Primary Navigation</h1>
      <ul class="c-primaryMenu__list">
        <?php
        $primary_desktop_nav_args = [
          'theme_location'  => 'primary-menu',
          'container' =>  '',
          'items_wrap' => '%3$s'
        ];
        wp_nav_menu($primary_desktop_nav_args);
        ?>
      </ul>
    </nav>
  </div>
  <?php get_template_part('template-parts/solera-locations'); ?>
</header>
<header id="mobile-header" class="c-siteHeaderMobile">
  <div class="c-siteHeader__left">
    <div class="c-siteHeader__logo">
      <a href="/"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/images/solera-logo-white.svg" alt="Solera Logo"></a>
    </div>
  </div>
  <?php get_template_part('template-parts/actions'); ?>
  <?php get_template_part('template-parts/solera-locations'); ?>
</header>
<?php get_template_part('template-parts/mobile-nav'); ?>
<div id="site-search" class="c-siteSearch">
  <?php the_widget('WC_Widget_Product_Search', 'title='); ?>
  <button id="btn-close-search" class="c-btn c-btn--action" data-modal-close="site-search">Cancel</button>
</div>