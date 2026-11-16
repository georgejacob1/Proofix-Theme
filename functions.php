<?php
define('TEMPLATE_URL', get_template_directory_uri() . '/');

function proofix_setup()
{
  load_theme_textdomain('proofix');

  add_theme_support('title-tag');

  add_theme_support('post-thumbnails');

  add_image_size('proofix-blog-thumb', 800, 450, true);

  add_image_size('proofix-blog-cover', 1200, 700, true);

  add_theme_support('html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

  register_nav_menus(array(
    'top' => __('Top Menu', 'proofix'),
  ));
}
add_action('after_setup_theme', 'proofix_setup');


/* ---------------------------------------------------------------
 * Site constants / helpers
 * ------------------------------------------------------------- */

// Page slugs used by the header, footer and call-to-action buttons.
// Create WordPress pages with these slugs and assign the matching template.
function proofix_url($key)
{
  $slugs = array(
    'about'    => 'about-us',
    'process'  => 'process',
    'domains'  => 'research-domains',
    'faq'      => 'faq',
    'services' => 'services',
    'blogs'    => 'blogs',
    'careers'  => 'careers',
    'contact'  => 'contact-us',
  );

  if ($key === 'home') {
    return home_url('/');
  }

  return isset($slugs[$key]) ? home_url('/' . $slugs[$key] . '/') : home_url('/');
}

function proofix_contact()
{
  return array(
    'email'    => 'jacobgeorge399@gmail.com',
    'phone'    => '+91 91875 59443',
    'tel'      => '+919187559443',
    'whatsapp' => 'https://wa.me/919187559443',
  );
}

function proofix_icon($name, $class = 'icon')
{
  return '<img class="' . esc_attr($class) . '" src="' . esc_url(TEMPLATE_URL . 'assets/images/icon/' . $name) . '" alt="">';
}

function proofix_services()
{
  return get_posts(array(
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'orderby'        => array('menu_order' => 'ASC', 'title' => 'ASC'),
    'posts_per_page' => -1,
  ));
}

// Published items of any listed post type (faq, research_domain, process):
// by Order field first, then newest first (same as the wp-admin list).
function proofix_items($post_type)
{
  return get_posts(array(
    'post_type'      => $post_type,
    'post_status'    => 'publish',
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
    'posts_per_page' => -1,
  ));
}

// Previous / next service in menu order, wrapping around at the ends.
function proofix_adjacent_service($post_id, $direction)
{
  return proofix_adjacent_in(proofix_services(), $post_id, $direction);
}

// Previous / next post within a list, wrapping around at the ends.
function proofix_adjacent_in($posts, $post_id, $direction)
{
  $ids = wp_list_pluck($posts, 'ID');
  $index = array_search($post_id, $ids);

  if ($index === false || count($posts) < 2) {
    return null;
  }

  $count = count($posts);
  $target = ($direction === 'prev') ? ($index - 1 + $count) % $count : ($index + 1) % $count;

  return $posts[$target];
}

// Non-empty lines of an ACF Textarea field (one item per line).
function proofix_lines($post_id, $field)
{
  return array_values(array_filter(array_map('trim', preg_split('/\R/', (string) get_post_meta($post_id, $field, true)))));
}

// Address applications go to: the contact page's "mail_id" field, or the default.
function proofix_careers_email()
{
  $mail = function_exists('get_field') ? get_field('mail_id', 8) : '';

  return is_email($mail) ? $mail : 'proofix.tech@gmail.com';
}

// mailto: link with the "Career Application – <position>" subject filled in.
function proofix_career_mailto($position)
{
  return 'mailto:' . proofix_careers_email() . '?subject=' . rawurlencode('Career Application – ' . $position);
}

function proofix_read_time($post_id)
{
  $minutes = (int) get_post_meta($post_id, 'blog_read_time', true);

  return $minutes > 0 ? $minutes . ' min read' : '';
}

// Service icon <img>: the ACF "Service Icon" image, or the default theme icon.
function proofix_service_icon($post_id)
{
  return proofix_field_icon($post_id, 'service_icon');
}

// <img> for an ACF Image field holding an icon (service_icon, domain_icon),
// or the default theme icon when nothing is uploaded.
function proofix_field_icon($post_id, $field)
{
  $url = wp_get_attachment_url((int) get_post_meta($post_id, $field, true));

  if (!$url) {
    return proofix_icon('file-signature.svg');
  }

  return '<img class="icon" src="' . esc_url($url) . '" alt="">';
}

// Hero <h1> from one ACF text field ("hero_title") on the front page.
// Markers: {avatars} = the avatar image group, *text* = italic accent.
// e.g. "Empowering {avatars} Research. *Enabling Excellence.*"
function proofix_hero_title()
{
  $title = trim((string) get_post_meta((int) get_option('page_on_front'), 'hero_title', true));

  if ($title === '') {
    $title = 'Empowering {avatars} Research. *Enabling Excellence.*';
  }

  $avatars = '<span class="avatars">'
    . '<img src="https://proofix.in/wp-content/uploads/2026/11/aiony-haust-3TLl_97HNJo-unsplash-1-scaled.jpg" alt="avatar">'
    . '<img src="https://proofix.in/wp-content/uploads/2026/11/alex-suprun-ZHvM3XIOHoE-unsplash-1-2-scaled.jpg" alt="avatar">'
    . '<img src="https://proofix.in/wp-content/uploads/2026/11/md-mahdi-YyxoZEP6gCw-unsplash-1-scaled.jpg" alt="avatar">'
    . '</span>';

  $html = esc_html($title);
  $html = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $html);

  return str_replace('{avatars}', $avatars, $html);
}


/* ---------------------------------------------------------------
 * Assets
 * ------------------------------------------------------------- */

function proofix_assets_js_css()
{
  $version = 1000000001;

  wp_enqueue_style('proofix-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null);
  wp_enqueue_style('proofix-common', get_template_directory_uri() . '/css/common.css', array(), $version);

  if (is_front_page()) {
    wp_enqueue_style('proofix-home', get_template_directory_uri() . '/css/home.css', array(), $version);
    wp_enqueue_style('proofix-services', get_template_directory_uri() . '/css/services.css', array(), $version);
    wp_enqueue_style('proofix-blogs', get_template_directory_uri() . '/css/blogs.css', array(), $version);
    wp_enqueue_style('proofix-faq', get_template_directory_uri() . '/css/faq.css', array(), $version);
  } elseif (is_singular('service')) {
    wp_enqueue_style('proofix-service-detail', get_template_directory_uri() . '/css/service-detail.css', array(), $version);
  } elseif (is_singular('career')) {
    wp_enqueue_style('proofix-service-detail', get_template_directory_uri() . '/css/service-detail.css', array(), $version);
    wp_enqueue_style('proofix-careers', get_template_directory_uri() . '/css/careers.css', array(), $version);
  } elseif (is_page_template('template-careers.php')) {
    wp_enqueue_style('proofix-careers', get_template_directory_uri() . '/css/careers.css', array(), $version);
  } elseif (is_page_template('template-services.php')) {
    wp_enqueue_style('proofix-services', get_template_directory_uri() . '/css/services.css', array(), $version);
  } elseif (is_singular('blog') || is_page_template('template-blogs.php')) {
    wp_enqueue_style('proofix-blogs', get_template_directory_uri() . '/css/blogs.css', array(), $version);
  } elseif (is_page_template('template-about.php')) {
    wp_enqueue_style('proofix-about', get_template_directory_uri() . '/css/about.css', array(), $version);
  } elseif (is_page_template('template-contact.php')) {
    wp_enqueue_style('proofix-contact', get_template_directory_uri() . '/css/contact.css', array(), $version);
  } elseif (is_page_template('template-faq.php')) {
    wp_enqueue_style('proofix-faq', get_template_directory_uri() . '/css/faq.css', array(), $version);
  } elseif (is_page_template('template-process.php')) {
    wp_enqueue_style('proofix-process', get_template_directory_uri() . '/css/process.css', array(), $version);
  } elseif (is_page_template('template-research-domains.php')) {
    wp_enqueue_style('proofix-research-domains', get_template_directory_uri() . '/css/research-domains.css', array(), $version);
  } elseif (is_404()) {
    wp_enqueue_style('proofix-404', get_template_directory_uri() . '/css/404.css', array(), $version);
  }

  wp_enqueue_script('proofix-main', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime(get_template_directory() . '/js/main.js'), true);

  $contact = proofix_contact();
  wp_localize_script('proofix-main', 'proofix', array(
    'iconUrl'  => TEMPLATE_URL . 'assets/images/icon/',
    'whatsapp' => $contact['whatsapp'],
    'ajaxUrl'  => admin_url('admin-ajax.php'),
    'nonce'    => wp_create_nonce('proofix_contact'),
  ));
}
add_action('wp_enqueue_scripts', 'proofix_assets_js_css');

function proofix_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'proofix_mime_types');


/* ---------------------------------------------------------------
 * Custom post types (no taxonomies)
 * ------------------------------------------------------------- */

function proofix_register_post_types()
{
  register_post_type('service', array(
    'labels' => array(
      'name'               => __('Services', 'proofix'),
      'singular_name'      => __('Service', 'proofix'),
      'add_new_item'       => __('Add New Service', 'proofix'),
      'edit_item'          => __('Edit Service', 'proofix'),
      'all_items'          => __('All Services', 'proofix'),
      'search_items'       => __('Search Services', 'proofix'),
      'not_found'          => __('No services found.', 'proofix'),
    ),
    'public'        => true,
    'has_archive'   => false,
    'rewrite'       => array('slug' => 'service', 'with_front' => false),
    'menu_icon'     => 'dashicons-welcome-learn-more',
    'menu_position' => 20,
    'supports'      => array('title', 'editor', 'excerpt', 'page-attributes'),
    'show_in_rest'  => true,
  ));

  register_post_type('blog', array(
    'labels' => array(
      'name'               => __('Blogs', 'proofix'),
      'singular_name'      => __('Blog', 'proofix'),
      'add_new_item'       => __('Add New Blog', 'proofix'),
      'edit_item'          => __('Edit Blog', 'proofix'),
      'all_items'          => __('All Blogs', 'proofix'),
      'search_items'       => __('Search Blogs', 'proofix'),
      'not_found'          => __('No blogs found.', 'proofix'),
    ),
    'public'        => true,
    'has_archive'   => false,
    'rewrite'       => array('slug' => 'blog', 'with_front' => false),
    'menu_icon'     => 'dashicons-edit-page',
    'menu_position' => 21,
    'supports'      => array('title', 'editor', 'excerpt', 'thumbnail'),
    'show_in_rest'  => true,
  ));

  // Career openings: listed on the Careers page (template-careers.php),
  // each with its own detail page at /career/<slug>/.
  register_post_type('career', array(
    'labels' => array(
      'name'               => __('Careers', 'proofix'),
      'singular_name'      => __('Career', 'proofix'),
      'add_new_item'       => __('Add New Opening', 'proofix'),
      'edit_item'          => __('Edit Opening', 'proofix'),
      'all_items'          => __('All Openings', 'proofix'),
      'search_items'       => __('Search Openings', 'proofix'),
      'not_found'          => __('No openings found.', 'proofix'),
    ),
    'public'        => true,
    'has_archive'   => false,
    'rewrite'       => array('slug' => 'career', 'with_front' => false),
    'menu_icon'     => 'dashicons-businessperson',
    'menu_position' => 25,
    // Editor = intro paragraphs on the detail page; Order = listing order.
    'supports'      => array('title', 'editor', 'page-attributes'),
    'show_in_rest'  => true,
  ));

  // FAQ, Research Domain and Process items are only listed on their pages
  // (faq, research-domains, process), so they get no single URLs of their own.
  // That also keeps them from clashing with those page slugs.
  $listed_only = array(
    'public'             => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => false,
    'publicly_queryable' => false,
    'exclude_from_search' => true,
    'has_archive'        => false,
    'rewrite'            => false,
    'query_var'          => false,
    'show_in_rest'       => true,
  );

  register_post_type('faq', array_merge($listed_only, array(
    'labels' => array(
      'name'               => __('FAQs', 'proofix'),
      'singular_name'      => __('FAQ', 'proofix'),
      'add_new_item'       => __('Add New FAQ', 'proofix'),
      'edit_item'          => __('Edit FAQ', 'proofix'),
      'all_items'          => __('All FAQs', 'proofix'),
      'search_items'       => __('Search FAQs', 'proofix'),
      'not_found'          => __('No FAQs found.', 'proofix'),
    ),
    'menu_icon'     => 'dashicons-editor-help',
    'menu_position' => 22,
    // Question / answer come from ACF; Order = display order.
    'supports'      => array('title', 'page-attributes'),
  )));

  register_post_type('research_domain', array_merge($listed_only, array(
    'labels' => array(
      'name'               => __('Research Domains', 'proofix'),
      'singular_name'      => __('Research Domain', 'proofix'),
      'add_new_item'       => __('Add New Research Domain', 'proofix'),
      'edit_item'          => __('Edit Research Domain', 'proofix'),
      'all_items'          => __('All Research Domains', 'proofix'),
      'search_items'       => __('Search Research Domains', 'proofix'),
      'not_found'          => __('No research domains found.', 'proofix'),
    ),
    'menu_icon'     => 'dashicons-portfolio',
    'menu_position' => 23,
    'supports'      => array('title', 'page-attributes'), // Everything else comes from ACF.
  )));

  register_post_type('process', array_merge($listed_only, array(
    'labels' => array(
      'name'               => __('Process Steps', 'proofix'),
      'singular_name'      => __('Process Step', 'proofix'),
      'add_new_item'       => __('Add New Process Step', 'proofix'),
      'edit_item'          => __('Edit Process Step', 'proofix'),
      'all_items'          => __('All Process Steps', 'proofix'),
      'search_items'       => __('Search Process Steps', 'proofix'),
      'not_found'          => __('No process steps found.', 'proofix'),
    ),
    'menu_icon'     => 'dashicons-list-view',
    'menu_position' => 24,
    'supports'      => array('title', 'page-attributes'), // Everything else comes from ACF.
  )));
}
add_action('init', 'proofix_register_post_types');

// Title placeholder on the FAQ edit screen.
function proofix_title_placeholder($title, $post)
{
  return $post->post_type === 'faq' ? __('Add question', 'proofix') : $title;
}
add_filter('enter_title_here', 'proofix_title_placeholder', 10, 2);

function proofix_rewrite_flush()
{
  proofix_register_post_types();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'proofix_rewrite_flush');


/* Blog featured image box */
function proofix_add_meta_boxes()
{
  remove_meta_box('postimagediv', 'blog', 'side');
  add_meta_box('postimagediv', __('Featured Image <br> Best Proportion: 1200 px x 700 px'), 'post_thumbnail_meta_box', 'blog', 'side', 'low');
}
add_action('add_meta_boxes', 'proofix_add_meta_boxes');


/* ---------------------------------------------------------------
 * Header menu (Appearance > Menus > "Header Menu")
 * ------------------------------------------------------------- */

class Proofix_Menu_Walker extends Walker_Nav_Menu
{
  private $open_groups = array();

  private function is_active($item)
  {
    $classes = (array) $item->classes;

    return in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes) || in_array('current-menu-parent', $classes);
  }

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '<div class="menu">';
  }

  function end_lvl(&$output, $depth = 0, $args = null)
  {
    $output .= '</div>';
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $title = apply_filters('the_title', $item->title, $item->ID);

    // Top-level item with a sub menu: a button that toggles the dropdown.
    if ($depth === 0 && $args->walker->has_children) {
      $this->open_groups[$item->ID] = true;
      $active = $this->is_active($item) ? ' active' : '';

      $output .= '<div class="has-menu"><button class="nav-link' . $active . '" aria-haspopup="true">' . esc_html($title) . ' ' . proofix_icon('chevron-down.svg') . '</button>';
      return;
    }

    $class = '';
    if ($depth === 0) {
      $class = 'nav-link' . ($this->is_active($item) ? ' active' : '');
    }

    $target = !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $rel    = $item->target === '_blank' ? ' rel="noopener"' : '';

    $output .= '<a' . ($class ? ' class="' . esc_attr($class) . '"' : '') . ' href="' . esc_url($item->url) . '"' . $target . $rel . '>' . esc_html($title) . '</a>';
  }

  function end_el(&$output, $item, $depth = 0, $args = null)
  {
    if (isset($this->open_groups[$item->ID])) {
      unset($this->open_groups[$item->ID]);
      $output .= '</div>';
    }
  }
}

// Shown until a menu named "Header Menu" exists in wp-admin.
function proofix_menu_fallback()
{
  $services = proofix_services();
?>
  <a class="nav-link<?php echo is_front_page() ? ' active' : ''; ?>" href="<?php echo esc_url(proofix_url('home')); ?>">Home</a>
  <a class="nav-link<?php echo is_page_template('template-about.php') ? ' active' : ''; ?>" href="<?php echo esc_url(proofix_url('about')); ?>">About Us</a>
  <div class="has-menu"><button class="nav-link<?php echo (is_page_template('template-services.php') || is_singular('service')) ? ' active' : ''; ?>" aria-haspopup="true">Services <?php echo proofix_icon('chevron-down.svg'); ?></button>
    <div class="menu">
      <a href="<?php echo esc_url(proofix_url('services')); ?>">All Services</a>
      <?php foreach ($services as $service) { ?>
        <a href="<?php echo esc_url(get_permalink($service->ID)); ?>"><?php echo esc_html($service->post_title); ?></a>
      <?php } ?>
    </div>
  </div>
  <div class="has-menu"><button class="nav-link<?php echo is_page_template('template-research-domains.php') ? ' active' : ''; ?>" aria-haspopup="true">Research Domains <?php echo proofix_icon('chevron-down.svg'); ?></button>
    <div class="menu">
      <a href="<?php echo esc_url(proofix_url('domains')); ?>">All Domains</a>
      <?php foreach (proofix_items('research_domain') as $domain) { ?>
        <a href="<?php echo esc_url(proofix_url('domains') . '#domain-' . $domain->post_name); ?>"><?php echo esc_html($domain->post_title); ?></a>
      <?php } ?>
    </div>
  </div>
  <a class="nav-link<?php echo is_page_template('template-process.php') ? ' active' : ''; ?>" href="<?php echo esc_url(proofix_url('process')); ?>">Our Process</a>
  <a class="nav-link<?php echo (is_page_template('template-blogs.php') || is_singular('blog')) ? ' active' : ''; ?>" href="<?php echo esc_url(proofix_url('blogs')); ?>">Blogs</a>
  <a class="nav-link<?php echo is_page_template('template-faq.php') ? ' active' : ''; ?>" href="<?php echo esc_url(proofix_url('faq')); ?>">FAQ</a>
<?php
}


/* ---------------------------------------------------------------
 * Footer menu (Appearance > Menus > "Footer Menu")
 * ------------------------------------------------------------- */

class Proofix_Footer_Menu_Walker extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth = 0, $args = null)
  {
  }

  function end_lvl(&$output, $depth = 0, $args = null)
  {
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $title  = apply_filters('the_title', $item->title, $item->ID);
    $target = !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $rel    = $item->target === '_blank' ? ' rel="noopener"' : '';

    $output .= '<li><a href="' . esc_url($item->url) . '"' . $target . $rel . '>' . esc_html($title) . '</a></li>';
  }

  function end_el(&$output, $item, $depth = 0, $args = null)
  {
  }
}

// Shown until a menu named "Footer Menu" exists in wp-admin.
function proofix_footer_menu_fallback()
{
?>
  <li><a href="<?php echo esc_url(proofix_url('about')); ?>">About Us</a></li>
  <li><a href="<?php echo esc_url(proofix_url('domains')); ?>">Research Domains</a></li>
  <li><a href="<?php echo esc_url(proofix_url('process')); ?>">Our Process</a></li>
  <li><a href="<?php echo esc_url(proofix_url('blogs')); ?>">Blogs</a></li>
  <li><a href="<?php echo esc_url(proofix_url('faq')); ?>">FAQ</a></li>
  <li><a href="<?php echo esc_url(proofix_url('careers')); ?>">Careers</a></li>
  <li><a href="<?php echo esc_url(proofix_url('contact')); ?>">Contact Us</a></li>
<?php
}


/* ---------------------------------------------------------------
 * Contact form: admin notification + thank-you mail to the sender
 * ------------------------------------------------------------- */
// Embed the logo in the message itself (cid:) so it shows even on localhost or with remote images blocked.
add_action('phpmailer_init', function ($phpmailer) {
  if (strpos($phpmailer->Body, 'cid:proofixlogo') !== false) {
    $phpmailer->addEmbeddedImage(get_template_directory() . '/assets/images/logo.png', 'proofixlogo', 'logo.png', 'base64', 'image/png');
  }
});

function proofix_mail_button($label, $url)
{
  return '<table role="presentation" cellpadding="0" cellspacing="0" style="margin:28px 0"><tr><td style="border-radius:10px;background:#3730A3">'
    . '<a href="' . esc_url($url) . '" style="display:inline-block;padding:13px 26px;font-size:15px;font-weight:600;color:#ffffff;text-decoration:none;border-radius:10px">' . esc_html($label) . '</a>'
    . '</td></tr></table>';
}

// Table-based, inline-styled layout so it renders in Gmail/Outlook/Apple Mail.
function proofix_mail_layout($content, $preheader, $site_name)
{
  $contact = proofix_contact();
  return '<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>'
    . '<body style="margin:0;padding:0;background:#F3F4F9;font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Helvetica,Arial,sans-serif">'
    . '<div style="display:none;max-height:0;overflow:hidden;opacity:0">' . esc_html($preheader) . '</div>'
    . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#F3F4F9"><tr><td align="center" style="padding:32px 16px">'
    . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(55,48,163,.08)">'
    . '<tr><td style="background:#ffffff;padding:24px 36px;border-bottom:4px solid #F59E0B"><img src="cid:proofixlogo" alt="' . esc_attr($site_name) . '" width="120" height="53" style="display:block;border:0;height:auto;max-width:120px"></td></tr>'
    . '<tr><td style="padding:36px">' . $content . '</td></tr>'
    . '<tr><td style="padding:22px 36px;background:#F9FAFB;border-top:1px solid #EEF0F6;font-size:12px;line-height:1.6;color:#6B7280">'
    . esc_html($site_name) . ' &middot; <a href="mailto:' . esc_attr($contact['email']) . '" style="color:#3730A3;text-decoration:none">' . esc_html($contact['email']) . '</a> &middot; ' . esc_html($contact['phone'])
    . '</td></tr></table></td></tr></table></body></html>';
}

function proofix_contact_submit()
{
  check_ajax_referer('proofix_contact', 'nonce');

  // Honeypot: bots fill this, humans never see it.
  if (!empty($_POST['website'])) {
    wp_send_json_success();
  }

  $name    = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
  $email   = sanitize_email(wp_unslash($_POST['email'] ?? ''));
  $phone   = sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
  $domain  = sanitize_text_field(wp_unslash($_POST['domain'] ?? ''));
  $stage   = sanitize_text_field(wp_unslash($_POST['stage'] ?? ''));
  $service = sanitize_text_field(wp_unslash($_POST['service'] ?? ''));
  $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));

  if ($name === '' || $phone === '' || $domain === '' || $stage === '') {
    wp_send_json_error(array('message' => 'Please complete all required fields.'), 400);
  }
  if (!is_email($email)) {
    wp_send_json_error(array('message' => 'Please enter a valid email address.'), 400);
  }
  if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $phone)) {
    wp_send_json_error(array('message' => 'Please enter a valid phone number.'), 400);
  }

  $contact   = proofix_contact();
  $site_name = get_bloginfo('name');
  $admin     = $contact['email'];
  $headers   = array('Content-Type: text/html; charset=UTF-8');

  $rows = array(
    'Name'     => $name,
    'Email'    => $email,
    'Phone'    => $phone,
    'Domain'   => $domain,
    'Stage'    => $stage,
    'Service'  => $service,
    'Message'  => $message,
  );
  $table = '';
  foreach ($rows as $label => $value) {
    if ($value === '') {
      continue;
    }
    $table .= '<tr>'
      . '<td style="padding:12px 0;border-bottom:1px solid #EEF0F6;width:130px;vertical-align:top;font-size:12px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;color:#6B7280">' . esc_html($label) . '</td>'
      . '<td style="padding:12px 0;border-bottom:1px solid #EEF0F6;vertical-align:top;font-size:15px;line-height:1.5;color:#111827">' . nl2br(esc_html($value)) . '</td></tr>';
  }
  $details = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse">' . $table . '</table>';

  // 1. Admin notification (Reply-To = the enquirer).
  $admin_headers   = $headers;
  $admin_headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
  $admin_body = '<h1 style="margin:0 0 8px;font-size:22px;line-height:1.3;color:#111827">New consultation request</h1>'
    . '<p style="margin:0 0 24px;font-size:15px;line-height:1.6;color:#4B5563"><strong>' . esc_html($name) . '</strong> just submitted the contact form on ' . esc_html($site_name) . '.</p>'
    . $details
    . proofix_mail_button('Reply to ' . $name, 'mailto:' . $email);
  $sent = wp_mail(
    $admin,
    'New consultation request from ' . $name,
    proofix_mail_layout($admin_body, 'New enquiry from ' . $name, $site_name),
    $admin_headers
  );

  if (!$sent) {
    wp_send_json_error(array('message' => 'We could not send your request right now. Please try WhatsApp or email us directly.'), 500);
  }

  // 2. Thank-you mail to the sender.
  $thanks = '<h1 style="margin:0 0 8px;font-size:24px;line-height:1.3;color:#111827">Thank you, ' . esc_html($name) . '!</h1>'
    . '<p style="margin:0 0 24px;font-size:15px;line-height:1.7;color:#4B5563">We have received your requirement. Our consultant will connect with you at the earliest and schedule a consultation with a subject matter expert from your domain.</p>'
    . '<p style="margin:0 0 4px;font-size:13px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#3730A3">Your submission</p>'
    . $details
    . '<p style="margin:24px 0 0;font-size:15px;line-height:1.7;color:#4B5563">In a hurry? Message us on WhatsApp and we will get back to you quickly.</p>'
    . proofix_mail_button('Chat on WhatsApp', $contact['whatsapp'] . '?text=Hi')
    . '<p style="margin:0;font-size:13px;color:#6B7280">Or call us at ' . esc_html($contact['phone']) . ' / reply to this email.</p>';
  $thanks_headers   = $headers;
  $thanks_headers[] = 'Reply-To: ' . $admin;
  wp_mail($email, 'Thank you for contacting ' . $site_name, proofix_mail_layout($thanks, 'We have received your requirement.', $site_name), $thanks_headers);

  wp_send_json_success();
}
add_action('wp_ajax_proofix_contact', 'proofix_contact_submit');
add_action('wp_ajax_nopriv_proofix_contact', 'proofix_contact_submit');

// Use the classic editor instead of the block editor.
add_filter('use_block_editor_for_post', '__return_false', 100);
add_filter('use_block_editor_for_post_type', '__return_false', 100);


/* ---------- Branded wp-login & wp-admin ---------- */
function proofix_admin_brand_css() {
  $logo = esc_url(get_template_directory_uri() . '/assets/images/logo.png');
  ?>
  <style>
    :root { --pf-primary:#3730A3; --pf-primary-dark:#312E81; --pf-soft:#EEF0FF; }

    /* Login page */
    body.login { background: linear-gradient(135deg, #EEF0FF 0%, #F7F8FF 100%); }
    body.login #login h1 a {
      background-image: url('<?php echo $logo; ?>');
      background-size: contain; background-repeat: no-repeat; background-position: center;
      width: 100%; max-width: 240px; height: 80px;
    }
    body.login form {
      border: 0; border-radius: 12px; padding: 26px;
      box-shadow: 0 10px 30px rgba(55,48,163,.12);
    }
    body.login input:focus { border-color: var(--pf-primary); box-shadow: 0 0 0 1px var(--pf-primary); }
    body.login .button-primary {
      background: var(--pf-primary); border-color: var(--pf-primary);
      border-radius: 8px; text-shadow: none; box-shadow: none;
    }
    body.login .button-primary:hover, body.login .button-primary:focus {
      background: var(--pf-primary-dark); border-color: var(--pf-primary-dark);
    }
    body.login #nav a, body.login #backtoblog a { color: var(--pf-primary); }

    /* Admin area */
    #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap { background: var(--pf-primary-dark); }
    #adminmenu li.menu-top:hover, #adminmenu li.opensub > a.menu-top,
    #adminmenu li > a.menu-top:focus { background: var(--pf-primary); }
    #adminmenu li.current a.menu-top, #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,
    #adminmenu a.wp-has-current-submenu { background: var(--pf-primary); }
    #wpadminbar { background: var(--pf-primary-dark); }
    #adminmenu .wp-submenu a:hover, #adminmenu .wp-submenu a:focus { color: #fff; }
    .wp-core-ui .button-primary { background: var(--pf-primary); border-color: var(--pf-primary); }
    .wp-core-ui .button-primary:hover { background: var(--pf-primary-dark); border-color: var(--pf-primary-dark); }
    a { color: var(--pf-primary); }
    #wp-admin-bar-wp-logo > .ab-item .ab-icon:before { content: none; }
    #wp-admin-bar-wp-logo > .ab-item .ab-icon {
      background: url('<?php echo $logo; ?>') center/contain no-repeat; width: 40px; height: 32px;
    }
  </style>
  <?php
}
add_action('login_enqueue_scripts', 'proofix_admin_brand_css');
add_action('admin_head', 'proofix_admin_brand_css');

add_filter('login_headerurl', function () { return home_url('/'); });
add_filter('login_headertext', function () { return get_bloginfo('name'); });

/* ---------- Favicon (front end, login, admin) ---------- */
function proofix_favicon() {
  // Drop assets/images/favicon.png in to override the logo fallback.
  $file = file_exists(get_template_directory() . '/assets/images/favicon.png') ? 'favicon.png' : 'logo.png';
  $url  = esc_url(get_template_directory_uri() . '/assets/images/' . $file);
  echo '<link rel="icon" type="image/png" href="' . $url . '">' . "\n";
  echo '<link rel="apple-touch-icon" href="' . $url . '">' . "\n";
}
add_action('wp_head', 'proofix_favicon', 1);
add_action('login_head', 'proofix_favicon');
add_action('admin_head', 'proofix_favicon');
// Stop WordPress from also printing its default site icon/WP favicon.
remove_action('wp_head', 'wp_site_icon', 99);
