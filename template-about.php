<?php

/**
 * Template Name: About Page
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
                    <li><a href="#" class="active">Om Agenda: Jämlikhet</a></li>
                </ul>
            </nav>
        </div>
        <div class="cell medium-8">
            <section class="about-page">
            <!-- <div class="grid-container "> -->
                <h2 class="title">
                    <?= get_field("title");?>
                </h2>
                <div class="grid-x ">
                    <div class="cell small-12">
                        <div class="about-img">
                            <img src="<?= get_field("banner_image") ? get_field("banner_image") : get_template_directory_uri().'/img/backup.jpg'; ?>" alt="">
                        </div>
                    </div>
                </div>


                <?= get_field("paragraph");?>
                <div>
                    <?php
                        $block_one = get_field("block_one");
                    ?>
                    <h3 class="sub-title green"><?= $block_one["title"];?></h3>
                    <?= $block_one["paragraph"];?>
                </div>
                <div>
                    <?php
                        $block_two = get_field("block_two");
                    ?>
                    <h3 class="sub-title"><?= $block_two["title"];?></h3>
                    <a href="<?= $block_two["button"]["button_link"]; ?>" class="button hollow block"><?= $block_two["button"]["button_text"]; ?></a>
                    <?= $block_two["paragraph"];?>
                </div>
                <div>
                    <?php
                        $block_three = get_field("block_three");
                    ?>
                    <h3 class="sub-title"><?= $block_three["title"];?></h3>
                    <?= $block_three["paragraph"];?>
                </div>
                <!-- <div class="sponser-list">
                    <h3 class="sub-title">Sponsorer </h3>
                    <div class="grid-x grid-margin-x grid-margin-y">
                        <?php
                            while(have_rows("sponsor_list"))
                            {
                                the_row();
                        ?>
                                <div class="cell medium-3">
                                    <img src="<?= get_sub_field("logo"); ?>" alt="kultur-ungdom">
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div> -->
            <!-- </div> -->
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
                        <?= $contact_us_text["paragraph"];?>
                    </div>
                    <div>
                        <?php
                            $tips_text = get_field("contact_tips_text");
                        ?>
                        <h6><?= $tips_text["title"];?></h6>
                        <?= $tips_text["paragraph"];?>
                    </div>
                    <span class="subtitle">Kontaktperso ner</span>
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
                                                <p><?= get_sub_field("title"); ?><br>
                                                    <?= get_sub_field("full_name"); ?><br>
                                                    <a href="mailto:<?= get_sub_field("email");?>"><?= get_sub_field("email");?></a><br>
                                                    <a href="tel:<?= get_sub_field("contact_number");?>"><?= get_sub_field("contact_number");?></a>
                                                </p>
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
                        
                    <!-- </div> -->
                </div>

            </section>
        </div>
    </div>
</div>

<?php
get_footer();
?>