<?php

/**
 * * Template Name: FAQ Page
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Frequently Asked Questions',
  'text'    => 'Quick answers about our research support services.',
  'current' => 'FAQ',
));

?>

<section class="section">
  <div class="container">
    <div class="faq-list">
      <?php foreach (proofix_items('faq') as $faq) { ?>
        <div class="faq-item">
          <button class="faq-q" aria-expanded="false"><?php echo esc_html($faq->post_title); ?><?php echo proofix_icon('plus.svg'); ?></button>
          <div class="faq-a">
            <?php echo wpautop(esc_html(get_field('answer', $faq->ID, false))); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Still have questions?',
  'text'  => 'Drop a "Hi" on WhatsApp or fill in our contact form and a consultant will connect with you.',
)); ?>

<?php get_footer(); ?>
