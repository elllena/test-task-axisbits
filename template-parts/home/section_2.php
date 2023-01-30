<section class="section section_2">
    <div class="container">
        <div id="ajax-posts-services" class="services ajax-posts-services">
            <?php
            $postsPerPage = 6;
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => $postsPerPage,
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                ?>

                <div class="service">
                    <div class="top_service">
                        <img src="<?= the_field('service_icon') ?>">
                        <div class="title_service"><?= the_title() ?></div>
                    </div>
                    <div class="short_desc_service"><?= the_field('service_short_description') ?></div>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <div id="more_posts">Load More</div>

    </div>


</section>
