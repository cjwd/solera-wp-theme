<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Solera
 * @author    Chinara James <cjwd@chinarajames.com>
 * @copyright 2018 Chinara James
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://chinarajames.com/themes/solera
 */

namespace Solera;

/**
 * Custom Posts Pagination
 *
 * @param string $num_pages
 * @param string $paged
 * @param integer $page_range
 * @return void
 */
function posts_pagination( $num_pages = '', $format='', $paged='', $page_range = 2 ) {

  /**
   * Fallback for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * Good because we can override default pagination
   * in our theme, and use this function in default queries
   * and custom queries.
   */
  global $paged;

  if( empty($paged) ) {
    $paged = 1;
  }

  if( $num_pages == '' ) {
    global $wp_query;
    $num_pages = $wp_query->max_num_pages;

    if( !$num_pages ) {
      $num_pages = 1;
    }
  }

  /** End Fallback **/

  if( empty($format) ) {
    $format = 'page/%#%';
  }

  /**
   * Construct the pagination arguments for WordPress' paginate_links
   * function.
   */
  $pagination_args = array(
    'base'                => get_pagenum_link(1) . '%_%',
    'format'              => $format,
    'total'               => $num_pages,
    'current'             => $paged,
    'show_all'            => false,
    'end_size'            => 1,
    'mid_size'            => $page_range,
    'prev_next'           => true,
    'prev_text'           => __('&laquo; Previous', 'beat'),
    'next_text'           => __('Next &raquo;', 'beat'),
    'type'                => 'array',
    'add_args'            => false,
    'add_fragment'        => '',
    'before_page_number'  => '',
    'after_page_number'   => '<span class="page-number-divider">/</span>'
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='c-pagination'>";
      echo "<ul class='o-list-bare o-list-inline c-pagination__list'>";
        foreach( $paginate_links as $link ) {
          if(strpos($link, 'prev') !== false) {
            $next_prev_class = 'prevlink';
          } elseif(strpos($link, 'next') !== false) {
            $next_prev_class = 'nextlink';
          } else {
            $next_prev_class = '';
          }

          echo "<li class='o-list-inline__item " .$next_prev_class . "'>" . $link . "</li>";

        }
      echo "</ul>";
    echo "</nav>";
  }
}