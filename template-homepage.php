<?php
/**
 * Template Name: Home Page
 * @package agenda
 */
get_header();
?>
<section class="hero-section">
        <div class="grid-container">
            <h1>Din eventkalender  för jämlikhet</h1>
            <h5 class="hero-sub-title">Vi gör det enkelt för dig att gå från ord till handling</h5>
            <div class="topics-wrapper">
                <div class="title-wrap">
                    <h2 class="title">Vilka ämnen intresserar dig?</h2>
                    <a href="#" class="see-few-all">Se färre</a>
                </div>
                <div class="grid-x grid-margin-x grid-margin-y">
                    <?php
                        $all_events_categories = get_terms("event_categories",array(
                            'hide_empty' => false
                        ));
                        // print_r($all_events_categories);
                        foreach ($all_events_categories as $key => $value) {
                    ?>
                        <div class="cell large-3 small-4">
                            <a href="<?= get_term_link($value, "event_categories")?>" class="card-with-image">
                                <div class="image-wrapper">
                                    <img src="<?= get_field("featured_image",$value);?>" alt="image of a topic">
                                </div>
                                <div class="content">
                                    <h3><?= $value->name; ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                    
                    <!-- <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>   
                    </div>
                    <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>
                    </div>
                    <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>    
                    </div>
                    <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>    
                    </div>
                    <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image"> 
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>    
                    </div>
                    <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>
                    </div>
                    <div class="cell large-3 small-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>Sexualitet & könsidentitet</h3>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
            
        </div>
    </section>
    <section class="current-events">
        <div class="grid-container">
            <div class="title-wrap">
                <div class="wrap">
                    <h2 class="title">Aktuella evenemang</h2>
                    <p class="about">Här hittar du aktuella evenemang i vår eventkalender.  Hitta något som passar dig!</p>
                </div>
                <a href="#" class="see-few-all">Se färre</a>
            </div>
            <?php
                $all_events = new WP_Query(array(
                  'post_type' => 'event_listing',
                  'posts_per_page' => -1, 
                ));
            ?>
            <!-- current event wrap desktop with grid -->
            <div class="event-desktop-wrap">
                <div class="grid-x grid-margin-x grid-margin-y">
                <?php
                    if($all_events->have_posts())
                    {
                        while($all_events->have_posts())
                        {
                            $all_events->the_post();
                ?>
                            <div class="cell large-4">
                                <a href="<?= get_the_permalink(); ?>" class="card-with-image">
                                    <div class="image-wrapper">
                                        <img src="<?= get_event_banner() ? get_template_directory_uri().'/img/backup.jpg' : get_event_banner(); ?>" alt="">
                                        <?php
                                            
											$date = strtotime(get_event_start_date());
											$day = date("d",$date);
											$month = date("F", $date);
										?>
                                        <div class="date">
                                            <span class="day"><?= $day; ?></span>
                                            <span class="month"><?= $month; ?></span>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <span class="category">event </span>
                                        <span class="entrance-info">Fritt inträde</span>
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
                    wp_reset_postdata();
                ?>
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
                    <a href="<?= get_the_permalink(); ?>" class="card-with-image">
                        <div class="image-wrapper">
                            <img src="<?= get_event_banner() ? get_event_banner() : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="">
                            <?php
                                
                                $date = strtotime(get_event_start_date());
                                $day = date("d",$date);
                                $month = date("F", $date);
                            ?>
                            <div class="date">
                                <span class="day"><?= $day; ?></span>
                                <span class="month"><?= $month; ?></span>
                            </div>
                        </div>
                        <div class="content">
                            <span class="category">event </span>
                            <span class="entrance-info">Fritt inträde</span>
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
                <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
                <!-- <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
                <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
                <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
                <a href="#" class="card-with-image"> 
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
                <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>   
                <a href="#" class="card-with-image">  
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
                <a href="#" class="card-with-image"> 
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>   
                <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="content">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                        <h3>Sexualitet & könsidentitet</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a> -->
            </div>
        </div>
    </section>
    <section class="current-organizers">
        <div class="grid-container">
            <div class="title-wrap">
                <div class="wrap">
                    <h2 class="title">Aktuella organisationer</h2>
                    <p class="about">Hitta en organisation som jobbar med jämlikhetsfrågor som intresserar dig!</p>
                </div>
                <a href="#" class="see-few-all">Se färre</a>
            </div>
            <!-- with grid for desktop-->
            <div class="current-organizers-wrap">
                <div class="grid-x grid-margin-x">
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
                                        <div class="content">
                                            <p class="category">organisation</p>
                                            <h3><?= get_the_title(); ?></h3>
                                            <p class="cause">Mänskliga rättigheter</p>
                                        </div>
                                    </a>
                                </div>
                    <?php
                            }
                        }
                        wp_reset_postdata();
                    ?>
                    
                    <!-- <div class="cell large-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="category">organisation</p>
                                <h3>Amnesty International</h3>
                                <p class="cause">Mänskliga rättigheter</p>
                            </div>
                        </a>
                    </div> -->
                    <!-- <div class="cell large-4">
                        <a href="#" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="category">organisation</p>
                                <h3>Amnesty International</h3>
                                <p class="cause">Mänskliga rättigheter</p>
                            </div>
                        </a>
                    </div> -->
                </div>
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
                <!-- <a class="card-with-image" href="#">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                    </div>
                    <div class="content">
                        <p class="category">organisation</p>
                        <h3>Amnesty International</h3>
                        <p class="cause">Mänskliga rättigheter</p>
                    </div>
                </a> -->
                <!-- <a class="card-with-image" href="#">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                    </div>
                    <div class="content">
                        <p class="category">organisation</p>
                        <h3>Amnesty International</h3>
                        <p class="cause">Mänskliga rättigheter</p>
                    </div>
                </a> -->
            </div>
        </div>   
    </section>
    <section class="connect-card-wrap">
        <div class="grid-container">
            <div class="grid-x grid-margin-y grid-margin-x">
                <div class="cell large-6">
                    <div class="connect-card blue">
                        <div class="content">
                            <h3>Är du organisation eller arrangör av jämlikhetsevent?</h3>
                            <p class="connect-card-text">Vill du att din organisation ska synas på  Agenda: Jämlikhet eller publicera ditt event  i vår kalender?
                            </p>
                            <a href="<?= get_site_url()?>/publish-event-organisation" class="connect-link">ANSLUT DIN DIN ORGANISATION TILL AGENDA: JÄMLIKHET</a>
                        </div>
                    </div>
                </div>
                <div class="cell large-6">
                    <div class="connect-card purple">
                        <div class="content">
                            <h3>Brinner du för jämlikhet och vill dra igång något nytt?</h3>
                            <p class="connect-card-text">Vi söker en eller flera som vill starta upp en lokal organisation för Agenda: Jämlikhet i Malmö och Stockholm. Tillsammans blir vi starka.
                            </p>
                            <a href="<?= get_site_url()?>/publish-event-organisation" class="connect-link">ANSLUT DIN DIN ORGANISATION TILL AGENDA: JÄMLIKHET</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>    
    </section>

<?php
    get_footer();
?>