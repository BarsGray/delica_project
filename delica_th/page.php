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

if(!is_front_page() && !is_page(25) && !is_page(12)) { show_info_top(); }

if(is_page(14)) show_what_offer();
if(is_page(25)) show_contacts_page();
if(is_page(10)) {show_years(); show_about_advantages(); show_foto_slider();};
if(is_page(12)) {show_catalog();}

if(!is_front_page() && !is_page(25) && !is_page(12)) { show_info_bottom(); }

if(get_field('text_after')): ?>
  <div class="content_container hide">
    <div class="hide_text"><?php the_field("text_after");?></div>
    <a class="more">Подробнее</a>
  </div>
<?php endif;
if(!is_page(25)) show_form();
get_footer();