<?php

get_header();

$term = get_term_by('slug',get_query_var( 'term' ),get_query_var('taxonomy'));
?>
<section class="event-by-category">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Home</a></li>
                <li><a href="#" >Events</a></li>
                <li><a href="#" class="active"><?= $term->name; ?></a></li>
            </ul>
        </nav>
        <h2 class="title"><?= $term->name; ?></h2>
        <div class="grid-x grid-padding-x">
        <?php

            if(have_posts())
            {
                while(have_posts())
                {
                    the_post();

        ?>
                    
                <div class="cell large-4">
                        <a href="<?= get_permalink(); ?>" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_event_banner(); ?>" alt="image of event">
                                <div class="date">
                                    <?php
                                        $date = strtotime(get_event_start_date());
                                        $day = date("d",$date);
                                        $month = date("F", $date);
                                    ?>
                                    <span class="day"><?= $day; ?></span>
                                    <span class="month"><?= $month; ?></span>
                                </div>
                            </div>
                            
                            <div class="card-title-wrap">
                                    <span class="category">event </span>
                                    <span class="entrace-info">Fritt inträde</span>
                            </div> 
                            <div class="content">
                                <h3><?= get_the_title(); ?></h3>
                                <p class="organizer">Arrangör: <?= get_field("organizer")->post_title;?></p>
                                <p class="location">Plats: <?= get_field("place")["address"]; ?></p>
                                <?php
                                    $start_date = strtotime(get_event_start_date());
                                    $end_date = strtotime(get_event_end_date());
                                    $start_time = get_event_start_time();
                                    $end_time = get_event_end_time();

                                    $format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", ".$start_time. "-".$end_time;
                                ?>
                                <p class="date">Tid: <?= $format_date; ?></p>
                            </div>
                        </a> 
                    </div>
                    
        <?php
                }
            }
        ?>
        </div>
    </div>
</section>


<?php
get_footer();
?>