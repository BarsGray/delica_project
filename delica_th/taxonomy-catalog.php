<?php
get_header();
show_breadcrumbs();

show_product(['post_type' => 'product', 'posts_per_page' => get_option('posts_per_page'), 'paged' => get_query_var('paged') ?: 1]);

show_form();
get_footer();
?>