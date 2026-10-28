<?php

/**
 * * Template Name: Research Domains
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Supporting Research Across Multiple Disciplines',
  'text'    => 'Every research domain has its own challenges, methodologies, tools, data requirements, and academic expectations.',
  'current' => 'Research Domains',
));

?>

<section class="section domain-section">
  <div class="container">
    <article class="domain-block" id="domain-engineering">
      <div>
        <div class="icon-box amber"><?php echo proofix_icon('gears.svg'); ?></div>
        <h2 style="font-size:1.7rem">Engineering &amp; Technology</h2>
        <p>Engineering and technology research often requires a combination of theoretical knowledge, technical implementation, experimentation, simulation, and performance evaluation.</p>
        <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode('Engineering & Technology'), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
      </div>
      <div>
        <p><strong style="color:var(--ink)">We support research in areas such as:</strong></p>
        <div class="chips">
          <span class="chip">Computer Science and Engineering</span>
          <span class="chip">Electronics and Communication Engineering</span>
          <span class="chip">Electrical and Electronics Engineering</span>
          <span class="chip">Mechanical Engineering</span>
          <span class="chip">Civil Engineering</span>
          <span class="chip">Information Technology</span>
          <span class="chip">Industrial and Production Engineering</span>
          <span class="chip">Robotics and Automation</span>
          <span class="chip">Embedded Systems</span>
          <span class="chip">Internet of Things</span>
          <span class="chip">Renewable Energy and Sustainable Technologies</span>
        </div>
      </div>
    </article>
    <article class="domain-block" id="domain-cs-it">
      <div>
        <div class="icon-box amber"><?php echo proofix_icon('laptop-code.svg'); ?></div>
        <h2 style="font-size:1.7rem">Computer Science &amp; Information Technology</h2>
        <p>Computer Science research continues to evolve through emerging technologies, intelligent systems, computational models, and data-driven approaches.</p>
        <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode('Computer Science & Information Technology'), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
      </div>
      <div>
        <p><strong style="color:var(--ink)">We support research areas including:</strong></p>
        <div class="chips">
          <span class="chip">Artificial Intelligence</span>
          <span class="chip">Machine Learning</span>
          <span class="chip">Deep Learning</span>
          <span class="chip">Data Science</span>
          <span class="chip">Computer Vision</span>
          <span class="chip">Natural Language Processing</span>
          <span class="chip">Cloud Computing</span>
          <span class="chip">Cybersecurity</span>
          <span class="chip">Blockchain</span>
          <span class="chip">Software Engineering</span>
          <span class="chip">Big Data Analytics</span>
          <span class="chip">Distributed Systems</span>
          <span class="chip">Human-Computer Interaction</span>
        </div>
        <div class="note-box">Our support focuses on helping researchers develop structured research workflows, technical models, evaluation strategies, and effective academic documentation.</div>
      </div>
    </article>
    <article class="domain-block" id="domain-ai-ml">
      <div>
        <div class="icon-box amber"><?php echo proofix_icon('brain.svg'); ?></div>
        <h2 style="font-size:1.7rem">Artificial Intelligence &amp; Machine Learning</h2>
        <p>Artificial Intelligence and Machine Learning research requires careful problem formulation, data preparation, model selection, training, testing, and evaluation.</p>
        <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode('Artificial Intelligence & Machine Learning'), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
      </div>
      <div>
        <p><strong style="color:var(--ink)">Proofix provides support for research involving:</strong></p>
        <div class="chips">
          <span class="chip">Supervised and unsupervised learning</span>
          <span class="chip">Deep Learning architectures</span>
          <span class="chip">Convolutional Neural Networks</span>
          <span class="chip">Recurrent Neural Networks</span>
          <span class="chip">Transformers</span>
          <span class="chip">Generative AI</span>
          <span class="chip">Explainable AI</span>
          <span class="chip">Reinforcement Learning</span>
          <span class="chip">Graph Neural Networks</span>
          <span class="chip">Federated Learning</span>
          <span class="chip">Computer Vision applications</span>
          <span class="chip">Intelligent decision-support systems</span>
        </div>
      </div>
    </article>
    <article class="domain-block" id="domain-datascience">
      <div>
        <div class="icon-box amber"><?php echo proofix_icon('chart-line.svg'); ?></div>
        <h2 style="font-size:1.7rem">Data Science &amp; Analytics</h2>
        <p>Data-driven research plays an important role across scientific, technical, business, healthcare, and social domains.</p>
        <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode('Data Science & Analytics'), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
      </div>
      <div>
        <p><strong style="color:var(--ink)">We support research involving:</strong></p>
        <div class="chips">
          <span class="chip">Data mining</span>
          <span class="chip">Predictive analytics</span>
          <span class="chip">Statistical modelling</span>
          <span class="chip">Pattern recognition</span>
          <span class="chip">Business analytics</span>
          <span class="chip">Big data analysis</span>
          <span class="chip">Time-series analysis</span>
          <span class="chip">Data visualization</span>
          <span class="chip">Decision analytics</span>
          <span class="chip">Classification and clustering</span>
        </div>
        <div class="note-box">Our assistance helps researchers structure the analytical process and communicate meaningful insights from complex datasets.</div>
      </div>
    </article>
    <article class="domain-block" id="domain-management">
      <div>
        <div class="icon-box amber"><?php echo proofix_icon('briefcase.svg'); ?></div>
        <h2 style="font-size:1.7rem">Management &amp; Business Research</h2>
        <p>Management research explores organizational behaviour, business strategy, finance, marketing, operations, innovation, and decision-making.</p>
        <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode('Management & Business Research'), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
      </div>
      <div>
        <p><strong style="color:var(--ink)">Research domains may include:</strong></p>
        <div class="chips">
          <span class="chip">Human Resource Management</span>
          <span class="chip">Marketing Management</span>
          <span class="chip">Financial Management</span>
          <span class="chip">Strategic Management</span>
          <span class="chip">Operations Management</span>
          <span class="chip">Organizational Behaviour</span>
          <span class="chip">Entrepreneurship</span>
          <span class="chip">Consumer Behaviour</span>
          <span class="chip">Digital Business</span>
          <span class="chip">Supply Chain Management</span>
          <span class="chip">Business Analytics</span>
          <span class="chip">Innovation Management</span>
        </div>
        <div class="note-box">We provide structured support for research design, literature organization, survey planning, statistical analysis, interpretation, and academic presentation.</div>
      </div>
    </article>
    <article class="domain-block" id="domain-healthcare">
      <div>
        <div class="icon-box amber"><?php echo proofix_icon('heart-pulse.svg'); ?></div>
        <h2 style="font-size:1.7rem">Healthcare &amp; Medical Research</h2>
        <p>Healthcare research involves complex datasets, clinical observations, diagnostic methods, predictive models, medical imaging, and evidence-based analysis.</p>
        <a class="link-arrow" href="<?php echo esc_url(add_query_arg('domain', rawurlencode('Healthcare & Medical Research'), proofix_url('contact'))); ?>">Enquire for this domain <?php echo proofix_icon('arrow-right.svg'); ?></a>
      </div>
      <div>
        <p><strong style="color:var(--ink)">Relevant areas may include:</strong></p>
        <div class="chips">
          <span class="chip">Healthcare Analytics</span>
          <span class="chip">Medical Imaging</span>
          <span class="chip">Disease Prediction</span>
          <span class="chip">Clinical Data Analysis</span>
          <span class="chip">Digital Health</span>
          <span class="chip">Biomedical Signal Processing</span>
          <span class="chip">Health Informatics</span>
          <span class="chip">Medical Artificial Intelligence</span>
          <span class="chip">Public Health Research</span>
          <span class="chip">Healthcare Management</span>
        </div>
        <div class="note-box">Support is provided with an emphasis on research methodology, data analysis, technical implementation, and academic documentation.</div>
      </div>
    </article>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Working in a niche area?',
  'text'  => 'We also support interdisciplinary research. Tell us about your field.',
)); ?>

<?php get_footer(); ?>
