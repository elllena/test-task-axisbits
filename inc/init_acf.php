<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'option',
        'capability' => 'edit_users',
        'redirect' => false,
    ));
}
