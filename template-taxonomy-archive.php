<?php
/**
 * Template Name: Organisation archive
 * 
 * @package  agenda
 */
get_header();

while(have_posts())
{
    the_post();
?>

<section class="organisation">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li><a href="#" class="active">Organisations</a></li>
            </ul>
        </nav>
        <h2 class="title"><?= get_the_title(); ?></h2>
        <p class="about"><?= wp_strip_all_tags(get_the_content()) ;?></p>
      
        <div class="grid-x grid-margin-x grid-margin-y">
            <?php
                $all_organisations = get_terms(array(
                    "taxonomy" => "organisation",
                    "hide_empty" => "true"
                ));

                foreach ($all_organisations as $key => $value) 
                {
            ?>
                    <div class="cell large-4">
                        <a class="card-with-image" href="<?= get_term_link($value->term_id, $value->taxonomy )?>">
                            <div class="image-wrapper">
                                <img src="<?= get_field("featured_image",$value->taxonomy."_".$value->term_id); ?>" alt="">
                                <!-- <div class="date">
                                    <span class="day">25</span>
                                    <span class="month">December</span>
                                </div> -->
                            </div>
                            <div class="card-title-wrap">
                                <span class="category">organisation </span>
                            </div> 
                            <div class="content">
                                <h3><?= $value->name; ?></h3>
                                <p class="cause">Mänskliga rättigheter</p>
                            </div>
                        </a>
                    </div>
            <?php
                }
            ?>
            
            <!-- <div class="cell large-4">
                <a class="card-with-image" href="#">
                    <div class="image-wrapper">
                        <img src="img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">organisation </span>
                    </div> 
                    <div class="content">
                        <h3>Mötesplats för alla barn och regnbågsfamiljer</h3>
                        <p class="cause">Mänskliga rättigheter</p>
                    </div>
                </a>
            </div> -->
            <!-- <div class="cell large-4">
                <a class="card-with-image" href="#">
                    <div class="image-wrapper">
                        <img src="img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">organisation </span>
                    </div> 
                    <div class="content">
                        <h3>Mötesplats för alla barn och regnbågsfamiljer</h3>
                        <p class="cause">Mänskliga rättigheter</p>
                    </div>
                </a>
            </div> -->
        </div> 
    </div>
</section>
<section class="connect-card-wrap connect-event-orgnisation">
    <div class="grid-container">
        <div class="title-wrap"><a href="#" class="see-few-all">Se färre</a></div>
        <div class="grid-x grid-margin-y grid-margin-x">
           
            <div class="cell large-6">
                <div class="connect-card blue">
                    <div class="content">
                        <h3>Är du organisation eller arrangör av jämlikhetsevent?</h3>
                        <p class="connect-card-text">Vill du att din organisation ska synas på  Agenda: Jämlikhet eller publicera ditt event  i vår kalender?
                        </p>
                        <a href="#" class="connect-link">ANSLUT DIN DIN ORGANISATION TILL AGENDA: JÄMLIKHET</a>
                    </div>
                </div>
            </div>
            <div class="cell large-6">
                <div class="connect-card purple">
                    <div class="content">
                        <h3>Brinner du för jämlikhet och vill dra igång något nytt?</h3>
                        <p class="connect-card-text">Vi söker en eller flera som vill starta upp en lokal organisation för Agenda: Jämlikhet i Malmö och Stockholm. Tillsammans blir vi starka.
                        </p>
                        <a href="#" class="connect-link">ANSLUT DIN DIN ORGANISATION TILL AGENDA: JÄMLIKHET</a>
                    </div>
                </div>
            </div>
        </div>   
    </div>    
</section>

<?php
}
get_footer();
?>