<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Axisbits_Test
 */

get_header();
$page_title = get_field('404_title', 'options');
$page_desc = get_field('404_desc', 'options');
$page_image = get_field('404_image', 'options');
$page_btn_text = get_field('404_btn_text', 'options');
?>

	<section class="sectionPage404">
        <div class="container flex flex-wrap flex-v-center flex-c-center flex-h-start">
            <div class="sectionPage404__column contentColumn">

                <?php
                    if ( $page_title ) {
                ?>
                    <h1 class="sectionPage404__title">
                        <?= $page_title; ?>
                    </h1>
                <?php
                    }
                ?>

                <?php
                    if ( $page_desc ) {
                ?>
                    <div class="sectionPage404__desc">
                        <?= $page_desc; ?>
                    </div>
                <?php
                    }
                ?>

                <div class="sectionPage404__line">
                    <a href="<?= get_home_url(); ?>" class="btn btn_type_with_bg">
                        <?= $page_btn_text ; ?>
                    </a>
                </div>

            </div>

            <?php
                if ( $page_image ) {
            ?>
            <div class="sectionPage404__column imageColumn">
                <img src="<?= $page_image; ?>" data-src="<?= $page_image; ?>" alt="<?= $page_title; ?>" class="lazyload blur-up">
            </div>
            <?php
                }
            ?>
        </div>
    </section>

<?php
get_footer('empty');
