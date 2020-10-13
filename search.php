<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package agenda
 */

get_header();
?>

<section class="search-section">
	<div class="grid-container">
		<div class="grid-x grid-padding-x grid-padding-y">
			<?php
				while(have_posts())
				{
					the_post();
					if(get_post_type(get_the_ID()) == "event_listing")
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
				wp_reset_postdata();
			?>
		</div>

		<div class="grid-x grid-padding-x">

			<?php
				while(have_posts())
				{
					the_post();
					if(get_post_type(get_the_ID()) == "organisations")
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
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<?php
get_footer();
