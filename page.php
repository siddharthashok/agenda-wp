<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
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
                    <li><span class="active"><?= get_the_title();?></span></li>
                </ul>
            </nav>
        </div>
        <div class="cell medium-8">
            <section class="about-page">
            <!-- <div class="grid-container "> -->
                <h2 class="title">
                    <?= get_the_title();?>
                </h2>
                <div class="content-wrap">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        the_content();
                    endwhile; // End of the loop.
                    ?>
                </div>
            </section>
        </div>
        <div class="cell medium-4">
            <section class="contact-page">
                <div class="contact-wrapper">
                    <div>
                        <?php
                            $contact_us_text = get_field("contact_contact_us_text","option");
                        ?>
                        <h6><?= $contact_us_text["title"];?></h6>
                        <div class="content">
                            <?= $contact_us_text["paragraph"];?>
                        </div>
                    </div>
                    <div>
                        <?php
                            $tips_text = get_field("contact_tips_text","option");
                        ?>
                        <h6><?= $tips_text["title"];?></h6>
                        <div class="content">
                            <?= $tips_text["paragraph"];?>
                        </div>
                    </div>
                    <span class="subtitle">Kontaktpersoner</span>
                    <div class="grid-x">
                        <?php
                            if(have_rows("contact_contact_persons","option"))
                            {
                                while(have_rows("contact_contact_persons","option"))
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
                                if(have_rows("contact_board_of_agenda","option"))
                                {
                                    while(have_rows("contact_board_of_agenda","option"))
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
// get_sidebar();
get_footer();
