<?php
namespace Solera\Helpers;

/**
 * Get the correct path for an asset from
 * Laravel Mix's manifest
 *
 * @param string $path
 * @return void
 */
function resolve( $path ) {

  $file = get_theme_file_path( 'dist/assets/mix-manifest.json' );

  return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null;
};

/**
 * Helper function for outputting an asset URL in the theme. This integrates
 * with Laravel Mix for handling cache busting. If used when you enqueue a script
 * or style, it'll append an ID to the filename.
 *
 * @link   https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 * @since  1.0.0
 * @access public
 * @param  string  $path  A relative path/file to append to the `dist` folder.
 * @return string
 */
function asset( $path ) {

  // Get the Laravel Mix manifest.
  $manifest = resolve($path);

  // Make sure to trim any slashes from the front of the path.
  $path = '/' . ltrim( $path, '/' );

  if ( $manifest && isset( $manifest[ $path ] ) ) {
    $path = $manifest[ $path ];
  }

  // return get_theme_file_uri( 'dist/assets' . $path );
  return get_stylesheet_directory_uri() . '/dist/assets/' . $path;
}