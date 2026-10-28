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
      <a class="card blog-card" href="<?php echo esc_url(home_url('/blog/quality-research-proposal/')); ?>">
        <div class="thumb"><img src="https://picsum.photos/id/20/800/450" alt="" loading="lazy"></div>
        <div class="body">
          <div class="meta"><span class="tag">Research Proposal</span><span>3 min read</span></div>
          <h3>How to Write a Quality Research Proposal?</h3>
          <p>Writing a quality research proposal is of utmost importance to start your PhD journey. The emphasis should be on the uniqueness of the research being presented.</p>
          <span class="link-arrow">Read article <?php echo proofix_icon('arrow-right.svg'); ?></span>
        </div>
      </a>
      <a class="card blog-card" href="<?php echo esc_url(home_url('/blog/impactful-journal-paper/')); ?>">
        <div class="thumb"><img src="https://picsum.photos/id/24/800/450" alt="" loading="lazy"></div>
        <div class="body">
          <div class="meta"><span class="tag">Publication</span><span>2 min read</span></div>
          <h3>How to Make a Journal Paper Impactful?</h3>
          <p>Any research focuses on the novelty in the topic selected and how original your ideas are to the particular research area.</p>
          <span class="link-arrow">Read article <?php echo proofix_icon('arrow-right.svg'); ?></span>
        </div>
      </a>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Need expert guidance?',
  'text'  => 'Our team helps devise unique problem identification and impactful research ideas.',
)); ?>

<?php get_footer(); ?>
