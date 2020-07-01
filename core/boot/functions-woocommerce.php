<?php
namespace Solera\Woocommerce;

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
  return class_exists( 'WooCommerce' ) ? true : false;
}

/**
 * Sigh....:(
 * Divi why are you removing the add to cart button by default
 */
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20 );

/**
 * Change number of products per row to 3
 */
add_filter('loop_shop_columns', __NAMESPACE__ . '\loop_columns', 999);
if(!function_exists('loop_columns')) {
  function loop_columns() {
    return 3;
  }
}

/**
 * Override loop template and show quantities next to add to cart buttons
 */
add_filter( 'woocommerce_loop_add_to_cart_link', __NAMESPACE__ . '\quantity_cart_inputs', 10, 2 );
function quantity_cart_inputs( $html, $product ) {
  if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
    $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
    $html .= '<div class="control-stepper">';
    $html .= '<button class="control-stepper__down is-disabled" type="button" data-action="minus"> - </button>';
    $html .= woocommerce_quantity_input( array(), $product, false );
    $html .= '<button class="control-stepper__up" type="button" data-action="add"> + </button>';
    $html .= '</div>';
    $html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
    $html .= '</form>';
  }
  return $html;
}

/**
 * Adjust the quantity input values
 */
add_filter( 'woocommerce_quantity_input_args', __NAMESPACE__ . '\woocommerce_quantity_input_args', 10, 2 ); // Simple products
function woocommerce_quantity_input_args( $args, $product ) {
  // $args['max_value'] 	= 80; 	// Maximum value
  $args['min_value'] 	= 1;   	// Minimum value
  // $args['step'] 		= 2;    // Quantity steps
  return $args;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', __NAMESPACE__ . '\woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ?>
  <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
  <?php
  $fragments['a.cart-customlocation'] = ob_get_clean();
  return $fragments;
}


add_action('woocommerce_before_account_navigation', function() {
  echo '<div class="grid">';
});

/**
 * woocommerce_after_my_account is deprecated
 * So this should be temporary solution
 */
add_action('woocommerce_after_my_account', function() {
  echo '</div>';
});

/**
 * Custom currency symbol for TTD
 */
add_filter('woocommerce_currency_symbol', function($currency_symbol, $currency) {
  switch( $currency ) {
    case 'TTD': $currency_symbol = 'TT$'; break;
  }
  return $currency_symbol;
}, 10, 2);