<?php
get_header();
show_breadcrumbs();
title_def_box();
show_info_top();
?>
<div class="content_container"><?php the_field("text_before"); ?></div>
<div class="content_container"><?php the_content(); ?></div>
<?php
if(get_the_ID() === 198)   {show_why_us_advantages(); show_accept_any();}
if(get_the_ID() === 201)   {show_delivery_prev();}
if(get_the_ID() === 200)   {show_prod_cards(['post_type' => 'oborudovanie', 'posts_per_page' => -1]);}
?>
<div class="content_container"><?php the_field("text_after"); ?></div>
<?php 
show_info_bottom();
show_form();
get_footer();