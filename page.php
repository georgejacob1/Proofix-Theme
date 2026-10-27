<?php

get_header();

get_template_part('include/page-banner');

?>

<section class="section">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>

      <?php the_content(); ?>

    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
