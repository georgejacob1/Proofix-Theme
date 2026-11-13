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
      <?php foreach (proofix_items('process') as $i => $step) {
        $num     = $i + 1;
        $tagline = get_field('tagline', $step->ID, false);
        $heading = get_field('list_heading', $step->ID, false);
        $items   = array_filter(array_map('trim', preg_split('/\R/', (string) get_field('list_items', $step->ID, false))));
        $note    = trim((string) get_field('note', $step->ID, false)); ?>
        <div class="phase">
          <div class="badge"><?php echo $num; ?></div>
          <div class="card">
            <span class="label">Phase <?php echo $num; ?></span>
            <h3><?php echo esc_html($step->post_title); ?></h3>
            <?php if ($tagline) { ?><div class="tagline"><?php echo esc_html($tagline); ?></div><?php } ?>
            <?php echo wpautop(esc_html(get_field('description', $step->ID, false))); ?>
            <?php if ($heading) { ?>
              <p><strong style="color:var(--ink)"><?php echo esc_html($heading); ?></strong></p>
            <?php } ?>
            <?php if (!empty($items)) { ?>
              <ul class="check-list two-col">
                <?php foreach ($items as $item) { ?>
                  <li><?php echo esc_html($item); ?></li>
                <?php } ?>
              </ul>
            <?php } ?>
            <?php if ($note !== '') { ?>
              <div class="note-box"><?php echo esc_html($note); ?></div>
            <?php } ?>
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
