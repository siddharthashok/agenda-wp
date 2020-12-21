<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package agenda
 */

get_header();
	while(have_posts()){
		the_post();
?>
<section class="event-details">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url();?>" class="">Home</a></li>
                <li><a href="<?= get_site_url(); ?>/events">Events</a></li>
                <li><a href="#" class="active"><?= get_the_title(); ?></a></li>
            </ul>
        </nav>
        
        <div class="grid-x">
            <div class="cell large-12">
                <div class="card-with-image event-content">
                    <div class="image-wrapper">
                        <img src="<?= get_event_banner(); ?>" alt="image of event">
                    </div>
                    <div class="content">
						<?php
							$start_date = strtotime(get_event_start_date());
							$end_date = strtotime(get_event_end_date());
							$start_time = get_event_start_time();
							$end_time = get_event_end_time();

							$format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", ".$start_time. "-".$end_time;
                        ?>
                        <div class="sidebar">
                            <div class="date-wrapper">
                                <span class="day"><?= date("d",$start_date);?></span>
                                <span class="month"><?= date("F",$start_date);?></span>
                            </div>
                            <!-- <div class="event-date">
                                <span class="day"><?= date("d",$start_date);?>-</span>
                                <span class="month"><?= date("F",$start_date);?></span>
                            </div>
                            <div class="event-date">
                                <span class="day"><?= date("d",$end_date);?></span>
                                <span class="month"><?= date("F",$end_date);?></span>
                            </div> -->

                            <div class="info-wrapper">
                                <h6 class="kalender">
                                    <span class="icon clock"></span>
                                    KALENDER
                                </h6>
                                <h4><?= $format_date; ?></h4>
                            </div>
                            <div class="info-wrapper">
                                <h6 class="event">
                                    Event
                                </h6>
                                <h4>Manifestaion</h4>
                            </div>
                            <div class="info-wrapper">
                                <h6 class="arrangor">
                                    <span class="icon arrangor"></span>
                                    Arrangör
                                </h6>
                                <h4><?= get_field("organizer")->post_title;?></h4>
                            </div>

                            <div class="info-wrapper">
                                <h6 class="plats">
                                    <span class="icon plats"></span>
                                    Plats
                                </h6>
                                <h4><?= get_field("place")["address"]; ?></h4>
                            </div>

                            <div class="info-wrapper">
                                <h6>Tillgänglighet</h6>
                                <?php
                                    if(have_rows("availability"))
                                    {
                                ?>

                                    <ul class="availability-wrap">
                                        <?php
                                            
                                            while(have_rows("availability"))
                                            {
                                                the_row();
                                        ?>
                                                <li class="availability"><?= get_sub_field("title"); ?></li>
                                        <?php
                                                }
                                        ?>
                                    </ul>
                                <?php 
                                    }
                                ?>
                            </div>
                            
                        </div>
                        <div class="content-wrapper">
                            <ul class="tags-wrapper">
                                <li><a href="#">JÄMSTÄLLDHET <span class="plus-icon"></span></a></li>
                                <li><a href="#">Sexualitet och könsidentitet  <span class="plus-icon"></span></a></li>
                            </ul>
                            <h3><?= get_the_title(); ?></h3>
                            <p>
                                <?= get_the_content(); ?>
                            </p>
                            <div class="link-wrapper text-right">
                                <a href="#" class="link">TILL ARRANGÖRENS EVENTSIDA</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="more-about-orgnaizer">
    <div class="grid-container">        
        <h4 href="#" >Mer om denna och liknande arrangör</h4>
        <div class="grid-x grid-margin-x grid-margin-y">
            <?php
                
                $all_organisations = new WP_Query(array(
                    "post_type" => "organisations",
                    "post_status" => "publish",
                    "number" => 3,
                    "orderby" => "rand",
                ));

                // print_r($all_terms);

                if($all_organisations->have_posts())
                {
                    while ($all_organisations->have_posts()) 
                    {
                        $all_organisations->the_post();
                        // if($term->term_id != $value->term_id)
                        // {
            ?>
                            <div class="cell large-4">
                                <a class="card-with-image" href="<?= get_the_permalink(); ?>">
                                    <div class="image-wrapper">
                                        <img src="<?= get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="image of the organisation">
                                        <!-- <div class="date">
                                            <span class="day">25</span>
                                            <span class="month">December</span>
                                        </div> -->
                                    </div>
                                    <div class="card-title-wrap">
                                        <span class="category">organisation </span>
                                    </div> 
                                    <div class="content">
                                        <h3><?= get_the_title(); ?></h3>
                                        <p class="cause">Mänskliga rättigheter</p>
                                    </div>
                                </a>
                            </div> 
            <?php
                        // }
                    }
                }
                wp_reset_postdata();
            ?>
            <div class="cell large-12">
                <div class="link-wrapper text-right">
                    <a href="#">Visa FLER</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="similar-events">
    <div class="grid-container">
    <h4 href="#" >Liknande evenemang</h4>
        <div class="grid-x grid-margin-x grid-margin-y"> 
            <?php
                $similar_events = new WP_Query(array(
                    "post_type" => "event_listing",
                    "posts_per_page" => 3,
                    "post_status" => "publish",
                    "post__not_in" => array(get_the_ID())
                ));
                // print_r($similar_events->request);
                // print_r($similar_events);
                if($similar_events->have_posts())
                {
                    while($similar_events->have_posts())
                    {
                        $similar_events->the_post();
                        // print_r($post->ID);
            ?>
                        <div class="cell large-4">
                            <a href="<?= get_permalink(); ?>" class="card-with-image">
                                <div class="image-wrapper">
                                    <img src="<?= get_event_banner(); ?>" alt="image of event">
                                </div>
                                <div class="date-wrapper">
                                    <?php
                                        $date = strtotime(get_event_start_date());
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
            ?>
                        <div class="cell large-12">
                            <div class="link-wrapper text-right">
                                <a href="#">Visa FLER</a>
                            </div>
                        </div>
            <?php
                }
                else
                {
            ?>
             <h3>No posts found</h3>
            <?php       
                }
                wp_reset_postdata();
            ?>
             
            <!-- <div class="cell large-4">   
                <a class="card-with-image"  href="#">
                    <div class="card-title-wrap">
                        <span class="category">EVENT </span>
                    </div> 
                    <div class="content">
                        <h3>Mötesplats för alla barn ooch regnbågsfamiljer</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
            </div> -->
            <!-- <div class="cell large-4">   
                <a class="card-with-image"  href="#">
                    <div class="card-title-wrap">
                        <span class="category">EVENT </span>
                    </div> 
                    <div class="content">
                        <h3>Mötesplats för alla barn ooch regnbågsfamiljer</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
            </div>   -->
        </div>
    </div>   
</section>
<?php
	}
get_footer();
