<?php
get_header();
show_breadcrumbs();
title_def_box();
show_info_top();

if(get_the_ID() === 198)   {show_why_us_advantages(); show_accept_any();}
if(get_the_ID() === 201)   {show_delivery_prev();}
if(get_the_ID() === 200)   {show_prod_card(['post_type' => 'oborudovanie', 'post_per_page' => -1]);}
if(is_singular('product')) {show_slider_prod();}

show_info_bottom();
show_form();
get_footer();