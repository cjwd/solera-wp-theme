<?php
namespace Solera;
use Solera\Helpers;

/**
 * Enqueue theme scripts/styles for the front end
 * @since 1.0.0
 * @return void
 */
add_action('wp_enqueue_scripts', function() {
  // Enqueue Theme scripts
  wp_enqueue_script( 'solera-script',get_stylesheet_directory_uri() . '/dist/assets/scripts/main.js' , null, null, true );
  if(is_account_page()) {
    wp_enqueue_script( 'solera-tabs',get_stylesheet_directory_uri() . '/dist/assets/scripts/tabs.js' , null, null, true );
  }

  // Enqueue Theme styles
  $parent_style = "divi-style";
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css', array(), '5.12.1');
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css');
  wp_enqueue_style( 'solera-style', Helpers\asset( 'css/main.css' ), [$parent_style], null);
});

/**
 * Remove the Javascript and CSS files loaded on non-woocommerce pages
 */
add_action('wp_enqueue_scripts', function() {
  if(function_exists('is_woocommerce')) {
    if(!is_woocommerce() && !is_cart() && !is_checkout()) {
      // Remove unnecessary stylesheets.
      wp_dequeue_style( 'woocommerce-general' );
      wp_dequeue_style( 'woocommerce-layout' );
      wp_dequeue_style( 'woocommerce-smallscreen' );
      wp_dequeue_style( 'woocommerce_frontend_styles' );
      wp_dequeue_style( 'woocommerce_fancybox_styles' );
      wp_dequeue_style( 'woocommerce_chosen_styles' );
      wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

      // Remove unnecessary scripts.
      wp_dequeue_script( 'wc_price_slider' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-add-to-cart' );
      wp_dequeue_script( 'wc-cart-fragments' );
      wp_dequeue_script( 'wc-checkout' );
      wp_dequeue_script( 'wc-add-to-cart-variation' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-cart' );
      wp_dequeue_script( 'wc-chosen' );
      wp_dequeue_script( 'woocommerce' );
      wp_dequeue_script( 'prettyPhoto' );
      wp_dequeue_script( 'prettyPhoto-init' );
      wp_dequeue_script( 'jquery-blockui' );
      wp_dequeue_script( 'jquery-placeholder' );
      wp_dequeue_script( 'fancybox' );
      wp_dequeue_script( 'jqueryui' );
    }
  }
}, 99);