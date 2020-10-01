<?php

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

add_theme_support( 'title-tag' );

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_setup
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_setup() {
    add_theme_support('post-thumbnails');

    /* Navigation Menu */
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'the_theme'),
    ));

    /* Post Formats */
    add_theme_support('post-formats', array('aside', 'gallery', 'video'));
}
add_action("after_setup_theme", "the_theme_setup");

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_scripts
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_scripts(){
    wp_enqueue_style($handle = 'jquery-ui', $src = 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', $deps = array(), $ver = '1.12.1', $media = 'all');
    wp_enqueue_style($handle = 'bootstrap', $src = 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', $deps = array(), $ver = '4.5.2', $media = 'all');
    wp_enqueue_style($handle = 'font-awesome', $src = 'https://use.fontawesome.com/releases/v5.2.0/css/all.css', $deps = array(), $ver = '5.2.0', $media = 'all');
    wp_enqueue_style($handle = 'style', $src = get_stylesheet_uri(), $deps = array(), $ver = '', $media = 'all');
    
    wp_enqueue_script($handle = 'jquery', $src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', $deps = array(), $ver = '3.3.1', $in_footer=true);
    wp_enqueue_script($handle = 'jquery-ui', $src = 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', $deps = array(), $ver = '1.12.1', $in_footer=true);
    wp_enqueue_script($handle = 'jquery-isInViewport', $src = get_template_directory_uri().'/js/isInViewport.min.js', $deps = array(), $ver = '3.0.4', $in_footer=true);
    wp_enqueue_script($handle = 'proper', $src = 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', $deps = array(), $ver = '1.16.1', $in_footer=true);
    wp_enqueue_script($handle = 'bootstrap', $src = 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', $deps = array(), $ver = '4.5.2', $in_footer=true);
    wp_enqueue_script($handle = 'gsap', $src = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', $deps = array(), $ver = '3.5.1', $in_footer=true);
}
add_action('wp_enqueue_scripts', 'the_theme_scripts');

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name the_theme_fonts
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_fonts(){
    wp_register_style($handle = 'google-fonts', $src = 'https://fonts.googleapis.com/css2?family=Arapey&family=Open+Sans:wght@400;700&display=swap');
    wp_enqueue_style($handle = 'Arapey, serif, Open Sans, sans-serif');
}
add_action('wp_print_styles', 'the_theme_fonts');

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_widget_init
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_widget_init(){
    register_sidebar(array(
        "name"          => __('Copyright Text','the_theme'),
        'id'            => 'man-widget-1',
        'before_widget' => '<div class="man-widget-1">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="d-none">',
        'after_title'   => '</h4>'
    ));
}
add_action('widgets_init', 'the_theme_widget_init');

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_manage_social_links
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_manage_social_links(){
    add_menu_page(
        $page_title = 'Social Media', 
        $menu_title = 'Social Media', 
        $capability = 'manage_options', 
        $menu_slug  = 'social-media', 
        $function   = 'the_theme_manage_social_page_settings', 
        $icon_url   = null, 
        $position   = 99
    );
}
add_action('admin_menu','the_theme_manage_social_links');

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_manage_social_page_settings
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_manage_social_page_settings(){
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Social Media Management</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields($option_group = 'section');
                do_settings_sections($page = 'theme-options');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}
add_action('','the_theme_manage_social_page_settings');

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_social_twiiter
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_manage_social_links_twiiter(){
    ?><input type="text" name="twitter" id="twitter" class="regular-text" placeholder="<?php echo empty(get_option($option = 'twitter')) ? "https://twitter.com/your-account" : get_option($option = 'twitter');?>" value="<?php echo get_option($option = 'twitter');?>"><?php
}

function the_theme_manage_social_links_facebook(){
    ?><input type="text" name="facebook" id="facebook" class="regular-text" placeholder="<?php echo empty(get_option($option = 'facebook')) ? "https://web.facebook.com/your-account/" : get_option($option = 'facebook');?>" value="<?php echo get_option($option = 'facebook');?>"><?php
}

function the_theme_manage_social_links_youtube(){
    ?><input type="text" name="youtube" id="youtube" class="regular-text" placeholder="<?php echo empty(get_option($option = 'youtube')) ? "https://www.youtube.com/c/your-channel" : get_option($option = 'youtube');?>" value="<?php echo get_option($option = 'youtube');?>"><?php
}

/**
 * @author Hellen Paramita <manellen3@yahoo.com>
 * @name $the_theme_manage_social_page_setup
 * @copyright (c) 2020, Hellen Paramita
 */
function the_theme_manage_social_page_setup(){
    add_settings_section($id = 'section', $title = 'All settings', $callback = null, $page = 'theme-options');
    add_settings_field($id = 'twitter', $title = 'Twitter URL', $callback = 'the_theme_manage_social_links_twiiter', $page = 'theme-options', $section = 'section', $args = array());
    add_settings_field($id = 'facebook', $title = 'Facebook URL', $callback = 'the_theme_manage_social_links_facebook', $page = 'theme-options', $section = 'section', $args = array());
    add_settings_field($id = 'youtube', $title = 'Youtube URL', $callback = 'the_theme_manage_social_links_youtube', $page = 'theme-options', $section = 'section', $args = array());
    register_setting($option_group = 'section', $option_name = 'twitter', $args = array());
    register_setting($option_group = 'section', $option_name = 'facebook', $args = array());
    register_setting($option_group = 'section', $option_name = 'youtube', $args = array());
}
add_action('admin_init', 'the_theme_manage_social_page_setup');

/**
 * @author Misha Rudrastyh
 * @global type $wp_query
 */
function the_theme_load_more() {

    global $wp_query;

    // register our main script but do not enqueue it yet
    wp_register_script('my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery'));

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script('my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));

    wp_enqueue_script('my_loadmore');
}
add_action('wp_enqueue_scripts', 'the_theme_load_more');

/**
 * @author Misha Rudrastyh
 * @global type $wp_query
 */
function the_theme_loadmore_ajax_handler() {

    // prepare our arguments for the query
    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts($args);

    if (have_posts()) :
        // run the loop
        while (have_posts()): the_post();
            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            get_template_part('content', get_post_format());
        // for the test purposes comment the line above and uncomment the below one
        // the_title();
        endwhile;
    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore', 'the_theme_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'the_theme_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}