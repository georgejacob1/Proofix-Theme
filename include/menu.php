<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <a class="brand" href="<?php echo esc_url(proofix_url('home')); ?>" aria-label="Proofix Technologies home"><img src="<?php echo TEMPLATE_URL; ?>assets/images/logo.png" alt="Proofix Technologies" width="105" height="46"></a>
    <nav class="nav" id="nav" aria-label="Main">
      <button class="nav-close" id="navClose" aria-label="Close menu"><?php echo proofix_icon('xmark.svg'); ?></button>

      <?php wp_nav_menu(array('menu' => 'Header Menu', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'proofix_menu_fallback', 'walker' => new Proofix_Menu_Walker())); ?>

      <a class="btn btn-accent nav-cta" href="<?php echo esc_url(proofix_url('contact')); ?>">Book Consultation</a>
    </nav>
    <div class="header-actions">
      <a class="btn btn-accent header-cta" href="<?php echo esc_url(proofix_url('contact')); ?>">Book Consultation</a>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu" aria-expanded="false"><?php echo proofix_icon('bars.svg'); ?></button>
    </div>
  </div>
</header>
