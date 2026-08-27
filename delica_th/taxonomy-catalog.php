<?php
get_header();
show_breadcrumbs();

/* global $wp_query;
$args = array_merge($wp_query->query_vars, array('orderby' => 'title','order'   => 'ASC'));
query_posts($args);

		if (have_posts()): ?>
      <div class="section_catalog_page">
        <div class="container">
          <p class="catalog_page_title">Продукция</p>
          <ul class="catalog_tubs_row">
            <?php
						$selected_cat = get_queried_object()->slug;
            $categories = get_terms(['taxonomy' => 'catalog', 'hide_empty' => false,]);
            if ($general_cat = get_term(4, 'catalog')): ?>
              <li class="catalog_tub_item<?php echo ($selected_cat === $general_cat->slug) ? ' active' : ''; ?>">
                <a href="<?php echo get_term_link($general_cat); ?>"><?php echo esc_html($general_cat->name); ?></a>
              </li>
            <?php endif;

          foreach ($categories as $category):
            if($category->term_id === 4) continue; ?>
              <li class="catalog_tub_item<?php echo ($selected_cat == $category->slug) ? ' active' : ''; ?>">
                <a href="<?php echo get_term_link($category); ?>"><?php echo esc_html($category->name); ?></a>
              </li>
						<?php endforeach; ?>
          </ul>
          <div class="catalog_box">
            <?php while(have_posts()): the_post(); ?>
              <div class="catalog_item">
                <a href="<?php the_permalink(); ?>">
                  <div class="catalog_item_img"><?php the_post_thumbnail(); ?></div>
                  <p class="catalog_item_name"><?php the_title(); ?></p>
                  <div class="catalog_item_btn">Подробнее<?php echo SVG_PROD_ARRROW; ?></div>
                </a>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
			<!-- // $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			// wp_pagenavi(); -->
		  <?php wp_pagenavi();
    endif;
		wp_reset_query(); */

show_form();
get_footer();
?>
