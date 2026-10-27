<?php
// Usage: get_template_part('include/cta-band', null, array('title' => '...', 'text' => '...'));
$title   = isset($args['title']) ? $args['title'] : 'Ready to refine your research?';
$text    = isset($args['text']) ? $args['text'] : 'Share your requirement and our consultant will connect with you at the earliest.';
$contact = proofix_contact();
?>
<section class="section">
  <div class="container">
    <div class="cta-band">
      <div>
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($text); ?></p>
      </div>
      <div class="actions">
        <a class="btn btn-accent" href="<?php echo esc_url(proofix_url('contact')); ?>">Book Consultation</a>
        <a class="btn btn-whatsapp" href="<?php echo esc_url($contact['whatsapp'] . '?text=' . rawurlencode('Hi Proofix')); ?>" target="_blank" rel="noopener"><?php echo proofix_icon('whatsapp.svg'); ?> WhatsApp Us</a>
      </div>
    </div>
  </div>
</section>
