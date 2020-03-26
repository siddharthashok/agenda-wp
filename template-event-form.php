<?php

/**
 * Template Name: Event Form
 * @package agenda
 */
get_header();
?>
<section class="page-forms forms">
    <!-- <form id="publishForm" class="forms" action=""> -->
    <div class="grid-container">
        <div class="form-close">
            <h4>Publicera evenemang</h4>
            <button class="form-close-button">
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
                    <p>
                        <label class="full-width-label">Titel på event*</label>
                        <input name="event-title" class="full-width" placeholder="input">
                    </p>
                    <p>
                        <label class="full-width-label">Arrangör*</label>
                        <input name="organizer" class="full-width" placeholder="t.ex. Agenda Jamliket">
                    </p>
                    <p>
                        <label class="full-width-label">Datum för event*</label>
                        <input name="event-date" class="full-width" placeholder="Datumformat">
                    </p>
                    <p>
                        <label class="full-width-label">Tidpunkt för event*</label>
                        <input name="event-time" class="full-width" placeholder="Ange start och sluttidpunkt">
                    </p>
                    <p>
                        <label class="full-width-label">Plats för event*</label>
                        <input name="event-location" class="full-width" placeholder="tex Annedalsseminariet, gbg Universitet ">
                    </p>
                    <p>
                        <label class="full-width-label">Adress*</label>
                        <input name="address" class="full-width" placeholder="tex Annedalsseminariet, gbg Universitet ">
                    </p>
                    <fieldset>
                        <p>Markera de svarsalternativ som stämmer med lokalen*</p>
                        <input class="styled-checkbox form-publish " form="check1" type="checkbox" id="check1-1" checked><label for="check1-1"> Ramp finns</label>
                        <input class="styled-checkbox form-publish" form="check1" type="checkbox" id="check1-2"><label for="check1-2"> Eventet är på bottenplan</label>
                        <input class="styled-checkbox form-publish" form="check1" type="checkbox" id="check1-3"><label for="check1-3"> Hiss finns</label>
                        <input class="styled-checkbox form-publish" form="check1" type="checkbox" id="check1-4"><label for="check1-4"> Hörselslinga</label>
                        <input class="styled-checkbox form-publish" form="check1" type="checkbox" id="check1-5"><label for="check1-5"> Syntolkning</label>
                        <input class="styled-checkbox form-publish" form="check1" type="checkbox" id="check1-6"><label for="check1-6"> Sittplatser</label>
                        <input class="styled-checkbox form-publish" form="check1" type="checkbox" id="check1-7"><label for="check1-7"> Teckenspråkstolkning</label>
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
                    <p>
                        <label class="full-width-label">Beskrivning av event (max 1250 tecken)*</label>
                        <textarea name="event-description" class="full-width" placeholder="ex. Vårt syfte är att..."></textarea>
                    </p>
                    <p>
                        <label class="full-width-label">Kostnad för event*</label>
                        <input name="event-cost" class="full-width" placeholder="t.ex. 0kr">
                    </p>
                    <p><label class="full-width-label">Hemsida för evenemang</label><input class="full-width" placeholder="t.ex. 0kr"></p>
                    <p><label class="full-width-label">Länk till facebook-event</label><input class="full-width" placeholder="t.ex. 0kr"></p>
                    <p><label class="full-width-label">Länk till arrangörens hemsida</label><input class="full-width" placeholder="t.ex. 0kr "></p>

                    <fieldset>
                        <p>Markera de svarsalternativ som eventet berör*</p>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-1" checked><label for="check2-1"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-2"><label for="check2-2"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-3"><label for="check2-3"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-4"><label for="check2-4"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-5"><label for="check2-5">Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-6"><label for="check2-6"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish " form="check2" type="checkbox" id="check2-7"><label for="check2-7"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-8"><label for="check2-8"> Jämställdhet</label>
                        <input class="styled-checkbox form-publish" form="check2" type="checkbox" id="check2-9"><label for="check2-9"> Jämställdhet</label>
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
                    <p>
                        <label class="full-width-label">Namn på kontaktperson*</label>
                        <input name="contact-name" class="full-width" placeholder="Förnamn och Efternamn">
                    </p>
                    <p>
                        <label class="full-width-label">Mailadress kontaktperson*</label>
                        <input name="contact-email-address" class="full-width" placeholder="ex. fornamn@agendajamlikhet.se">
                    </p>
                    <p>
                        <label class="full-width-label">Telefonnummer till kontaktperson*</label>
                        <input name="contact-phone-no" class="full-width" placeholder="ex. 0046 708790464">
                    </p>
                    <p><label class="full-width-label">Eventuellt meddelande till Agenda: Jämlikhet</label><textarea class="full-width" placeholder="Om du har frågor..."></textarea></p>
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
    <!-- </form> -->
</section>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/event-form.js"></script>