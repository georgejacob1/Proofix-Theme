<?php

/**
 * * Template Name: Contact Page
 *
 */

get_header();

$contact  = proofix_contact();
$services = proofix_services();
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
              <?php foreach (proofix_items('research_domain') as $domain) {
                $domain_title = get_the_title($domain); ?>
                <option value="<?php echo esc_attr(wp_strip_all_tags($domain_title)); ?>"><?php echo esc_html(wp_strip_all_tags($domain_title)); ?></option>
              <?php } ?>
              <option value="Other">Other</option>
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
	  <?php
      $phone = get_field('phone', 8);
      $whatsapp   = get_field('whatsapp', 8);
      $mail = get_field('mail_id', 8);
	  ?>		
    <aside class="side-box">
      <h3>Prefer a quicker way?</h3>
      <p>If you are busy and out of time, just drop a "Hi" on WhatsApp. Our consultant shall connect back at the earliest and schedule a consultation with a Subject Matter Expert from your domain.</p>
		<?php if (!empty($whatsapp)) { 
		$whatsapp_link = preg_replace('/[^0-9]/', '', $whatsapp);  ?>
      <a class="btn btn-whatsapp btn-block" href="<?php echo esc_url('https://wa.me/' . $whatsapp_link . '?text=' . rawurlencode('Hi Proofix')); ?>" target="_blank" rel="noopener"><?php echo proofix_icon('whatsapp.svg'); ?> Say "Hi" on WhatsApp</a>
		<?php } ?>
      <div style="margin-top:20px">
		 <?php if (!empty($mail)) { ?>
        <div class="contact-item">
          <div class="icon-box"><?php echo proofix_icon('envelope.svg'); ?></div>
          <div><small>Email</small><a href="mailto:<?php echo esc_attr($mail); ?>"><?php echo esc_html($mail); ?></a></div>
        </div>
		  <?php } ?>
		  <?php if (!empty($phone)) { 
		   $tel = preg_replace('/[^0-9+]/', '', $phone); ?>
        <div class="contact-item">
          <div class="icon-box"><?php echo proofix_icon('phone.svg'); ?></div>
          <div><small>Phone</small><a href="tel:<?php echo esc_attr($tel); ?>"><?php echo esc_html($phone); ?></a></div>
        </div>
		  <?php } ?>
      </div>
    </aside>
  </div>
</section>

<?php get_footer(); ?>
