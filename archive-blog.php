<?php

/**
 * Blog listing (post type archive).
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
      <?php while (have_posts()) : the_post();
        get_template_part('include/blog-card');
      endwhile; ?>
    </div>
    <div class="pagination" style="text-align:center;margin-top:32px"><?php the_posts_pagination(); ?></div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Need expert guidance?',
  'text'  => 'Our team helps devise unique problem identification and impactful research ideas.',
)); ?>

<?php get_footer(); ?>
