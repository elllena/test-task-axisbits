<?php

/*-- Init menu locations --*/
if ( !function_exists('init_menus') ) {
    add_action('init', 'init_menus');
    function init_menus() {
        register_nav_menus(
            array(
                'header_menu' => 'Header menu',
                'footer_tight_menu' => 'Footer Menu on Basic Pages'
            )
        );
    }
}
/*-- END --*/


/*-- Remove default wp image sizes --*/
function rm_def_sizes( $sizes, $metadata ) {
    return [];
}
add_filter( 'intermediate_image_sizes_advanced', 'rm_def_sizes', 10, 2 );
/*-- END --*/

/*-- Remove basic Comments functionality --*/
add_action('admin_init', function () {
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

add_filter('comments_array', '__return_empty_array', 10, 2);

add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});
/*-- END of Remove basic Comments functionality --*/

// svg support

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    if (!$data['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;
        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }
        $data['ext'] = $ext;
        $data['type'] = $type;
        $data['proper_filename'] = $proper_filename;
    }
    return $data;
}, 10, 4);


add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});


add_action('admin_head', function () {
    echo '';
});

//** * Enable preview / thumbnail for svg image files.*/
function svg_is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_svg );
        $info = @getimagesize($path);

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'svg_is_displayable', 10, 2);


