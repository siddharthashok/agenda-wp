<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agenda
 */

get_header();
?>

<section class="equality-events">
    <div class="grid-container">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Home</a></li>
                <li><a href="#" class="active">Events</a></li>
            </ul>
        </nav>
        <h2 class="title">Evenemang för jämlikhet</h2>
        <p class="about">Agenda: Jämlikhet samlar evenemang som på olika sätt handlar om jämlikhetsfrågor. Evenemangen kommer från olika organisationer och arrangörer som alla är politiskt och religiöst obundna. Vare sig du deltagit i många evenemang eller vill gå på ditt första hittar du något som passar dig i vår eventkalender. Tillsammans gör vi skillnad.</p>
        <!-- start of event cards -->
        <div class="grid-x grid-margin-x grid-margin-y">
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
									<img src="<?= get_the_post_thumbnail_url(); ?>" alt="image of event">
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
            
            <!-- <div class="cell large-4">
                <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">event </span>
                        <span class="entrace-info">Fritt inträde</span>
                    </div>
                    <div class="content">
                        <h3>Mötesplats för alla barn och regnbågsfamiljer</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
                    </div>
                </a>
            </div> -->
            <!-- <div class="cell large-4">
                <a href="#" class="card-with-image">
                    <div class="image-wrapper">
                        <img src="img/ngo.jpg" alt="">
                        <div class="date">
                            <span class="day">25</span>
                            <span class="month">December</span>
                        </div>
                    </div>
                    <div class="card-title-wrap">
                        <span class="category">event </span>
                        <span class="entrace-info">Fritt inträde</span>
                    </div> 
                    <div class="content">
                        <h3>Mötesplats för alla barn och regnbågsfamiljer</h3>
                        <p class="organizer">Arrangör: RFSL Göteborg</p>
                        <p class="location">Plats: Högalidsgatan 40D, Göteborg</p>
                        <p class="date">Tid: 25 sept - 26 sept, kl 17-18</p>
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
