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

<footer class="site-footer">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell large-12">
                <span class="logo" >
                    <img src="<?= get_template_directory_uri(); ?>/img/white-logo.svg" alt="logo of agenda website">
                </span>
            </div>
            <div class="cell large-4">
                <div class="links-wrapper">
                    <a href="#">Om Agenda Jämlikhet</a>
                    <a href="#">Bli volontär</a>
                    <div class="contact">
                        <span>Kontakt:</span>
                        <a href="mailto:mail@agendajamlikhet.se">mail@agendajamlikhet.se</a>
                    </div>
                </div>
            </div>
            <div class="cell large-4">
                <div class="links-wrapper">
                    <a href="#">Eventkalendern</a>
                    <a href="#">Publicera event</a>
                </div>
            </div>
            <div class="cell large-4">
                <div class="links-wrapper">
                    <a href="#">Alla organisationer</a>
                    <a href="#">Visa din organisation här</a>
                </div>
            </div>
            <div class="cell large-12">
                <div class="social-wrapper">
                    <a href="#" class="instagram"></a>
                    <a href="#" class="facebook"></a>
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