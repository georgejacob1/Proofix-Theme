<?php // Card for the current post in a service loop. ?>
<a class="card service-card" href="<?php the_permalink(); ?>">
  <div class="icon-box"><?php echo proofix_icon(proofix_service_icon(get_the_ID())); ?></div>
  <h3><?php the_title(); ?></h3>
  <p><?php echo esc_html(get_the_excerpt()); ?></p>
  <span class="link-arrow">View details <?php echo proofix_icon('arrow-right.svg'); ?></span>
</a>
