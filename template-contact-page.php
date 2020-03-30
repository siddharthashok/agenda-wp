<?php

/**
 * Template Name: Contact Page
 * @package agenda
 */
get_header();
?>
<section class="contact-page">
    <div class="grid-container ">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                <li><a href="<?= get_site_url(); ?>/contact" class="active">Kontakt</a></li>
            </ul>
        </nav>
        <h3 class="title"><?= get_field("title");?></h3>
        <!-- <p>
            I dagsläget finns Agenda: Jämlikhets volontärgrupp bara i Göteborg men vi planerar att starta grupper även i Stockholm och Malmö. Maila oss på <a href="mailto:xxx@xx.com">xxx@xx.com</a> om du är intresserad så hör vi av oss!
        </p> -->
        <?= get_field("paragraph");?>
        <div>
            <?php
                $contact_us_text = get_field("contact_us_text");
            ?>
            <span class="subtitle"><?= $contact_us_text["title"];?></span>
            <?= $contact_us_text["paragraph"];?>
        </div>
        <div>
            <?php
                $tips_text = get_field("tips_text");
            ?>
            <span class="subtitle"><?= $tips_text["title"];?></span>
            <?= $tips_text["paragraph"];?>
        </div>
        <p>
            <span class="subtitle">Kontaktperso ner</span>
            <div class="grid-x">
                <?php
                    if(have_rows("contact_persons"))
                    {
                        while(have_rows("contact_persons"))
                        {
                            the_row();
                ?>
                            <div class="cell medium-6">
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
               
                <!-- <div class="cell medium-6">
                    <div class="contacts">
                        <div class="contact-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        </div>
                        <div class="contact-details ">
                            <p>Agenda: Jämlikhet Stockholm: <br>
                                Sofie Efternamn<br>
                                <a href="mailto:email@agendajamlikhet.se">email@agendajamlikhet.se</a><br>
                                <a href="tel:070-000-00-00">070-000 00 00</a>
                            </p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="cell medium-6">
                    <div class="contacts">
                        <div class="contact-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        </div>
                        <div class="contact-details ">
                            <p>Agenda: Jämlikhet Malmö: <br>
                                Irma Efternamn<br>
                                <a href="mailto:email@agendajamlikhet.se">email@agendajamlikhet.se</a><br>
                                <a href="tel:070-000-00-00">070-000 00 00</a>
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </p>
        <div>
            <span class="subtitle">Styrelse för Agenda: Jämlikhet</span>
            <div>
                <?php
                    if(have_rows("board_of_agenda"))
                    {
                        while(have_rows("board_of_agenda"))
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
                
                <!-- <p>Amanda Liedberg, vice ordförande,<br><a href="mailto: amanda.liedberg@agendajamlikhet.se"> amanda.liedberg@agendajamlikhet.se</a> </p>
                <p>Irma Nilsson, sekreterare, <br><a href="mailto:irma.nilsson@agendajamlikhet.se">irma.nilsson@agendajamlikhet.se</a></p>
                <p>Anna Lindeborg, kassör, 0708338238,<br><a href="mailto:anna@agendajamlikhet.se "> anna@agendajamlikhet.se </a></p>
                <p>Egle Obcarskaite, ledamot,<br><a href="mailto:egle.obcarskaite@agendajamlikhet.se"> egle.obcarskaite@agendajamlikhet.se</a> </p>
                <p>Ella Strömbom, ledamot,<br> <a href="mailto:ella.strombom@agendajamlikhet.se">ella.strombom@agendajamlikhet.se</a> </p> -->
            </div>
        </div>
    </div>


    </div>

</section>

<?php
get_footer();
?>