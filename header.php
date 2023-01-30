<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Axisbits_Test
 */
$header_logo = get_field('header_logo', 'options');
$header_btn = get_field('header_btn', 'options');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php the_title(); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= get_template_directory_uri(); ?>/dist/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?= get_template_directory_uri(); ?>/dist/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?= get_template_directory_uri(); ?>/dist/images/favicon/favicon-16x16.png">

    <link rel="manifest" href="<?= get_template_directory_uri(); ?>/dist/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#1A1F27">
    <meta name="theme-color" content="#1A1F27">
    <link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/dist/images/favicon/favicon.ico"
          type="image/x-icon">
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/dist/images/favicon/favicon.ico" type="image/x-icon">

<!--    <script-->
<!--            src="https://code.jquery.com/jquery-3.6.3.min.js"-->
<!--            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="-->
<!--            crossorigin="anonymous"></script>-->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$j=0;
$current_active_class = '';
$hero_slider = get_field('hero_slider', 'options');

foreach ($hero_slider as $hero_slide){

$j++;
if ($j == 1){
    $current_active_class = 'current';
} else{
    $current_active_class = '';
}

?>
    <style>
        .slide:nth-child(<?= $j ?>) {
            background: url(<?= $hero_slide['img'] ?>) no-repeat center top/cover;
        }
    </style>
    <?php
} ?>
