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
            <h4 id="form-close-title">Anslut din organisation</h4>
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
                        <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-1" value="value1" checked>
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

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/validate.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/js/org-form.js"></script>