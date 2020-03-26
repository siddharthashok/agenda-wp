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
                <li><a href="<?= get_site_url(); ?>/organisations" class="active"><?= $term->name; ?>Kontakt</a></li>
            </ul>
        </nav>
        <h3 class="title">Vill du starta upp Agenda: Jämlikhet i din stad?</h3>
        <p>I dagsläget finns Agenda: Jämlikhets volontärgrupp bara i Göteborg men vi planerar att starta grupper även i Stockholm och Malmö. Maila oss på <a href="mailto:xxx@xx.com">xxx@xx.com</a> om du är intresserad så hör vi av oss!</p>
        <p>
            <span class="subtitle">Kontakta oss</span>
            Har du allmänna frågor eller funderingar?<br>
            Maila <a href="mailto:info@agendajamlikhet.se">info@agendajamlikhet.se</a>
        </p>
        <p>
            <span class="subtitle">Har du tips?</span>
            Har du tips på evenemang, organisationer eller annat i Göteborg, Stockholm eller Malmö för oss att publicera? <a href="mailto:info@agendajamlikhet.se">info@agendajamlikhet.se</a>
        </p>
        <p>
            <span class="subtitle">Kontaktperso ner</span>
            <div class="grid-x">
                <div class="cell medium-6">
                    <div class="contacts">
                        <div class="contact-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                        </div>
                        <div class="contact-details ">
                            <p>Agenda: Jämlikhet Göteborg <br>
                                Anna Efternamn<br>
                                <a href="mailto:email@agendajamlikhet.se">email@agendajamlikhet.se</a><br>
                                <a href="tel:070-000-00-00">070-000 00 00</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cell medium-6">
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
                </div>
                <div class="cell medium-6">
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
                </div>
            </div>
        </p>
        <div>
            <span class="subtitle">Styrelse för Agenda: Jämlikhet</span>
            <div>
                <p>Sofie Ekman, ordförande, <br><a href="mailto:sofie.ekman@agendajamlikhet.se"> sofie.ekman@agendajamlikhet.se</a></p>
                <p>Amanda Liedberg, vice ordförande,<br><a href="mailto: amanda.liedberg@agendajamlikhet.se"> amanda.liedberg@agendajamlikhet.se</a> </p>
                <p>Irma Nilsson, sekreterare, <br><a href="mailto:irma.nilsson@agendajamlikhet.se">irma.nilsson@agendajamlikhet.se</a></p>
                <p>Anna Lindeborg, kassör, 0708338238,<br><a href="mailto:anna@agendajamlikhet.se "> anna@agendajamlikhet.se </a></p>
                <p>Egle Obcarskaite, ledamot,<br><a href="mailto:egle.obcarskaite@agendajamlikhet.se"> egle.obcarskaite@agendajamlikhet.se</a> </p>
                <p>Ella Strömbom, ledamot,<br> <a href="mailto:ella.strombom@agendajamlikhet.se">ella.strombom@agendajamlikhet.se</a> </p>
            </div>
        </div>
    </div>


    </div>

</section>

<?php
get_footer();
?>