<section class="section section_1">
    <div class="hero-slider slider">


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

            <div class="slide <?= $current_active_class ?>">
                <div class="content">
                    <h1><?= $hero_slide['title'] ?></h1>
                    <p>
                        <?= $hero_slide['description'] ?>
                    </p>
                    <a href="#">
                        <button>Learn more</button>
                    </a>
                </div>
            </div>


            <?php
        } ?>
    </div>
    <div class="buttons">
        <button id="prev"><i>
                <svg enable-background="new 0 0 32 32" height="32px"  version="1.1" viewBox="0 0 32 32" width="32px"
                     xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M11.262,16.714l9.002,8.999  c0.395,0.394,1.035,0.394,1.431,0c0.395-0.394,0.395-1.034,0-1.428L13.407,16l8.287-8.285c0.395-0.394,0.395-1.034,0-1.429  c-0.395-0.394-1.036-0.394-1.431,0l-9.002,8.999C10.872,15.675,10.872,16.325,11.262,16.714z" fill="#ffffff" fill-rule="evenodd" id="Chevron_Right"/>
                    <g/>
                    <g/>
                    <g/>
                    <g/>
                    <g/>
                    <g/></svg>
            </i></button>
        <button id="next"><i>
                <svg enable-background="new 0 0 32 32" height="32px"  version="1.1" viewBox="0 0 32 32" width="32px"
                     xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M21.698,15.286l-9.002-8.999  c-0.395-0.394-1.035-0.394-1.431,0c-0.395,0.394-0.395,1.034,0,1.428L19.553,16l-8.287,8.285c-0.395,0.394-0.395,1.034,0,1.429  c0.395,0.394,1.036,0.394,1.431,0l9.002-8.999C22.088,16.325,22.088,15.675,21.698,15.286z" fill="#ffffff" fill-rule="evenodd" id="Chevron_Right"/>
                    <g/>
                    <g/>
                    <g/>
                    <g/>
                    <g/>
                    <g/></svg>
            </i></button>
    </div>
</section>

