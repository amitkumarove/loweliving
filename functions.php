<?php

define('WP_SLICK_JS', false);
define('WP_SLICK_CSS', false);

function imageDir($return = false){
    if($return) {
        return get_stylesheet_directory_uri().'/images';
    }
    else {
        echo get_stylesheet_directory_uri().'/images';
    }
}

function both_or_all($num_options) {
    return ($num_options == 2 ? 'Both' : 'All');
}

function enqueue_scripts() {
    // Dequeue scripts
    wp_deregister_script('jquery');
    wp_dequeue_script('jquery');

    // Third-party styles
    wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
    wp_enqueue_style('ekko-lightbox', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.min.css');
    wp_enqueue_style('select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css');

    // Our styles
    wp_enqueue_style('main-style', get_template_directory_uri().'/dist/css/main.min.css');
    

    // Third-party scripts
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-2.2.4.min.js', '', '', true);
    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', '', '', true);
    wp_enqueue_script('slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', '', '', true);
    wp_enqueue_script('googlemapAPI', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCPn6PtzHMlq1pr6pW-5uXaKxxR0Iii4nI');
    wp_enqueue_script('ekko-lightbox', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.min.js', '', '', true);
    wp_enqueue_script('select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', '', '', true);
    wp_enqueue_script('isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', '', '', true);
    wp_enqueue_script('vimeo', '//player.vimeo.com/api/player.js', '', '', true);

    // Our scripts
    //wp_enqueue_script('plugin-script', get_template_directory_uri().'/dist/js/plugins.min.js', '','', true);
    wp_enqueue_script('main-script', get_template_directory_uri().'/dist/js/main.min.js', '','', true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function enqueue_inline_scripts() {
?>
<script>
window.MSInputMethodContext && document.documentMode && document.write('<script src="https://cdn.jsdelivr.net/gh/nuxodin/ie11CustomProperties@4.1.0/ie11CustomProperties.min.js"><\x2fscript>');
</script>
<?php
}
add_action('wp_enqueue_scripts', 'enqueue_inline_scripts');


function register_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'register_theme_support');

function register_image_sizes() {
    //add_image_size('banner', 1440, 0, false);
    add_image_size('fullwidth', 1920, 0, false);
    add_image_size('xswidth', 768, 0, false);

    add_image_size('banner', 1920, 768, true);
    add_image_size('banner-mobile', 744, 768, true);

    add_image_size('square-thumbnail-mobile', 290, 288, true);
    add_image_size('latest-project-mobile', 290, 221, true);

    add_image_size('latest-project', 263, 201, true);
    add_image_size('latest-news', 560, 420, true);

    add_image_size('service-icon', 55, 0, false);
    add_image_size('services-heading', 750, 358, true);

    //add_image_size('profile-photo', 263, 265, true);
    add_image_size('profile-photo', 342, 512, true);
    add_image_size('partner-image', 750, 358, true);

    add_image_size('project-image', 560, 420, true);
    add_image_size('project-logo', 325, 0, false);
    add_image_size('project-gallery', 0, 265, false);

    add_image_size('news-thumbnail', 789, 795, true);

    add_image_size('staff-photo', 800, 1000, true);
    add_image_size('staff-photo-square', 650, 650, array('center', 'top'));
    add_image_size('partner-photo-square', 651, 651, true); // seperate crop position from staff-photo-square

    add_image_size('post-featured', 1200, 675, true);
}
add_action('after_setup_theme', 'register_image_sizes');

function register_menus() {
    //register_nav_menu('header-menu', 'Header Menu');
    register_nav_menu('header-menu', 'Header Menu');
    register_nav_menu('footer-menu', 'Footer Menu');
}
add_action('init', 'register_menus');

function register_widget_sidebars() {
    /*register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));*/
}
add_action('widgets_init', 'register_widget_sidebars');

function register_post_types() {
    /*register_post_type('project', array(
        'labels'        => array(
            'name'               => __( 'Projects' ),
            'singular_name'      => __( 'Project' ),
            'add_new'            => __( 'Add New' ),
            'add_new_item'       => __( 'Add New Project' ),
            'edit_item'          => __( 'Edit Project' ),
            'new_item'           => __( 'New Project' ),
            'all_items'          => __( 'All Projects' ),
            'view_item'          => __( 'View Project' ),
            'search_items'       => __( 'Search Project' ),
            'not_found'          => __( 'No Projects found' ),
            'not_found_in_trash' => __( 'No Projects found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Projects'
        ),
        'public'        => true,
        'supports'      => array( 'title', 'editor' ),
        'taxonomies'    => array('category'),
        'has_archive'   => 'projects',
        'menu_icon'     => 'dashicons-hammer',
        'rewrite'       => array('slug' => 'project', 'with_front' => true),
    ));*/

    register_post_type('project', array(
        'labels'        => array(
            'name'               => __( 'Projects' ),
            'singular_name'      => __( 'Project' ),
            'add_new'            => __( 'Add New' ),
            'add_new_item'       => __( 'Add New Project' ),
            'edit_item'          => __( 'Edit Project' ),
            'new_item'           => __( 'New Project' ),
            'all_items'          => __( 'All Projects' ),
            'view_item'          => __( 'View Project' ),
            'search_items'       => __( 'Search Project' ),
            'not_found'          => __( 'No Projects found' ),
            'not_found_in_trash' => __( 'No Projects found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Projects'
        ),
        'public'        => true,
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'taxonomies'    => array('project-division', 'project-status'),
        'has_archive'   => 'projects',
        'menu_icon'     => 'dashicons-hammer',
        'rewrite'       => array('slug' => 'project', 'with_front' => true),
    ));
}
add_action('init', 'register_post_types');

function register_taxonomies() {
    /*register_taxonomy('project-status', array('project'), array(
        'labels'            => array(
            'name'              => _x( 'Project Statuses', 'taxonomy general name' ),
            'singular_name'     => _x( 'Project Status', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Project Statuses' ),
            'all_items'         => __( 'All Project Statuses' ),
            'parent_item'       => __( 'Parent Project Status' ),
            'parent_item_colon' => __( 'Parent Project Status:' ),
            'edit_item'         => __( 'Edit Project Status' ),
            'update_item'       => __( 'Update Project Status' ),
            'add_new_item'      => __( 'Add New Project Status' ),
            'new_item_name'     => __( 'New Project Status Name' ),
            'menu_name'         => __( 'Project Statuses' ),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
    ));*/

    register_taxonomy('project-division', array('project'), array(
        'labels'            => array(
            'name'              => _x( 'Project Divisions', 'taxonomy general name' ),
            'singular_name'     => _x( 'Project Division', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Project Divisions' ),
            'all_items'         => __( 'All Project Divisions' ),
            'parent_item'       => __( 'Parent Project Division' ),
            'parent_item_colon' => __( 'Parent Project Division:' ),
            'edit_item'         => __( 'Edit Project Division' ),
            'update_item'       => __( 'Update Project Division' ),
            'add_new_item'      => __( 'Add New Project Division' ),
            'new_item_name'     => __( 'New Project Division Name' ),
            'menu_name'         => __( 'Project Divisions' ),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
    ));
    
    register_taxonomy('project-status', array('project'), array(
        'labels'            => array(
            'name'              => _x( 'Project Statuses', 'taxonomy general name' ),
            'singular_name'     => _x( 'Project Status', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Project Statuses' ),
            'all_items'         => __( 'All Project Statuses' ),
            'parent_item'       => __( 'Parent Project Status' ),
            'parent_item_colon' => __( 'Parent Project Status:' ),
            'edit_item'         => __( 'Edit Project Status' ),
            'update_item'       => __( 'Update Project Status' ),
            'add_new_item'      => __( 'Add New Project Status' ),
            'new_item_name'     => __( 'New Project Status Name' ),
            'menu_name'         => __( 'Project Statuses' ),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
    ));
}
add_action('init', 'register_taxonomies');


if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Project Options',
        'post_id' => 'projects',
        'parent_slug' => 'edit.php?post_type=project',
    ));

    acf_add_options_page(array(
        'page_title' => 'Theme Options',
    ));

    acf_add_options_page(array(
        'page_title' => 'Blog Options',
        'post_id' => 'blog',
        'parent_slug' => 'edit.php',
    ));
}

function setup_acf() {
    acf_update_setting('google_api_key', 'AIzaSyCPn6PtzHMlq1pr6pW-5uXaKxxR0Iii4nI');
}
add_action('acf/init', 'setup_acf');

function register_rewrite_rules() {
    //add_rewrite_rule('^projects/([^/]+)/?$', 'index.php?post_type=project&project_status=$matches[1]]', 'top');
}
add_action('init', 'register_rewrite_rules');

function register_query_vars($vars) {
    //$vars[] = 'project_status';

    return $vars;
}
add_action('query_vars', 'register_query_vars');


function is_blog () {
    return (is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}

// remove p around img
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Customise login logo
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/header-logo.png') !important;
            padding-bottom: 0px !important;
            background-size: contain !important;
            background-position: center !important;
            height: 52px !important;
            width: 237px !important;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

// Hide all mandrill dashboard stuff
function sp_remove_wpmandrill_dashboard() {
if ( class_exists( 'wpMandrill' ) ) {
remove_action( 'wp_dashboard_setup', array( 'wpMandrill' , 'addDashboardWidgets' ) );
}
}
add_action( 'admin_init', 'sp_remove_wpmandrill_dashboard' );
function remove_menus(){
  remove_submenu_page( 'index.php','wpmandrill-reports' );
}
add_action( 'admin_menu', 'remove_menus' );

function print_favicons() {
    $dir = imageDir(true).'/favicon';

    ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $dir; ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $dir; ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $dir; ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $dir; ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $dir; ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $dir; ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $dir; ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $dir; ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $dir; ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= $dir; ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $dir; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $dir; ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $dir; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= $dir; ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#30343a">
    <meta name="msapplication-TileImage" content="<?= $dir; ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#30343a">
    <?php
}
add_action('wp_head', 'print_favicons');

function remove_admin_pages() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_admin_pages');

function add_search_to_header_menu($items) {
    ob_start();
    include get_template_directory().'/partials/search-box.php';
    $html = ob_get_clean();

    return $items.$html;
}
add_filter('wp_nav_menu_header-menu_items', 'add_search_to_header_menu');

function add_mobile_close_to_header_menu($items) {
    $html = '<li class="visible-xs close-menu"><button type="button" data-toggle="menu"><img src="'.imageDir(true).'/hamburger_close.svg" alt="Close"/></button></li>';

    return $html.$items;
}
//add_filter('wp_nav_menu_header-menu_items', 'add_mobile_close_to_header_menu');

function add_tinymce_colours($settings) {
    $colours = array(
        '000000' => 'Black',
        'FFFFFF' => 'White',
        'e09f7e' => 'Lowe Living',
        '007dc1' => 'Lowe Create',
    );

    if(!empty($colours)) {
        $map = array();
        foreach($colours as $value => $label) {
            $map[] = '"'.$value.'","'.$label.'"';
        }

        $settings['textcolor_map'] = '['.implode($map, ',').']';
    }

    return $settings;
}
add_filter('tiny_mce_before_init', 'add_tinymce_colours');


function lp_add_mce_styleselect($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'lp_add_mce_styleselect');

function lp_add_mce_styles($init_array) {
    $style_formats = array(
        array(  
            'title' => 'Smaller H2',
            'selector' => 'h2',
            'inline' => 'span',
            'classes' => 'intro-h2'
        ),
    );

    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;
} 
add_filter('tiny_mce_before_init', 'lp_add_mce_styles');



// Filter the main queries
function filter_get_posts($query) {
    if(!is_admin()) {
        if($query->is_main_query() && $query->is_post_type_archive('project')) {
            $query->set('posts_per_page', -1);
        }

        if($query->is_main_query() && $query->is_home()) {
            if(get_field('featured_article', 'blog') && get_post_status(get_field('featured_article', 'blog')) == 'publish') {
                $query->set('post__not_in', array(get_field('featured_article', 'blog')));

                if($query->get('paged') < 2) {
                    $query->set('posts_per_page', get_option('posts_per_page') - 2);
                }
            }
        }
    }

    return $query;
}
add_filter('pre_get_posts', 'filter_get_posts');

// Reroute inaccessible pages to 404
/*function reroute_to_404($template) {
    if(get_field('page_inaccessible')) {
        return locate_template('404.php');
    }
    else {
        return $template;
    }
}
add_filter('template_include', 'reroute_to_404');*/

function media_sizes_dropdown( $sizes ) {
    $sizes['fullwidth'] = 'Container width';

    return $sizes;
}
add_filter('image_size_names_choose', 'media_sizes_dropdown');

function ajax_load_more(){
    if(!isset($_GET['paged']) || !is_numeric($_GET['paged'])) {
        die('false');
    }

    if(!isset($_GET['queryvars'])) {
        die('false');
    }

    $_GET['ishome'] = (isset($_GET['ishome']) ? filter_var($_GET['ishome'], FILTER_VALIDATE_BOOLEAN) : false);

    $args = json_decode(stripslashes($_GET['queryvars']));
    $args = array_merge((array) $args, array(
        'offset' => ((get_option('posts_per_page') * ($_GET['paged'] - 1)) - (get_field('featured_article', 'blog') && $_GET['ishome'] ? 1 : 0)),
        'post__not_in' => array((get_field('featured_article', 'blog') && $_GET['ishome'] ? get_field('featured_article', 'blog') : -1)),
    ));

    $query = new WP_Query($args);

    $template = locate_template('partials/post.php');
    $news_size = 'news-thumbnail';

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();

            print '<div class="latest-article">';
                include $template;
            print '</div>';
        }
    }

    exit();
}
add_action('wp_ajax_nopriv_load_more', 'ajax_load_more');
add_action('wp_ajax_load_more', 'ajax_load_more');

function ajax_project_enquiry() {
    if(!isset($_POST['project']) || !is_numeric($_POST['project'])) {
        die('invalid project');
    }

    $project = get_post(absint($_POST['project']));
    if(!$project) {
        die('unknown project');
    }

    // Take in the fields
    $fields = array(
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'mobile' => '',
        'sub-disclaimer' => 'false',
    );
    
    foreach($_POST as $key => $value) {
        if(isset($fields[$key]) && is_string($value)) {
            $fields[$key] = $value;
        }
    }

    // get list ids for CM
    if(get_field('campaign_monitor_list', $project->ID)){

        require 'lib/createsend/csrest_subscribers.php';

        $auth = array('api_key' => '2fd5e02e07442922fc26cfc86e329e96');

        $list_id = get_field('campaign_monitor_list', $project->ID); // [Project] Opt In

        $lowe_id = '08a2489c9e748ba0155d4037a3c4c269'; // Lowe Group General

        $list_ids[] = $list_id;

       if($fields['sub-disclaimer'] !== 'false'){
            $list_ids[] = $lowe_id;
        }

        foreach ($list_ids as $key => $this_id) {
            if(trim($this_id)){
                $wrap = new CS_REST_Subscribers(trim($this_id), $auth);
                $result = $wrap->add(array(
                    'EmailAddress' => $fields['email'],
                    'Name' => $fields['first_name'].' '.$fields['last_name'],
                    'CustomFields' => array(
                        array(
                            'Key' => 'Telephone',
                            'Value' => $fields['mobile']
                        ),
                    ),
                    'Resubscribe' => true
                ));
            }
        }
    }

    // Send agent emails
    $emails = get_field('agent_emails', $project->ID);
    if(!$emails || empty($emails)) {
        $emails = array();
    }
    $emails = array_map(function($e) {
        return $e['email_address'];
    }, $emails);

    $emails[] = get_field('default_agent_email', 'options');

    $message = 'A new enquiry has been submitted from the Lowe website:<br/><br/>';
    $message .= 'First Name: '.$fields['first_name'].'<br/>'.
        'Last Name: '.$fields['last_name'].'<br/>'.
        'Phone: '.$fields['mobile'].'<br/>'.
        'Email: '.$fields['email'].'<br />'.
        'Project: '.$project->post_title.' ('.get_permalink($project).')';

    wp_mail($emails, 'Project Enquiry', $message, array('Reply-To: '.$fields['email'], 'Content-type: text/html'));


     // Send thankyou email
    $body = file_get_contents(wp_upload_dir()['basedir'].'/wpcf7-edms/Lowe_Group_Contact/index.html');
    $body = str_replace('[wpcf7-edm-path]', wp_upload_dir()['baseurl'].'/wpcf7-edms/Lowe_Group_Contact', $body);

   wp_mail($fields['email'], 'Thank you for contacting Lowe Living', $body, array('Reply-To: '.get_field('default_agent_email', 'options'), 'From: Lowe Group <info@lowegroup.com.au>', 'Content-type: text/html'));


    // Add to salesforce
    $salesforce_id = get_field('salesforce_id', $project->ID);
    if($salesforce_id) {
        // Add the stuff for Salesforce
        $fields['oid'] = '00D28000001ywil';
        $fields['retURL'] = get_site_url();
        $fields['00N2800000IZMKV'] = 'Web Form'; // ???
        $fields['00N2800000IZMKu'] = 'Lowe Website'; // Enquiry source
        $fields['00N2800000IZML4'] = get_site_url(); // Web form url
        $fields['00N2800000IZML9'] = $salesforce_id;

        if($fields['sub-disclaimer'] !== 'false'){
            $fields['00N0I00000K9eAM'] = 1;
        }

        // Build a query string
        $fields_encoded = implode('&', array_map(function($k, $v) {
            return $k.'='.urlencode($v);
        }, array_keys($fields), $fields));

        // Build a request
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8');
        curl_setopt($curl, CURLOPT_POST, count($fields));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_encoded);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
    }
}
add_action('wp_ajax_nopriv_project_enquiry', 'ajax_project_enquiry');
add_action('wp_ajax_project_enquiry', 'ajax_project_enquiry');

function contact_salesforce($form) {
    // Fields
    $submission = WPCF7_Submission::get_instance();
    $data = $submission->get_posted_data();

    if(!$data['nosalesforce']){
        $fields = array(
            'orgid' => '00D28000001ywil',
            'retURL' => get_site_url(),
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'description' => $data['enquiry'],
        );

        $fields_encoded = implode('&', array_map(function($k, $v) {
            return $k.'='.urlencode($v);
        }, array_keys($fields), $fields));

        // Build a request
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8');
        curl_setopt($curl, CURLOPT_POST, count($fields));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_encoded);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
    }

}
add_action('wpcf7_before_send_mail', 'contact_salesforce');

function subscribe_skip_mail($form){
    $formID = $_POST['_wpcf7'];

    // 10 & 232 are the subscribe forms
    if($formID == 10 || $formID == 232){
        return true; 
    }
}
add_filter('wpcf7_skip_mail','subscribe_skip_mail'); 


require 'lib/cm_ajax.php';

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function theme_get_archives_link($link_html) {
    preg_match ("/value='(.+?)'/", $link_html, $url);
    $requested = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($requested == $url[1]) {
        $link_html = str_replace("<option", "<option selected='selected'", $link_html);
    }
    return $link_html;
}
add_filter('get_archives_link', 'theme_get_archives_link');

function set_posts_per_page( $query ) {
    if (!is_admin() && $query->is_main_query() && ($query->is_home() || $query->is_category())) {
        $query->set('posts_per_page', 6);
    }
    return $query;
}
add_action( 'pre_get_posts',  'set_posts_per_page'  );


function filter_lsep($value) {
    if(is_string($value)) {
        $value = str_replace(hex2bin('e280a9'), '', $value);
        $value = str_replace(hex2bin('e280a8'), '', $value);
    }
    return $value;
}
add_filter('the_title', 'filter_lsep', 10, 1);
add_filter('the_content', 'filter_lsep', 10, 1);
add_filter('acf/format_value', 'filter_lsep', 10, 1);

function get_video_embed_html($embed) {
    if($embed && strpos($embed, 'vimeo') !== false) {
        preg_match('/src="(.+?)"/', $embed, $matches);
        $src = $matches[1];

        $params = array(
            'autoplay' => 1,
            'loop' => 1,
            'muted' => 1,
            'background' => 1,
            'autopause' => 0
        );
        $new_src = add_query_arg($params, $src);
        $embed = str_replace($src, $new_src, $embed);

        // Add extra attributes to iframe HTML.
        $attributes = 'frameborder="0" allow="autoplay; fullscreen" allowfullscreen';
        $embed = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $embed);
    }

    return $embed;
}

function responsive_embeds( $content ) {
    $content = preg_replace( "/<iframe.+?src=\"(.+?)\"/Si", '<div class="embed-container"><iframe src="\1" frameborder="0" allowfullscreen>', $content );
    $content = preg_replace( "/<\/iframe>/Si", '</iframe></div>', $content );

    return $content;
}
add_filter('the_content', 'responsive_embeds');
add_filter('acf_the_content', 'responsive_embeds');