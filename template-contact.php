<?php

/**
 * * Template Name: Contact Page
 *
 */

get_header();

$contact  = proofix_contact();
$services = proofix_services();
$domains  = proofix_domains();
$stages   = array('Topic Selection & Basepaper Finalization', 'Proposal & Synopsis Preparation', 'Literature Review', 'Research Methodology', 'Data Analysis & Statistics', 'Thesis / Dissertation Writing', 'Manuscript Preparation', 'Journal Submission / Reviewer Revision');

get_template_part('include/page-banner', null, array(
  'title'   => 'Book a Consultation',
  'text'    => 'Fill in the form and our consultant will connect back at the earliest.',
  'current' => 'Contact Us',
));

?>

<section class="section soft">
  <div class="container contact-layout">
    <div class="card form-card">
      <h2 style="font-size:1.6rem">Tell us about your research</h2>
      <form id="contactLeadForm" novalidate>
        <div class="form-row">
          <div class="form-group"><label for="fullName">Full Name *</label><input class="form-input" id="fullName" type="text" autocomplete="name" placeholder="Your name"></div>
          <div class="form-group"><label for="emailAddr">Email *</label><input class="form-input" id="emailAddr" type="email" autocomplete="email" placeholder="you@university.edu"></div>
        </div>
        <div class="form-row">
          <div class="form-group"><label for="phoneNum">Phone *</label><input class="form-input" id="phoneNum" type="tel" autocomplete="tel" placeholder="+91 98765 43210"></div>
          <div class="form-group"><label for="inquiryDomain">Research Domain *</label>
            <select class="form-select" id="inquiryDomain">
              <option value="">Select domain</option>
              <?php foreach ($domains as $domain) { ?>
                <option value="<?php echo esc_attr($domain['title']); ?>"><?php echo esc_html($domain['title']); ?></option>
              <?php } ?>
              <option value="Interdisciplinary / Other">Interdisciplinary / Other</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group"><label for="researchStage">Current Stage *</label>
            <select class="form-select" id="researchStage">
              <option value="">Select stage</option>
              <?php foreach ($stages as $stage) { ?>
                <option value="<?php echo esc_attr($stage); ?>"><?php echo esc_html($stage); ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group"><label for="inquiryService">Service Needed</label>
            <select class="form-select" id="inquiryService">
              <option value="General Guidance">General Guidance</option>
              <?php foreach ($services as $service) { ?>
                <option value="<?php echo esc_attr($service->post_name); ?>"><?php echo esc_html($service->post_title); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group"><label for="inquiryMessage">Message</label><textarea class="form-textarea" id="inquiryMessage" placeholder="Research topic, challenges, guidelines, expected timeline…"></textarea></div>
        <div style="position:absolute;left:-9999px" aria-hidden="true"><label for="website">Website</label><input id="website" type="text" tabindex="-1" autocomplete="off"></div>
        <p class="form-error" id="formError" role="alert">Please complete the required fields with a valid email.</p>
        <button class="btn btn-accent btn-block" type="submit">Submit Requirement <?php echo proofix_icon('arrow-right.svg'); ?></button>
      </form>
      <div class="form-success" id="formSuccessBox" aria-live="polite"></div>
    </div>
    <aside class="side-box">
      <h3>Prefer a quicker way?</h3>
      <p>If you are busy and out of time, just drop a "Hi" on WhatsApp. Our consultant shall connect back at the earliest and schedule a consultation with a Subject Matter Expert from your domain.</p>
      <a class="btn btn-whatsapp btn-block" href="<?php echo esc_url($contact['whatsapp'] . '?text=Hi'); ?>" target="_blank" rel="noopener"><?php echo proofix_icon('whatsapp.svg'); ?> Say "Hi" on WhatsApp</a>
      <div style="margin-top:20px">
        <div class="contact-item">
          <div class="icon-box"><?php echo proofix_icon('envelope.svg'); ?></div>
          <div><small>Email</small><a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></div>
        </div>
        <div class="contact-item">
          <div class="icon-box"><?php echo proofix_icon('phone.svg'); ?></div>
          <div><small>Phone</small><a href="tel:<?php echo esc_attr($contact['tel']); ?>"><?php echo esc_html($contact['phone']); ?></a></div>
        </div>
      </div>
    </aside>
  </div>
</section>

<?php get_footer(); ?>
