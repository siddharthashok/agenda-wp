<?php
/**
 * Template Name: Member Sign Up Form
 */

 get_header();
?>
<section class="page-forms forms" id="member-form">
    <div class="grid-container">
        <div class="form-close">
            <h4 id="form-close-title">Bli medlem</h4>
            <a href="<?= get_site_url(); ?>/publish-event-organisation" class="form-close-button">
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
                <p>Vad kul att du är vill bli medlem i Agenda: Jämlikhet! Det är enkelt och helt kostnadsfritt. </p>
                <p>Ett stort medlemsstöd hjälper oss när vi behöver söka om projektstöd eller annat typ av finansiering för att utveckla vår verksamhet. Det gör oss också till en mer attraktiv samarbetspartner!</p>
                <p>Som medlem kommer du ibland att få mail av oss med inbjudningar till tex årsmöte eller viktig information om vad som händer inom föreningen.  Men det allra bästa sättet att hålla koll på det senaste är att följa oss på facebook eller instagram!</p>
                <p>För att bli medlem behöver du stå bakom <a class="links" href="<?= get_site_url();?>/var-vardegrund/" title="Agenda: Jämlikhets värdegrund" target="_blank">Agenda: Jämlikhets värdegrund</a>.</p>
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
                        <label for="">Bostadsort</label>
                        <input type="text" name="residence" id="residence" placeholder="ex. Linköping">
                    </div>
                    
        
                    <div class="field-wrap">
                        <!-- <label for="">För att hantera din intresseanmälan behöver vi spara dina personuppgifter. För att göra det behöver vi ditt godkännande!*</label> -->
                    </div>
                    <div class="field-wrap">
                        <input class="styled-radio form-publish" type="radio" name="privacy-policy" id="privacy-agree" value="privacy-agree">
                        <label for="privacy-agree">Jag bekräftar att jag har läst och står bakom Agenda: Jämlikhets <a href="#">Värdegrund</a>.</label>
                    </div>
                    <div class="field-wrap">
                        <input class="styled-radio form-publish" type="radio" name="agenda-value" id="agenda-value" value="agenda-value">
                        <label for="agenda-value">Jag godkänner att mina personuppgifter behandlas enligt Agenda: Jämlikhets <a href="#">integritetspolicy</a>.  </label>
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
                <p>Tack för ditt stöd! </p>
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
            
            // debugger;
            var fullName = $("#full-name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var residence = $("#residence").val();
            

            $.ajax({
                url:"<?= get_site_url()?>/wp-admin/admin-ajax.php",
                type:"POST",
                data:{
                    fullName:fullName,
                    email:email,
                    phone:phone,
                    residence:residence,
                    "action":"member"
                }
            }).then(function(reply){
                $("[data-step='2']").hide();
                $("#form-close-title").html("");
                $("[data-step='3']").show();
            });
        });
    })
</script>