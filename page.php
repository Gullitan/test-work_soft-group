<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package test-work_soft-group
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="col-sm-7 col-md-8 col-lg-8 home-info">
                <h1 class="title-home">
                    <?php echo get_theme_mod('title_home'); ?>
                </h1>
                <span class="short-desc-home">
                    <?php echo get_theme_mod('description'); ?>
                </span>
                <div class="row">
                    <aside class="col-lg-6">
                        <?php dynamic_sidebar( 'categories' ); ?>
                    </aside>
                    <aside class="col-lg-6">
                        <?php dynamic_sidebar('archives'); ?>
                    </aside>
                </div>
            </div>
            <aside class="col-sm-5 col-md-4 col-lg-4 register">
                <?php echo do_shortcode("[wppb-register]"); ?>
            </aside>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
