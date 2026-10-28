<?php

/**
 * * Template Name: FAQ Page
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Frequently Asked Questions',
  'text'    => 'Quick answers about our research support services.',
  'current' => 'FAQ',
));

?>

<section class="section">
  <div class="container">
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false">What research support services do you provide?<?php echo proofix_icon('plus.svg'); ?></button>
        <div class="faq-a">
          <p>We provide comprehensive research support for PhD scholars, postgraduate students, and researchers, including research proposal and synopsis preparation, literature review, research methodology, data analysis, thesis and dissertation support, research paper writing, manuscript preparation, and publication guidance.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false">Can you help me choose or refine my research topic?<?php echo proofix_icon('plus.svg'); ?></button>
        <div class="faq-a">
          <p>Yes. We can help you evaluate your research idea, identify research gaps, refine the research problem, formulate objectives and research questions, and develop a clear and researchable topic aligned with your academic domain.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false">Do you provide support with statistical analysis and interpretation?<?php echo proofix_icon('plus.svg'); ?></button>
        <div class="faq-a">
          <p>Yes. We provide support for data preparation, statistical analysis, selection of appropriate tests, result interpretation, tables and graphical presentation, and discussion of findings using suitable statistical methodologies and software.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false">Can you help with thesis and dissertation work?<?php echo proofix_icon('plus.svg'); ?></button>
        <div class="faq-a">
          <p>Yes. We provide structured support across different stages of thesis and dissertation development, including chapter planning, literature review, methodology, analysis, results, discussion, formatting, referencing, proofreading, and overall academic presentation.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false">Do you provide research publication support?<?php echo proofix_icon('plus.svg'); ?></button>
        <div class="faq-a">
          <p>Yes. We assist researchers with manuscript preparation, journal selection, formatting, submission preparation, reviewer-response support, and publication strategy. Our focus is on helping researchers develop clear, rigorous, and academically sound research.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Still have questions?',
  'text'  => 'Drop a "Hi" on WhatsApp or fill in our contact form and a consultant will connect with you.',
)); ?>

<?php get_footer(); ?>
