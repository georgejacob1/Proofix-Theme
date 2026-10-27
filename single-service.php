<?php

/**
 * Single service.
 */

get_header();

while (have_posts()) : the_post();

  $contact  = proofix_contact();
  $includes = array_filter(array_map('trim', explode("\n", (string) get_post_meta(get_the_ID(), 'service_includes', true))));
  $prev     = proofix_adjacent_service(get_the_ID(), 'prev');
  $next     = proofix_adjacent_service(get_the_ID(), 'next');
  $services = proofix_services();
  $wa_text  = rawurlencode('Hi Proofix, I need help with: ' . get_the_title());

  get_template_part('include/page-banner', null, array(
    'title'   => get_the_title(),
    'text'    => get_the_excerpt(),
    'crumbs'  => array(array('Services', proofix_url('services'))),
    'current' => get_the_title(),
  ));

?>

  <section class="section">
    <div class="container detail-layout">
      <div class="detail-main">
        <div class="icon-box"><?php echo proofix_icon(proofix_service_icon(get_the_ID())); ?></div>

        <?php the_content(); ?>

        <?php if (!empty($includes)) { ?>
          <h2>Our support includes</h2>
          <ul class="check-list two-col">
            <?php foreach ($includes as $item) { ?>
              <li><?php echo esc_html($item); ?></li>
            <?php } ?>
          </ul>
        <?php } ?>

        <?php if ($prev && $next) { ?>
          <div class="pager">
            <a href="<?php echo esc_url(get_permalink($prev->ID)); ?>"><small>&larr; Previous</small><?php echo esc_html($prev->post_title); ?></a>
            <a class="next" href="<?php echo esc_url(get_permalink($next->ID)); ?>"><small>Next &rarr;</small><?php echo esc_html($next->post_title); ?></a>
          </div>
        <?php } ?>
      </div>

      <aside class="side-card">
        <div class="side-box">
          <h4>Need help with this?</h4>
          <p style="font-size:.94rem">Tell us your research stage and we'll connect you with a subject matter expert.</p>
          <a class="btn btn-accent btn-block" href="<?php echo esc_url(add_query_arg('service', get_post_field('post_name'), proofix_url('contact'))); ?>">Book Consultation</a>
          <a class="btn btn-whatsapp btn-block" target="_blank" rel="noopener" href="<?php echo esc_url($contact['whatsapp'] . '?text=' . $wa_text); ?>"><?php echo proofix_icon('whatsapp.svg'); ?> Chat on WhatsApp</a>
        </div>
        <div class="side-box side-list">
          <h4>All services</h4>
          <?php foreach ($services as $service) { ?>
            <a<?php echo ($service->ID === get_the_ID()) ? ' class="current"' : ''; ?> href="<?php echo esc_url(get_permalink($service->ID)); ?>"><?php echo esc_html($service->post_title); ?></a>
          <?php } ?>
        </div>
      </aside>
    </div>
  </section>

<?php endwhile; ?>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Ready to strengthen your research?',
  'text'  => 'Share your requirement and our consultant will connect with you at the earliest.',
)); ?>

<?php get_footer(); ?>
