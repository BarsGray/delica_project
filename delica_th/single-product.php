<?php
get_header();
show_breadcrumbs();
?>
<div class="content_container"><?php the_field("text_before"); ?></div>
<div class="content_container"><?php the_content(); ?></div>
<?php
show_prod(['post_type' => 'product']);
show_info_top();
show_slider_prod();
?>
<div class="content_container"><?php the_field("text_after"); ?></div>
<?php
show_form();
get_footer();