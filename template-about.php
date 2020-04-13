<?php

/**
 * Template Name: About Page
 * @package agenda
 */
get_header();
?>
<section class="about-page">
    <div class="grid-container ">
        <nav>
            <ul class="breadcrumbs">
                <li><a href="<?= get_site_url(); ?>">Hem</a></li>
                <li><a href="#" class="active">Om Agenda: Jämlikhet</a></li>
            </ul>
        </nav>
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
            <h3 class="sub-title"><?= get_field("subtitle");?></h3>
            <?= get_field("subtitle_paragraph");?>
        </div>
        <div class="sponser-list">
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
                
                <!-- <div class="cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mucf.png" alt="mucf">
                </div>
                <div class="cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/ladyborg.png" alt="ladyborg">
                </div>
                <div class=" cell medium-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/vastra.png" alt="vastra">
                </div> -->

            </div>
        </div>
    </div>

</section>

<?php
get_footer();
?>