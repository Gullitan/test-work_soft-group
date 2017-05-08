<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package test-work_soft-group
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            if (have_posts()) :

            if (is_home() && !is_front_page()) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

                <?php
            endif;
            ?>
            <h2>
                Latest news
            </h2>
            <div class="conteiner">
                <div class="row retipol">

                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                    the_post();


                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    ?>

                    <div class="col-sm-6 col-md-6 col-xl-6 ">
                        <?php
                        if (is_single()) :
                        the_title('<h2 class="entry-title">', '</h2>');
                        the_post_thumbnail('full');
                        ?>
                    </div>

                <?php


                else :
                    the_post_thumbnail(array(660, 370));
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;
                ?>
                    <span class="short-desc">
                        <?php
                        the_field('short_description');
                        ?>
                    </span>
                </div>

                <?php
                endwhile;

                endif; ?>

            </div>
    </div>


<?php if (function_exists("pagination")) {
    pagination($custom_query->max_num_pages);
} ?>
    </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
