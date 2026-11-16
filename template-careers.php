<?php

/**
 * * Template Name: Careers
 *
 */

get_header();

$careers = proofix_items('career');
$email   = proofix_careers_email();

get_template_part('include/page-banner', null, array(
  'title'   => 'Build Your Career with Proofix',
  'text'    => 'Be part of a team that shapes research and innovation. Explore opportunities. Share your expertise. Grow with Proofix.',
  'current' => 'Careers',
));

?>

<section class="section">
  <div class="container split">
    <div>
      <span class="eyebrow">Join our team</span>
      <h2>Meaningful research begins with curiosity</h2>
      <p>At <strong>Proofix Technologies Pvt. Ltd.</strong>, we believe that meaningful research begins with curiosity, and creates impact through innovation.</p>
      <p>We bring together research professionals, technical experts, data analysts, developers, editors, business development executives/managers and digital marketing/lead generation specialists to support and identify researchers in developing high-quality academic and technical work.</p>
      <p>If you are passionate about learning, problem-solving, technology, and contributing to the research community, we would love to hear from you.</p>
      <a class="btn btn-accent" href="#apply">Apply Now</a>
    </div>
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('large', array('loading' => 'lazy'));
    } else { ?>
      <img src="https://picsum.photos/id/180/900/675" alt="Team collaborating on research" loading="lazy">
    <?php } ?>
  </div>
</section>

<section class="section soft">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Why Proofix</span>
      <h2>Why Work with Proofix?</h2>
      <p class="lead">We believe that a strong team is the foundation of meaningful innovation. At Proofix, we aim to create an environment where professionals can develop their skills, exchange ideas, and contribute to challenging research-oriented projects.</p>
    </div>
    <div class="grid grid-3">
      <div class="card">
        <div class="icon-box"><?php echo proofix_icon('lightbulb.svg'); ?></div>
        <h3>Continuous Learning</h3>
        <p>Explore emerging technologies, tools, and research methodologies.</p>
      </div>
      <div class="card">
        <div class="icon-box"><?php echo proofix_icon('comments.svg'); ?></div>
        <h3>Knowledge Collaboration</h3>
        <p>Work with professionals from diverse academic and technical backgrounds.</p>
      </div>
      <div class="card">
        <div class="icon-box"><?php echo proofix_icon('chart-line.svg'); ?></div>
        <h3>Professional Growth</h3>
        <p>Develop your expertise through practical experience and collaborative learning.</p>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($careers)) { ?>
  <section class="section">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Open areas</span>
        <h2>Explore Career Opportunities</h2>
        <p class="lead">We welcome applications from qualified professionals and passionate individuals in the following areas.</p>
      </div>
      <div class="grid grid-2 role-grid">
        <?php foreach ($careers as $career) {
          $skills = array_slice(proofix_lines($career->ID, 'skills'), 0, 5); ?>
          <a class="card role-card" href="<?php echo esc_url(get_permalink($career->ID)); ?>">
            <div class="role-head">
              <div class="icon-box"><?php echo proofix_field_icon($career->ID, 'career_icon'); ?></div>
              <h3><?php echo esc_html($career->post_title); ?></h3>
            </div>
            <p><?php echo esc_html(get_post_meta($career->ID, 'description', true)); ?></p>
            <?php if (!empty($skills)) { ?>
              <div class="chips">
                <?php foreach ($skills as $skill) { ?>
                  <span class="chip"><?php echo esc_html($skill); ?></span>
                <?php } ?>
              </div>
            <?php } ?>
            <span class="link-arrow">View details <?php echo proofix_icon('arrow-right.svg'); ?></span>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>

<section class="section soft">
  <div class="container grid grid-2">
    <div class="card static-card">
      <div class="role-head">
        <div class="icon-box"><?php echo proofix_icon('user-graduate.svg'); ?></div>
        <h3>Who Can Apply?</h3>
      </div>
      <p>We encourage applications from:</p>
      <ul class="check-list">
        <li>Postgraduate students and research scholars with relevant technical expertise.</li>
        <li>PhD holders and experienced research professionals.</li>
        <li>Digital marketing professionals and lead generation specialists.</li>
        <li>Business development executives and experienced managers.</li>
        <li>Freelance researchers and subject matter experts.</li>
        <li>Academic editors and statistical consultants.</li>
        <li>Fresh graduates with strong technical skills and a willingness to learn.</li>
      </ul>
      <p class="note">Relevant qualifications, practical skills, research experience, and a commitment to quality are valued.</p>
    </div>
    <div class="card static-card">
      <div class="role-head">
        <div class="icon-box"><?php echo proofix_icon('scale-balanced.svg'); ?></div>
        <h3>Our Work Culture</h3>
      </div>
      <p>At Proofix, we value:</p>
      <ul class="check-list">
        <li>Research integrity and academic ethics.</li>
        <li>Quality, accuracy, and attention to detail.</li>
        <li>Collaboration and knowledge sharing.</li>
        <li>Professional responsibility and transparency.</li>
        <li>Continuous improvement and innovation.</li>
      </ul>
      <p class="note">We are committed to responsible research support and do not encourage plagiarism, fabricated results, or misrepresentation of academic authorship.</p>
    </div>
  </div>
</section>

<section class="section" id="apply">
  <div class="container">
    <div class="card static-card apply-box">
      <div class="section-head">
        <span class="eyebrow">How to apply</span>
        <h2>Share your resume with us</h2>
        <p class="lead">Interested candidates can share their updated resume or CV along with a brief introduction highlighting their qualifications, technical skills, research experience, and areas of expertise.</p>
      </div>
      <div class="apply-details">
        <div class="apply-item">
          <div class="icon-box"><?php echo proofix_icon('envelope.svg'); ?></div>
          <div><small>Email</small><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div>
        </div>
        <div class="apply-item">
          <div class="icon-box"><?php echo proofix_icon('file-signature.svg'); ?></div>
          <div><small>Subject line</small><strong>Career Application &ndash; [Position / Area of Expertise]</strong></div>
        </div>
      </div>
      <p class="apply-foot">Our team will review suitable applications and contact shortlisted candidates when relevant opportunities are available.</p>
      <div class="apply-actions">
        <a class="btn btn-accent" href="<?php echo esc_url(proofix_career_mailto('[Position / Area of Expertise]')); ?>"><?php echo proofix_icon('paper-plane.svg'); ?> Email Your CV</a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cta-band">
      <div>
        <h2>Let's Grow Together</h2>
        <p>Your knowledge can contribute to meaningful research. Your skills can create new possibilities. Your ideas can help shape the future.</p>
        <p><strong>Join Proofix Technologies and be part of a team driven by research, technology, and innovation.</strong></p>
      </div>
      <div class="actions"><a class="btn btn-accent" href="#apply">Apply Now</a></div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
