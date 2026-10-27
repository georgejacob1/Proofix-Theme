<?php
// Usage: get_template_part('include/page-banner', null, array('title' => '...', 'text' => '...', 'crumbs' => array(array('Services', $url)), 'current' => 'Label'));
$title   = isset($args['title']) ? $args['title'] : get_the_title();
$text    = isset($args['text']) ? $args['text'] : '';
$crumbs  = isset($args['crumbs']) ? $args['crumbs'] : array();
$current = isset($args['current']) ? $args['current'] : $title;
?>
<section class="page-banner">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url(proofix_url('home')); ?>">Home</a><span>/</span>
      <?php foreach ($crumbs as $crumb) { ?>
        <a href="<?php echo esc_url($crumb[1]); ?>"><?php echo esc_html($crumb[0]); ?></a><span>/</span>
      <?php } ?>
      <span><?php echo esc_html($current); ?></span>
    </nav>
    <h1><?php echo esc_html($title); ?></h1>
    <?php if ($text !== '') { ?><p><?php echo esc_html($text); ?></p><?php } ?>
  </div>
</section>
