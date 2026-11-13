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
            <div class="icon-box"><?php echo proofix_service_icon($service->ID); ?></div>
            <h3><?php echo esc_html($service->post_title); ?></h3>
            <p><?php echo esc_html(get_field('description', $service->ID, false)); ?></p>
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
      <?php foreach (proofix_items('research_domain') as $domain) {
        $count = count(array_filter(array_map('trim', preg_split('/\R/', (string) get_field('focus_areas', $domain->ID, false))))); ?>
        <a class="card domain-tile" href="<?php echo esc_url(proofix_url('domains') . '#domain-' . $domain->post_name); ?>">
          <div class="icon-box"><?php echo proofix_field_icon($domain->ID, 'domain_icon'); ?></div>
          <div>
            <h3><?php echo esc_html($domain->post_title); ?></h3>
            <?php if ($count) { ?><p><?php echo esc_html($count . ' focus areas'); ?></p><?php } ?>
          </div>
        </a>
      <?php } ?>
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
      <?php foreach (proofix_items('process') as $i => $step) {
        $short = trim((string) get_field('short_description', $step->ID, false));
        if ($short === '') {
          $short = get_field('description', $step->ID, false);
        } ?>
        <div class="card step-mini">
          <div class="num"><?php echo sprintf('%02d', $i + 1); ?></div>
          <h3><?php echo esc_html($step->post_title); ?></h3>
          <p style="font-size:.92rem;margin:0"><?php echo esc_html($short); ?></p>
        </div>
      <?php } ?>
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
        <?php foreach (array_slice(proofix_items('blog'), 0, 2) as $blog) {
          $tag  = get_field('blog_tag', $blog->ID, false);
          $time = proofix_read_time($blog->ID); ?>
          <a class="card blog-card" href="<?php echo esc_url(get_permalink($blog->ID)); ?>">
            <div class="thumb">
              <?php if (has_post_thumbnail($blog->ID)) {
                echo get_the_post_thumbnail($blog->ID, 'proofix-blog-thumb', array('loading' => 'lazy', 'alt' => ''));
              } ?>
            </div>
            <div class="body">
              <div class="meta">
                <?php if ($tag) { ?><span class="tag"><?php echo esc_html($tag); ?></span><?php } ?>
                <?php if ($time) { ?><span><?php echo esc_html($time); ?></span><?php } ?>
              </div>
              <h3><?php echo esc_html($blog->post_title); ?></h3>
              <p><?php echo esc_html(get_field('description', $blog->ID, false)); ?></p>
              <span class="link-arrow">Read article <?php echo proofix_icon('arrow-right.svg'); ?></span>
            </div>
          </a>
        <?php } ?>
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
      <?php foreach (array_slice(proofix_items('faq'), 0, 3) as $faq) { ?>
        <div class="faq-item">
          <button class="faq-q" aria-expanded="false"><?php echo esc_html($faq->post_title); ?><?php echo proofix_icon('plus.svg'); ?></button>
          <div class="faq-a">
            <?php echo wpautop(esc_html(get_field('answer', $faq->ID, false))); ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <p style="text-align:center;margin-top:28px"><a class="link-arrow" href="<?php echo esc_url(proofix_url('faq')); ?>">More questions <?php echo proofix_icon('arrow-right.svg'); ?></a></p>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Ready to refine your research?',
  'text'  => 'Share your requirement and our consultant will connect with you at the earliest to schedule a consultation with a Subject Matter Expert.',
)); ?>

<?php get_footer(); ?>
