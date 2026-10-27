<?php get_header(); ?>

<section class="section error-page">
  <div class="container">
    <div class="error-code">4<span>0</span>4</div>
    <h1>Page not found</h1>
    <p>Sorry, the page you're looking for doesn't exist or may have been moved. Let's get you back on track.</p>
    <div class="actions">
      <a class="btn btn-accent" href="<?php echo esc_url(proofix_url('home')); ?>"><?php echo proofix_icon('house.svg'); ?> Back to Home</a>
      <a class="btn" href="<?php echo esc_url(proofix_url('contact')); ?>">Contact Us</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
