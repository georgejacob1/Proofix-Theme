<?php
// Card for the current post in a blog loop.
$tag  = get_post_meta(get_the_ID(), 'blog_tag', true);
$time = proofix_read_time(get_the_ID());
?>
<a class="card blog-card" href="<?php the_permalink(); ?>">
  <div class="thumb">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('proofix-blog-thumb', array('loading' => 'lazy', 'alt' => ''));
    } ?>
  </div>
  <div class="body">
    <div class="meta">
      <?php if ($tag) { ?><span class="tag"><?php echo esc_html($tag); ?></span><?php } ?>
      <?php if ($time) { ?><span><?php echo esc_html($time); ?></span><?php } ?>
    </div>
    <h3><?php the_title(); ?></h3>
    <p><?php echo esc_html(get_the_excerpt()); ?></p>
    <span class="link-arrow">Read article <?php echo proofix_icon('arrow-right.svg'); ?></span>
  </div>
</a>
