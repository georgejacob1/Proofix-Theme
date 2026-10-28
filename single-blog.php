<?php

/**
 * Single blog article.
 */

get_header();

while (have_posts()) : the_post();

  $tag  = get_post_meta(get_the_ID(), 'blog_tag', true);
  $time = proofix_read_time(get_the_ID());
  $more = get_posts(array('post_type' => 'blog', 'post_status' => 'publish', 'posts_per_page' => 2, 'post__not_in' => array(get_the_ID())));

  get_template_part('include/page-banner', null, array(
    'title'   => get_the_title(),
    'crumbs'  => array(array('Blogs', proofix_url('blogs'))),
    'current' => 'Article',
  ));

?>

  <section class="section" style="padding-top:0">
    <div class="container">
      <article class="article">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('proofix-blog-cover', array('class' => 'article-cover'));
        } ?>
        <div class="article-meta">
          <?php if ($tag) { ?><span class="tag"><?php echo esc_html($tag); ?></span><?php } ?>
          <?php if ($time) { ?><span><?php echo esc_html($time); ?></span><?php } ?>
        </div>

        <?php the_content(); ?>
      </article>
    </div>
  </section>

  <?php if (!empty($more)) { ?>
    <section class="section soft">
      <div class="container">
        <div class="section-head">
          <h2>More articles</h2>
        </div>
        <div class="grid grid-2" style="max-width:780px;margin:0 auto">
          <?php foreach ($more as $blog) { ?>
            <a class="card blog-card" href="<?php echo esc_url(get_permalink($blog->ID)); ?>">
              <div class="thumb">
                <?php if (has_post_thumbnail($blog->ID)) {
                  echo get_the_post_thumbnail($blog->ID, 'proofix-blog-thumb', array('loading' => 'lazy', 'alt' => ''));
                } ?>
              </div>
              <div class="body">
                <div class="meta">
                  <?php if ($tag = get_post_meta($blog->ID, 'blog_tag', true)) { ?><span class="tag"><?php echo esc_html($tag); ?></span><?php } ?>
                  <?php if ($time = proofix_read_time($blog->ID)) { ?><span><?php echo esc_html($time); ?></span><?php } ?>
                </div>
                <h3><?php echo esc_html($blog->post_title); ?></h3>
                <p><?php echo esc_html($blog->post_excerpt); ?></p>
                <span class="link-arrow">Read article <?php echo proofix_icon('arrow-right.svg'); ?></span>
              </div>
            </a>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>

<?php endwhile; ?>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Want expert help with your research?',
  'text'  => 'Our team helps with problem identification, impactful research ideas and publication readiness.',
)); ?>

<?php get_footer(); ?>
