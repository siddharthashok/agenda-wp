<?php

/**
 * Template Name: Publish Event or Organisation
 * @package agenda
 */
get_header();
?>
<section class="event-org-page">
    <div class="grid-container ">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                <li><a href="#" class="active">Publicera på Agenda: Jämlikhet</a></li>
            </ul>
        </nav>
        <h3 class="title">
            Vill du publicera ditt evenemang i vår eventkalender eller att din organisation ska synas på Agenda: Jämlikhets hemsida?
        </h3>
        <a class=" button button-pink hollow small small-only-expanded" href="<?= get_site_url();?>/publish-event-form">PUBLICERA EVENEMANG</a>
        <p>
            Sprida ditt evenemang och nå ut till en större målgrupp genom att publicera det i vår eventkalender. Det är helt kostnadsfritt.
        </p>
        <a class=" button button-green hollow small small-only-expanded" href="<?= get_site_url();?>/publish-organisation-form" >ANSLUT DIN ORGANISATION</a>
        <p>
            Du kan också gå med i vårt nätverk av organisationer och bli en del av ett nätverk med över 100 andra organisationer som arbetar med jämlikhetsfrågor. På så vis kan du komma i kontakt med andra organisationer, dela kunskaper eller starta samarbeten.
        </p>
        <p>
            Genom att synas på Agenda: Jämlikhets hemsida kan du dessutom hitta personer som vill engagera sig i just din verksamhet. Det är helt kostnadsfritt och du registrerar dig enkelt i vårt formulär.
        </p>
        <p>
            Alla föreningar, grupper, organisationer, nätverk, stiftelser och kampanjer som på olika sätt jobbar med jämlikhetsfrågor är välkomna. Vi publicerar inte företagsevenemang eller partipolitiska tillställningar.
        </p>
        <p>Läs igenom vår <a class="links">riktlinjer</a> innan du registrerar dig.</p>
    </div>

</section>
<?php
get_footer();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

<script src="<?= get_template_directory_uri() ?>/js/org-form.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/event-form.js"></script>