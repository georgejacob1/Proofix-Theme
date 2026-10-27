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
    <?php get_template_part('include/faq-list'); ?>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Still have questions?',
  'text'  => 'Drop a "Hi" on WhatsApp or fill in our contact form and a consultant will connect with you.',
)); ?>

<?php get_footer(); ?>
