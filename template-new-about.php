<?php

/**
 * Template Name: New About Page
 * @package agenda
 */
get_header();
?>
<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="cell large-12">
            <nav>
                <ul class="breadcrumbs">
                    <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                    <li><a href="#" class="active">Om Agenda: Jämlikhet</a></li>
                </ul>
            </nav>
        </div>
        <div class="cell medium-8">
            <section class="about-page">
            <!-- <div class="grid-container "> -->
                <h2 class="title">
                    <?= get_field("title");?>
                </h2>
                <div class="grid-x ">
                    <div class="cell small-12">
                        <div class="about-img">
                            <img src="<?= get_field("banner_image") ? get_field("banner_image") : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="">
                        </div>
                    </div>
                </div>


                <?= get_field("paragraph");?>
                <div class="text-block">
                    <?php
                        $block_one = get_field("block_one");
                    ?>
                    <h3 class="sub-title green"><?= $block_one["title"];?></h3>
                    <?= $block_one["paragraph"];?>
                </div>
                <div class="info-card hawkes-blue">
                    <h3 class="card-title">Gillar du Agenda: Jämlikhet och vill stötta oss i vårt arbete? Bli medlem!</h3>
                    <p class="card-description">Det kostar ingenting och är ett enkelt och snabbt sätt att bidra. Ett stort medlemsstöd hjälper oss när vi behöver söka om projektstöd eller annat typ av finansiering för att utveckla vår verksamhet. 
                    </p>
                    <a href="<?= get_site_url();?>/member" class="link">BLI MEDLEM NU</a>
                </div>
                <div class="info-card albescent-white">
                    <h3 class="card-title">Brinner du för jämlikhet och vill dra igång något nytt?</h3>
                    <p class="card-description">Vi söker en eller flera som vill starta upp en lokal organisation för Agenda: Jämlikhet i Malmö och Stockholm. Tillsammans blir vi starka. 
                    </p>
                    <a href="<?= get_site_url();?>/volunteer-form" class="link">LÄS MER OCH LÅT DIG INSPIRERAS</a>
                </div>
                
            </section>
        </div>
        <div class="cell medium-4">
            <section class="contact-page">
                <div class="contact-wrapper">
                    <div>
                        <?php
                            $contact_us_text = get_field("contact_contact_us_text");
                        ?>
                        <h6><?= $contact_us_text["title"];?></h6>
                        <?= $contact_us_text["paragraph"];?>
                    </div>
                    <div>
                        <?php
                            $tips_text = get_field("contact_tips_text");
                        ?>
                        <h6><?= $tips_text["title"];?></h6>
                        <?= $tips_text["paragraph"];?>
                    </div>
                    <span class="subtitle">Kontaktperso ner</span>
                    <div class="grid-x">
                        <?php
                            if(have_rows("contact_contact_persons"))
                            {
                                while(have_rows("contact_contact_persons"))
                                {
                                    the_row();
                        ?>
                                    <div class="cell medium-12">
                                        <div class="contacts">
                                            <div class="contact-img">
                                                <img src="<?= get_sub_field("image");?>" alt="">
                                            </div>
                                            <div class="contact-details ">
                                                <p><?= get_sub_field("title"); ?><br>
                                                    <?= get_sub_field("full_name"); ?><br>
                                                    <a href="mailto:<?= get_sub_field("email");?>"><?= get_sub_field("email");?></a><br>
                                                    <a href="tel:<?= get_sub_field("contact_number");?>"><?= get_sub_field("contact_number");?></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="grid-container"> -->
                        <span class="subtitle">Styrelse för Agenda: Jämlikhet</span>
                        <div >
                            <?php
                                if(have_rows("contact_board_of_agenda"))
                                {
                                    while(have_rows("contact_board_of_agenda"))
                                    {
                                        the_row();
                            ?>
                                        <p>
                                            <?= get_sub_field("name"); ?>, <?= get_sub_field("designation"); ?>, <br>
                                            <a href="mailto:<?= get_sub_field("email"); ?>"> <?= get_sub_field("email"); ?></a>
                                        </p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <!-- <div class="sponser-list">
                            <h6 class="sub-title">Sponsorer </h6>
                            <div class="grid-x grid-margin-x grid-margin-y">
                                <?php
                                    while(have_rows("sponsor_list"))
                                    {
                                        the_row();
                                ?>
                                        <div class="cell medium-12">
                                            <img src="<?= get_sub_field("logo"); ?>" alt="kultur-ungdom">
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>   -->
                    <!-- </div> -->
                </div>

            </section>
        </div>
    </div>
</div>

<?php
get_footer();
?>