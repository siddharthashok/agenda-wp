<?php

/**
 * Template Name: Org Form
 * @package agenda
 */
get_header();

?>
<section class="page-forms forms">
    <!-- <form id="orgForm" class="forms" action=""> -->
    <div class="grid-container">
        <div class="form-close">
            <h4>Anslut din organisation</h4>
            <button class="form-close-button">
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
                    <p>
                        <label class="full-width-label">Organisationens namn*</label>
                        <input name="org-name" class="full-width" placeholder="ex. Agenda: Jämlikhet">
                    </p>
                    <p>
                        <label class="full-width-label">Hemsida, webbadress</label>
                        <input name="webiste-url" class="full-width" placeholder="ex. agendajamliket.se">
                    </p>
                    <p>
                        <label class="full-width-label">Mailadress till organisationen (ex till en infomail)</label>
                        <input name='email-address' class="full-width" placeholder="ex. info@agendajamliket.se">
                    </p>
                    <p>
                        <label class="full-width-label">Länk till sociala medier</label>
                        <input name="social-link" class="full-width" placeholder="ex. instagram.se/agendajamliket/">
                    </p>
                    <p>
                        <label class="full-width-label">Ort/kommun*</label>
                        <input name="city" class="full-width" placeholder="ex. agendajamliket.se ">
                    </p>
                    <fieldset class="spacer">
                        <p class="form-links"><a>Ladda upp logga</a></p>
                    </fieldset>

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
                    <p>
                        <label class="full-width-label">Beskriv organisationens verksamhet (max 1250 tecken)*</label>
                        <textarea name="org-activity" class="full-width" placeholder="input"></textarea></p>
                    <fieldset>

                        <p>Markera de svarsalternativ som eventet berör*</p>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-1"><label for="check3-1"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-2"><label for="check3-2"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-3"><label for="check3-3"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-4"><label for="check3-4"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-5"><label for="check3-5">Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-6"><label for="check3-6"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-7"><label for="check3-7"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-8"><label for="check3-8"> Jämställdhet</label>
                        <input class="styled-checkbox form-org" form="check3" type="checkbox" id="check3-9"><label for="check3-9"> Jämställdhet</label>
                    </fieldset>
                    <p class="form-links"><a>Ladda upp bild till evenemanget</a></p>
                    <p class="form-links"><a>Ladda upp logga</a></p>

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
                    <p>
                        <label class="full-width-label">Organisationsnummer</label>
                        <input name="number" class="full-width" placeholder="ex. 192301018890">
                    </p>
                    <p>
                        <label class="full-width-label">Eventuellt meddelande till Agenda: Jämlikhet</label>
                        <textarea name="message" class="full-width" placeholder="Om du har frågor..."></textarea>
                    </p>
                    <fieldset>
                        <input class="styled-radio form-org" type="radio" id="radio-1" name="radio-group"> <label for="radio-1">Jag bekräftar att jag har läst och står bakom Agenda: Jämlikhets<a class="links">värderingar och riktlinjer</a>för anslutna organisationer.</label>
                        <input class="styled-radio form-org" type="radio" id="radio-2" name="radio-group"> <label for="radio-2">Jag godkänner att mina personuppgifter behandlas enligt Agenda: Jämlikhets <a class="links">integritetspolicy</a></label>
                    </fieldset>
                    <div class="form-submit">
                        <a class=" button button-green hollow small small-only-expanded" href="#">SKICKA FORMULÄR</a>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!--Arrows-->
    <div style="overflow:auto;">
        <div class="grid-container ">
            <div class="form-buttons">
                <button type="button" id="prevBtn" class="btns form-org" onclick="nextPrev(-1)">tillabaka</button>
                <button type="button" id="nextBtn" class="btns form-org" onclick="nextPrev(1)">nästa</button>
            </div>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
    <!-- </form> -->
</section>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/validate.js"></script>