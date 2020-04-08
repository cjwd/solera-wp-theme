<?php
namespace Solera;

# Adds custom CSS classes to nav menu items.
add_filter( 'nav_menu_css_class',         __NAMESPACE__ . '\nav_menu_css_class', 5, 2 );
add_filter( 'nav_menu_submenu_css_class', __NAMESPACE__ . '\nav_menu_submenu_css_class', 5 );
add_filter( 'nav_menu_link_attributes',   __NAMESPACE__ . '\nav_menu_link_attributes', 5 );