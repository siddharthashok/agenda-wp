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

<section class="organisation" id="flter-container">
    <div class="sidebar">
        <h2 class="title">Filter</h2>
        <h4>Amnen</h4>
        <ul class="menu vertical">
            <li>
                <a href="#" data-slug="" v-on:click="filter">
                    Alla ämnen
                </a>
            </li>
            <?php
                $all_terms = get_terms(array(
                    "taxonomy" => "organisation_category"
                ));
                // print_r($all_terms);
                // die();
                if(sizeof($all_terms)!=0)
                {
                    foreach ($all_terms as $key => $value) {
            ?>
                    <li>
                        <a href="#" data-slug="<?= $value->slug; ?>" v-on:click="filter">
                            <?= $value->name; ?>
                        </a>
                    </li>
            <?php
                    }
                }
            ?>
            <!-- <li><a href="#">Alla ämnen</a></li>
            <li><a href="#">Utbildning och kunskap</a></li>
            <li><a href="#">Våld och diskriminering</a></li>
            <li><a href="#">Jämnställdhet</a></li>
            <li><a href="#">Ekonomisk och social utsatthet</a></li> -->
        </ul>
    </div>
    <div class="sidebar-content">
        <div class="grid-container">
            <!-- <nav>
                <ul class="breadcrumbs">
                    <li><a href="<?= get_site_url(); ?>">Home</a></li>
                    <li><a href="#" class="active">Organisations</a></li>
                </ul>
            </nav> -->
            <h2 class="title">Organisations</h2>
            <p class="about">Agenda: Jämlikhet samarbetar med över 100 organisationer som engagerar sig i jämlikhetsfrågor på olika sätt. Här hittar du en organisation som behöver dig och ditt engagemang!</p>
        
            <div class="grid-x grid-margin-x grid-margin-y">
                <div class="cell large-6" v-for="organisation in organisations">
                    <a class="card-with-image" :href="organisation.permalink">
                        <div class="image-wrapper">
                            <img :src="organisation.featured_image" alt="image of the organisation">
                        </div>
                        <div class="card-title-wrap">
                            <span class="category">organisation </span>
                        </div> 
                        <div class="content">
                            <h3>{{organisation.title}}</h3>
                            <!-- <p class="cause">Mänskliga rättigheter</p> -->
                        </div>
                    </a>
                </div> 
            </div> 
        </div>
        <div class="connect-card-wrap connect-event-orgnisation">
            <div class="grid-container">
                <div class="title-wrap">
                    <span class="line"></span>
                    <a href="<?= get_site_url();?>/publish-event-organisation" class="see-few-all">se FLER ORGANISATIONER</a>
                </div>
                <div class="grid-x grid-margin-y grid-margin-x">
                
                    <div class="cell large-12">
                        <div class="connect-card blue">
                            <div class="content">
                                <h3>Är du organisation eller arrangör av jämlikhetsevent?</h3>
                                <p class="connect-card-text">Vill du att din organisation ska synas på Agenda: Jämlikhet eller publicera ditt event i vår kalender?
                                </p>
                                <a href="<?= get_site_url();?>/publish-event-organisation" class="connect-link">ANSLUT DIN DIN ORGANISATION TILL AGENDA: JÄMLIKHET</a>
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
            organisations:""
        },
        created: function(){
            this.filterOrganisation();
        },
        methods: {
            filterOrganisation: function(slug="")
            {
                let self = this;
                $.ajax({
                    url: siteURL + "/wp-admin/admin-ajax.php",
                    type: "POST",
                    data: {
                        "category" : slug,
                        "action": "filter_organisation"
                    },
                }).then(function (reply) {
                    self.organisations = JSON.parse(reply);
                });
            },

            filter: function(e)
            {
                e.preventDefault();
                let slug = e.target.dataset.slug;
                $("[data-slug]").removeClass("is-active");
                $(e.target).addClass("is-active");
                this.filterOrganisation(slug);
            }
        }
    });
</script>
