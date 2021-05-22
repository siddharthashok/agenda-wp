<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package agenda
 */

get_header();
global $query_string;

// query_posts(array("posts_per_page" => -1));
?>

<section class="search-section">
	<div class="grid-container">
		<div class="grid-x grid-padding-x grid-padding-y">
			
			<?php
				$at_least_one_event = false;
				while(have_posts())
				{
					the_post();
					if(get_post_type(get_the_ID()) == "event")
					{
						
						if($at_least_one_event==false)
						{
							$at_least_one_event = true;
			?>
							<div class="cell large-12">
								<h3>Events</h3>
							</div>
			<?php
						}
			?>
					<div class="cell large-4 card-margin">
						<a href="<?= get_permalink(); ?>" class="card-with-image">
							<div class="image-wrapper">
								<img src="<?= get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="image of event">
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
							
							<div class="card-title-wrap">
									<span class="category">event </span>
									<span class="entrace-info">
										<?php
											$categories = get_the_category();

											foreach($categories as $key => $value)
											{
										?>
												<span><?= $value->name; ?> , </span>
										<?php
											}
										?>
									</span>
							</div> 
							<div class="content">
								<h3><?= get_the_title(); ?></h3>
								<p class="organizer">Arrangör: <?= get_field("organizer")->post_title;?></p>
								<p class="location">Plats: <?= get_field("place")["address"]; ?></p>
								<?php
									$start_date = strtotime(get_field("start_date"));
									$end_date = strtotime(get_field("end_date_time"));
									$start_time = date("G.i",$start_date);
									$end_time = date("G.i",$end_date);

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

		<div class="grid-x grid-padding-x grid-padding-y organisation-search" >
			<?php
				$at_least_one_organisation = false;
				while(have_posts())
				{
					the_post();
					if(get_post_type(get_the_ID()) == "organisations")
					{
						if($at_least_one_organisation==false)
						{
							$at_least_one_organisation = true;
			?>
							<div class="cell large-12">
								<h3>Organisations</h3>
							</div>
			<?php
						}
			?>
					<div class="cell large-4 card-margin">
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
								<p class="cause">
									<?php
										$categories = get_the_category();

										foreach($categories as $key => $value)
										{
									?>
											<span><?= $value->name; ?> , </span>
									<?php
										}
									?>
                                </p>
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
