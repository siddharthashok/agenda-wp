<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package agenda
 */

get_header();
while(have_posts())
{
	the_post();
?>

<section class="organisation-details">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Home</a></li>
                <li><a href="<?= get_site_url(); ?>/organisations">Organisations</a></li>
                <li><a href="#" class="active"><?= get_the_title(); ?></a></li>
            </ul>
        </nav>
        <div class="grid-x">
            <div class="cell large-12">
                <div class="card-with-image">
                    <div class="image-wrapper">

                        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image of the organisation">
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">organisation</span>
                    </div> 
                    <div class="content">
                        <h3><?= get_the_title(); ?></h3>
                        <?php
                            $contact_details = get_field("contact_details");

                            if($contact_details["website"])
                            {
                        ?>
                                <p class="social-links">Hemsida: <?= $contact_details["website"]; ?></p>  
                        <?php        
                            }

                            if($contact_details["instagram"])
                            {
                        ?>
                                <p class="social-links">Instagram: <?= $contact_details["instagram"]; ?></p>
                        <?php
                            }
                            if($contact_details["facebook"])
                            {
                        ?>  
                                <p class="social-links">Facebook: <?= $contact_details["facebook"]; ?></p> 
                        <?php
                            }
                            if($contact_details["mail"])
                            {
                        ?>   
                                <p class="social-links last">Mail: <?= $contact_details["mail"]; ?></p>                  
                        <?php
                            }
                        ?>
                        
                    
                        <h6>Beskrivning av event</h6>
                        <!-- <p>
                            the content
						</p> -->
						<?= the_content();?>
                        <a class="read-more-wrap"> <p class="read-more">LÄS MER</p></a>
                    
                        <h6>Tagger</h6>
                        <p class="hashtags">#MÄNSKLIGA RÄTTIGHETER #GÖTEBORG</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php
}
?>
<!-- start of events cards -->
<section class="events-from-organiser">
    <div class="grid-container">
        <a href="#" class="active section-title">Evenemang från denna arrangör</a>
        <div class="grid-x grid-margin-x grid-margin-y">
            <?php
                $current_organiser_id = $post->ID;
                $all_events = new WP_Query(array(
                    "post_type" => "event_listing",
                    "posts_per_page" => -1,
                    "post_status" => "publish"
                ));
                if($all_events->have_posts())
                {
                    while($all_events->have_posts())
                    {
                        $all_events->the_post();
                       if(get_field("organizer")->ID != $current_organiser_id)
                       {
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
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- start of organisation cards -->
<section class="organisation">
    <div class="grid-container">
        <span href="#" class="active section-title">Se liknande organisationer</span>
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
                        if($post->ID != $current_organiser_id)
                        {
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
                        }
                    }
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
	

<?php
get_footer();
