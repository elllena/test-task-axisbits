<section class="section section_4">


    <div id="testimonials" class="testimonials">
        <!--         <div class="testimonials-cover"> -->
        <div class="wrap">

            <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
            <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
            <ul id="testimonials-dots" class="dots">
                <li class="dot active"></li><!--
                    -->
                <li class="dot"></li><!--
                    -->
                <li class="dot"></li><!--
                    -->
                <li class="dot"></li><!--
                    -->
                <li class="dot"></li>
            </ul>
            <div id="testimonials-content" class="cont">
                <?php $query_testimonial = new WP_Query([
                    'post_type' => 'testimonials',
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                ]);

                $active_class = '';
                $i = 0;
                if ( $query_testimonial->have_posts() ) {
                    while ( $query_testimonial->have_posts() ) {
                        $query_testimonial->the_post(); 
                $i++;
                if ($i == 1){
                    $active_class = 'active';
                }

                ?>

                <div class="<?php $active_class ?>>">
                    <div class="img"><img
                                src="<?= the_field('person’s_photo') ?>"
                                alt=""></div>
                    <p><?= the_field('testimonial_text') ?></p>
                    <div class="socials">
                        <a href="<?= the_field('facebook_link') ?>"><img src="/wp-content/themes/test-axisbits/dist/images/facebook.png"></a>
                        <a href="<?= the_field('instagram_link') ?>"><img src="/wp-content/themes/test-axisbits/dist/images/instagram.png"></a>
                    </div>
                </div>
                <?php
                        }
                        wp_reset_postdata(); // сбрасываем переменную $post
                    } else {
                        echo 'Nothing found';
                    }
                    ?>

            </div>

        </div>
        <!--         </div> -->


        <script src="https://use.fontawesome.com/1744f3f671.js"></script>


    </div>
</section>