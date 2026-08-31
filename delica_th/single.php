<?php
get_header();
show_breadcrumbs();
title_def_box();
?>
<div class="content_container"><?php the_field("text_before");?></div>
<div class="content_container"><?php the_content(); ?></div>
<?php
show_info_top();
?>
<div class="content_container"><?php the_field("text_after"); ?></div>
<?php 
show_info_bottom();
show_form();
get_footer();