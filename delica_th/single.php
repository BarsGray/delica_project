<?php
get_header();
show_breadcrumbs();
title_def_box();

if(get_field('text_before')): ?><div class="content_container"><?php the_field("text_before");?></div><?php endif;
if(get_the_content()): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_content(); ?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;
show_info_top();

if(get_field('text_after')): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_field("text_after");?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;
show_info_bottom();
show_form();
get_footer();