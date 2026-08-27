<?php
function show_breadcrumbs() { ?>
  <div class="bread_crumb">
    <div class="container">
      <?php breadcrumbs(); ?>
    </div>
  </div>
<?php }
function show_zag() {
  $title = '';
  if (is_tax())
    $title = ($alt_zag = get_field('alt_zag')) ? $alt_zag : single_term_title();
  elseif(is_category())
    $title = single_cat_title('', false);
  elseif(is_404())
    $title = 'Ошибка 404!';
  else
    $title = ($alt_zag = get_field('alt_zag')) ? $alt_zag : get_the_title();
  echo $title;
}
function title_def_box() {
  $text_btn = get_field('text_btn');
  ?>
  <div class="section_title_def_box">
    <div class="container">
      <div class="text_box">
        <h1 class="title"><?php show_zag(); ?></h1>
        <?php if($title_box_description = get_field('title_box_description')): ?>
          <p class="desc"><?php echo $title_box_description; ?></p>
        <?php endif; ?>
      </div>
      <?php if($thumbnail_url = get_the_post_thumbnail_url()): ?>
        <div class="img" style="background-image: url('<?php echo $thumbnail_url; ?>')"></div>
      <?php endif; ?>
      <?php if($text_btn): ?>
        <a class="link main_btn_2"><?php echo $text_btn; ?></a>
      <?php endif; ?>
    </div>
  </div>
<?php }
function show_contacts_page() { ?>
  <div class="section_contacts_page">
    <div class="container">
      <p class="contacts_page_title">Контакты</p>
      <?php
        $adress          = get_field('adress');
        $graffik         = get_field('graffik');
        $vihodnie        = get_field('vihodnie');
        $contacts_blocks = get_field('contacts_blocks');

        if ($graffik || $adress || $vihodnie): ?>
          <div class="contacts_box">
            <p class="contacts_box_title">Адрес производства и офиса продаж:</p>
            <?php if($adress): ?>
              <p class="contacts_adress"><?php echo $adress; ?></p>
            <?php endif; ?>
            <?php if($graffik): ?>
              <div class="contacts_box_field">
                <p class="contacts_field_title">График работы</p>
                <p class="contacts_field_value"><?php echo $graffik; ?></p>
              </div>
            <?php endif; ?>
            <?php if($vihodnie): ?>
              <div class="contacts_box_field">
                <p class="contacts_field_title">Выходные</p>
                <p class="contacts_field_value"><?php echo $vihodnie; ?></p>
              </div>
            <?php endif; ?>
          </div>
        <?php endif;

        if(!empty($contacts_blocks) && is_array($contacts_blocks)):
          foreach($contacts_blocks as $contacts_block): ?>
            <div class="contacts_box">
              <?php if ($contacts_block['contacts_block_title']): ?>
                <p class="contacts_box_title"><?php echo $contacts_block['contacts_block_title']; ?></p>
              <?php endif; ?>
              <?php 
              if(!empty($contacts_block['contacts_block']) && is_array($contacts_block['contacts_block'])):
                foreach ($contacts_block['contacts_block'] as $item):
                  $vid_svazi_value = $item['vid_svazi_value'];
                  if (!$vid_svazi_value) continue;
                  $vid_svazi = $item['vid_svazi']['value'];
                  $href = '';
                  if ($vid_svazi === 'tel_fax' || $vid_svazi === 'tel') $href = 'tel:';
                  elseif ($vid_svazi === 'mail') $href = 'mailto:'; ?>
                  <div class="contacts_box_field">
                    <p class="contacts_field_title"><?php echo $item['vid_svazi']['label']; ?></p>
                    <a href="<?php echo $href . merge_numbers($vid_svazi_value); ?>" class="contacts_field_value"><?php echo $vid_svazi_value; ?></a>
                  </div>
                <?php endforeach;
              endif; ?>
            </div>
          <?php 
          endforeach;
        endif; ?>
    </div>
  </div>
  <?php show_map(); ?>
<?php }
function show_map() { if ($map = get_field('map', 25)) echo "<div class='contacts_map'>$map</div>"; }
function show_form() { ?>
  <div class="section_form">
    <div class="container">
      <div class="form_box">
        <?php echo do_shortcode('[contact-form-7 id="23aef55"]');?>
        <div class="action_box">
          <p class="action_title">Оставить заявку</p>
          <p class="action_text">Свяжитесь с нами — подберем оптимальную продукцию под ваш бизнес, рассчитаем стоимость доставки и подготовим коммерческое предложение.</p>
        </div>
      </div>
    </div>
  </div>
<?php }
function show_what_offer() {
  $main_title = get_field('main_title');
  $label_offers = get_field('label_offers'); ?>
  
  <?php if(!empty($label_offers) && is_array($label_offers) && !empty($main_title)): ?>
    <div class="section_what_offer">
      <div class="container">
        <?php if($main_title = get_field('main_title')): ?><p class="what_offer_title"><?php echo $main_title; ?></p><?php endif; ?>
        <div class="items_box">
          <?php if($label_offers = get_field('label_offers')):
            foreach($label_offers as $label_offers_item): ?>
              <div class="what_offer_item item_1">
                <?php if($label_offers_item['label_offers_icon']): ?><span class="img" style="background-image: url('<?php echo $label_offers_item['label_offers_icon']; ?>');"></span><?php endif; ?>
                <?php if($label_offers_item['label_offers_icon']): ?><p class="title"><?php echo $label_offers_item['label_offers_title']; ?></p><?php endif; ?>
                <?php if($label_offers_item['label_offers_icon']): ?><p class="text"><?php echo $label_offers_item['label_offers_text']; ?></p><?php endif; ?>
              </div>
            <?php endforeach;
          endif; ?>
        </div>
      </div>
    </div>
  <?php endif;
}
function show_info_top() {
  $info_top_title = get_field('info_top_title');
  $info_top_place_left = get_field('info_top_place_left');
  $info_top_place_right = get_field('info_top_place_right');

  if($info_top_title || $info_top_place_left || $info_top_place_right): ?>
    <div class="section_inform_box">
      <div class="container">
        <div class="inform_inner">
          <div class="inform_left_column">
            <p class="inform_title"><?php echo $info_top_title; ?></p>
            <?php if($info_top_place_left): echo $info_top_place_left; endif; ?>
          </div>
          <div class="inform_right_column">
            <?php if($info_top_place_right): echo $info_top_place_right; endif; ?>
            <?php if($box_alert = get_field('box_alert')): ?><div class="inform_attention"><p><?php echo $box_alert; ?></p></div><?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php }
function show_info_bottom() {
  $info_bottom_blok = get_field('info_bottom_blok');
  if(!empty($info_bottom_blok) && is_array($info_bottom_blok)): ?>
    <div class="section_inform_box inform_box_bottom">
      <div class="container">
        <?php foreach($info_bottom_blok as $info_bottom_blok_item): ?>
          <div class="inform_inner">
            <div class="inform_left_column">
              <?php if($info_bottom_blok_item['info_bottom_title']): ?><p class="inform_title"><?php echo $info_bottom_blok_item['info_bottom_title']; ?></p><?php endif; ?>
              <?php if($info_bottom_blok_item['info_bottom_place_left']): echo $info_bottom_blok_item['info_bottom_place_left']; endif; ?>
            </div>
            <div class="inform_right_column">
              <?php if($info_bottom_blok_item['info_bottom_place_right']): echo $info_bottom_blok_item['info_bottom_place_right']; endif; ?>
              <?php if($info_bottom_blok_item['box_alert']): ?><div class="inform_attention"><p><?php echo $info_bottom_blok_item['box_alert']; ?></p></div><?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif;
}
function show_foto_slider() {
  $foto_slider = get_field('foto_slider');
  if(!empty($foto_slider) && is_array($foto_slider)): ?>
    <div class="foto_slider_on_main">
      <div class="foto_slider_container">
        <div class="foto_slider swiper">
          <div class="foto_slider_row swiper-wrapper">
            <?php foreach($foto_slider as $slide): ?>
              <div class="foto_slider_item swiper-slide">
                <a href="<?php echo $slide['url']; ?>" data-fancybox="gallery_foto_slider"><img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['alt']; ?>"></a>
              </div>
            <?php endforeach; ?>
          </div>
          <a href="#" class="btn_prev"></a>
          <a href="#" class="btn_next"></a>
        </div>
      </div>
      <div class="swiper-pagination foto_slider__pagination"></div>
    </div>
  <?php endif;
}
function show_years() {
  $years = get_field('years');
  if(!empty($years) && is_array($years)): ?>
    <div class="section_years_box">
      <div class="container">
        <div class="years_box">
          <?php foreach($years as $year):
          if(!$year['year']) continue; ?>
            <div class="year_item">
              <p class="years_top"><?php echo $year['year']; ?></p>
              <p class="years_bottom"><?php echo $year['text']; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif;
}
function show_about_advantages() {
  $about_advantages = get_field('about_advantages');
  if(!empty($about_advantages) && is_array($about_advantages)): ?>
    <div class="why_choose_delica">
      <div class="container">
        <?php if($about_advantages_main_title = get_field('about_advantages_main_title')): ?>
          <p class="why_choose_delica_title"><?php echo $about_advantages_main_title; ?></p>
        <?php endif; ?>
        <div class="why_choose_delica_box"> 
          <?php foreach($about_advantages as $item): ?>
            <div class="why_choose_item">
              <?php if($item['about_advantages_label']): ?>
                <p class="why_choose_item_top"><?php echo $item['about_advantages_label']; ?></p>
              <?php endif; ?>
              <?php if($item['about_advantages_title']): ?>
                <p class="why_choose_item_middle"><?php echo $item['about_advantages_title']; ?></p>
              <?php endif; ?>
              <?php if($item['about_advantages_text']): ?>
                <p class="why_choose_item_bottom"><?php echo $item['about_advantages_text']; ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif;
}
function show_why_us_advantages() {
  $offers_advantages = get_field('offers_advantages');
  if(!empty($offers_advantages) && is_array($offers_advantages)): ?>
    <div class="section_why_us">
      <div class="container">
        <?php if($offers_advantages_main_title = get_field('offers_advantages_main_title')): ?>
          <p class="why_us_title"><?php echo $offers_advantages_main_title; ?></p>
        <?php endif; ?>
        <div class="items_box">
          <?php foreach($offers_advantages as $item): ?>
            <div class="why_us_item">
              <?php if($item['offers_advantages_icon']): ?>
                <span class="img" style="background-image: url('<?php echo $item['offers_advantages_icon'];?>');"></span>
              <?php endif; ?>
              <?php if($item['offers_advantages_title']): ?>
                <p class="title"><?php echo $item['offers_advantages_title']; ?></p>
              <?php endif; ?>
              <?php if($item['offers_advantages_text']): ?>
                <p class="text"><?php echo $item['offers_advantages_text']; ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif;
}

function show_accept_any() { ?>
  <div class="section_accept_any">
    <div class="container">
      <div class="any_inner">
        <p class="any_title">Принимаем любые виды макулатуры от категории А до В</p>
        <div class="any_cat">
          <p class="any_cat_top any_cat_a">Категория А</p>
          <p class="any_cat_bottom">Белая бумага, печатные материалы, чертежи, блокноты, тетради, плакаты — всё это ценится максимально. При грамотной сортировке вы получаете существенную прибыль.</p>
        </div>
        <div class="any_cat">
          <p class="any_cat_top any_cat_b">Категория Б и В</p>
          <p class="any_cat_bottom">Гофрокартон ММС‑5Б, печатный картон МС 6Б, втулки — это макулатура категорий Б и В. Принимаем всё это на переработку и отправляем во вторичное использование.</p>
        </div>
        <div class="any_bottom_row">
          <p class="any_bottom_row_title">Экологическая проблема современности</p>
          <p class="any_bottom_row_text">Бумажные отходы переполняют свалки, при разложении выделяют метан (в 25 раз активнее CO₂). Переработка макулатуры — реальный способ снизить вред. Каждая тонна переработанной бумаги спасает деревья и уменьшает загрязнение.</p>
        </div>
      </div>
    </div>
  </div>
<?php }
function show_delivery_prev() { ?>
  <div class="section_delivery_prev">
    <div class="container">
      <div class="delivery_prev_inner">
        <div class="delivery_prev_left">
          <p class="delivery_prev_title">Быстрота и география поставок</p>
          <p class="delivery_prev_alert">Доставка в любой регион РФ и СНГ</p>
          <p class="delivery_prev_text">Отсутствие территориальных ограничений — важнейший плюс современного производителя. Мы доставляем заказы в любой населённый пункт РФ и соседних государств. Чёткий график, собственный автопарк и партнёрские логистические хабы.</p>
        </div>
        <div class="delivery_prev_right"></div>
      </div>
      <div class="delivery_items">
        <div class="delivery_item">
          <span class="delivery_items_icon icon_1"></span>
          <p class="delivery_item_titel">Квалифицированные кадры</p>
          <p class="delivery_item_text">Опытные водители с большим стажем, сплочённый коллектив, отсутствие текучки. Надёжность и профессионализм.</p>
        </div>
        <div class="delivery_item">
          <span class="delivery_items_icon icon_2"></span>
          <p class="delivery_item_titel">Квалифицированные кадры</p>
          <p class="delivery_item_text">Опытные водители с большим стажем, сплочённый коллектив, отсутствие текучки. Надёжность и профессионализм.</p>
        </div>
        <div class="delivery_item">
          <span class="delivery_items_icon icon_3"></span>
          <p class="delivery_item_titel">Квалифицированные кадры</p>
          <p class="delivery_item_text">Опытные водители с большим стажем, сплочённый коллектив, отсутствие текучки. Надёжность и профессионализм.</p>
        </div>
      </div>
    </div>
  </div>
<?php }
function show_prod_card($args) {
  $query = new WP_Query($args);
  if ($query->have_posts()):
    while ($query->have_posts()): $query->the_post();
      $gallery = get_field('gallery'); ?>
      <div class="section_product">
        <div class="container">
          <div class="product_box">
            <?php if(!empty($gallery) && is_array($gallery)): ?>
              <div class="product_gallery">
                <div class="product_main_slider">
                  <div class="swiper-wrapper">
                      <?php foreach($gallery as $item): ?>
                        <div class="swiper-slide"><a href="<?php echo $item['url'] ?>"><img src="<?php echo $item['url'] ?>" alt="<?php echo $item['alt'] ?>"></a></div>
                      <?php endforeach; ?>
                  </div>
                </div>
                <div class="product_thumb_slider">
                  <div class="swiper-wrapper">
                    <?php foreach($gallery as $item): ?>
                      <div class="swiper-slide"><img src="<?php echo $item['sizes']['thumbnail'] ?>" alt="<?php echo $item['alt'] ?>"></div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <div class="product_box_info">
              <div class="info">
                <p class="title"><?php the_title(); ?></p>
                <?php if($params = get_field('params')): ?>
                  <ul class="params_list">
                    <?php foreach($params as $param): ?>
                      <li class="params_item">
                        <p>
                          <?php if($param['param']): ?><span class="param_name"><?php echo $param['param']; ?></span><?php endif; ?>
                          <?php if($param['value']): ?><span class="param_value"><?php echo $param['value']; ?></span><?php endif; ?>
                        </p>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
              <a class="main_btn_2" href="#">Запросить стоимость</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile;
    wp_reset_postdata(); endif;
}

function show_product($args) {
  
  $term = get_queried_object();
  $selected_cat = '';
  if ($term instanceof WP_Term && $term->taxonomy === 'catalog') {
    $args['tax_query'] = [['taxonomy' => 'catalog','field' => 'term_id','terms' => $term->term_id,]];
    $selected_cat = $term->slug;
  }

  $query = new WP_Query($args);
  
  if($query->have_posts()): ?>
    <div class="section_catalog_page">
      <div class="container">
        <p class="catalog_page_title">Продукция</p>
        <ul class="catalog_tubs_row">
          <?php $categories = get_terms(['taxonomy' => 'catalog', 'hide_empty' => true]);
                $general_cat = get_term(4, 'catalog');

          if ($general_cat && !is_wp_error($general_cat)): ?>
            <li class="catalog_tub_item<?php echo ($selected_cat === '' ? ' active' : ''); ?>">
              <a href="<?php echo esc_url(get_permalink(12)); ?>"><?php echo esc_html($general_cat->name); ?></a>
            </li>
          <?php endif;

          foreach ($categories as $category):
            if($category->term_id === 4) continue; ?>
            <li class="catalog_tub_item<?php echo ($selected_cat == $category->slug) ? ' active' : ''; ?>">
              <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
            </li>
          <?php endforeach; ?>
          
        </ul>
        <div class="catalog_box">
          <?php while($query->have_posts()): $query->the_post(); ?>
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
  <?php wp_reset_postdata(); endif;
}