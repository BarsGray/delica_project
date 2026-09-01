<?php
get_header();
show_breadcrumbs();

if(get_field('text_before')): ?><div class="content_container"><?php the_field("text_before");?></div><?php endif;
if(get_the_content()): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_content(); ?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;

show_prod('product');
show_info_top();
show_slider_prod();

if(get_field('text_after')): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_field("text_after");?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;

show_form();
get_footer();