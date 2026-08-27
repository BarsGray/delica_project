<?php
get_header();
show_breadcrumbs();

show_product(['post_type' => 'product', 'posts_per_page' => -1]);

show_form();
get_footer();
?>
