<?php

/**
 * Template Name: Organisation Form
 * @package agenda
 */
get_header();

?>
<section class="page-forms forms" id="organisation-form">
    <!-- <form id="orgForm" class="forms" action=""> -->
    <div class="grid-container">
        <div class="form-close">
            <h4 id="form-close-title">Anslut din organisation</h4>
            <a href="<?= get_site_url(); ?>/publish/" class="form-close-button">
                <h4>Stäng</h4>
                <img src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg" alt="">
            </a>
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
                <p>Att publicera din organisationsprofil på Agenda: Jämlikhets hemsida är kostnadsfritt.</p>
                <p>Organisationer inom civilsamhället som uppfyller följande kriterier får publicera en profil på sidan:</p>
                <ul>
                    <li>Är religiöst och partipolitiskt obundna</li>
                    <li>Jobbar med en eller flera olika jämlikhetsfrågor</li>
                    <li>Har verksamhet som privatpersoner kan engagera sig i eller bidra till</li>
                    <li>Står bakom Agenda: Jämlikhets värdegrund</li>
                </ul>
                <p>Med organisationer menar vi även organiseringsformer såsom kampanjer och initiativ, grupper, ideella föreningar och medlemsorganisationer.</p>
                <p>För mer information, läs våra Riktlinjer för publicering av organisationsprofiler.</p>
                <p>Vår redaktion granskar allt innehåll och hör av sig till dig när det är publicerat.</p>
            </div>
        </div>
        <div style="overflow:auto;">
            <div class="grid-container ">
                <div class="form-buttons">
                    <button type="button" id="step1Prev" class="btns form-org prevBtn">tillabaka</button>
                    <button type="button" id="step1Next" class="btns nextBtn">nästa</button>
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
                        <label class="full-width-label">Ort/kommun</label>
                        <input name="city" class="full-width" placeholder="ex. agendajamliket.se ">
                    </div>
                    <fieldset class="spacer">
                        <form action="">
                            <p class="form-links">
                                <a class="upload-link org-upload-link">Ladda upp logga</a>
                                <input id="logo" class="upload org-upload" type="file" />
                                <label class="upload-file-name  org-upload-file-name"></label>
                            </p>
                        </form>
                    </fieldset>

                </div>
            </div>
            <div style="overflow:auto;">
                <div class="grid-container ">
                    <div class="form-buttons">
                        <button type="button" id="step2Prev" class="btns prevBtn">tillabaka</button>
                        <button type="button" id="step2Next" class="btns nextBtn">nästa</button>
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
                        <label class="full-width-label">Vilka är ni? (max 1250 tecken)</label>
                        <textarea name="who-are-you" class="full-width" placeholder="En kort beskrivning om er grupp, kampanj eller organisation"></textarea>
                    </div>
                    <div class="form-spacing">
                        <label class="full-width-label">Vilka är era mål? (max 1250 tecken)</label>
                        <textarea name="org-goals" class="full-width" placeholder="En mening om målen eller visionen med ert arbete"></textarea>
                    </div>
                    <div class="form-spacing">
                        <label class="full-width-label">Vad är er huvudsakliga verksamhet? (max 1250 tecken)</label>
                        <textarea name="org-business" class="full-width" placeholder="Håller ni tex på med utbildning, lobbyarbete, kulturevenemang, kampanjer eller driver ni en blogg?"></textarea>
                    </div>
                    <div class="form-spacing">
                        <label class="full-width-label">Hur kan en kan engagera sig i eller bidra till organisationen? (max 1250 tecken)</label>
                        <textarea name="org-contribute" class="full-width" placeholder="Kan en tex bli medlem? Stödja arbetet på något vis? Gå utbildningar? Komma på arrangemang?"></textarea>
                    </div>
                    <fieldset>
                        <p>Markera de frågor som din organisation arbetar med*</p>
                        <?php
                            $all_terms = get_categories();
                            foreach ($all_terms as $key => $value) {
                        ?>
                        <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-<?= $key?>" value="<?= $value->term_id; ?>">
                        <label for="check3-<?= $key?>"> <?= $value->name; ?></label>
                        <?php
                            }
                        ?>
                        
                        <!-- <input class="styled-checkbox form-org" name="issues[]" type="checkbox" id="check3-2">
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
                        <label for="check3-9"> Jämställdhet</label> -->
                        <span id="checkbox_error"></span>
                    </fieldset>

                </div>
            </div>
            <div style="overflow:auto;">
                <div class="grid-container ">
                    <div class="form-buttons">
                        <button type="button" id="step3Prev" class="btns prevBtn">tillabaka</button>
                        <button type="button" id="step3Next" class="btns nextBtn">nästa</button>
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
                        <label class="full-width-label">Telefonnummer till kontaktperson (ange nummer utan specialtecken eller mellanrum)*</label>
                        <input type="number" name="contact-phone-no" class="full-width" placeholder="ex. 0708790464">
                    </div>
                    <div class="form-spacing d-none">
                        <label class="full-width-label">Organisationsnummer*</label>
                        <input type="number" name="number" class="full-width" placeholder="ex. 192301018890">
                    </div>
                    <div class="form-spacing">
                        <label class="full-width-label">Eventuellt meddelande till Agenda: Jämlikhet</label>
                        <textarea name="message" class="full-width" placeholder="Om du har frågor..."></textarea>
                    </div>
                    <fieldset>
                        <input class="styled-radio form-org" type="checkbox" id="check-circle-1"> <label for="check-circle-1">Jag bekräftar att jag har läst och står bakom Agenda: Jämlikhets <a class="links" href="<?= get_site_url(); ?>/our-values/" target="_blank">Värdegrund</a> samt <a class="links" href="<?= get_site_url(); ?>/publication-guidelines/" target="_blank">Riktlinjer</a> för publicering av evenemang.</label>
                        <input class="styled-radio form-org" type="checkbox" id="check-circle-2"> <label for="check-circle-2">Jag godkänner att mina personuppgifter behandlas enligt Agenda: Jämlikhets <a class="links" href="<?= get_site_url(); ?>/policy/" target="_blank">integritetspolicy</a>.</label>
                    </fieldset>
                    <div class="form-submit">
                        <a class=" button button-green hollow small small-only-expanded " id="step4Next" href="#">SKICKA FORMULÄR</a>
                    </div>

                </div>
            </div>
            <div style="overflow:auto;">
                <div class="grid-container ">
                    <div class="form-buttons">
                        <button type="button" id="step4Prev" class="btns prevBtn">tillabaka</button>
                        <!-- <button type="button" class="btns nextBtn">nästa</button> -->
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
                <!-- <fieldset class="spacer">
                    <p class="form-links email-icon"><a>Maila mig en kopia</a></p>
                </fieldset> -->
            </div>
        </div>
    </div>
    <!-- </form> -->
</section>

<?php
get_footer();
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/validate.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/js/org-form.js"></script>