<?php
  get_header();
  show_breadcrumbs();
  show_info_top();

  $qo=get_queried_object();
  $paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

  query_posts(array(
    'cat' => $qo->term_id,
    'paged' => $paged
  ));

  if(have_posts()):
    while(have_posts()): the_post(); ?>

    <?php endwhile;
    wp_pagenavi();
  else:
    echo '<p>Раздел не заполнен</p>';
  endif;
  show_form();
  get_footer();