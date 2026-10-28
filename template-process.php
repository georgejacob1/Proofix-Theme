<?php

/**
 * * Template Name: Our Process
 *
 */

get_header();

get_template_part('include/page-banner', null, array(
  'title'   => 'Structured Approach to Research Support',
  'text'    => 'A clear understanding of your requirement, a transparent plan, expert support and collaborative refinement.',
  'current' => 'Our Process',
));

?>

<section class="section soft">
  <div class="container" style="max-width:960px">
    <div class="timeline">
      <div class="phase">
        <div class="badge">1</div>
        <div class="card">
          <span class="label">Phase 1</span>
          <h3>Share Your Research Requirement</h3>
          <p>The process begins when you share your research requirement with us. You can provide details about your research area, current stage, objectives, challenges, and the type of support you are looking for.</p>
          <p><strong style="color:var(--ink)">To help us understand your requirement better, you may share information such as:</strong></p>
          <ul class="check-list two-col">
            <li>Research domain or subject area</li>
            <li>Research topic or tentative title</li>
            <li>Current stage of research</li>
            <li>Research objectives</li>
            <li>Specific challenges or requirements</li>
            <li>Available documents or materials</li>
            <li>Institutional or journal guidelines, where applicable</li>
            <li>Expected timeline</li>
          </ul>
          <div class="note-box">The more clearly we understand your research requirement, the better we can identify the appropriate support approach.</div>
        </div>
      </div>
      <div class="phase">
        <div class="badge">2</div>
        <div class="card">
          <span class="label">Phase 2</span>
          <h3>Requirement Assessment</h3>
          <p>Once we receive your requirement, our team reviews the scope of the research and identifies the type of academic, technical, analytical, or editorial support that may be required.</p>
          <p><strong style="color:var(--ink)">During this stage, we focus on understanding:</strong></p>
          <ul class="check-list two-col">
            <li>The research problem and objectives</li>
            <li>The current progress of the project</li>
            <li>Required methodology or technical approach</li>
            <li>Data and analysis requirements</li>
            <li>Documentation requirements</li>
            <li>Expected deliverables</li>
            <li>Project complexity and scope</li>
          </ul>
          <div class="note-box">If additional clarification is required, we may discuss the requirement with you to ensure a clear understanding before proceeding.</div>
        </div>
      </div>
      <div class="phase">
        <div class="badge">3</div>
        <div class="card">
          <span class="label">Phase 3</span>
          <h3>Research Planning</h3>
          <div class="tagline">Creating a Clear Support Roadmap</div>
          <p>After understanding the requirements, a structured plan is developed based on the agreed scope of support.</p>
          <p><strong style="color:var(--ink)">The research support plan may include:</strong></p>
          <ul class="check-list two-col">
            <li>Identification of key tasks</li>
            <li>Development of a structured workflow</li>
            <li>Selection of appropriate methods or approaches</li>
            <li>Definition of project milestones</li>
            <li>Identification of required inputs and resources</li>
            <li>Planning of review and feedback stages</li>
          </ul>
          <div class="note-box">A clear plan helps transform a complex research requirement into manageable stages.</div>
        </div>
      </div>
      <div class="phase">
        <div class="badge">4</div>
        <div class="card">
          <span class="label">Phase 4</span>
          <h3>Expert Support &amp; Development</h3>
          <div class="tagline">Moving from Plan to Progress</div>
          <p>Based on the nature of the project, relevant academic, technical, analytical, or editorial support is provided.</p>
          <p><strong style="color:var(--ink)">Depending on the agreed scope, this stage may involve:</strong></p>
          <ul class="check-list two-col">
            <li>Research proposal or synopsis support</li>
            <li>Literature review organization</li>
            <li>Methodology development</li>
            <li>Technical research implementation</li>
            <li>Data analysis and statistical support</li>
            <li>Model or framework development</li>
            <li>Thesis and dissertation structuring</li>
            <li>Research manuscript improvement</li>
            <li>Academic editing and proofreading</li>
            <li>Publication-readiness support</li>
          </ul>
          <div class="note-box">Throughout the process, the focus remains on maintaining clarity, consistency, and alignment with the agreed research objectives.</div>
        </div>
      </div>
      <div class="phase">
        <div class="badge">5</div>
        <div class="card">
          <span class="label">Phase 5</span>
          <h3>Review &amp; Quality Check</h3>
          <div class="tagline">Refining for Quality and Consistency</div>
          <p>Before completing each stage, the work is reviewed based on the applicable project requirements.</p>
          <p><strong style="color:var(--ink)">The review may focus on:</strong></p>
          <ul class="check-list two-col">
            <li>Alignment with research objectives</li>
            <li>Logical structure and consistency</li>
            <li>Methodological clarity</li>
            <li>Technical accuracy</li>
            <li>Analytical interpretation</li>
            <li>Academic language and presentation</li>
            <li>Formatting requirements</li>
            <li>Citation and reference consistency</li>
          </ul>
          <div class="note-box">Quality is not just about completing a task — it is about ensuring that the work is clear, structured, and aligned with its intended purpose.</div>
        </div>
      </div>
      <div class="phase">
        <div class="badge">6</div>
        <div class="card">
          <span class="label">Phase 6</span>
          <h3>Feedback &amp; Refinement</h3>
          <div class="tagline">Improving Through Collaboration</div>
          <p>Research often evolves through discussion, feedback, and refinement. Based on the agreed scope of support, feedback can be incorporated to improve clarity, structure, and overall quality.</p>
          <p><strong style="color:var(--ink)">This stage may include:</strong></p>
          <ul class="check-list two-col">
            <li>Addressing relevant feedback</li>
            <li>Clarifying research-related questions</li>
            <li>Revising agreed sections</li>
            <li>Refining analysis or presentation</li>
            <li>Improving structure and consistency</li>
            <li>Incorporating applicable institutional, supervisor, editor, or reviewer feedback</li>
          </ul>
          <div class="note-box">Our objective is to support a constructive refinement process while maintaining the agreed project scope and requirements.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('include/cta-band', null, array(
  'title' => 'Ready for Phase 1?',
  'text'  => 'Share your research requirement and we will take it from there.',
)); ?>

<?php get_footer(); ?>
