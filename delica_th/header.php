<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>
  <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/img/Delica_logo_title.png" type="image/x-icon">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header">
		<div class="overlay"></div>
    <div class="header_top_row">
      <div class="container">
        <a href="/" class="logo"><img src="<?php echo TEMPLATE_URL; ?>/img/logo_delica.svg" alt="logotype"></a>
        <div class="feedback_box">
          <?php if ($main_tel = get_field('main_tel', 25)): ?>
            <a href="tel:<?php echo merge_numbers($main_tel); ?>" class="main_number"><?php echo SVG_PHONE ?><span><?php echo $main_tel; ?></span></a>
          <?php endif; ?>
          <a href="#popup_box" data-popup_box class="main_btn">Получить консультацию</a>
          <a href="#" class="menu_btn"><?php echo SVG_MENU_BTN; ?></a>
        </div>
      </div>
    </div>
    <div class="header_menu">
      <div class="container">
        <?php wp_nav_menu('menu=Меню в шапке&container=nav&container_class=menu');?>
        <a href="#popup_box" data-popup_box class="main_btn">Получить консультацию</a>
      </div>
    </div>
  </header>