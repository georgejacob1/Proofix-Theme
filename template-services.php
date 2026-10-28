<?php

/**
 * Template Name: Services Page
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title' => 'Our Research Support Services',
  'text'  => 'Customized support based on your research stage, subject area, project requirements and academic objectives.',
  'current' => 'Services',
));

?>

<section class="section">
  <div class="container">
    <div class="grid grid-4">
      <?php foreach (proofix_services() as $service) { ?>
        <a class="card service-card" href="<?php echo esc_url(get_permalink($service->ID)); ?>">
          <div class="icon-box"><?php echo proofix_icon(proofix_service_icon($service->ID)); ?></div>
          <h3><?php echo esc_html($service->post_title); ?></h3>
          <p><?php echo esc_html($service->post_excerpt); ?></p>
          <span class="link-arrow">View details <?php echo proofix_icon('arrow-right.svg'); ?></span>
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Not sure which service you need?',
  'text'  => 'Share your research stage and challenges — our consultant will recommend the right support.',
)); ?>

<?php get_footer(); ?>
