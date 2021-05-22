<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agenda
 */

?>

</div> <!-- closing content-wrap div -->

<footer class="site-footer">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell large-4">
                <div class="links-wrapper">
                    <h6>Om Agenda Jämlikhet</h6>
                    <div class="link-wrapper">
                        <h6>KONTAKT:</h6>
                        <a href="mailto:info@agendajamlikhet.se">info@agendajamlikhet.se</a>
                    </div>
                    <div class="link-wrapper">
                        <h6>HAR DU TIPS?</h6>
                        <a href="mailto:tips@gbg.agendajamlikhet.se">tips@gbg.agendajamlikhet.se</a>
                    </div>
                </div>
            </div>
            <div class="cell large-4">
                <div class="links-wrapper">
                  <nav>
                    <?php
                    wp_nav_menu( array(
                      'theme_location' => 'footer-menu-one',
                      'menu_id'        => 'footer-menu-one',
                      'menu_class'		=>	'footer-menu'
                    ) );
                    ?>

                  </nav>
                </div>
            </div>
            <div class="cell large-4">
                <div class="links-wrapper">
                  <nav>
                    <?php
                    wp_nav_menu( array(
                      'theme_location' => 'footer-menu-two',
                      'menu_id'        => 'footer-menu-two',
                      'menu_class'		=>	'footer-menu'
                    ) );
                    ?>

                  </nav>
                    <div class="social-wrapper">
                        <h6>FÖLJ OSS PÅ</h6>
                        <a href="https://www.facebook.com/agendajamlikhet" class="facebook" target="_blank" ></a>
                        <a href="https://instagram.com/agendajamlikhet" class="instagram" target="_blank" ></a>
                    </div>
                </div>
            </div>
            <div class="cell large-12">
                <div class="logo-note">
                    <div class="logo-wrapper">
                        <img src="<?= get_template_directory_uri(); ?>/img/footer-logo.svg" alt="">
                    </div>
                    <p class="note">agendajamlikhet.se är designad av Agenda: Jämlikhet och utvecklad av Grandworks </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    var siteURL = "<?= get_site_url();?>";
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/what-input.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/app.js?v=2"></script>
<?php wp_footer(); ?>
</body>

</html>
