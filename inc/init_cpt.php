<?php

add_action( 'init', 'register_cpts' );
function register_cpts()
{
    register_post_type( 'services', [
        'taxonomies' => [], // post related taxonomies
        'label'  => null,
        'labels' => [
            'name'               => 'services', // name for the post type.
            'singular_name'      => 'service', // name for single post of that type.
            'add_new'            => 'Add service', // to add a new post.
            'add_new_item'       => 'Adding service', // title for a newly created post in the admin panel.
            'edit_item'          => 'Edit service', // for editing post type.
            'new_item'           => 'New service', // new post's text.
            'view_item'          => 'See service', // for viewing this post type.
            'search_items'       => 'Search service', // search for these post types.
            'not_found'          => 'Not Found', // if search has not found anything.
            'parent_item_colon'  => '', // for parents (for hierarchical post types).
            'menu_name'          => 'Services', // menu name.
        ],
        'description'         => '',
        'public'              => true,
        //'publicly_queryable'  => null, // depends on public
        //'exclude_from_search' => null, // depends on public
        //'show_ui'             => null, // depends on public
        //'show_in_nav_menus'   => null, // depends on public
        'show_in_menu'        => null, // whether to in admin panel menu
        //'show_in_admin_bar'   => null, // depends on show_in_menu.
        'show_in_rest'        => null, // Add to REST API. WP 4.7.
        'rest_base'           => null, // $post_type. WP 4.7.
        'menu_position'       => null,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // Array of additional rights for this post type.
        //'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
        'hierarchical'        => false,
        // [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
        'supports'            => [ 'title' ],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'portfolio', [
        'taxonomies'          => array( 'category' ), // post related taxonomies
        'label'  => null,
        'labels' => [
            'name'               => 'portfolio', // name for the post type.
            'singular_name'      => 'portfolio', // name for single post of that type.
            'add_new'            => 'Add portfolio', // to add a new post.
            'add_new_item'       => 'Adding portfolio', // title for a newly created post in the admin panel.
            'edit_item'          => 'Edit portfolio', // for editing post type.
            'new_item'           => 'New portfolio', // new post's text.
            'view_item'          => 'See portfolio', // for viewing this post type.
            'search_items'       => 'Search portfolio', // search for these post types.
            'not_found'          => 'Not Found', // if search has not found anything.
            'parent_item_colon'  => '', // for parents (for hierarchical post types).
            'menu_name'          => 'Portfolio', // menu name.
        ],
        'description'         => '',
        'public'              => true,
//'publicly_queryable'  => null, // depends on public
//'exclude_from_search' => null, // depends on public
//'show_ui'             => null, // depends on public
//'show_in_nav_menus'   => null, // depends on public
        'show_in_menu'        => null, // whether to in admin panel menu
//'show_in_admin_bar'   => null, // depends on show_in_menu.
        'show_in_rest'        => null, // Add to REST API. WP 4.7.
        'rest_base'           => null, // $post_type. WP 4.7.
        'menu_position'       => null,
        'menu_icon'           => null,
//'capability_type'   => 'post',
//'capabilities'      => 'post', // Array of additional rights for this post type.
//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
        'hierarchical'        => false,
// [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
        'supports'            => [ 'title' ],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'testimonials', [
        'taxonomies' => [], // post related taxonomies
        'label'  => null,
        'labels' => [
            'name'               => 'testimonials', // name for the post type.
            'singular_name'      => 'testimonial', // name for single post of that type.
            'add_new'            => 'Add testimonial', // to add a new post.
            'add_new_item'       => 'Adding testimonials', // title for a newly created post in the admin panel.
            'edit_item'          => 'Edit testimonials', // for editing post type.
            'new_item'           => 'New testimonials', // new post's text.
            'view_item'          => 'See testimonials', // for viewing this post type.
            'search_items'       => 'Search testimonials', // search for these post types.
            'not_found'          => 'Not Found', // if search has not found anything.
            'parent_item_colon'  => '', // for parents (for hierarchical post types).
            'menu_name'          => 'testimonials', // menu name.
        ],
        'description'         => '',
        'public'              => true,
//'publicly_queryable'  => null, // depends on public
//'exclude_from_search' => null, // depends on public
//'show_ui'             => null, // depends on public
//'show_in_nav_menus'   => null, // depends on public
        'show_in_menu'        => null, // whether to in admin panel menu
//'show_in_admin_bar'   => null, // depends on show_in_menu.
        'show_in_rest'        => null, // Add to REST API. WP 4.7.
        'rest_base'           => null, // $post_type. WP 4.7.
        'menu_position'       => null,
        'menu_icon'           => null,
//'capability_type'   => 'post',
//'capabilities'      => 'post', // Array of additional rights for this post type.
//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
        'hierarchical'        => false,
// [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
        'supports'            => [ 'title' ],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

add_action( 'template_redirect', 'wpse_128636_redirect_post' );

function wpse_128636_redirect_post() {
    if ( is_singular( 'services' ) ) :
        wp_redirect( home_url(), 301 );
        exit;
    endif;
}