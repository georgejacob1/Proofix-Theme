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
      <?php foreach (proofix_services() as $post) :
        setup_postdata($post);
        get_template_part('include/service-card');
      endforeach;
      wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Not sure which service you need?',
  'text'  => 'Share your research stage and challenges — our consultant will recommend the right support.',
)); ?>

<?php get_footer(); ?>
