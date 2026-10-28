<?php

/**
 * Template Name: Blogs Page
 */

get_header();

$paged = max(1, get_query_var('paged'), get_query_var('page'));
$blogs = new WP_Query(array(
  'post_type'      => 'blog',
  'post_status'    => 'publish',
  'paged'          => $paged,
  'posts_per_page' => get_option('posts_per_page'),
));

get_template_part('include/page-banner', null, array(
  'title'   => 'Insights for Researchers',
  'text'    => 'Practical guidance on proposals, originality and publication.',
  'current' => 'Blogs',
));

?>

<section class="section">
  <div class="container">
    <div class="grid grid-2" style="max-width:900px;margin:0 auto">
      <?php while ($blogs->have_posts()) : $blogs->the_post();
        get_template_part('include/blog-card');
      endwhile;
      wp_reset_postdata(); ?>
    </div>
    <div class="pagination" style="text-align:center;margin-top:32px"><?php echo paginate_links(array('total' => $blogs->max_num_pages, 'current' => $paged)); ?></div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Need expert guidance?',
  'text'  => 'Our team helps devise unique problem identification and impactful research ideas.',
)); ?>

<?php get_footer(); ?>
