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
        <a class=" button button-pink hollow small small-only-expanded" href="#" data-open="event-form-modal">PUBLICERA EVENEMANG</a>
        <p>
            Sprida ditt evenemang och nå ut till en större målgrupp genom att publicera det i vår eventkalender. Det är helt kostnadsfritt.
        </p>
        <a class=" button button-green hollow small small-only-expanded" href="#" data-open="organisation-form">ANSLUT DIN ORGANISATION</a>
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

<div class="reveal" id="organisation-form" data-reveal>
    <section class="page-forms forms">
        <!-- <form id="orgForm" class="forms" action=""> -->
        <div class="grid-container">
            <div class="form-close">
                <h4 id="form-close-title">Anslut din organisation</h4>
                <button class="form-close-button" data-close type="button">
                    <h4>Stäng</h4>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg" alt="">
                </button>
            </div>
        </div>

        <div class="tab">
            <div class="form-header form-org ">
                <div class="grid-container ">
                    <h4>Steg 1 av 4</h4>
                    <h3>Introduktion</h3>
                </div>
            </div>
            <div class="form-body">
                <div class="grid-container ">
                    <p>Att publicera evenemang på  Agenda: Jämlikhet är kostnadsfritt. </p>
                    <p>[text här om vilka typer av event som passar sig att publicera på agenda]</p>
                    <p>Vår redaktion granskar allt innehåll och hör av sig till dig när det är publicerat.</p>
                </div>
            </div>
            <div style="overflow:auto;">
                <div class="grid-container ">
                    <div class="form-buttons">
                        <button type="button" id="step1Prev" class="btns form-org prevBtn">tillabaka</button>
                        <button type="button" id="step1Next" class="btns form-org nextBtn">nästa</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab">
            <form action="" data-form2-step="one">
                <div class="form-header form-org">
                    <div class="grid-container ">
                        <h4>Steg 2 av 4</h4>
                        <h3>Namn och plats</h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="grid-container ">
                        <p>Följande information om din organisation kommer att synas på vår hemsida. </p>
                        <p>* Obligatorisk information</p>
                        <div class="form-spacing">
                            <label class="full-width-label">Organisationens namn*</label>
                            <input name="org-name" class="full-width" placeholder="ex. Agenda: Jämlikhet">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Hemsida, webbadress</label>
                            <input name="webiste-url" class="full-width" placeholder="ex. agendajamliket.se">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Mailadress till organisationen (ex till en infomail)</label>
                            <input type="email" name='email-address' class="full-width" placeholder="ex. info@agendajamliket.se">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Länk till sociala medier</label>
                            <input name="social-link" class="full-width" placeholder="ex. instagram.se/agendajamliket/">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Ort/kommun*</label>
                            <input name="city" class="full-width" placeholder="ex. agendajamliket.se ">
                        </div>
                        <fieldset class="spacer">
                            <p class="form-links"><a>Ladda upp logga</a></p>
                        </fieldset>

                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="grid-container ">
                        <div class="form-buttons">
                            <button type="button" id="step2Prev" class="btns form-org prevBtn">tillabaka</button>
                            <button type="button" id="step2Next" class="btns form-org nextBtn">nästa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab">
            <form action="" data-form2-step="two">
                <div class="form-header form-org">
                    <div class="grid-container ">
                        <h4>Steg 3 av 4</h4>
                        <h3>Beskrivning av verksamhet</h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="grid-container ">
                        <p>Följande information om din organisation kommer att synas på vår hemsida. </p>
                        <p>* Obligatorisk information</p>
                        <div class="form-spacing">
                            <label class="full-width-label">Beskriv organisationens verksamhet (max 1250 tecken)*</label>
                            <textarea name="org-description" class="full-width" placeholder="ex. Vårt syfte är att..."></textarea>
                        </div>
                        <fieldset>
                            <p>Markera de frågor som din organisation arbetar med*</p>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-1" value="value1">
                            <label for="check3-1"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-2">
                            <label for="check3-2"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-3">
                            <label for="check3-3"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-4">
                            <label for="check3-4"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-5">
                            <label for="check3-5">Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-6">
                            <label for="check3-6"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-7">
                            <label for="check3-7"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-8">
                            <label for="check3-8"> Jämställdhet</label>
                            <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-9">
                            <label for="check3-9"> Jämställdhet</label>
                            <span id="checkbox_error"></span>
                        </fieldset>

                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="grid-container ">
                        <div class="form-buttons">
                            <button type="button" id="step3Prev" class="btns form-org prevBtn">tillabaka</button>
                            <button type="button" id="step3Next" class="btns form-org nextBtn">nästa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab">
            <form action="" data-form2-step="three">
                <div class="form-header form-org">
                    <div class="grid-container ">
                        <h4>Steg 4 av 4</h4>
                        <h3>Kontaktinformation</h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="grid-container ">
                        <p>Följande information kommer inte att synas på vår hemsida. Den är bara till för att vi ska kunna kontakta dig angående er ansökan. </p>
                        <p>* Obligatorisk information</p>
                        <div class="form-spacing">
                            <label class="full-width-label">Namn på kontaktperson*</label>
                            <input name="contact-name" class="full-width" placeholder="Förnamn och Efternamn">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Mailadress kontaktperson*</label>
                            <input type="email" name="contact-email-address" class="full-width" placeholder="ex. fornamn@agendajamlikhet.se">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Telefonnummer till kontaktperson*</label>
                            <input type="number" name="contact-phone-no" class="full-width" placeholder="ex. 0046 708790464">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Organisationsnummer*</label>
                            <input type="number" name="number" class="full-width" placeholder="ex. 192301018890">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Eventuellt meddelande till Agenda: Jämlikhet</label>
                            <textarea name="message" class="full-width" placeholder="Om du har frågor..."></textarea>
                        </div>
                        <fieldset>
                            <input class="styled-radio form-org" type="checkbox" id="check-circle-1"> <label for="check-circle-1">Jag bekräftar att jag har läst och står bakom Agenda: Jämlikhets<a class="links">värderingar och riktlinjer</a>för anslutna organisationer.</label>
                            <input class="styled-radio form-org" type="checkbox" id="check-circle-2"> <label for="check-circle-2">Jag godkänner att mina personuppgifter behandlas enligt Agenda: Jämlikhets <a class="links">integritetspolicy</a></label>
                        </fieldset>
                        <div class="form-submit">
                            <a class=" button button-green hollow small small-only-expanded " id="step4Next" href="#">SKICKA FORMULÄR</a>
                        </div>

                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="grid-container ">
                        <div class="form-buttons">
                            <button type="button" id="step4Prev" class="btns form-org prevBtn">tillabaka</button>
                            <button type="button" class="btns form-org nextBtn">nästa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab">
            <div class="form-body">
                <div class="grid-container ">
                    <h1 class="form-success-title form-org">Tack! </h1>
                    <p>Agenda: Jämlikhets redaktion granskar innehållet innan det publiceras på hemsidan. Vi notifierar dig när innehållet är uppe via angivna kontaktuppgifter. </p>
                    <fieldset class="spacer">
                        <p class="form-links email-icon"><a>Maila mig en kopia</a></p>
                    </fieldset>
                </div>
            </div>
        </div>
        <!-- </form> -->
    </section>
</div>
<!-- Event form -->
<div class="reveal" id="event-form-modal" data-reveal>
    <section class="page-forms forms">
        <!-- <form id="publishForm" class="forms" action=""> -->
        <div class="grid-container">
            <div class="form-close">
                <h4 id="form-close-title">Publicera evenemang</h4>
                <button class="form-close-button" data-close type="button">
                    <h4>Stäng</h4>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg" alt="">
                </button>
            </div>
        </div>
        <div class="tab">
            <div class="form-header form-publish ">
                <div class="grid-container ">
                    <h4>Steg 1 av 4</h4>
                    <h3>Introduktion</h3>
                </div>
            </div>
            <div class="form-body">
                <div class="grid-container ">
                    <p>Att publicera evenemang på  Agenda: Jämlikhet är kostnadsfritt. </p>
                    <p>[text här om vilka typer av event som passar sig att publicera på agenda]</p>
                    <p>Vår redaktion granskar allt innehåll och hör av sig till dig när det är publicerat.</p>
                </div>
            </div>
            <div style="overflow:auto;">
                <div class="grid-container ">
                    <div class="form-buttons">
                        <button type="button" id="form1step1Prev" class="btns form-publish prevBtn">tillabaka</button>
                        <button type="button" id="form1step1Next" class="btns form-publish nextBtn">nästa</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab">
            <form action="" data-form1-step="one">
                <div class="form-header form-publish">
                    <div class="grid-container ">
                        <h4>Steg 2 av 4</h4>
                        <h3>Tid och plats för event</h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="grid-container ">
                        <p>Följande information om din organisation kommer att synas på vår hemsida. </p>
                        <p>* Obligatorisk information</p>
                        <div class="form-spacing">
                            <label class="full-width-label">Titel på event*</label>
                            <input name="event-title" class="full-width" placeholder="input">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Arrangör*</label>
                            <input name="organizer" class="full-width" placeholder="t.ex. Agenda Jamliket">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Datum för event*</label>
                            <input id="event-datepicker" name="event-date" class="full-width" placeholder="Datumformat">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Tidpunkt för event*</label>
                            <input name="event-time" class="full-width" placeholder="Ange start och sluttidpunkt">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Plats för event*</label>
                            <input name="event-location" class="full-width" placeholder="tex Annedalsseminariet, gbg Universitet ">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Adress*</label>
                            <input name="address" class="full-width" placeholder="tex Annedalsseminariet, gbg Universitet ">
                        </div>
                        <fieldset>
                            <p>Markera de svarsalternativ som stämmer med lokalen*</p>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-1" name="check1[]"><label for="check1-1"> Ramp finns</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-2" name="check1[]"><label for="check1-2"> Eventet är på bottenplan</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-3" name="check1[]"><label for="check1-3"> Hiss finns</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-4" name="check1[]"><label for="check1-4"> Hörselslinga</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-5" name="check1[]"><label for="check1-5"> Syntolkning</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-6" name="check1[]"><label for="check1-6"> Sittplatser</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check1-7" name="check1[]"><label for="check1-7"> Teckenspråkstolkning</label>
                            <span id="checkbox1_error"></span>
                        </fieldset>
                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="grid-container ">
                        <div class="form-buttons">
                            <button type="button" id="form1step2Prev" class="btns form-publish prevBtn">tillabaka</button>
                            <button type="button" id="form1step2Next" class="btns form-publish nextBtn">nästa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab">
            <form action="" data-form1-step="two">
                <div class="form-header form-publish">
                    <div class="grid-container ">
                        <h4>Steg 3 av 4</h4>
                        <h3>Beskrivning av event</h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="grid-container ">
                        <p>Följande information om din organisation kommer att synas på vår hemsida. </p>
                        <p>* Obligatorisk information</p>
                        <div class="form-spacing">
                            <label class="full-width-label">Beskrivning av event (max 1250 tecken)*</label>
                            <textarea name="event-description" class="full-width" placeholder="ex. Vårt syfte är att..."></textarea>
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Kostnad för event*</label>
                            <input name="event-cost" class="full-width" placeholder="t.ex. 0kr">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Hemsida för evenemang</label>
                            <input class="full-width" placeholder="t.ex. 0kr">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Länk till facebook-event</label>
                            <input class="full-width" placeholder="t.ex. 0kr">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Länk till arrangörens hemsida</label>
                            <input class="full-width" placeholder="t.ex. 0kr ">
                        </div>

                        <fieldset>
                            <p>Markera de svarsalternativ som eventet berör*</p>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-1" name="check2[]"><label for="check2-1"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-2" name="check2[]"><label for="check2-2"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-3" name="check2[]"><label for="check2-3"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-4" name="check2[]"><label for="check2-4"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-5" name="check2[]"><label for="check2-5">Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-6" name="check2[]"><label for="check2-6"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-7" name="check2[]"><label for="check2-7"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-8" name="check2[]"><label for="check2-8"> Jämställdhet</label>
                            <input class="styled-checkbox form-publish" type="checkbox" id="check2-9" name="check2[]"><label for="check2-9"> Jämställdhet</label>
                            <span id="checkbox2_error"></span>
                        </fieldset>
                        <fieldset>
                            <p class="form-links"><a>Ladda upp bild till evenemanget</a></p>
                            <p class="form-links"><a>Ladda upp logga</a></p>
                        </fieldset>
                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="grid-container ">
                        <div class="form-buttons">
                            <button type="button" id="form1step3Prev" class="btns form-publish prevBtn">tillabaka</button>
                            <button type="button" id="form1step3Next" class="btns form-publish nextBtn">nästa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab">
            <form action="" data-form1-step="three">
                <div class="form-header form-publish">
                    <div class="grid-container ">
                        <h4>Steg 4 av 4</h4>
                        <h3>Kontaktinformation</h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="grid-container ">
                        <p>Följande information kommer inte att synas på vår hemsida. Den är bara till för att vi ska kunna kontakta dig angående er ansökan. </p>
                        <p>* Obligatorisk information</p>
                        <div class="form-spacing">
                            <label class="full-width-label">Namn på kontaktperson*</label>
                            <input name="contact-name" class="full-width" placeholder="Förnamn och Efternamn">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Mailadress kontaktperson*</label>
                            <input type="email" name="contact-email-address" class="full-width" placeholder="ex. fornamn@agendajamlikhet.se">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Telefonnummer till kontaktperson*</label>
                            <input type="number" name="contact-phone-no" class="full-width" placeholder="ex. 0046 708790464">
                        </div>
                        <div class="form-spacing">
                            <label class="full-width-label">Eventuellt meddelande till Agenda: Jämlikhet</label>
                            <textarea class="full-width" placeholder="Om du har frågor..."></textarea>
                        </div>
                        <fieldset>
                            <p>Markera de svarsalternativ som stämmer med lokalen*</p>
                            <input class="styled-radio form-publish" type="checkbox" id="check1-circle-1"> <label for="check1-circle-1">Jag bekräftar att jag har läst och står bakom Agenda: Jämlikhets <a class="links">värderingar och riktlinjer</a> för anslutna organisationer. </label>
                            <input class="styled-radio form-publish" type="checkbox" id="check1-circle-2"> <label for="check1-circle-2">Jag godkänner att mina personuppgifter behandlas enligt Agenda: Jämlikhets <a class="links">integritetspolicy</a></label>
                        </fieldset>
                        <div class="form-submit">
                            <a class=" button button-pink hollow small small-only-expanded" id="form1step4Next" href="#">SKICKA FORMULÄR</a>
                        </div>

                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="grid-container ">
                        <div class="form-buttons">
                            <button type="button" id="form1step4Prev" class="btns form-publish prevBtn">tillabaka</button>
                            <button type="button" class="btns form-publish nextBtn">nästa</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab">
            <div class="form-body">
                <div class="grid-container ">
                    <h1 class="form-success-title form-publish">Tack! </h1>
                    <p>Agenda: Jämlikhets redaktion granskar innehållet innan det publiceras på hemsidan. Vi notifierar dig när innehållet är uppe via angivna kontaktuppgifter. </p>
                    <fieldset class="spacer">
                        <p class="form-links email-icon"><a>Maila mig en kopia</a></p>
                    </fieldset>
                </div>
            </div>
        </div>
        <!-- </form> -->
    </section>

    <!-- <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button> -->
</div>
<?php
get_footer();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/org-form.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/event-form.js"></script>