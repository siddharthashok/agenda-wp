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
                <div class="card-with-image">
                    <div class="image-wrapper">
                        <img src="<?= get_event_banner(); ?>" alt="image of event">
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">event </span>
                        <span class="entrance-info">Fritt inträde</span>
                    </div> 
                    <div class="content">
						<?php
							$start_date = strtotime(get_event_start_date());
							$end_date = strtotime(get_event_end_date());
							$start_time = get_event_start_time();
							$end_time = get_event_end_time();

							$format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", ".$start_time. "-".$end_time;
						?>
                        <div class="event-date">
                            <span class="day"><?= date("d",$start_date);?>-</span>
                            <span class="month"><?= date("F",$start_date);?></span>
                        </div>
                        <div class="event-date">
                            <span class="day"><?= date("d",$end_date);?></span>
                            <span class="month"><?= date("F",$end_date);?></span>
                        </div>
                        <h3><?= get_the_title(); ?></h3>
                        <h6>Arrangör</h6>
                        <p class="purple-text"><?= get_field("organizer")->post_title;?></p>  

                        <h6>Tid för event</h6>
                        <p><?= $format_date; ?></p>

                        <h6>Plats</h6>
                        <p><?= get_field("place")["address"]; ?></p>
                        
                        <h6>Adress</h6>
                        <p class="purple-text"><?= get_field("address");?></p>
                        <?php
                            if(have_rows("availability"))
                            {
                        ?>
                        <h6>Tillgänglighet</h6>
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
                        <!-- <p class="availability last">Event är syntolkat</p> -->

                        <h6>Beskrivning av event</h6>
                        <p>
							<?= get_the_content(); ?>
                        </p>

                        <h6>Kontaktuppgifter till detta event:</h6>
						<?php
							$contact_details = get_field("contact_details_for_event");
						?>
                        <p class="name">Namn <?= $contact_details["name"];?></p>
                        <p class="email"><?= $contact_details["email"];?></p>
                        <p class="phone-number"><?= $contact_details["phone"];?></p>
                
                        <?php
                            $rsvp_link = get_field("rsvp_link");
                            if($rsvp_link)
                            {
                        ?>      
                                <a href="<?= $rsvp_link; ?>" class="purple-text">
                                    <p class="purple-text"> Till eventsida</p>
                                </a>
                        <?php
                            }
                        ?>
                        <a href="#" class="purple-text">Dela event</a>

                        <?php
                            $tags = get_the_terms(get_the_ID(),"event_tags");
                            
                            if($tags)
                            {
                        ?>
                                <h6>Tagger</h6>
                                <p class="hashtags">
                                    <?php
                                        foreach ($tags as $tag => $value) {
                                            echo "#".$value->name ." ";
                                        }
                                    ?>
                                </p>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="more-about-orgnaizer">
    <div class="grid-container">        
        <h6 href="#" class="active section-title">Mer om denna arrangör</h6>
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
                                        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image of the organisation">
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
            <!-- <div class="cell large-4">
                <a class="card-with-image" href="#">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri()?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">organisation </span>
                    </div> 
                    <div class="content">
                        <h3>RFSL Göteborg</h3>
                        <p class="cause">Mänskliga rättigheter</p>
                    </div>
                </a>
            </div> -->
            <!-- <div class="cell large-4">
                <a class="card-with-image"  href="#">
                    <div class="image-wrapper">
                        <img src="<?= get_template_directory_uri()?>/img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">organisation </span>
                    </div> 
                    <div class="content">
                        <h3>RFSL Göteborg</h3>
                        <p class="cause">Mänskliga rättigheter</p>
                    </div>
                </a>
            </div> -->
        </div>
    </div>
</section>
<section class="similar-events">
    <div class="grid-container">
    <h6 href="#" class="active section-title">Liknande evenemang</h6>
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
                            <a class="card-with-image"  href="<?= get_the_permalink(); ?>">
                                <div class="card-title-wrap">
                                    <span class="category">EVENT </span>
                                </div> 
                                <div class="content">
                                    <h3><?= get_the_title();?></h3>
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
