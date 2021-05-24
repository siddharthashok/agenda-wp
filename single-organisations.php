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
                <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                <li><a href="<?= get_site_url(); ?>/organisations/">Organisationer</a></li>
                <li><a href="#" class="active"><?= get_the_title(); ?></a></li>
            </ul>
        </nav>
        <div class="grid-x">
            <div class="cell large-12">
                <div class="card-with-image organisation-content">
                    <div class="image-wrapper">
                        <img src="<?= get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="image of the organisation">
                    </div> 
                    <div class="content">
                        <div class="sidebar">
                            <?php
                                $contact_details = get_field("contact_details");
                            ?>
                            <div class="label-link">
                                <h6>HEMSIDA</h6>
                                <!-- <a href="<?= $contact_details["website"]; ?>"><?= $contact_details["website"]; ?></a> -->
                                <a href="<?= $contact_details["website"]; ?>" title="<?= get_the_title(); ?>" target="_blank"><?= get_the_title(); ?></a>
                            </div>
                            <div class="label-link">
                                <h6>Email</h6>
                                <a href="mailto:<?= $contact_details["mail"]; ?>"><?= $contact_details["mail"]; ?></a>
                            </div>
                        </div>
                        <div class="content-wrapper">
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
                                <a href="<?= $contact_details["website"]; ?>" class="link" target="_blank">TILL ORGANISATIONENS HEMSIDA</a>
                            </div>
                        </div>
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
<section class="events-from-organiser d-none">
    <div class="grid-container">
        <h4>Evenemang från denna arrangör</h4>
        <div class="grid-x grid-padding-x grid-padding-y">
            <?php
                $current_organiser_id = $post->ID;
                $all_events = new WP_Query(array(
                    "post_type" => "event",
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
                                    <?php
                                        $temp_organiser = "";
                                        if(!empty(get_field("organizer")->post_title))
                                        {
                                    
                                            $temp_organiser = get_field("organizer")->post_title;
                                    
                                        }
                                        if(!empty(get_field("other_organizers")))
                                        {
                                    
                                            $temp_organiser = !empty(get_field("organizer")->post_title)? $temp_organiser." ,".get_field("other_organizers"): get_field("other_organizers");
                                    
                                        }
                                    ?>
                                    <p class="organizer">Arrangör: <?= $temp_organiser; ?></p>
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
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<!-- start of organisation cards -->
<section class="other-organisation">
    <div class="grid-container">
        <h4>Se liknande organisationer</h4>
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
