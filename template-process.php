<?php

/**
 * * Template Name: Our Process
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Structured Approach to Research Support',
  'text'    => 'A clear understanding of your requirement, a transparent plan, expert support and collaborative refinement.',
  'current' => 'Our Process',
));

?>

<section class="section soft">
  <div class="container" style="max-width:960px">
    <div class="timeline">
      <?php foreach (proofix_phases() as $i => $phase) { ?>
        <div class="phase">
          <div class="badge"><?php echo $i + 1; ?></div>
          <div class="card">
            <span class="label">Phase <?php echo $i + 1; ?></span>
            <h3><?php echo esc_html($phase['title']); ?></h3>
            <?php if ($phase['tagline'] !== '') { ?><div class="tagline"><?php echo esc_html($phase['tagline']); ?></div><?php } ?>
            <p><?php echo esc_html($phase['intro']); ?></p>
            <p><strong style="color:var(--ink)"><?php echo esc_html($phase['lead']); ?></strong></p>
            <ul class="check-list two-col">
              <?php foreach ($phase['items'] as $item) { ?>
                <li><?php echo esc_html($item); ?></li>
              <?php } ?>
            </ul>
            <div class="note-box"><?php echo esc_html($phase['note']); ?></div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Ready for Phase 1?',
  'text'  => 'Share your research requirement and we will take it from there.',
)); ?>

<?php get_footer(); ?>
