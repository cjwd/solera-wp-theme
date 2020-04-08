<?php
namespace Solera;

/**
 * Simplifies the nav menu class system.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $classes
 * @param  object  $item
 * @return array
 */
function nav_menu_css_class( $classes, $item ) {
  $_classes = [ 'c-menu-item' ];
  foreach ( [ 'item', 'parent', 'ancestor' ] as $type ) {
    if ( in_array( "current-menu-{$type}", $classes ) || in_array( "current_page_{$type}", $classes ) ) {
      $_classes[] = 'item' === $type ? 'c-current-menu-item' : "c-current-menu-{$type}";
    }
  }
  // If the menu item is a post type archive and we're viewing a single
  // post of that post type, the menu item should be an ancestor.
  if ( 'post_type' === $item->type && is_singular( $item->object ) && ! in_array( 'menu-item-ancestor', $_classes ) ) {
    $_classes[] = 'c-menu-item-ancestor';
  }
  // Add a class if the menu item has children.
  if ( in_array( 'menu-item-has-children', $classes ) ) {
    $_classes[] = 'c-menu-item-has-children';
  }
  // Add custom user-added classes if we have any.
  $custom = get_post_meta( $item->ID, '_menu_item_classes', true );
  if ( $custom ) {
    $_classes = array_merge( $_classes, (array) $custom );
  }
  return $_classes;
}

/**
 * Adds a custom class to the submenus in nav menus.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $classes
 * @return array
 */
function nav_menu_submenu_css_class( $classes ) {
  $classes = [ 'c-menu-item__sub-menu' ];
  return $classes;
}

/**
 * Adds a custom class to the nav menu link.
 *
 * @since  0.0.1
 * @access public
 * @param  array   $attr;
 * @return array
 */
function nav_menu_link_attributes( $attr ) {
  $attr['class'] = 'c-menu-item__link';
  return $attr;
}