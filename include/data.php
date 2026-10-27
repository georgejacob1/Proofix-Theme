<?php
// Static content shared by more than one template.

// Seed content for the "research-domain" post type (imported once, then edited in wp-admin).
function proofix_default_domains()
{
  return array(
    array(
      'id'    => 'domain-engineering',
      'icon'  => 'gears.svg',
      'title' => 'Engineering & Technology',
      'text'  => 'Engineering and technology research often requires a combination of theoretical knowledge, technical implementation, experimentation, simulation, and performance evaluation.',
      'lead'  => 'We support research in areas such as:',
      'chips' => array('Computer Science and Engineering', 'Electronics and Communication Engineering', 'Electrical and Electronics Engineering', 'Mechanical Engineering', 'Civil Engineering', 'Information Technology', 'Industrial and Production Engineering', 'Robotics and Automation', 'Embedded Systems', 'Internet of Things', 'Renewable Energy and Sustainable Technologies'),
      'note'  => '',
    ),
    array(
      'id'    => 'domain-cs-it',
      'icon'  => 'laptop-code.svg',
      'title' => 'Computer Science & Information Technology',
      'text'  => 'Computer Science research continues to evolve through emerging technologies, intelligent systems, computational models, and data-driven approaches.',
      'lead'  => 'We support research areas including:',
      'chips' => array('Artificial Intelligence', 'Machine Learning', 'Deep Learning', 'Data Science', 'Computer Vision', 'Natural Language Processing', 'Cloud Computing', 'Cybersecurity', 'Blockchain', 'Software Engineering', 'Big Data Analytics', 'Distributed Systems', 'Human-Computer Interaction'),
      'note'  => 'Our support focuses on helping researchers develop structured research workflows, technical models, evaluation strategies, and effective academic documentation.',
    ),
    array(
      'id'    => 'domain-ai-ml',
      'icon'  => 'brain.svg',
      'title' => 'Artificial Intelligence & Machine Learning',
      'text'  => 'Artificial Intelligence and Machine Learning research requires careful problem formulation, data preparation, model selection, training, testing, and evaluation.',
      'lead'  => 'Proofix provides support for research involving:',
      'chips' => array('Supervised and unsupervised learning', 'Deep Learning architectures', 'Convolutional Neural Networks', 'Recurrent Neural Networks', 'Transformers', 'Generative AI', 'Explainable AI', 'Reinforcement Learning', 'Graph Neural Networks', 'Federated Learning', 'Computer Vision applications', 'Intelligent decision-support systems'),
      'note'  => '',
    ),
    array(
      'id'    => 'domain-datascience',
      'icon'  => 'chart-line.svg',
      'title' => 'Data Science & Analytics',
      'text'  => 'Data-driven research plays an important role across scientific, technical, business, healthcare, and social domains.',
      'lead'  => 'We support research involving:',
      'chips' => array('Data mining', 'Predictive analytics', 'Statistical modelling', 'Pattern recognition', 'Business analytics', 'Big data analysis', 'Time-series analysis', 'Data visualization', 'Decision analytics', 'Classification and clustering'),
      'note'  => 'Our assistance helps researchers structure the analytical process and communicate meaningful insights from complex datasets.',
    ),
    array(
      'id'    => 'domain-management',
      'icon'  => 'briefcase.svg',
      'title' => 'Management & Business Research',
      'text'  => 'Management research explores organizational behaviour, business strategy, finance, marketing, operations, innovation, and decision-making.',
      'lead'  => 'Research domains may include:',
      'chips' => array('Human Resource Management', 'Marketing Management', 'Financial Management', 'Strategic Management', 'Operations Management', 'Organizational Behaviour', 'Entrepreneurship', 'Consumer Behaviour', 'Digital Business', 'Supply Chain Management', 'Business Analytics', 'Innovation Management'),
      'note'  => 'We provide structured support for research design, literature organization, survey planning, statistical analysis, interpretation, and academic presentation.',
    ),
    array(
      'id'    => 'domain-healthcare',
      'icon'  => 'heart-pulse.svg',
      'title' => 'Healthcare & Medical Research',
      'text'  => 'Healthcare research involves complex datasets, clinical observations, diagnostic methods, predictive models, medical imaging, and evidence-based analysis.',
      'lead'  => 'Relevant areas may include:',
      'chips' => array('Healthcare Analytics', 'Medical Imaging', 'Disease Prediction', 'Clinical Data Analysis', 'Digital Health', 'Biomedical Signal Processing', 'Health Informatics', 'Medical Artificial Intelligence', 'Public Health Research', 'Healthcare Management'),
      'note'  => 'Support is provided with an emphasis on research methodology, data analysis, technical implementation, and academic documentation.',
    ),
  );
}

function proofix_faqs()
{
  return array(
    array('What research support services do you provide?', 'We provide comprehensive research support for PhD scholars, postgraduate students, and researchers, including research proposal and synopsis preparation, literature review, research methodology, data analysis, thesis and dissertation support, research paper writing, manuscript preparation, and publication guidance.'),
    array('Can you help me choose or refine my research topic?', 'Yes. We can help you evaluate your research idea, identify research gaps, refine the research problem, formulate objectives and research questions, and develop a clear and researchable topic aligned with your academic domain.'),
    array('Do you provide support with statistical analysis and interpretation?', 'Yes. We provide support for data preparation, statistical analysis, selection of appropriate tests, result interpretation, tables and graphical presentation, and discussion of findings using suitable statistical methodologies and software.'),
    array('Can you help with thesis and dissertation work?', 'Yes. We provide structured support across different stages of thesis and dissertation development, including chapter planning, literature review, methodology, analysis, results, discussion, formatting, referencing, proofreading, and overall academic presentation.'),
    array('Do you provide research publication support?', 'Yes. We assist researchers with manuscript preparation, journal selection, formatting, submission preparation, reviewer-response support, and publication strategy. Our focus is on helping researchers develop clear, rigorous, and academically sound research.'),
  );
}

function proofix_phases()
{
  return array(
    array(
      'title'   => 'Share Your Research Requirement',
      'tagline' => '',
      'intro'   => 'The process begins when you share your research requirement with us. You can provide details about your research area, current stage, objectives, challenges, and the type of support you are looking for.',
      'lead'    => 'To help us understand your requirement better, you may share information such as:',
      'items'   => array('Research domain or subject area', 'Research topic or tentative title', 'Current stage of research', 'Research objectives', 'Specific challenges or requirements', 'Available documents or materials', 'Institutional or journal guidelines, where applicable', 'Expected timeline'),
      'note'    => 'The more clearly we understand your research requirement, the better we can identify the appropriate support approach.',
      'short'   => 'The process begins when you share your research requirement with us.',
    ),
    array(
      'title'   => 'Requirement Assessment',
      'tagline' => '',
      'intro'   => 'Once we receive your requirement, our team reviews the scope of the research and identifies the type of academic, technical, analytical, or editorial support that may be required.',
      'lead'    => 'During this stage, we focus on understanding:',
      'items'   => array('The research problem and objectives', 'The current progress of the project', 'Required methodology or technical approach', 'Data and analysis requirements', 'Documentation requirements', 'Expected deliverables', 'Project complexity and scope'),
      'note'    => 'If additional clarification is required, we may discuss the requirement with you to ensure a clear understanding before proceeding.',
      'short'   => 'Once we receive your requirement, our team reviews the scope of the research and identifies the type of academic, technical, analytical, or editorial support that may be required.',
    ),
    array(
      'title'   => 'Research Planning',
      'tagline' => 'Creating a Clear Support Roadmap',
      'intro'   => 'After understanding the requirements, a structured plan is developed based on the agreed scope of support.',
      'lead'    => 'The research support plan may include:',
      'items'   => array('Identification of key tasks', 'Development of a structured workflow', 'Selection of appropriate methods or approaches', 'Definition of project milestones', 'Identification of required inputs and resources', 'Planning of review and feedback stages'),
      'note'    => 'A clear plan helps transform a complex research requirement into manageable stages.',
      'short'   => 'After understanding the requirements, a structured plan is developed based on the agreed scope of support.',
    ),
    array(
      'title'   => 'Expert Support & Development',
      'tagline' => 'Moving from Plan to Progress',
      'intro'   => 'Based on the nature of the project, relevant academic, technical, analytical, or editorial support is provided.',
      'lead'    => 'Depending on the agreed scope, this stage may involve:',
      'items'   => array('Research proposal or synopsis support', 'Literature review organization', 'Methodology development', 'Technical research implementation', 'Data analysis and statistical support', 'Model or framework development', 'Thesis and dissertation structuring', 'Research manuscript improvement', 'Academic editing and proofreading', 'Publication-readiness support'),
      'note'    => 'Throughout the process, the focus remains on maintaining clarity, consistency, and alignment with the agreed research objectives.',
      'short'   => 'Based on the nature of the project, relevant academic, technical, analytical, or editorial support is provided.',
    ),
    array(
      'title'   => 'Review & Quality Check',
      'tagline' => 'Refining for Quality and Consistency',
      'intro'   => 'Before completing each stage, the work is reviewed based on the applicable project requirements.',
      'lead'    => 'The review may focus on:',
      'items'   => array('Alignment with research objectives', 'Logical structure and consistency', 'Methodological clarity', 'Technical accuracy', 'Analytical interpretation', 'Academic language and presentation', 'Formatting requirements', 'Citation and reference consistency'),
      'note'    => 'Quality is not just about completing a task — it is about ensuring that the work is clear, structured, and aligned with its intended purpose.',
      'short'   => 'Before completing each stage, the work is reviewed based on the applicable project requirements.',
    ),
    array(
      'title'   => 'Feedback & Refinement',
      'tagline' => 'Improving Through Collaboration',
      'intro'   => 'Research often evolves through discussion, feedback, and refinement. Based on the agreed scope of support, feedback can be incorporated to improve clarity, structure, and overall quality.',
      'lead'    => 'This stage may include:',
      'items'   => array('Addressing relevant feedback', 'Clarifying research-related questions', 'Revising agreed sections', 'Refining analysis or presentation', 'Improving structure and consistency', 'Incorporating applicable institutional, supervisor, editor, or reviewer feedback'),
      'note'    => 'Our objective is to support a constructive refinement process while maintaining the agreed project scope and requirements.',
      'short'   => 'Research often evolves through discussion, feedback, and refinement.',
    ),
  );
}
