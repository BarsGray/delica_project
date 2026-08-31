<?php /* Template Name: Главная */ get_header(); ?>
  <div class="section_bunner">
    <div class="bunner_swiper swiper">
      <div class="bunner_swiper_row swiper-wrapper">
      <?php $slider = get_field('slider');
        if(!empty($slider) && is_array($slider)):
          foreach($slider as $slide): ?>  
            <div class="bunner_slide swiper-slide" style='background-image: url("<?php echo $slide['slide_img']['url']?>")'>
              <div class="container">
                <div class="title_box">
                  <p class="title"><?php echo $slide['title']; ?></p>
                  <a class="main_btn_2" href="#">Смотреть продукцию</a>
                </div>
              </div>
            </div>
          <?php endforeach;
        endif; ?>
      </div>
      <div class="swiper_nav_box">
        <div class="container">
          <a href="#" class="bunner_btn_prev"></a>
          <a href="#" class="bunner_btn_next"></a>
          <div class="bunner_pagination"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="section_advantages">
    <div class="container">
      <div class="info">
        <p class="advantages_title">Производство полного цикла</p>
        <ul class="advantages_list">
          <li><p>Одна из немногих компаний с полным циклом производства от основы до рулончиков туалетной бумаги (собственная БДМ).</p></li>
          <li><p>Более 20 лет успешно производим и продаем свою продукцию по всей Центральной России.</p></li>
          <li><p>Представлены в сетевом ритейле Москвы и регионах России, а также в странах СНГ.</p></li>
        </ul>
        <ul class="presents_advantages">
          <li class="presents_advantages_item"><p><span>20+</span>лет на рынке</p></li>
          <li class="presents_advantages_item"><p><span>1000+</span>тонн продукции в месяц</p></li>
          <li class="presents_advantages_item"><p><span>89</span>регионов РФ</p></li>
        </ul>
      </div>
      <div class="advantages_img"></div>
    </div>
  </div>
  <?php $categories = get_terms(['taxonomy' => 'catalog','hide_empty' => true,'orderby' => 'name', 'order' => 'DESC']);
  if(!is_wp_error($categories)): ?>
    <div class="section_types_products">
      <div class="container">
        <p class="types_products_title">Продукция</p>
        <div class="types_products_box">
          <?php foreach($categories as $category):
            $image_url = get_field( 'front_card_img', 'catalog_' . $category->term_id); ?>
            <a href="<?php echo get_term_link($category); ?>" class="types_products_item item_1" style="background-image: url('<?php echo $image_url ?:''; ?>');">
              <div class="types_products_row"><p class="type_product_name"><?php echo $category->name; ?></p><span class="type_prod_link_icon"></span></div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="section_cooperation">
    <div class="container">
      <div class="cooperation_box">
        <div class="cooperation_box_bg"></div>
        <div class="cooperation_content">
          <p class="cooperation_title">Участвуем в тендерах</p>
          <p class="cooperation_text">
            Готовы предложить конкурентные условия и полный пакет документов 
            для государственных и коммерческих закупок. Работаем с тендерными площадками.
          </p>
          <a href="#" class="main_btn">Стать нашим партнёром</a>
        </div>
      </div>
    </div>
  </div>
  <?php $query = new WP_Query(['post_type' => 'service', 'post_per_page' => -1, 'orderby' => 'name', 'order' => 'DESC']);
  if($query->have_posts()): ?>
    <div class="section_services">
      <div class="container">
        <div class="services_description_box">
          <p class="services_title">Услуги</p>
          <p class="services_text">Производственный цикл — это не только готовые рулоны на складе. Это ещё и движение сырья, забота об обороте вторичных ресурсов и точная настройка процессов на каждом этапе.</p>
          <p class="services_text">Мы делимся своим опытом и мощностями: помогаем выгодно поставлять сырьё, безопасно уничтожать документацию, обновлять парк оборудования и налаживать логистику</p>
        </div>
        <div class="services_box">
          <?php while($query->have_posts()): $query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="services_item">
              <span class="services_item_icon" style="background-image: url('<?php the_field('service_icon');?>"></span>
              <p class="services_item_title"><?php the_title(); ?></p>
              <p class="services_item_text"><?php the_field('service_front_text'); ?></p>
              <p class="services_item_btn">Подробнее<?php echo SVG_SERVICE_BOX_ARROW; ?></p>
            </a>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
    <?php wp_reset_postdata();
  endif;
  if(get_the_content()): ?>
    <div class="content_container hide">
      <div class="hide_text"><?php the_content(); ?></div>
      <a class="more">Подробнее</a>
    </div>
  <?php endif;
  show_form();
  get_footer(); ?>