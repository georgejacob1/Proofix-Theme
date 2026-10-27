<?php

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => is_search() ? 'Search' : 'Latest',
  'current' => is_search() ? 'Search' : 'Latest',
));

?>

<section class="section">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>

      <?php endwhile;
    else : ?>

      <p>Nothing found.</p>

    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
