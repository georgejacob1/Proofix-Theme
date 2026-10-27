<?php
$services = proofix_services();
$contact  = proofix_contact();
?>
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <img src="<?php echo TEMPLATE_URL; ?>assets/images/logo.png" alt="Proofix Technologies">
        <p>Proofix Technologies Pvt Ltd provides professional academic research assistance and technical research support for scholars, researchers, faculty members and academic professionals.</p>
      </div>
      <div>
        <h4>Quick Links</h4>
        <ul>
          <?php wp_nav_menu(array('menu' => 'Footer Menu', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'proofix_footer_menu_fallback', 'walker' => new Proofix_Footer_Menu_Walker())); ?>
        </ul>
      </div>
      <div>
        <h4>Services</h4>
        <ul>
          <?php foreach ($services as $service) { ?>
            <li><a href="<?php echo esc_url(get_permalink($service->ID)); ?>"><?php echo esc_html($service->post_title); ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div>
        <h4>Get in Touch</h4>
        <ul class="footer-contact">
          <li><?php echo proofix_icon('envelope.svg'); ?><a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></li>
          <li><?php echo proofix_icon('phone.svg'); ?><a href="tel:<?php echo esc_attr($contact['tel']); ?>"><?php echo esc_html($contact['phone']); ?></a></li>
          <li><?php echo proofix_icon('whatsapp.svg'); ?><a href="<?php echo esc_url($contact['whatsapp']); ?>" target="_blank" rel="noopener">Chat on WhatsApp</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom"><span>&copy; <?php echo date('Y'); ?> Proofix Technologies Pvt Ltd. All rights reserved.</span><span>Empowering Research. Enabling Excellence.</span></div>
  </div>
</footer>
<a class="whatsapp-float" href="<?php echo esc_url($contact['whatsapp'] . '?text=' . rawurlencode('Hi Proofix')); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp"><?php echo proofix_icon('whatsapp.svg'); ?></a>
<button class="back-to-top" id="backToTop" aria-label="Back to top"><?php echo proofix_icon('arrow-up.svg'); ?></button>
