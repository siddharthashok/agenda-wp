<?php
/**
 * Template Name: Home Page
 * @package agenda
 */
get_header();
?>
<section class="hero-section">
    <div class="grid-container">
        <h1 class="text-center">Din eventkalender för jämlikhet</h1>
        <h4 class="text-center">Vi gör det enkelt för dig att gå från ord till handling</h4>
    </div> 
    <section class="current-events">
        <div class="grid-container">
            <?php
                $all_events = new WP_Query(array(
                  'post_type' => 'event',
                  'posts_per_page' => 6,
                  'post_status' => 'publish',
                  'meta_key' => 'start_date',
                  'orderby' => array( 'meta_value' => 'ASC' ),
                  'meta_query' => array(
                        array(
                            'key' => 'start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '>=',
                            'type' => 'DATE'
                        )
                    )
                ));
                $all_events_categories = get_categories();
            ?>
                <div class="grid-x grid-padding-x grid-padding-y">
                    <div class="cell large-12">
                        <h3>Vad intresserar dig?</h3>
                        <div class="categories-wrapper">
                            <ul class="category-list">
                                <?php
                                   foreach ($all_events_categories as $key => $value) {
                                ?>
                                    <li><a href='<?= get_term_link($value, "event_categories")?>'><?= $value->name; ?></a></li>
                                <?php
                                   }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="cell large-12">
                        <h4>Kolla in dessa event</h4>
                    </div>
                <?php
                    if($all_events->have_posts())
                    {
                        while($all_events->have_posts())
                        {
                            $all_events->the_post();
                ?>
                        <div class="cell large-4 hide-for-small-only">
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
                                    <?php
                                        $cost_of_event = get_field("cost_of_event");
                                        $tags = get_the_tags();
                                        if(empty($cost_of_event) || $cost_of_event == 0)
                                        {
                                    ?>
                                            <li class="pink">gratis</li> 
                                    <?php
                                        }
                                        if($tags!=false)
                                        {
                                            for($i=0; $i< sizeof($tags); $i++)
                                            {
                                                if($i==1){break;}
                                    ?>
                                                <li><?= $tags[$i]->name; ?></li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
                                <div class="content">
                                    <h3><?= get_the_title(); ?></h3>
                                    <p class="organizer">Arrangör: <?= get_field("organizer")->post_title;?></p>
                                    <p class="location">Plats: <?= get_field("address"); ?></p>
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
                    }
                    wp_reset_postdata();
                ?>
                    <div class="cell large-12 hide-for-small-only">
                        <div class="link-wrapper text-right">
                            <a class="underline" href="<?= get_site_url()?>/event">Visa FLER</a>
                        </div>
                    </div>
                </div>
            <!-- current event wrap mobile without grid -->
            <div class="event-mobile-wrap">
                <?php
                    if($all_events->have_posts())
                    {
                        while($all_events->have_posts())
                        {
                            $all_events->the_post();
                ?>
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
                                    <p class="location">Plats: <?= get_field("address"); ?></p>
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
                <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
                <div class="cell large-12">
                    <div class="link-wrapper text-right">
                        <a class="underline" href="<?= get_site_url()?>/event">Visa FLER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</section>
    
    <section class="current-organizers">
        <div class="grid-container">
            <!-- with grid for desktop-->
                <div class="grid-x grid-margin-x">
                    <div class="cell large-12">
                        <h4 >Kolla in dessa organisationer</h4>
                    </div>
                    <?php
                        $random_organisations = new WP_Query(array(
                            "post_type" => "organisations",
                            "post_status" => "publish",
                            "posts_per_page" => 3,
                            "orderby" => "rand",
                        ));
                        
                        if($random_organisations->have_posts())
                        {
                            while($random_organisations->have_posts())
                            {
                                $random_organisations->the_post();
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
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            <!-- without grid for mobile-->
            <div class="organizers-mobile-wrap">
                <?php
                    if($random_organisations->have_posts())
                    {
                        while($random_organisations->have_posts())
                        {
                            $random_organisations->the_post();
                ?>
                            <a class="card-with-image" href="<?= get_the_permalink(); ?>">
                                <div class="image-wrapper">
                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                                </div>
                                <div class="content">
                                    <p class="category">organisation</p>
                                    <h3><?= get_the_title(); ?></h3>
                                    <p class="cause">Mänskliga rättigheter</p>
                                </div>
                            </a>
                <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
            <div class="cell large-12">
                <div class="link-wrapper text-right">
                    <a class="underline" href="<?= get_site_url()?>/organisations">Visa FLER</a>
                </div>
            </div>
        </div>   
    </section>
    <section class="connect-card-wrap">
        <div class="grid-container">
            <div class="grid-x grid-margin-y grid-margin-x">
                <div class="cell large-6">
                    <div class="info-card">
                        <h3 class="card-title">Är du organisation eller arrangör av jämlikhetsevent?</h3>
                        <p class="card-description">Vill du att din organisation ska synas på Agenda: Jämlikhet eller publicera ditt event i vår kalender?
                        </p>
                        <a href="<?= get_site_url()?>/publish-event-organisation" class="link">PUBLICERA I VÅR EVENTKALENDER</a>
                    </div>
                    
                </div>
                <div class="cell large-6">
                    <div class="connect-card purple">
                        <div class="info-card albescent-white">
                            <h3 class="card-title">Brinner du för jämlikhet och vill dra igång något nytt?</h3>
                            <p class="card-description">Vi söker en eller flera som vill starta upp en lokal organisation för Agenda: Jämlikhet i Malmö och Stockholm. Tillsammans blir vi starka. </p>
                            <a href="<?= get_site_url()?>/publish-event-organisation" class="link">LÄS MER OCH LÅT DIG INSPIRERAS</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>    
    </section>

<?php
    get_footer();
?>