<?php
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

        foreach($contacts_blocks as $contacts_block): ?>
          <div class="contacts_box">
            <?php if ($contacts_block['contacts_block_title']): ?>
              <p class="contacts_box_title"><?php echo $contacts_block['contacts_block_title']; ?></p>
            <?php endif; ?>
            <?php foreach ($contacts_block['contacts_block'] as $item):
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
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
  <?php show_map(); ?>
<?php }
function show_map() { if ($map = get_field('map', 25)) echo "<div class='contacts_map'>$map</div>"; }