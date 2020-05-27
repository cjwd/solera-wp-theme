<?php
add_shortcode('solera_product_category_menu', function($atts){
  $atts = shortcode_atts(
    [
      'wrapper' =>  'ul',
    ],
    $atts,
    'solera_product_category_menu'
  );

  extract($atts);

  if(is_product_category() || is_product()) {
    $current_category = get_queried_object();
    $cat_id = $current_category->term_id;
    $cat_name = $current_category->name;
    $cat_count = $current_category->count;
    $terms = get_terms( [
      'taxonomy' => $current_category->taxonomy,
      'hide_empty' => false,
      'parent' => $cat_id,
    ]);
    ob_start();
    ?>
    <div class="c-siteHeader__categoryMenuWrapper">
      <nav class="c-categoryMenu">
        <ul class="c-categoryMenu__list">
          <?php
          foreach( $terms as $term ) {
            printf('<li class="c-menu-item"><a href="%1$s">%2$s</a></li>',esc_url( get_term_link( $term ) ), $term->name);
          }
          ?>
        </ul>
        <p class="c-breadcrumbs c-breadcrumbs--products u-align-center">Browsing in <?= get_term_parents_list($cat_id, 'product_cat'); ?></p>
      </nav>
    </div>
    <?php
    return ob_get_clean();
  }
});