<?php

get_header();

$term = get_queried_object();
?>
<section class="event-by-category">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Home</a></li>
                <li><a href="<?= get_site_url()?>/event/" >Events</a></li>
                <li><a href="#" class="active"><?= $term->name; ?></a></li>
            </ul>
        </nav>
        <h2 class="title"><?= $term->name; ?></h2>
        <?php
            $events = new WP_Query(array(
                "post_type" => "event",
                "post_status" => "publish",
                "post_per_page" => -1,
                "category_name" => $term->slug
            ));
            if($events->have_posts())
            {
        ?>
        <div class="single-category-section">
        <div class="grid-x grid-padding-x">
            <div class="cell large-12">
                <h4>Kolla in dessa event</h4>
            </div>
        <?php
        
            while($events->have_posts())
            {
                $events->the_post();

        ?>
                    <div class="cell large-4">
                    <a href="<?= get_permalink(); ?>" class="card-with-image">
                        <div class="image-wrapper">
                            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image of event">
                        </div>
                        <div class="date-wrapper">
                            <?php
                                $date = strtotime(get_field("start_date"));
                                $day = date("d",$date);
                                $month = date("F", $date);
                            ?>
                            <span class="day"><?= $day; ?></span>
                            <span class="month"><?= $month; ?></span>
                        </div>
                        <ul class="event-tags">
                            <li class="pink">gratis</li>
                            <li>podcast</li>
                        </ul>
                        <div class="content">
                            <h3><?= get_the_title(); ?></h3>
                            <p class="organizer">Arrangör: <?= get_field("organizer")->post_title;?></p>
                            <p class="location">Plats: <?= get_field("place")["address"]; ?></p>
                            <?php
                                $start_date = strtotime(get_field("start_date"));
                                $end_date = strtotime(get_field("end_date_time"));
                                $start_time = date("G.i",$start_date);
                                $end_time = date("G.i",$end_date);
    
                                $format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", kl ".$start_time. "-".$end_time;
                            ?>
                            <p class="date">Tid: <?= $format_date; ?></p>
                        </div>
                    </a>         
                </div>
                
                    
        <?php
                }

        ?>
        </div>
        </div>
        <?php
            }
            wp_reset_postdata();
            
            $organisations = new WP_Query(array(
                "post_type" => "organisations",
                "post_status" => "publish",
                "post_per_page" => -1,
                "category_name" => $term->slug
            ));

            if($organisations->have_posts())
            {
        ?>
        <div class="single-category-section">
        <div class="grid-x grid-padding-x">
            <div class="cell large-12">
                <h4>Kolla in dessa organisationer</h4>
            </div>
            <?php
                while($organisations->have_posts())
                {
                    $organisations->the_post();

            ?>
                    <div class="cell large-4">
                        <a href="<?= get_the_permalink(); ?>" class="card-with-image">    
                            <div class="image-wrapper">
                                <img src="<?= get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="">
                            </div>
                            <div class="card-title-wrap">
                                <span class="category">organisation </span>
                            </div>
                            <div class="content">
                                <h3><?= get_the_title(); ?></h3>
                                <p class="cause"><?= get_the_category()[0]->name;?></p>
                            </div>
                        </a>
                    </div>
            <?php
                }
            ?>
        </div>
        </div>
        <?php
            }
            wp_reset_postdata();
        ?>
    </div>
</section>


<?php
get_footer();
?>