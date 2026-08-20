<?php
function show_contacts_page() { ?>
  <div class="section_contacts_page">
    <div class="container">
      <p class="contacts_page_title">Контакты</p>
        <?php
          $adress   = get_field('adress');
          $graffik  = get_field('graffik');
          $vihodnie = get_field('vihodnie');

          if ($graffik || $adress || $vihodnie): ?>
            <div class="contacts_box">
              <p class="contacts_box_title">Адрес производства и офиса продаж:</p>
              <?php if($adress): ?>
                <p class="contacts_adress"><?php echo $adress; ?></p> <!-- г. Воронеж, Ясный проезд, 1Д -->
              <?php endif; ?>
              <?php if($graffik): ?>
                <div class="contacts_box_field">
                  <p class="contacts_field_title">График работы</p>
                  <p class="contacts_field_value"><?php echo $graffik; ?></p> <!-- c 8:00 до 17:00 -->
                </div>
              <?php endif; ?>
              <?php if($vihodnie): ?>
                <div class="contacts_box_field">
                  <p class="contacts_field_title">Выходные</p>
                  <p class="contacts_field_value"><?php echo $vihodnie; ?>суббота, воскресенье</p>
                </div>
              <?php endif; ?>
              <!-- <div class="contacts_box_field">
                <p class="contacts_field_title">Тел/факс</p>
                <a href="tel:+74732020989" class="contacts_field_value">+7 (473) 202-09-89</a>
              </div>
              <div class="contacts_box_field">
                <p class="contacts_field_title">Моб.</p>
                <a href="tel:+79036506131" class="contacts_field_value">+7 (903) 650-61-31</a>
              </div>
              <div class="contacts_box_field">
                <p class="contacts_field_title">Эл. почта</p>
                <a href="mailto:delica.vrn@gmail.com" class="contacts_field_value">delica.vrn@gmail.com</a>
              </div> -->
            </div>
          <?php endif; ?>


        <div class="contacts_box">
          <p class="contacts_box_title">Адрес производства и офиса продаж:</p>
          <p class="contacts_adress">г. Воронеж, Ясный проезд, 1Д</p>
          <div class="contacts_box_field">
            <p class="contacts_field_title">График работы</p>
            <p class="contacts_field_value">c 8:00 до 17:00</p>
          </div>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Выходные</p>
            <p class="contacts_field_value">суббота, воскресенье</p>
          </div>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Тел/факс</p>
            <a href="tel:+74732020989" class="contacts_field_value">+7 (473) 202-09-89</a>
          </div>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Моб.</p>
            <a href="tel:+79036506131" class="contacts_field_value">+7 (903) 650-61-31</a>
          </div>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Эл. почта</p>
            <a href="mailto:delica.vrn@gmail.com" class="contacts_field_value">delica.vrn@gmail.com</a>
          </div>
        </div>
        <div class="contacts_box">
          <p class="contacts_box_title">Продажа туалетной бумаги и бумажных полотенец:</p>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Тел/факс</p>
            <a href="tel:+74732020989" class="contacts_field_value">+7 (473) 202-09-89</a>
          </div>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Моб.</p>
            <a href="tel:+79036506131" class="contacts_field_value">+7 (903) 650-61-31</a>
          </div>
          <div class="contacts_box_field">
            <p class="contacts_field_title">Эл. почта</p>
            <a href="mailto:delica.vrn@gmail.com" class="contacts_field_value">delica.vrn@gmail.com</a>
          </div>
        </div>
    </div>
  </div>
<?php }