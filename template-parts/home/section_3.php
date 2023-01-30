<section class="section section_3">
    <div class="container">
        <div id="ajax-posts-portfolios" class="portfolios ajax-posts-portfolios">
            <?php
            $postsPerPage = 4;
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => $postsPerPage,
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                ?>

                <div class="portfolio">
                    <div class="top_portfolio">
                        <img src="<?= the_field('portfolio_picture') ?>">
                    </div>
                    <?php $desc = mb_strimwidth(get_field('portfolio_project_description'), 0, 53, "..."); ?>
                    <div class="desc_portfolio"><?= $desc ?></div>
                </div>


            <?php
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
        <div id="more_posts_portfolio">Load More Portfolio</div>

    </div>


</section>
