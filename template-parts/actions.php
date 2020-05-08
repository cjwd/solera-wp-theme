<div id="header-right" class="c-siteHeader__right">
  <!-- Search -->
  <button id="btn-search" class="c-btn c-btn--action c-btn--search" data-modal="site-search">
    <span class="u-hidden-visually" aria-labelledby="search">Search</span><i class="fas fa-search"></i>
  </button>
  <!-- My Account -->
  <a class="c-btn c-btn--action c-btn--account" href="<?= get_permalink(get_option('woocommerce_myaccount_page_id'));?>" title="<?php _e('My Account','solera'); ?> "><span class="u-hidden-visually" aria-labelledby="my account">My Account</span><i class="fas fa-user-circle"></i></a>
  <!-- My Cart -->
  <a class="c-btn c-btn--action c-btn--cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'solera' ); ?>">
    <span class="u-hidden-visually" aria-labelledby="my cart">My Cart</span>
    <i class="fas fa-shopping-bag"></i>
    <span class="woocommerce-Cart-amount"><?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span> <span class="separator">-</span> <?php echo WC()->cart->get_cart_total(); ?>
  </a>
  <!-- Mobile Menu Toggle -->
  <button id="btn-menu" class="c-btn c-btn--action c-btn--menu">
    <span class="u-hidden" aria-labelledby="menu">Menu</span>
    <i class="fas fa-bars"></i>
  </button>
</div>