<?php
/**
 * Template Name: Volunteer Sign Up Form
 */

 get_header();
?>
<section class="page-forms forms" id="volunteer-form">
    <div class="grid-container">
        <div class="form-close">
            <h4 id="form-close-title">Bli volontär</h4>
            <a href="<?= get_site_url(); ?>/publish" class="form-close-button">
                <h4>Stäng</h4>
                <img src="<?php echo get_template_directory_uri(); ?>/img/close-icon.svg" alt="">
            </a>
        </div>
    </div>
    <div class="form-tab" data-step="1">
        <div class="form-header form-volunteer">
            <div class="grid-container ">
                <h4>Steg 1 av 2</h4>
                <h3>Introduktion</h3>
            </div>
        </div>
        <div class="form-body">
            <div class="grid-container ">
                <p>Vad kul att du är nyfiken på att engagera dig i Agenda: Jämlikhet! Fyll i intresseanmälan nedan så hör vi av oss till dig!</p>
            </div>
        </div>
        <div style="overflow:auto;">
            <div class="grid-container ">
                <div class="form-buttons">
                    <button type="button" data-to-step="2" class="btns nextBtn">nästa</button>
                </div>
            </div>
        </div>
    </div>

    <div class="form-tab" data-step="2">
        <div class="form-header form-volunteer">
            <div class="grid-container ">
                <h4>Steg 2 av 2</h4>
                <h3>Dina uppgifter</h3>
            </div>
        </div>
        <div class="form-body">
            <div class="grid-container ">
                <p>* Obligatorisk information</p>
                <label for="">Jag är intresserad att bli volontär för en eller flera grupper av följande *</label>
                <div class="field-wrap">
                    <input class="styled-checkbox form-publish" name="group[]" type="checkbox" id="checkbox-1" value="Redaktionen Göteborg">
                    <label for="checkbox-1"> Redaktionen Göteborg</label>
                </div>
                <div class="field-wrap">
                    <input class="styled-checkbox form-publish" name="group[]" type="checkbox" id="checkbox-2" value="Redaktionen Stockholm">
                    <label for="checkbox-2"> Redaktionen Stockholm</label>
                </div>
                <div class="field-wrap">
                    <input class="styled-checkbox form-publish" name="group[]" type="checkbox" id="checkbox-3" value="Redaktionen Malmö">
                    <label for="checkbox-3"> Redaktionen Malmö</label>
                </div>
                <div class="field-wrap">
                    <input class="styled-checkbox form-publish" name="group[]" type="checkbox" id="checkbox-4" value="Webbgruppen">
                    <label for="checkbox-4"> Webbgruppen</label>
                </div>
                <div class="field-wrap">
                    <input class="styled-checkbox form-publish" name="group[]" type="checkbox" id="checkbox-5" value="Styrelsen">
                    <label for="checkbox-5"> Styrelsen</label>
                </div>
                <div class="field-wrap">
                   <input class="styled-checkbox form-publish" name="group[]" type="checkbox" id="checkbox-6" value="Jag vill starta Agenda: Jämlikhet i min stad">
                    <label for="checkbox-6"> Jag vill starta Agenda: Jämlikhet i min stad</label>
                </div>
                <div class="filed-wrap">
                    <label for="">Jag vill starta Agenda: Jämlikhet i min stad, ange stad:</label>
                    <input type="text" name="city" id="city" placeholder="t.ex. Karlstad">
                </div>
                <div class="other-details">
                    <div class="field-wrap">
                        <label for="">Namn*</label>
                        <input type="text" name="full-name" id="full-name" placeholder="ex. Sophia Andula">
                    </div>
                    <div class="field-wrap">
                        <label for="">E-mail*</label>
                        <input type="text" name="email" id="email" placeholder="ex. sophia.andula@gmail.com">
                    </div>
                    <div class="field-wrap">
                        <label for="">Mobilnummer</label>
                        <input type="text" name="phone" id="phone" placeholder="ex. 070-870 99 22">
                    </div>
                    <div class="field-wrap">
                        <label for="">Berätta om dig själv och varför du vill engagera dig i Agenda: Jämlikhet!*</label>
                        <textarea name="about" id="about" cols="30" rows="5" placeholder="Fritextsvar"></textarea>
                    </div>
                    <div class="field-wrap">
                        <label for="">Är det något speciellt som du är nyfiken på eller vill bidra med i den grupp som du är intresserad av?</label>
                        <textarea name="suggestion" id="suggestion" cols="30" rows="5" placeholder="Fritextsvar"></textarea>
                    </div>
                    <div class="field-wrap">
                        <label for="">I vilken stad befinner du dig?</label>
                        <input type="text" name="which-city" id="which-city" placeholder="t.ex. Karlstad">
                    </div>
                    <div class="field-wrap">
                        <label for="">Har du idéer om hur vi kan engagera fler för jämlikhet? Berätta gärna för oss här!</label>
                        <textarea name="engage-suggestion" id="engage-suggestion" cols="30" rows="5" placeholder="Fritextsvar"></textarea>
                    </div>
                    <!-- <div class="field-wrap">
                        <label for="">Vill du bli medlem i Agenda: Jämlikhet? Det kostar ingenting, men är ett enkelt sätt att stödja oss! *</label>
                    </div>
                    <div class="field-wrap">
                        <input class="styled-radio form-publish" type="radio" name="contribution" id="yes" value="yes">
                        <label for="yes">Ja, jag vill bli medlem i Agenda: Jämlikhet!</label>
                    </div>
                    <div class="field-wrap">
                        <input class="styled-radio form-publish" type="radio" name="contribution" id="no" value="no">
                        <label for="no">Nej, jag vill inte bli medlem i Agenda: Jämlikhet</label>
                    </div>
                    <div class="field-wrap">
                        <label for="">För att hantera din intresseanmälan behöver vi spara dina personuppgifter. För att göra det behöver vi ditt godkännande!*</label>
                    </div> -->
                    <div class="field-wrap">
                        <input class="styled-radio form-publish" type="checkbox" name="privacy-policy" id="privacy-agree" value="privacy-agree">
                        <label for="privacy-agree">Jag godkänner att mina personuppgifter behandlas enligt Agenda: Jämlikhets <a href="<?= get_site_url(); ?>/policy/" target="_blank">integritetspolicy</a>. </label>
                    </div>
                    <div class="field-wrap">
                        <input class="styled-radio form-publish" type="checkbox" name="agenda-value" id="agenda-value" value="agenda-value">
                        <label for="agenda-value">Jag bekräftar att jag har läst och står bakom Agenda: Jämlikhets <a href="<?= get_site_url(); ?>/our-values/" target="_blank">Värdegrund</a> </label>
                    </div>
                </div>
                <div class="button-wrapper text-center">
                    <a href="#" class="button hollow black" id="submit">skicka formlär</a>
                </div>
            </div>
        </div>
        <div style="overflow:auto;">
            <div class="grid-container ">
                <div class="form-buttons">
                    <button type="button" class="btns prevBtn" data-to-step="1">tillabaka</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-tab" data-step="3">
        <div class="form-body">
            <div class="grid-container ">
                <h1 class="form-success-title form-org">Tack! </h1>
                <p>Kul att du vill vara med! Vi har tagit emot din intresseanmälan och vi kommer höra av oss till dig så snart som möjilgt. </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>

<script>
    $(document).ready(function(){
        $("[data-step='2']").hide();
        $("[data-step='3']").hide();

        $("[data-to-step]").click(function(e){
            var nextTab = e.target.dataset.toStep;
            var currentTab = $(e.target).closest(".form-tab")

            currentTab.hide();
            $("[data-step='"+nextTab+"']").show();
        });

        $("#submit").click(function(e){
            e.preventDefault();
            var group = $("[name='group[]']:checkbox:checked");
            var groupArray = [];

            group.each(function(index,element){
                groupArray.push(element.value);
            });
            // debugger;
            var city = $("#city").val();
            var fullName = $("#full-name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var about = $("#about").val();
            var suggestion = $("#suggestion").val();
            var whichCity = $("#which-city").val();
            var engageSuggestion = $("#engage-suggestion").val();

            $.ajax({
                url:"<?= get_site_url()?>/wp-admin/admin-ajax.php",
                type:"POST",
                data:{
                    group: groupArray,
                    city:city,
                    fullName:fullName,
                    email:email,
                    phone:phone,
                    about:about,
                    suggestion:suggestion,
                    whichCity:whichCity,
                    engageSuggestion:engageSuggestion,
                    "action":"volunteer"
                }
            }).then(function(reply){
                $("[data-step='2']").hide();
                $("#form-close-title").html("");
                $("[data-step='3']").show();
            });
        });
    })
</script>
