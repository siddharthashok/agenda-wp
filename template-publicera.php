<?php

/**
 * Template Name: Publicera Page
 * @package agenda
 */
get_header();
?>
<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="cell large-12">
            <nav>
                <ul class="breadcrumbs">
                    <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                    <li><span  class="active">Publicera på Agenda: Jämlikhet</span></li>
                </ul>
            </nav>
        </div>
        <div class="cell medium-8">
            <section class="about-page">
            <!-- <div class="grid-container "> -->
                <h2 class="title">
                    <?= get_field("title");?>
                </h2>
                <div class="info-card">
                    <h3 class="card-title">Är du arrangör av jämlikhetsevent?</h3>
                    <p class="card-description">Sprid ditt evenemang och nå ut till en större målgrupp genom att publicera det i vår eventkalender. Det är helt kostnadsfritt.</p>
                    <a href="<?= get_site_url();?>/publish-event-form" class="link">PUBLICERA I VÅR EVENTKALENDER</a>
                </div>
                <div class="info-card mint-tulip">
                    <h3 class="card-title">Gå med i vårt nätverk av organisationer!</h3>
                    <p class="card-description">Låt din organisation synas genom att publicera en organisationsprofil på agendajamlikhet.se. Bli samtidigt en del av över 250 organisationer som ingår i Agenda: Jämlikhets nätverk</p>
                    <a href="<?= get_site_url();?>/publish-organisation-form" class="link">PUBLICERA din profil här </a>
                </div>
                <div class="content">
                    <?= the_content(); ?>
                </div>
            </section>
        </div>
        <div class="cell medium-4">
            <section class="contact-page">
                <div class="contact-wrapper">
                    <div>
                        <?php
                            $contact_us_text = get_field("contact_contact_us_text");
                        ?>
                        <h6><?= $contact_us_text["title"];?></h6>
                        <div class="content">
                            <?= $contact_us_text["paragraph"];?>
                        </div>
                    </div>
                    <div>
                        <?php
                            $tips_text = get_field("contact_tips_text");
                        ?>
                        <h6><?= $tips_text["title"];?></h6>
                        <div class="content">
                            <?= $tips_text["paragraph"];?>
                        </div>
                    </div>
                    <span class="subtitle">Kontaktpersoner</span>
                    <div class="grid-x">
                        <?php
                            if(have_rows("contact_contact_persons"))
                            {
                                while(have_rows("contact_contact_persons"))
                                {
                                    the_row();
                        ?>
                                    <div class="cell medium-12">
                                        <div class="contacts">
                                            <div class="contact-img">
                                                <img src="<?= get_sub_field("image");?>" alt="">
                                            </div>
                                            <div class="contact-details ">
                                                <p class="contact-title"><?= get_sub_field("title"); ?></p>
                                                <span class="full-name"><?= get_sub_field("full_name"); ?></span>
                                                <a href="mailto:<?= get_sub_field("email");?>"><?= get_sub_field("email");?></a>
                                                <a href="tel:<?= get_sub_field("contact_number");?>"><?= get_sub_field("contact_number");?></a>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="grid-container"> -->
                        <span class="subtitle">Styrelse för Agenda: Jämlikhet</span>
                        <div >
                            <?php
                                if(have_rows("contact_board_of_agenda"))
                                {
                                    while(have_rows("contact_board_of_agenda"))
                                    {
                                        the_row();
                            ?>
                                        <p>
                                            <?= get_sub_field("name"); ?>, <?= get_sub_field("designation"); ?>, <br>
                                            <a href="mailto:<?= get_sub_field("email"); ?>"> <?= get_sub_field("email"); ?></a>
                                        </p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                </div>

            </section>
        </div>
    </div>
</div>

<?php
get_footer();
?>