<?php
// Usage: get_template_part('include/faq-list', null, array('limit' => 3));
$faqs = proofix_faqs();

if (!empty($args['limit'])) {
  $faqs = array_slice($faqs, 0, (int) $args['limit']);
}
?>
<div class="faq-list">
  <?php foreach ($faqs as $faq) { ?>
    <div class="faq-item">
      <button class="faq-q" aria-expanded="false"><?php echo esc_html($faq[0]); ?><?php echo proofix_icon('plus.svg'); ?></button>
      <div class="faq-a">
        <p><?php echo esc_html($faq[1]); ?></p>
      </div>
    </div>
  <?php } ?>
</div>
