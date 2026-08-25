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
  $link_btn = get_field('link_btn');
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
      <?php if($text_btn && $link_btn): ?>
        <a class="link main_btn_2" href="<?php echo $link_btn; ?>"><?php echo $text_btn; ?></a>
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
function show_info_top() { ?>
  <div class="section_inform_box">
    <div class="container">
      <div class="inform_inner">
        <div class="inform_left_column">
          <?php if($info_top_title = get_field('info_top_title')): ?><p class="inform_title"><?php echo $info_top_title; ?></p><?php endif; ?>
          <?php if($info_top_place_left = get_field('info_top_place_left')): echo $info_top_place_left; endif; ?>
        </div>
        <div class="inform_right_column">
          <?php if($info_top_place_right = get_field('info_top_place_right')): echo $info_top_place_right; endif; ?>
          <?php if($box_alert = get_field('box_alert')): ?><div class="inform_attention"><p><?php echo $box_alert; ?></p></div><?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php }
function show_info_bottom() {
  $info_bottom_blok = get_field('info_bottom_blok');
  if(!empty($info_bottom_blok) && is_array($info_bottom_blok)): ?>
    <div class="section_inform_box">
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