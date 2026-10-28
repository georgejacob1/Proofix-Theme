<?php

/**
 * Landing page (Settings > Reading > Static front page).
 */

get_header();

$services = proofix_services();
$contact  = proofix_contact();

?>

<section class="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <span class="hero-pill"><?php echo proofix_icon('star-white.svg'); ?><b>Professional</b> Academic Research Support</span>
      <h1>Empowering <span class="avatars"><img src="https://picsum.photos/id/1005/96/96" alt=""><img src="https://picsum.photos/id/1011/96/96" alt=""><img src="https://picsum.photos/id/1027/96/96" alt=""></span> Research. <em>Enabling Excellence.</em></h1>
      <p class="lead">Proofix Technologies Pvt Ltd provides professional academic research assistance, technical guidance, and research support for scholars, researchers, faculty members, and academic professionals.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="<?php echo esc_url(proofix_url('contact')); ?>">Start Your Journey <?php echo proofix_icon('arrow-right.svg'); ?></a>
        <a class="btn btn-outline" href="<?php echo esc_url(proofix_url('services')); ?>">Explore Services</a>
      </div>
      <ul class="hero-stats">
        <li><strong>Multiple</strong><span>Research Services</span></li>
        <li><strong>Multi-Domain</strong><span>Research Expertise</span></li>
        <li><strong>360&deg;</strong><span>Stage-wise Support</span></li>
      </ul>
    </div>
    <div class="hero-visual"><img src="<?php echo TEMPLATE_URL; ?>assets/images/banner.png" alt="Researcher working on a laptop">
      <div class="hv-chips"><span><?php echo proofix_icon('circle-check.svg'); ?>Structured &amp; Ethical</span><span><?php echo proofix_icon('circle-check.svg'); ?>Every Stage Covered</span></div>
      <div class="hv-card blue hv-a"><strong>Idea to Impact</strong><span>Support at every research stage</span></div>
      <div class="hv-card white hv-b">
        <h3>Add your focus</h3>
        <div class="tags"><span>+ Topic</span><span>+ Writing</span><span>+ Publication</span></div>
      </div>
      <div class="hv-card blue hv-c"><strong>6 Domains</strong><span>Domain-specific experts</span></div>
    </div>
  </div>
</section>

<section class="stats-strip">
  <div class="container">
    <div class="stats-box">
      <div class="stat"><?php echo proofix_icon('lightbulb.svg'); ?><strong>Idea to Impact</strong><span>Support at every research stage</span></div>
      <div class="stat"><?php echo proofix_icon('user-graduate.svg'); ?><strong>Subject Experts</strong><span>Matched to your domain</span></div>
      <div class="stat"><?php echo proofix_icon('scale-balanced.svg'); ?><strong>Ethical Approach</strong><span>Guidance, structure &amp; clarity</span></div>
      <div class="stat"><?php echo proofix_icon('comments.svg'); ?><strong>Transparent Process</strong><span>6 clear phases</span></div>
    </div>
  </div>
</section>

<?php if (!empty($services)) { ?>
  <section class="section">
    <div class="container">
      <div class="section-head"><span class="eyebrow">What we do</span>
        <h2>Research Support for Every Stage of Your Academic Journey</h2>
        <p>Every research project is unique. Proofix provides customized support based on your research stage, subject area, project requirements, and academic objectives.</p>
      </div>
      <div class="grid grid-4">
        <?php foreach ($services as $service) { ?>
          <a class="card service-card" href="<?php echo esc_url(get_permalink($service->ID)); ?>">
            <div class="icon-box"><?php echo proofix_icon(proofix_service_icon($service->ID)); ?></div>
            <h3><?php echo esc_html($service->post_title); ?></h3>
            <p><?php echo esc_html($service->post_excerpt); ?></p>
            <span class="link-arrow">View details <?php echo proofix_icon('arrow-right.svg'); ?></span>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="section soft">
    <div class="container">
      <div class="section-head"><span class="eyebrow">Your journey</span>
        <h2>From Research Problem to Publication</h2>
        <p>Research can be challenging — from identifying a meaningful problem to responding to reviewer feedback. Proofix helps you navigate each stage.</p>
      </div>
      <div class="journey">
        <?php foreach ($services as $service) { ?>
          <a href="<?php echo esc_url(get_permalink($service->ID)); ?>"><?php echo esc_html($service->post_title); ?></a>
        <?php } ?>
      </div>
    </div>
</section>

<section class="section">
  <div class="container split">
    <img src="https://picsum.photos/id/1/900/675" alt="Researchers discussing a project" loading="lazy">
    <div>
      <span class="eyebrow">Why Proofix</span>
      <h2>Our goal is to strengthen the research behind the document</h2>
      <p>Research can be challenging, from identifying a meaningful research problem to selecting an appropriate methodology, analysing data, implementing technical solutions, preparing manuscripts, and responding to reviewer feedback. Proofix helps researchers navigate these stages with structured, professional, and ethical support.</p>
      <div class="quote">Raw ideas are common, Refined Research is rare<small>— The Proofix philosophy</small></div>
      <p style="margin-top:24px"><a class="link-arrow" href="<?php echo esc_url(proofix_url('about')); ?>">About Proofix <?php echo proofix_icon('arrow-right.svg'); ?></a></p>
    </div>
  </div>
</section>

<section class="section tint">
  <div class="container">
    <div class="section-head"><span class="eyebrow">Research domains</span>
      <h2>Supporting Research Across Multiple Disciplines</h2>
      <p>From technology-driven research and data analysis to management, healthcare, education, and social sciences.</p>
    </div>
    <div class="grid grid-3">
      <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-engineering'); ?>">
        <div class="icon-box"><?php echo proofix_icon('gears.svg'); ?></div>
        <div>
          <h3>Engineering &amp; Technology</h3>
          <p>11 focus areas</p>
        </div>
      </a>
      <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-cs-it'); ?>">
        <div class="icon-box"><?php echo proofix_icon('laptop-code.svg'); ?></div>
        <div>
          <h3>Computer Science &amp; Information Technology</h3>
          <p>13 focus areas</p>
        </div>
      </a>
      <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-ai-ml'); ?>">
        <div class="icon-box"><?php echo proofix_icon('brain.svg'); ?></div>
        <div>
          <h3>Artificial Intelligence &amp; Machine Learning</h3>
          <p>12 focus areas</p>
        </div>
      </a>
      <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-datascience'); ?>">
        <div class="icon-box"><?php echo proofix_icon('chart-line.svg'); ?></div>
        <div>
          <h3>Data Science &amp; Analytics</h3>
          <p>10 focus areas</p>
        </div>
      </a>
      <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-management'); ?>">
        <div class="icon-box"><?php echo proofix_icon('briefcase.svg'); ?></div>
        <div>
          <h3>Management &amp; Business Research</h3>
          <p>12 focus areas</p>
        </div>
      </a>
      <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-healthcare'); ?>">
        <div class="icon-box"><?php echo proofix_icon('heart-pulse.svg'); ?></div>
        <div>
          <h3>Healthcare &amp; Medical Research</h3>
          <p>10 focus areas</p>
        </div>
      </a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head"><span class="eyebrow">Our process</span>
      <h2>A Structured Approach to Research Support</h2>
      <p>A transparent journey from understanding your requirement to reviewing the work and incorporating feedback.</p>
    </div>
    <div class="grid grid-3">
      <div class="card step-mini">
        <div class="num">01</div>
        <h3>Share Your Research Requirement</h3>
        <p style="font-size:.92rem;margin:0">The process begins when you share your research requirement with us.</p>
      </div>
      <div class="card step-mini">
        <div class="num">02</div>
        <h3>Requirement Assessment</h3>
        <p style="font-size:.92rem;margin:0">Once we receive your requirement, our team reviews the scope of the research and identifies the type of academic, technical, analytical, or editorial support that may be required.</p>
      </div>
      <div class="card step-mini">
        <div class="num">03</div>
        <h3>Research Planning</h3>
        <p style="font-size:.92rem;margin:0">After understanding the requirements, a structured plan is developed based on the agreed scope of support.</p>
      </div>
      <div class="card step-mini">
        <div class="num">04</div>
        <h3>Expert Support &amp; Development</h3>
        <p style="font-size:.92rem;margin:0">Based on the nature of the project, relevant academic, technical, analytical, or editorial support is provided.</p>
      </div>
      <div class="card step-mini">
        <div class="num">05</div>
        <h3>Review &amp; Quality Check</h3>
        <p style="font-size:.92rem;margin:0">Before completing each stage, the work is reviewed based on the applicable project requirements.</p>
      </div>
      <div class="card step-mini">
        <div class="num">06</div>
        <h3>Feedback &amp; Refinement</h3>
        <p style="font-size:.92rem;margin:0">Research often evolves through discussion, feedback, and refinement.</p>
      </div>
    </div>
    <p style="text-align:center;margin-top:32px"><a class="btn btn-outline" href="<?php echo esc_url(proofix_url('process')); ?>">See the full process</a></p>
  </div>
</section>

<section class="section soft">
    <div class="container">
      <div class="section-head"><span class="eyebrow">Blogs</span>
        <h2>Insights for Researchers</h2>
      </div>
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
<?php } ?>

<section class="section">
  <div class="container">
    <div class="section-head"><span class="eyebrow">FAQ</span>
      <h2>Frequently Asked Questions</h2>
    </div>
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
    </div>
    <p style="text-align:center;margin-top:28px"><a class="link-arrow" href="<?php echo esc_url(proofix_url('faq')); ?>">More questions <?php echo proofix_icon('arrow-right.svg'); ?></a></p>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Ready to refine your research?',
  'text'  => 'Share your requirement and our consultant will connect with you at the earliest to schedule a consultation with a Subject Matter Expert.',
)); ?>

<?php get_footer(); ?>
