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
              wp_nav_menu( $secondary_desktop_nav_args );
            ?>
        </ul>
        <div id="header-right" class="c-siteHeader__right">
          <div id="site-search" class="c-siteSearch">
            <?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
            <button id="btn-close-search" class="c-btn c-btn--action" data-modal-close="site-search">Cancel</button>
          </div>
          <button id="btn-search" class="c-btn c-btn--action c-btn--search" data-modal="site-search">
            <span class="u-hidden" aria-labelledby="search">Search</span><i class="fas fa-search"></i>
          </button>
          <?php //if(is_user_logged_in()) : ?>
            <a class="c-btn c-btn--action c-btn--account" href="<?= get_permalink(get_option('woocommerce_myaccount_page_id'));?>" title="<?php _e('My Account','solera'); ?> "><span class="u-hidden" aria-labelledby="my account">My Account</span><i class="fas fa-user-circle"></i></a>
          <?php //endif; ?>
          <a class="c-btn c-btn--action c-btn--cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'solera' ); ?>">
            <span class="u-hidden" aria-labelledby="my cart">My Cart</span>
            <i class="fas fa-shopping-bag"></i>
            <span class="woocommerce-Cart-amount"><?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span> - <?php echo WC()->cart->get_cart_total(); ?>
          </a>
        </div>
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
              wp_nav_menu( $primary_desktop_nav_args );
            ?>
          </ul>
        </nav>
    </div>
    <div class="c-soleraLocations">
      <div class="c-soleraLocation c-soleraLocation--north">
        <a href="/contact-us-north">NORTH <i class="fas fa-map-marker-alt"></i> CORNER OF TRAGARETE & GREY STREET</i></a>
      </div>
      <div class="c-soleraLocation c-soleraLocation--south">
        <a href="/contact-us-north">SOUTH <i class="fas fa-map-marker-alt"></i> C3 CENTRE COURTYARD</i></a>
      </div>
    </div>
</header>
