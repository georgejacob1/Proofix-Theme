<?php

/**
 * Single career opening.
 */

get_header();

while (have_posts()) : the_post();

  $id               = get_the_ID();
  $title            = html_entity_decode(get_the_title(), ENT_QUOTES, 'UTF-8');
  $description      = (string) get_post_meta($id, 'description', true);
  $responsibilities = proofix_lines($id, 'responsibilities');
  $skills           = proofix_lines($id, 'skills');
  $skills_heading   = trim((string) get_post_meta($id, 'skills_heading', true));
  $who_can_apply    = proofix_lines($id, 'who_can_apply');
  $position         = trim((string) get_post_meta($id, 'application_subject', true));
  $position         = $position !== '' ? $position : $title;
  $email            = proofix_careers_email();
  $careers          = proofix_items('career');
  $prev             = proofix_adjacent_in($careers, $id, 'prev');
  $next             = proofix_adjacent_in($careers, $id, 'next');
  $whatsapp         = function_exists('get_field') ? get_field('whatsapp', 8) : '';

  get_template_part('include/page-banner', null, array(
    'title'   => get_the_title(),
    'text'    => $description,
    'crumbs'  => array(array('Careers', proofix_url('careers'))),
    'current' => get_the_title(),
  ));

?>

  <section class="section">
    <div class="container detail-layout">
      <div class="detail-main">
        <div class="icon-box"><?php echo proofix_field_icon($id, 'career_icon'); ?></div>

        <?php if ($description !== '') { ?>
          <p class="lead"><?php echo esc_html($description); ?></p>
        <?php } ?>

        <?php the_content(); ?>

        <?php if (!empty($responsibilities)) { ?>
          <h2>Key responsibilities</h2>
          <ul class="check-list">
            <?php foreach ($responsibilities as $item) { ?>
              <li><?php echo esc_html($item); ?></li>
            <?php } ?>
          </ul>
        <?php } ?>

        <?php if (!empty($skills)) { ?>
          <h2><?php echo esc_html($skills_heading !== '' ? $skills_heading : 'Preferred skills'); ?></h2>
          <div class="chips">
            <?php foreach ($skills as $skill) { ?>
              <span class="chip"><?php echo esc_html($skill); ?></span>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if (!empty($who_can_apply)) { ?>
          <h2>Who can apply?</h2>
          <ul class="check-list">
            <?php foreach ($who_can_apply as $item) { ?>
              <li><?php echo esc_html($item); ?></li>
            <?php } ?>
          </ul>
        <?php } ?>

        <p class="note">Relevant qualifications, practical skills, research experience, and a commitment to quality are valued. We are committed to responsible research support and do not encourage plagiarism, fabricated results, or misrepresentation of academic authorship.</p>

        <h2>How to apply</h2>
        <p>Share your updated resume or CV along with a brief introduction highlighting your qualifications, technical skills, research experience, and areas of expertise.</p>
        <div class="apply-details">
          <div class="apply-item">
            <div class="icon-box"><?php echo proofix_icon('envelope.svg'); ?></div>
            <div><small>Email</small><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div>
          </div>
          <div class="apply-item">
            <div class="icon-box"><?php echo proofix_icon('file-signature.svg'); ?></div>
            <div><small>Subject line</small><strong>Career Application &ndash; <?php echo esc_html($position); ?></strong></div>
          </div>
        </div>
        <p class="apply-foot">Our team will review suitable applications and contact shortlisted candidates when relevant opportunities are available.</p>

        <?php if ($prev && $next) { ?>
          <div class="pager">
            <a href="<?php echo esc_url(get_permalink($prev->ID)); ?>"><small>&larr; Previous</small><?php echo esc_html($prev->post_title); ?></a>
            <a class="next" href="<?php echo esc_url(get_permalink($next->ID)); ?>"><small>Next &rarr;</small><?php echo esc_html($next->post_title); ?></a>
          </div>
        <?php } ?>
      </div>

      <aside class="side-card">
        <div class="side-box">
          <h4>Interested in this role?</h4>
          <p style="font-size:.94rem">Email your CV with the subject line already filled in for this position.</p>
          <a class="btn btn-accent btn-block" href="<?php echo esc_url(proofix_career_mailto($position)); ?>"><?php echo proofix_icon('paper-plane.svg'); ?> Apply Now</a>
          <?php if (!empty($whatsapp)) {
            $whatsapp_link = preg_replace('/[^0-9]/', '', $whatsapp);
            $wa_text       = rawurlencode('Hi Proofix, I am interested in the ' . $title . ' role.'); ?>
            <a class="btn btn-whatsapp btn-block" target="_blank" rel="noopener" href="<?php echo esc_url('https://wa.me/' . $whatsapp_link . '?text=' . $wa_text); ?>"><?php echo proofix_icon('whatsapp.svg'); ?> Chat on WhatsApp</a>
          <?php } ?>
        </div>
        <div class="side-box side-list">
          <h4>All openings</h4>
          <?php foreach ($careers as $career) { ?>
            <a<?php echo ($career->ID === $id) ? ' class="current"' : ''; ?> href="<?php echo esc_url(get_permalink($career->ID)); ?>"><?php echo esc_html($career->post_title); ?></a>
          <?php } ?>
          <a href="<?php echo esc_url(proofix_url('careers')); ?>">Back to Careers</a>
        </div>
      </aside>
    </div>
  </section>

<?php endwhile; ?>

<?php get_footer(); ?>
