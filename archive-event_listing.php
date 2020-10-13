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

<section class="equality-events" id="flter-container">
	<div class="sidebar">
		<h2 class="title">Filter</h2>
		<div class="filter-block">
			<h4>Amnen</h4>
			<ul class="menu vertical">
				<li>
					<a href="#" class="is-active" data-type="category" data-slug="" v-on:click="filter">
						Alla ämnen
					</a>
				</li>
				<?php
					$all_terms = get_terms(array(
						"taxonomy" => "event_categories",
						'hide_empty' => false
					));
					// print_r($all_terms);
					// die();
					if(sizeof($all_terms)!=0)
					{
						foreach ($all_terms as $key => $value) {
				?>
						<li>
							<a href="#" data-type="category" data-slug="<?= $value->slug; ?>" v-on:click="filter">
								<?= $value->name; ?>
							</a>
						</li>
				<?php
						}
					}
				?>
			</ul>
		</div>
		<div class="filter-block">
			<h4>Datum</h4>
			<ul class="menu vertical">
				<li>
					<a href="#" data-slug="" v-on:click="filter">
						Alla datum
					</a>
				</li>
				<li>
					<a href="#" data-slug="" v-on:click="filter">
						Från ... Till
					</a>
				</li>
				<li>
					<a href="#" data-slug="" v-on:click="filter">
						Idag
					</a>
				</li>
				<li>
					<a href="#" data-slug="" v-on:click="filter">
						Den här helgen
					</a>
				</li> 
			</ul>			
		</div>
		<div class="filter-block">
			<h4>Typ av event</h4>
			<ul class="menu vertical">
				<li>
					<a href="#" class="is-active" data-type="event-type" data-slug="" v-on:click="filter">
						Alla format
					</a>
				</li>
				<?php
					$all_terms = get_terms(array(
						"taxonomy" => "event_tags",
						'hide_empty' => false
					));
					if(sizeof($all_terms)!=0)
					{
						foreach ($all_terms as $key => $value) {
				?>
						<li>
							<a href="#" data-type="event-type" data-slug="<?= $value->slug; ?>" v-on:click="filter">
								<?= $value->name; ?>
							</a>
						</li>
				<?php
						}
					}
				?>
			</ul>			
		</div>
		<div class="filter-block">
			<h4>Tillgänglighet</h4>
			<ul class="menu vertical">
				<?php
					$terms = get_terms('availability',array(
						'hide_empty' => false,
					));

					foreach ($terms as $key => $value) {
				?>
					<li>
						<a data-type="availability-type" data-slug="<?= $value->slug; ?>" href="#" v-on:click="filter"><?= $value->name; ?></a>
					</li>		
				<?php
					}
				?>
				
				<!-- <li>
					<a href="">Hörapparat</a>
				</li> -->
			</ul>			
		</div>
	</div>
	<div class="sidebar-content">
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
				
				<div class="cell large-6" v-for="event in events">
					<a :href="event.permalink" class="card-with-image">
						<div class="image-wrapper">
							<img :src="event.featured_image" alt="image of event">
							<div class="date">
								<span class="day">{{event.day}}</span>
								<span class="month">{{event.month}}</span>
							</div>
						</div>
						
						<div class="card-title-wrap">
								<span class="category">event </span>
								<span class="entrace-info">Fritt inträde</span>
						</div> 
						<div class="content">
							<h3>{{event.title}}</h3>
							<p class="organizer">Arrangör: {{event.organiser}}</p>
							<p class="location">Plats: {{event.place}}</p>
							<p class="date">Tid: {{event.dateTime}}</p>
						</div>
					</a> 
				</div>	
			</div>
		</div>
		<div class="connect-card-wrap connect-event-orgnisation">
			<div class="grid-container">
				<div class="title-wrap"><a href="#" class="see-few-all">Se färre</a></div>
				<div class="grid-x grid-margin-y grid-margin-x">
					<div class="cell large-6">
						<div class="connect-card blue">
							<div class="content">
								<h3>Är du organisation eller arrangör av jämlikhetsevent?</h3>
								<p class="connect-card-text">Vill du att din organisation ska synas på Agenda: Jämlikhet eller publicera ditt event i vår kalender?
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
		</div>
	</div>
</section>
<?php
get_footer();
?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    let filterContainer = new Vue({
        el: "#flter-container",
        data: {
            events:""
        },
        created: function(){
            this.filterEvents();
        },
        methods: {
            filterEvents: function(category="",type="",availability="")
            {
                let self = this;
                $.ajax({
                    url: siteURL + "/wp-admin/admin-ajax.php",
                    type: "POST",
                    data: {
                        "category" : category,
						"type" : type,
						"availability" : availability,
                        "action": "filter_events"
                    },
                }).then(function (reply) {
                    self.events = JSON.parse(reply);
                });
            },

            filter: function(e)
            {
                e.preventDefault();
				let type = e.target.dataset.type;
                // let slug = e.target.dataset.slug;
				let category = "";
				let eventType = "";

				$("[data-type='"+type+"']").removeClass("is-active");
				$(e.target).addClass("is-active");

				category = $(".is-active[data-type='category']").data("slug");
				eventType = $(".is-active[data-type='event-type']").data("slug");
				availability = $(".is-active[data-type='availability-type']").data("slug");

                this.filterEvents(category, eventType, availability);
            }
        }
    });
</script>
