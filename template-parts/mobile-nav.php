<div class="c-mobileMenuWrapper">
  <button class="c-btn c-btn--action c-btn--close"><span class="u-hidden-visually" aria-labelledby="Close Menu">Close Menu</span><i class="fas fa-times-circle"></i></button>
  <nav class="c-mobileMenu">
    <div class="c-mobileMenu__top">
      <ul id="mobile-primary-menu" class="c-mobileMenu__list">
        <?php
          $primary_desktop_nav_args = [
            'theme_location'  => 'primary-menu',
            'container' =>  '',
            'items_wrap' => '%3$s'
          ];
          wp_nav_menu( $primary_desktop_nav_args );
        ?>
      </ul>
      <hr class="c-mobileMenu__divider"></hr>
    </div>
    <nav class="c-auxMenuMobile" aria-labelledby="secondary-navigation">
      <h1 id="secondary-navigation" class="u-hidden-visually">Secondary Navigation</h1>
      <ul class="c-auxMenuMobile__list">
        <?php
            $secondary_desktop_nav_args = [
              'theme_location'  => 'secondary-menu',
              'container' =>  '',
              'items_wrap' => '%3$s'
            ];
            wp_nav_menu( $secondary_desktop_nav_args );
          ?>
      </ul>
    </nav>
    <div class="c-mobileMenu__bottom">
      <div class="navFooter"><img src="<?= get_stylesheet_directory_uri(); ?>/dist/assets/images/menu-promo-widget.jpg"/></div>
    </div>
  </nav>
</div>