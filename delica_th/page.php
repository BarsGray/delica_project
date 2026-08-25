<?php
get_header();
show_breadcrumbs();
if(!is_front_page() || !is_page(25)) { title_def_box(); show_info_top(); }

if(is_page(14)) show_what_offer();
if(is_page(25)) show_contacts_page();
if(is_page(10)) {show_years(); show_about_advantages(); show_foto_slider();};

if(!is_front_page() || !is_page(25)) { show_info_bottom(); }
show_form();
get_footer();