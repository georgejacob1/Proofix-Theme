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
    <?php foreach (proofix_domains() as $domain) { ?>
      <article class="domain-block" id="<?php echo esc_attr($domain['id']); ?>">
        <div>
          <div class="icon-box amber"><?php echo proofix_icon($domain['icon']); ?></div>
          <h2 style="font-size:1.7rem"><?php echo esc_html($domain['title']); ?></h2>
          <p><?php echo esc_html($domain['text']); ?></p>
          <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode($domain['title']), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
        </div>
        <div>
          <p><strong style="color:var(--ink)"><?php echo esc_html($domain['lead']); ?></strong></p>
          <div class="chips">
            <?php foreach ($domain['chips'] as $chip) { ?>
              <span class="chip"><?php echo esc_html($chip); ?></span>
            <?php } ?>
          </div>
          <?php if ($domain['note'] !== '') { ?>
            <div class="note-box"><?php echo esc_html($domain['note']); ?></div>
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
