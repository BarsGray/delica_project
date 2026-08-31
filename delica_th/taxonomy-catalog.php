<?php
get_header();
show_breadcrumbs();
title_def_box();

global $wp_query;
// $qo=get_queried_object();
$paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
$args = array_merge($wp_query->query_vars, array('orderby' => 'title','order'   => 'ASC', 'paged' => $paged));
query_posts($args);

  if (have_posts()): ?>
    <div class="section_catalog_page">
      <div class="container">
        <ul class="catalog_tubs_row">
          <?php show_category(); ?>
        </ul>
        <div class="catalog_box">
          <?php while(have_posts()): the_post();
            show_prod_on_catalog();
          endwhile; ?>
        </div>
      </div>
    </div>
    <?php wp_pagenavi();
  endif;
  wp_reset_query();

show_form();
get_footer();
?>
