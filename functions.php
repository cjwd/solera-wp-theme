<?php
/**
 * Includes
 *
 * The includes array determines the code library included in the theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$includes = [
  'core/boot/functions-helpers.php',  // Helper Functions
  'core/boot/functions-assets.php',   // Enqueue Theme Styles and Scripts
  'core/boot/functions-setup.php',    // Theme setup
  'core/boot/functions-template.php', // Theme Template Tags
  'core/boot/functions-filters.php',  // Filter Functions
  'core/boot/bootstrap-filters.php',  // Register Filters
  'core/boot/functions-woocommerce.php', // Extending/Customizing Woocommerce
  'core/shortcodes/product-menu.php',
  'core/shortcodes/user.php'
];

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'spring'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);