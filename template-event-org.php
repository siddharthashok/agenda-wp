<?php

/**
 * Template Name: Event Org Page
 * @package agenda
 */
get_header();
?>
<section class="event-org-page">
    <div class="grid-container ">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                <li><a href="<?= get_site_url(); ?>/event-org" class="active"><?= $term->name; ?>Publicera på Agenda: Jämlikhet</a></li>
            </ul>
        </nav>
        <h3 class="title">Vill du publicera ditt evenemang i vår eventkalender eller att din organisation ska synas på Agenda: Jämlikhets hemsida?</h3>
        <a class=" button button-pink hollow small small-only-expanded" href="#">PUBLICERA EVENEMANG</a>
        <p>Sprida ditt evenemang och nå ut till en större målgrupp genom att publicera det i vår eventkalender. Det är helt kostnadsfritt. </p>
        <a class=" button button-green hollow small small-only-expanded" href="#">ANSLUT DIN ORGANISATION</a>
        <p>Du kan också gå med i vårt nätverk av organisationer och bli en del av ett nätverk med över 100 andra organisationer som arbetar med jämlikhetsfrågor. På så vis kan du komma i kontakt med andra organisationer, dela kunskaper eller starta samarbeten. </p>
        <p>Genom att synas på Agenda: Jämlikhets hemsida kan du dessutom hitta personer som vill engagera sig i just din verksamhet. Det är helt kostnadsfritt och du registrerar dig enkelt i vårt formulär.</p>
        <p>Alla föreningar, grupper, organisationer, nätverk, stiftelser och kampanjer som på olika sätt jobbar med jämlikhetsfrågor är välkomna. Vi publicerar inte företagsevenemang eller partipolitiska tillställningar. </p>
        <p>Läs igenom vår <a class="links">riktlinjer</a> innan du registrerar dig.</p>
    </div>

</section>

<?php
get_footer();
?>