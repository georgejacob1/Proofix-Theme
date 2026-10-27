<?php

/**
 * * Template Name: About Page
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Research is remembered for its Impact, Not its Length.',
  'text'    => 'Structured, professional and ethical research support tailored to individual research requirements.',
  'current' => 'About Us',
));

?>

<section class="section">
  <div class="container split">
    <div>
      <span class="eyebrow">Who we are</span>
      <h2>Academic knowledge meets technical expertise</h2>
      <p>Proofix Technologies Pvt Ltd is focused on providing professional academic research assistance and technical research support for scholars and researchers facing complex research challenges.</p>
      <p>We understand that modern research often requires a combination of academic knowledge, technical skills, data analysis capabilities, methodological understanding, and effective scientific communication.</p>
      <p>Our approach brings these areas together to provide structured support tailored to individual research requirements.</p>
    </div>
    <img src="https://picsum.photos/id/3/900/675" alt="Research discussion" loading="lazy">
  </div>
</section>

<section class="section soft">
  <div class="container">
    <div class="quote" style="max-width:900px;margin:0 auto 56px;text-align:center">Raw ideas are common, Refined Research is rare<small>Our Philosophy</small></div>
    <p class="lead" style="max-width:760px;margin:0 auto 48px;text-align:center">We believe effective research support should help researchers gain greater clarity about their work, make informed decisions, and communicate their research more effectively.</p>
    <div class="grid grid-2">
      <div class="card vm-card">
        <h3><?php echo proofix_icon('eye.svg'); ?> Our Vision</h3>
        <p style="margin:0">To become a trusted research support organization that empowers scholars and researchers through responsible, innovative, and quality-focused academic and technical assistance.</p>
      </div>
      <div class="card vm-card">
        <h3><?php echo proofix_icon('bullseye.svg'); ?> Our Mission</h3>
        <p>To provide structured and professional research support that helps researchers:</p>
        <ul class="check-list">
          <li>Develop stronger research ideas</li>
          <li>Improve research methodology</li>
          <li>Handle complex technical and analytical challenges</li>
          <li>Strengthen academic communication</li>
          <li>Prepare research work for review and publication</li>
          <li>Build confidence throughout their research journey</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => "Let's refine your research together",
  'text'  => 'Tell us where you are in your research journey and we will help you take the next step.',
)); ?>

<?php get_footer(); ?>
