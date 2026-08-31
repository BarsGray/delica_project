<?php
get_header();
show_breadcrumbs();
title_def_box();
show_info_top();
if(get_field('text_before')): ?><div class="content_container"><?php the_field("text_before");?></div><?php endif;
  if(get_the_content()): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_content(); ?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;

if(get_the_ID() === 198)   {show_why_us_advantages(); show_accept_any();}
if(get_the_ID() === 201)   {show_delivery_prev();}
if(get_the_ID() === 200)   {show_prod_cards(['post_type' => 'oborudovanie', 'posts_per_page' => -1]);}

if(get_field('text_after')): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_field("text_after");?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;
show_info_bottom();
show_form();
get_footer();