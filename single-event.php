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
                <li><a href="<?= get_site_url(); ?>/event">Events</a></li>
                <li><a href="#" class="active"><?= get_the_title(); ?></a></li>
            </ul>
        </nav>
        
        <div class="grid-x">
            <div class="cell large-12">
                <div class="card-with-image event-content">
                    <div class="image-wrapper">
                        <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image of event">
                    </div>
                    <div class="content">
						<?php
							$start_date = strtotime(get_field("start_date"));
							$end_date = strtotime(get_field("end_date_time"));
							$start_time = date("G.i",$start_date);
							$end_time = date("G.i",$end_date);

							$format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", kl ".$start_time. "-".$end_time;
							
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
                                    Tid
                                </h6>
                                <h4><?= $format_date; ?></h4>
                            </div>
                            <?php
                                $event = get_the_terms(get_the_ID(), "post_tag");
                                if($event)
                                {
                            ?>
                            <div class="info-wrapper">
                                <h6 class="event">
                                    Typ av Event
                                </h6>
                                <?php
                                    foreach($event as $key => $value)
                                    {
                                        if($key==0)
                                        {
                                ?>
                                            <h4 class="event-type"><?= $value->name ; ?></h4>
                                <?php
                                        }
                                        else
                                        {
                                ?>
                                            <h4 class="event-type"><?= ", ". $value->name ; ?></h4>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="info-wrapper">
                                <h6 class="arrangor">
                                    <span class="icon arrangor"></span>
                                    Arrangör
                                </h6>
                                <h4><?= get_field("organizer")->post_title;?><?= get_field("other_organizers")? ", ".get_field("other_organizers"): ""?></h4>
                            </div>

                            <?php
                                if(get_field("address"))
                                {
                            ?>
                            <div class="info-wrapper">
                                <h6 class="plats">
                                    <span class="icon plats"></span>
                                    Plats
                                </h6>
                                <h4><?= get_field("address"); ?></h4>
                            </div>
                            <?php
                                }
                            ?>        
                            <div class="info-wrapper">
                                <?php
                                    $availibilities = get_the_terms(get_the_ID(), "availability");
                                    
                                ?>
                                <ul class="availability-wrap">
                                    <?php
                                        // print_r($availibilities);
                                        if($availibilities)
                                        {
                                    ?>
                                            <h6>Tillgänglighet</h6>
                                    <?php
                                            foreach($availibilities as $key => $value)
                                            {
                                           
                                    ?>
                                                <li class="availability"><?= $value->name; ?></li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="content-wrapper">
                            <div class="date-wrapper show-for-small-only">
                                <span class="day"><?= date("d",$start_date);?></span>
                                <span class="month"><?= date("F",$start_date);?></span>
                            </div>
                            <ul class="tags-wrapper">
                                <?php
                                    $categories = get_the_category();

                                    foreach($categories as $key => $value)
                                    {
                                ?>
                                        <li><a href="<?= get_category_link( $value->term_id ) ?>"><?= $value->name; ?> <span class="plus-icon"></span></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                            <h3><?= get_the_title(); ?></h3>
                            <div class="paras">
                                <?= get_the_content(); ?>
                            </div>
                            <div class="link-wrapper text-right">
                                <a href="<?= get_field("link_to_organisers_website");?>" class="link" target="_blank">TILL ARRANGÖRENS EVENTSIDA</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="similar-events">
    <div class="grid-container">
    <?php
        $similar_events = new WP_Query(array(
            "post_type" => "event",
            "posts_per_page" => 3,
            "post_status" => "publish",
            "post__not_in" => array(get_the_ID())
        ));
        // print_r($similar_events);
        if($similar_events->have_posts())
        {
            
    ?>
        <h4>Liknande evenemang</h4>
        <div class="grid-x grid-margin-x grid-margin-y"> 
            <?php
                    while($similar_events->have_posts())
                    {
                        $similar_events->the_post();
                        // print_r($post->ID);
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
                                                if($i==2){break;}
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
            ?>
                        <div class="cell large-12">
                            <div class="link-wrapper text-right">
                                <a href="<?= get_site_url(); ?>/event/">Visa FLER</a>
                            </div>
                        </div>
            <?php
                }
                // else
                // {
            ?>
             <!-- <h3>No posts found</h3> -->
            <?php       
                // }
                wp_reset_postdata();
            ?>
             
        </div>
    </div>   
</section>
<section class="more-about-orgnaizer">
    <div class="grid-container">        
        <h4>Liknande arrangörer</h4>
        <div class="grid-x grid-margin-x grid-margin-y">
            <?php
                
                $all_organisations = new WP_Query(array(
                    "post_type" => "organisations",
                    "post_status" => "publish",
                    "posts_per_page" => 3,
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
                    <a href="<?= get_site_url(); ?>/organisations/">Visa FLER</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
	}
get_footer();
