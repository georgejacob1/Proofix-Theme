<?php

/**
 * * Template Name: Research Domains
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Supporting Research Across Multiple Disciplines',
  'text'    => 'Every research domain has its own challenges, methodologies, tools, data requirements, and academic expectations.',
  'current' => 'Research Domains',
));

?>

<section class="section domain-section">
  <div class="container">
    <?php foreach (proofix_items('research_domain') as $domain) {
      $heading = get_field('areas_heading', $domain->ID, false);
      $areas   = array_filter(array_map('trim', preg_split('/\R/', (string) get_field('focus_areas', $domain->ID, false))));
      $note    = trim((string) get_field('note', $domain->ID, false)); ?>
      <article class="domain-block" id="domain-<?php echo esc_attr($domain->post_name); ?>">
        <div>
          <div class="icon-box amber"><?php echo proofix_field_icon($domain->ID, 'domain_icon'); ?></div>
          <h2 style="font-size:1.7rem"><?php echo esc_html($domain->post_title); ?></h2>
          <p><?php echo esc_html(get_field('description', $domain->ID, false)); ?></p>
          <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode($domain->post_title), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
        </div>
        <div>
          <?php if ($heading) { ?>
            <p><strong style="color:var(--ink)"><?php echo esc_html($heading); ?></strong></p>
          <?php } ?>
          <?php if (!empty($areas)) { ?>
            <div class="chips">
              <?php foreach ($areas as $area) { ?>
                <span class="chip"><?php echo esc_html($area); ?></span>
              <?php } ?>
            </div>
          <?php } ?>
          <?php if ($note !== '') { ?>
            <div class="note-box"><?php echo esc_html($note); ?></div>
          <?php } ?>
        </div>
      </article>
    <?php } ?>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Working in a niche area?',
  'text'  => 'We also support interdisciplinary research. Tell us about your field.',
)); ?>

<?php get_footer(); ?>
