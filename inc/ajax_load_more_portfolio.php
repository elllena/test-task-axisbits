<?php
function more_post_ajax_portfolio(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => false,
        'post_type' => 'portfolio',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= '<div class="portfolio">
                    <div class="top_portfolio">
                        <img src="'.get_field('portfolio_picture').'">                 
                    </div>
                    <div class="desc_portfolio">'.mb_strimwidth(get_field('portfolio_project_description'), 0, 53, "...").'</div>                    
                  </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax_portfolio', 'more_post_ajax_portfolio');
add_action('wp_ajax_more_post_ajax_portfolio', 'more_post_ajax_portfolio');