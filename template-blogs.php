<?php

/**
 * Template Name: Blogs Page
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Insights for Researchers',
  'text'    => 'Practical guidance on proposals, originality and publication.',
  'current' => 'Blogs',
));

?>

<section class="section">
  <div class="container">
    <div class="grid grid-2" style="max-width:900px;margin:0 auto">
      <?php foreach (proofix_items('blog') as $blog) {
        $tag  = get_field('blog_tag', $blog->ID, false);
        $time = proofix_read_time($blog->ID); ?>
        <a class="card blog-card" href="<?php echo esc_url(get_permalink($blog->ID)); ?>">
          <div class="thumb">
            <?php if (has_post_thumbnail($blog->ID)) {
              echo get_the_post_thumbnail($blog->ID, 'proofix-blog-thumb', array('loading' => 'lazy', 'alt' => ''));
            } ?>
          </div>
          <div class="body">
            <div class="meta">
              <?php if ($tag) { ?><span class="tag"><?php echo esc_html($tag); ?></span><?php } ?>
              <?php if ($time) { ?><span><?php echo esc_html($time); ?></span><?php } ?>
            </div>
            <h3><?php echo esc_html($blog->post_title); ?></h3>
            <p><?php echo esc_html(get_field('description', $blog->ID, false)); ?></p>
            <span class="link-arrow">Read article <?php echo proofix_icon('arrow-right.svg'); ?></span>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Need expert guidance?',
  'text'  => 'Our team helps devise unique problem identification and impactful research ideas.',
)); ?>

<?php get_footer(); ?>
