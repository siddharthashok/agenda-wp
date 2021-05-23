<?php
    get_header();

    $term = get_term_by('slug',get_query_var( 'term' ),get_query_var('taxonomy'));
?>
<section class="organisation-details">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Home</a></li>
                <li><a href="<?= get_site_url(); ?>/organisations/">Organisations</a></li>
                <li><a href="#" class="active"><?= $term->name; ?></a></li>
            </ul>
        </nav>
        <div class="grid-x">
            <div class="cell large-12">
                <div class="card-with-image">
                    <div class="image-wrapper">

                        <img src="<?= get_field("featured_image",$term->taxonomy."_".$term->term_id); ?>" alt="image of the organisation">
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">Organisation</span>
                    </div> 
                    <div class="content">
                        <h3><?= $term->name; ?></h3>
                        <?php
                            $contact_details = get_field("contact_details",$term->taxonomy."_".$term->term_id);

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
                        <p>
                            <?= $term->description;?>
                        </p>
                        <a class="read-more-wrap"> <p class="read-more">LÄS MER</p></a>
                    
                        <h6>Tagger</h6>
                        <p class="hashtags">#MÄNSKLIGA RÄTTIGHETER #GÖTEBORG</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- start of events cards -->
<section class="events-from-organiser">
    <div class="grid-container">
        <a href="#" class="active section-title">Evenemang från denna arrangör</a>
        <div class="grid-x grid-margin-x grid-margin-y">
            <?php
                while(have_posts())
                {
                    the_post();
            ?>
                    <div class="cell large-4">
                        <a href="<?= get_permalink(); ?>" class="card-with-image">
                            <div class="image-wrapper">
                                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image of event">
                                <div class="date">
                                    <?php
                                        $date = strtotime(get_field("start_date"));
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
                                <p class="organizer">Arrangör: <?= get_field("organizer");?></p>
                                <p class="location">Plats: <?= get_field("place")["address"]; ?></p>
                                <?php
                                    $start_date = strtotime(get_field("start_date"));
                                    $end_date = strtotime(get_field("end_date"));
                                    $start_time = get_field("start_time");
                                    $end_time = get_field("end_time");

                                    $format_date = date("d M",$start_date) . " - " . date("d M",$end_date).", ".$start_time. "-".$end_time;
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
</section>

<!-- start of organisation cards -->
<section class="organisation">
    <div class="grid-container">
        <span href="#" class="active section-title">Se liknande organisationer</span>
        <div class="grid-x grid-margin-x grid-margin-y">
            <?php
                $all_terms = get_terms(array(
                    "taxonomy" => "organisation",
                    "hide_empty" => "true",
                    "number" => 3
                ));

                // print_r($all_terms);

                foreach ($all_terms as $key => $value) 
                {
                    if($term->term_id != $value->term_id)
                    {
            ?>
                    <div class="cell large-4">
                        <a class="card-with-image" href="<?= get_term_link( $value->term_id , $value->taxonomy ); ?>">
                            <div class="image-wrapper">
                                <img src="<?= get_field("featured_image",$value->taxonomy."_".$value->term_id); ?>" alt="image of the organisation">
                                <!-- <div class="date">
                                    <span class="day">25</span>
                                    <span class="month">December</span>
                                </div> -->
                            </div>
                            <div class="card-title-wrap">
                                <span class="category">Organisation </span>
                            </div> 
                            <div class="content">
                                <h3><?= $value->name; ?></h3>
                                <p class="cause">Mänskliga rättigheter</p>
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