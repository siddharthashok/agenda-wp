<?php

/**
 * Template Name: About Page
 * @package agenda
 */
get_header();
?>
<section class="about-page">
    <div class="grid-container ">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                <li><a href="<?= get_site_url(); ?>/about-page" class="active">Om Agenda: Jämlikhet</a></li>
            </ul>
        </nav>
        <h2 class="title">
            Agenda: Jämlikhet är en ideell politiskt och religös obunden förening.
        </h2>
        <div class="grid-x ">
            <div class="cell small-12">
                <div class="about-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/ngo.jpg" alt="">
                </div>
            </div>
        </div>


        <p>
            Sedan starten den 8e mars 2014 har vi på Agenda: Jämlikhet arbetat för att göra det enklare att ta steget och engagera sig för jämlikhet. I vår eventkalender samlar vi evenemang som på olika sätt handlar om jämlikhetsfrågor. Evenemangen kommer från olika organisationer och arrangörer. Vi erbjuder också ett nätverk för organisationer och arrangörer som arbetar med jämlikhetsfrågor. Nätverket förenklar kontakt organisationerna emellan och möjliggör kunskapsspridning, diskussioner och samarbeten.
        </p>
        <p>
            Agenda: Jämlikhet är en ideell politiskt och religiöst obunden förening. Vi finns idag i Göteborg men planerar att starta upp lokala grupper i Stockholm och Malmö.
        </p>
        <div>
            <h3 class="sub-title">Vi ser ett ojämlikt samhälle </h3>
            <p>Högerextrema krafter är på frammarsch, misogyni blir mer och mer rumsrent och klyftorna mellan de rikaste och de fattigaste i Sverige blir allt större. Vi ser att behovet av engagemang idag är större än någonsin. Samtidigt har vårt samhälle blivit allt mer individualiserat. Men för att förändra de ojämlika strukturerna måste vi agera tillsammans – det krävs en omfattande organisering. Genom att samla evenemang, arrangörer och organisationer på ett ställe tar vi ett viktigt steg mot en organiserad jämlikhetskamp. Agenda: Jämlikhet vill se en stark jämlikhetsrörelse med många olika röster, perspektiv, metoder och mål. </p>
            <p>Agenda: Jämlikhets eventkalender och nätverk av organisationer sänker tröskeln för dig att engagera dig i jämlikhetsfrågor. Vi gör det enkelt för dig att gå från ord till handling. Med jämlikhet på agendan arbetar vi för ett samhälle fritt från diskriminering och förtryck.</p>
        </div>
        <div class="sponser-list">
            <h3 class="sub-title">Sponsorer </h3>
            <div class="grid-x grid-margin-x">
                <div class="cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/kultur-ungdom.png" alt="kultur-ungdom">
                </div>
                <div class="cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mucf.png" alt="mucf">
                </div>
                <div class="cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/ladyborg.png" alt="ladyborg">
                </div>
                <div class=" cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/vastra.png" alt="vastra">
                </div>

            </div>
        </div>
    </div>

</section>

<?php
get_footer();
?>