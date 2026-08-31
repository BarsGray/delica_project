  <footer class="footer">
    <div class="footer_top_row">
      <div class="container">
        <a href="/" class="logo"><img src="<?php echo TEMPLATE_URL; ?>/img/logo_delica.svg" alt="logotype"></a>
        <div class="feedback_box">
          <?php if ($main_tel = get_field('main_tel', 25)): ?>
            <a href="tel:<?php echo merge_numbers($main_tel); ?>" class="main_number"><?php echo SVG_PHONE ?><span><?php echo $main_tel; ?></span></a>
          <?php endif; ?>
          <a href="#" class="main_btn">Получить консультацию</a>
        </div>
      </div>
    </div>
    <div class="footer_middle_row">
      <div class="container">
        <a href="#" class="main_btn">Получить консультацию</a>
        <div class="footer_contacts_box">
          <ul class="footer_contacts_list">
            <?php if ($adress = get_field('adress', 25)): ?>
              <li class="footer_contacts_item"><p class="footer_adress"><?php echo $adress; ?></p></li>
            <?php endif; ?>
            <?php if ($main_email = get_field('main_email', 25)): ?>
              <li class="footer_contacts_item"><a class="mail-link" href="mailto:<?php echo $main_email; ?>"><?php echo $main_email; ?></a></li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="footer_menu_box">
          <?php wp_nav_menu('menu=Меню в подвале&container=nav&container_class=menu');?>
        </div>
      </div>
    </div>
    <div class="copy_row">
      <div class="container">
        <div class="polit">
          <p>Delica - Воронежская Фабрика бумаги</p>
          <p>Политика конфиденциальности</p>
          <p>Юридические соглашения </p>
        </div>
        <p><a href="https://www.vzh.ru/"><img src="<?php echo TEMPLATE_URL; ?>/img/logo_vzh.svg" alt="vzh.ru"></a></p>
      </div>
    </div>
  </footer>
  <div id="popup_box" style="display:none;" class="popup_box">
    <div class="top_box">
      <p class="popup_title">Оставить заявку</p>
      <p class="popup_text">Оставьте свои контакты и наш специалист перезвонит вам в ближайшее время.</p>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="23aef55" title="Контактная форма"]'); ?>
  </div>
  <?php wp_footer() ?>
</body>
</html>