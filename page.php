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

										get_template_part( 'template-parts/content', 'page' );

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

									endwhile; // End of the loop.
									?>
								</div>
            </section>
        </div>
        <div class="cell medium-4">
            <section class="contact-page">
                <div class="contact-wrapper">
                    <span class="subtitle">Sidebar content</span>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

            </section>
        </div>
    </div>
</div>

<?php
// get_sidebar();
get_footer();
