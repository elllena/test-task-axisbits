<?php
remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head','feed_links', 2);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','wp_generator');

remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','wp_shortlink_wp_head', 10, 0 );

remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


function init_styles_scripts() {
    wp_dequeue_style('flexslider');
    wp_dequeue_style('owl-carousel');
    wp_dequeue_style('owl-theme');
    wp_dequeue_style('font-awesome');
    wp_dequeue_style('wp-pagenavi');

    wp_deregister_script('flexslider');
    wp_deregister_script('easing');
    wp_deregister_script('jflickrfeed');
    wp_deregister_script('playlist');
    wp_deregister_script('jplayer');

    $tmplUri = get_template_directory_uri();

    if ( !is_admin() ) {
        wp_deregister_script('jquery');
    }


    function custom_head_cleanup(){
        if( ! is_admin() ){
            wp_deregister_script( 'jquery' );
        }
    }
    add_action( 'init', 'custom_head_cleanup' );

    wp_enqueue_style('main-styles', $tmplUri . '/dist/style.min.css', array(), false);

    wp_enqueue_script('main', $tmplUri . '/dist/main.min.js','','',true);


    wp_enqueue_style( 'ideg-style', get_stylesheet_uri(), array(), null);
    wp_style_add_data( 'ideg-style', 'rtl', 'replace' );

    wp_localize_script( 'main', 'ajax_posts', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'noposts' => __('No older posts found', 'test_axisbits'),
    ));

}



add_action('wp_enqueue_scripts','init_styles_scripts');